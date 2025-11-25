<?php
require_once '../config.php';
requireLogin();

$db = getDBConnection();
$message = '';
$error = '';

function handleFileUpload(string $fieldName, &$error): ?array
{
    if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] !== UPLOAD_ERR_OK) {
        $error = 'Please upload a PDF file for this update.';
        return null;
    }

    $file = $_FILES[$fieldName];

    if ($file['type'] !== 'application/pdf') {
        $error = 'Only PDF files are allowed.';
        return null;
    }

    if ($file['size'] > MAX_FILE_SIZE) {
        $error = 'PDF file exceeds the maximum allowed size.';
        return null;
    }

    $filename = 'update_' . time() . '_' . uniqid('', true) . '.pdf';
    $target = UPDATE_DIR . $filename;

    if (!move_uploaded_file($file['tmp_name'], $target)) {
        $error = 'Failed to upload the PDF file. Please try again.';
        return null;
    }

    return [
        'file_name' => $filename,
        'file_size' => (int) $file['size'],
    ];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'create') {
        $title = sanitizeInput($_POST['title'] ?? '');
        $updateType = $_POST['update_type'] === 'pdf' ? 'pdf' : 'text';
        $content = trim($_POST['content'] ?? '');
        $isPublished = isset($_POST['is_published']) ? 1 : 0;
        $fileData = null;

        if (empty($title)) {
            $error = 'Title is required.';
        } elseif ($updateType === 'text' && empty($content)) {
            $error = 'Content is required for text updates.';
        } elseif ($updateType === 'pdf') {
            $fileData = handleFileUpload('update_file', $error);
        }

        if (empty($error)) {
            try {
                $stmt = $db->prepare("
                    INSERT INTO recent_updates (title, update_type, content, file_name, file_size, is_published)
                    VALUES (:title, :update_type, :content, :file_name, :file_size, :is_published)
                ");
                $stmt->execute([
                    ':title' => $title,
                    ':update_type' => $updateType,
                    ':content' => $updateType === 'text' ? $content : ($content ?: null),
                    ':file_name' => $fileData['file_name'] ?? null,
                    ':file_size' => $fileData['file_size'] ?? null,
                    ':is_published' => $isPublished,
                ]);

                $message = 'Recent update created successfully!';
                header('Location: recent_updates.php?message=' . urlencode($message));
                exit;
            } catch (PDOException $e) {
                $error = 'Database error: ' . $e->getMessage();
            }
        }
    } elseif ($action === 'delete') {
        $updateId = intval($_POST['update_id'] ?? 0);

        try {
            $stmt = $db->prepare("SELECT file_name FROM recent_updates WHERE id = :id");
            $stmt->execute([':id' => $updateId]);
            $update = $stmt->fetch();

            $stmt = $db->prepare("DELETE FROM recent_updates WHERE id = :id");
            $stmt->execute([':id' => $updateId]);

            if ($update && $update['file_name']) {
                $filePath = UPDATE_DIR . $update['file_name'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            $message = 'Update deleted.';
            header('Location: recent_updates.php?message=' . urlencode($message));
            exit;
        } catch (PDOException $e) {
            $error = 'Unable to delete update: ' . $e->getMessage();
        }
    } elseif ($action === 'toggle_status') {
        $updateId = intval($_POST['update_id'] ?? 0);
        $newStatus = isset($_POST['new_status']) ? (int) $_POST['new_status'] : 0;

        try {
            $stmt = $db->prepare("UPDATE recent_updates SET is_published = :status WHERE id = :id");
            $stmt->execute([
                ':status' => $newStatus,
                ':id' => $updateId,
            ]);

            $message = 'Update visibility changed.';
            header('Location: recent_updates.php?message=' . urlencode($message));
            exit;
        } catch (PDOException $e) {
            $error = 'Unable to update status: ' . $e->getMessage();
        }
    }
}

if (isset($_GET['message'])) {
    $message = urldecode($_GET['message']);
}

$updatesStmt = $db->query("
    SELECT id, title, update_type, is_published, content, file_name, file_size, published_at
    FROM recent_updates
    ORDER BY published_at DESC
");
$recentUpdates = $updatesStmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <title>Recent Updates - IIPJ Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9fafb;
            color: #1f2937;
        }

        .navbar {
            background: #1e3a8a;
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .nav-brand {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-menu {
            display: flex;
            gap: 1rem;
            list-style: none;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: background 0.3s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            background: rgba(255, 255, 255, 0.15);
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            color: #1e3a8a;
            margin-bottom: 0.5rem;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 1.5rem;
        }

        .card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.1);
        }

        .card h2 {
            color: #1e3a8a;
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.35rem;
            color: #1f2937;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 0.95rem;
            background: #ffffff;
        }

        input[type="text"]:focus,
        input[type="file"]:focus,
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #1e3a8a;
        }

        textarea {
            min-height: 130px;
            resize: vertical;
        }

        .radio-group {
            display: flex;
            gap: 1.5rem;
            margin-bottom: 1rem;
        }

        .radio-group label {
            font-weight: 500;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1.5rem;
            background: #1e3a8a;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: background 0.2s ease;
        }

        .btn:hover {
            background: #3b82f6;
        }

        .btn-danger {
            background: #dc2626;
        }

        .btn-danger:hover {
            background: #b91c1c;
        }

        .btn-secondary {
            background: #6b7280;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .alert {
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-weight: 500;
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
        }

        .alert-error {
            background: #fef2f2;
            color: #991b1b;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th,
        td {
            padding: 0.75rem;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
            font-size: 0.95rem;
        }

        th {
            background: #f1f5f9;
            font-weight: 600;
            color: #0f172a;
        }

        .badge {
            display: inline-block;
            padding: 0.2rem 0.75rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .badge-text {
            background: #dbeafe;
            color: #1e3a8a;
        }

        .badge-pdf {
            background: #fee2e2;
            color: #991b1b;
        }

        .badge-live {
            background: #d1fae5;
            color: #065f46;
        }

        .badge-hidden {
            background: #fef3c7;
            color: #92400e;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .muted {
            color: #6b7280;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            margin-bottom: 0.7rem;
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                gap: 1rem;
            }

            .grid {
                grid-template-columns: 1fr;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-brand">IIPJ Admin Panel</div>
            <ul class="nav-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="volumes.php">Manage Volumes</a></li>
                <li><a href="recent_updates.php" class="active">Recent Updates</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="../index.php" target="_blank">View Site</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="page-header">
            <h1>Recent Updates</h1>
            <p>Add short notices or PDF announcements for the public site.</p>
        </div>

        <?php if (!empty($message)): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <?php if (!empty($error)): ?>
            <div class="alert alert-error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <div class="grid">
            <div class="card">
                <h2>Create Update</h2>
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="create">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" placeholder="e.g., Call for Papers, November 2025"
                        required>

                    <label>Update Type</label>
                    <div class="radio-group">
                        <label><input type="radio" name="update_type" value="text" checked> Text</label>
                        <label><input type="radio" name="update_type" value="pdf"> PDF</label>
                    </div>

                    <div id="textFields">
                        <label for="content">Content / Summary</label>
                        <textarea id="content" name="content" placeholder="Write the announcement details here..."
                            autocomplete="off"></textarea>
                    </div>

                    <div id="fileField" style="display: none;">
                        <label for="update_file">Upload PDF</label>
                        <input type="file" id="update_file" name="update_file" accept="application/pdf" style="margin-bottom: 0;">
                        <p class="muted">Max size: <?php echo formatFileSize(MAX_FILE_SIZE); ?></p>
                        <label for="content_pdf">Optional summary/description</label>
                        <textarea id="content_pdf" name="content" placeholder="Add a short description for this PDF."
                            disabled></textarea>
                    </div>

                    <label><input type="checkbox" name="is_published" checked> Publish immediately</label>

                    <button type="submit" class="btn" style="margin-top: 1rem;">Save Update</button>
                </form>
            </div>

            <div class="card">
                <h2>Existing Updates</h2>
                <?php if (empty($recentUpdates)): ?>
                    <p>No updates yet. Once added, they will appear on the public site.</p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Published</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($recentUpdates as $update): ?>
                                <tr>
                                    <td>
                                        <strong><?php echo htmlspecialchars($update['title']); ?></strong>
                                        <?php if (!empty($update['content'])): ?>
                                            <div class="muted">
                                                <?php echo htmlspecialchars(mb_strimwidth($update['content'], 0, 80, '...')); ?>
                                            </div>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span
                                            class="badge <?php echo $update['update_type'] === 'pdf' ? 'badge-pdf' : 'badge-text'; ?>">
                                            <?php echo strtoupper($update['update_type']); ?>
                                            <?php if ($update['update_type'] === 'pdf' && $update['file_size']): ?>
                                                (<?php echo formatFileSize($update['file_size']); ?>)
                                            <?php endif; ?>
                                        </span>
                                    </td>
                                    <td>
                                        <span
                                            class="badge <?php echo $update['is_published'] ? 'badge-live' : 'badge-hidden'; ?>">
                                            <?php echo $update['is_published'] ? 'Visible' : 'Hidden'; ?>
                                        </span>
                                    </td>
                                    <td><?php echo date('d M Y', strtotime($update['published_at'])); ?></td>
                                    <td>
                                        <div class="actions">
                                            <form method="post"
                                                onsubmit="return confirm('Toggle visibility for this update?');">
                                                <input type="hidden" name="action" value="toggle_status">
                                                <input type="hidden" name="update_id" value="<?php echo $update['id']; ?>">
                                                <input type="hidden" name="new_status"
                                                    value="<?php echo $update['is_published'] ? 0 : 1; ?>">
                                                <button type="submit" class="btn btn-secondary" title="Toggle visibility">
                                                    <?php echo $update['is_published'] ? 'Hide' : 'Publish'; ?>
                                                </button>
                                            </form>
                                            <form method="post" onsubmit="return confirm('Delete this update permanently?');">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="update_id" value="<?php echo $update['id']; ?>">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        const typeRadios = document.querySelectorAll('input[name="update_type"]');
        const textFields = document.getElementById('textFields');
        const fileField = document.getElementById('fileField');
        const contentTextarea = document.getElementById('content');
        const contentPdfTextarea = document.getElementById('content_pdf');
        const fileInput = document.getElementById('update_file');

        typeRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                if (radio.value === 'pdf' && radio.checked) {
                    textFields.style.display = 'none';
                    fileField.style.display = 'block';
                    contentTextarea.value = '';
                    contentTextarea.disabled = true;
                    contentTextarea.required = false;
                    contentPdfTextarea.disabled = false;
                    contentPdfTextarea.required = false;
                    fileInput.required = true;
                } else if (radio.value === 'text' && radio.checked) {
                    textFields.style.display = 'block';
                    fileField.style.display = 'none';
                    contentPdfTextarea.value = '';
                    contentTextarea.disabled = false;
                    contentTextarea.required = true;
                    contentPdfTextarea.disabled = true;
                    contentPdfTextarea.required = false;
                    fileInput.value = '';
                    fileInput.required = false;
                }
            });
        });

        contentTextarea.disabled = false;
        contentTextarea.required = true;
        contentPdfTextarea.disabled = true;
        contentPdfTextarea.required = false;
        fileInput.required = false;
    </script>
</body>

</html>