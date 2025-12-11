<?php
require_once '../config.php';
requireLogin();

$db = getDBConnection();
$message = '';
$error = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    
    if ($action === 'add' || $action === 'edit') {
        $volume_id = $_POST['volume_id'] ?? null;
        $volume_number = intval($_POST['volume_number'] ?? 0);
        $issue_number = $_POST['issue_number'] ?? null;
        $publication_date = $_POST['publication_date'] ?? '';
        $page_range = sanitizeInput($_POST['page_range'] ?? '');
        $issn = sanitizeInput($_POST['issn'] ?? '3107-7269');
        $description = sanitizeInput($_POST['description'] ?? '');
        $status = $_POST['status'] ?? 'published';
        $total_articles = isset($_POST['total_articles']) && $_POST['total_articles'] !== ''
            ? intval($_POST['total_articles'])
            : 0;
        $is_special_edition_flag = isset($_POST['is_special_edition']) ? 1 : 0;
        $special_edition_year = null;

        if ($is_special_edition_flag) {
            $year_input = intval($_POST['special_edition_year'] ?? 0);
            if ($year_input >= 1900 && $year_input <= 2100) {
                $special_edition_year = $year_input;
            }
        }
        
        // Handle file uploads
        $cover_image = null;
        $volume_pdf = null;
        
        // Upload cover image
        if (isset($_FILES['cover_image']) && $_FILES['cover_image']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['cover_image'];
            $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
            
            if (in_array($file['type'], $allowed)) {
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $filename = 'cover_' . time() . '_' . uniqid() . '.' . $extension;
                $target = COVER_DIR . $filename;
                
                if (move_uploaded_file($file['tmp_name'], $target)) {
                    $cover_image = $filename;
                }
            }
        }
        
        // Upload volume PDF
        if (isset($_FILES['volume_pdf']) && $_FILES['volume_pdf']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['volume_pdf'];
            
            if ($file['type'] === 'application/pdf' && $file['size'] <= MAX_FILE_SIZE) {
                $filename = 'volume_' . time() . '_' . uniqid() . '.pdf';
                $target = PDF_DIR . $filename;
                
                if (move_uploaded_file($file['tmp_name'], $target)) {
                    $volume_pdf = $filename;
                }
            }
        }
        
        try {
            if ($action === 'add') {
                $query = "
                    INSERT INTO volumes (volume_number, issue_number, publication_date, page_range, issn, cover_image, volume_pdf, description, status, total_articles, is_special_edition, special_edition_year)
                    VALUES (:volume_number, :issue_number, :publication_date, :page_range, :issn, :cover_image, :volume_pdf, :description, :status, :total_articles, :is_special_edition, :special_edition_year)
                ";
                $params = [
                    ':volume_number' => $volume_number,
                    ':issue_number' => $issue_number,
                    ':publication_date' => $publication_date,
                    ':page_range' => $page_range,
                    ':issn' => $issn,
                    ':cover_image' => $cover_image,
                    ':volume_pdf' => $volume_pdf,
                    ':description' => $description,
                    ':status' => $status,
                    ':total_articles' => $total_articles,
                    ':is_special_edition' => $is_special_edition_flag,
                    ':special_edition_year' => $special_edition_year
                ];
                $message = 'Volume added successfully!';
            } else {
                $params = [
                    ':volume_number' => $volume_number,
                    ':issue_number' => $issue_number,
                    ':publication_date' => $publication_date,
                    ':page_range' => $page_range,
                    ':issn' => $issn,
                    ':description' => $description,
                    ':status' => $status,
                    ':total_articles' => $total_articles,
                    ':is_special_edition' => $is_special_edition_flag,
                    ':special_edition_year' => $special_edition_year,
                    ':id' => $volume_id
                ];
                
                $updates = [];
                if ($cover_image) {
                    $updates[] = 'cover_image = :cover_image';
                    $params[':cover_image'] = $cover_image;
                }
                if ($volume_pdf) {
                    $updates[] = 'volume_pdf = :volume_pdf';
                    $params[':volume_pdf'] = $volume_pdf;
                }
                
                $query = "
                    UPDATE volumes SET
                        volume_number = :volume_number,
                        issue_number = :issue_number,
                        publication_date = :publication_date,
                        page_range = :page_range,
                        issn = :issn,
                        description = :description,
                        status = :status,
                        total_articles = :total_articles,
                        is_special_edition = :is_special_edition,
                        special_edition_year = :special_edition_year
                ";
                if (!empty($updates)) {
                    $query .= ', ' . implode(', ', $updates);
                }
                $query .= " WHERE id = :id";
                
                $message = 'Volume updated successfully!';
            }
            
            $stmt = $db->prepare($query);
            $stmt->execute($params);
            
            header('Location: volumes.php?message=' . urlencode($message));
            exit;
            
        } catch (PDOException $e) {
            $error = 'Error: ' . $e->getMessage();
        }
    } elseif ($action === 'delete') {
        $volume_id = intval($_POST['volume_id'] ?? 0);
        
        try {
            // Get file names before deletion
            $stmt = $db->prepare("SELECT cover_image, volume_pdf FROM volumes WHERE id = :id");
            $stmt->execute([':id' => $volume_id]);
            $volume = $stmt->fetch();
            
            // Delete volume (cascade will delete articles)
            $stmt = $db->prepare("DELETE FROM volumes WHERE id = :id");
            $stmt->execute([':id' => $volume_id]);
            
            // Delete files
            if ($volume) {
                if ($volume['cover_image'] && file_exists(COVER_DIR . $volume['cover_image'])) {
                    unlink(COVER_DIR . $volume['cover_image']);
                }
                if ($volume['volume_pdf'] && file_exists(PDF_DIR . $volume['volume_pdf'])) {
                    unlink(PDF_DIR . $volume['volume_pdf']);
                }
            }
            
            $message = 'Volume deleted successfully!';
            header('Location: volumes.php?message=' . urlencode($message));
            exit;
            
        } catch (PDOException $e) {
            $error = 'Error: ' . $e->getMessage();
        }
    }
}

// Get message from URL
if (isset($_GET['message'])) {
    $message = urldecode($_GET['message']);
}

// Get action and volume ID
$action = $_GET['action'] ?? 'list';
$volume_id = $_GET['id'] ?? null;

// Get volume data for editing
$volume = null;
if ($action === 'edit' && $volume_id) {
    $stmt = $db->prepare("SELECT * FROM volumes WHERE id = :id");
    $stmt->execute([':id' => $volume_id]);
    $volume = $stmt->fetch();
    
    if (!$volume) {
        $action = 'list';
    }
}

// Get all volumes for listing
$volumes = [];
if ($action === 'list') {
    $stmt = $db->prepare("
        SELECT *
        FROM volumes
        ORDER BY volume_number DESC, issue_number DESC
    ");
    $stmt->execute();
    $volumes = $stmt->fetchAll();
}

$isSpecialEdition = false;
$specialEditionYearValue = '';

if ($volume) {
    $isSpecialEdition = !empty($volume['is_special_edition']);
    $specialEditionYearValue = $volume['special_edition_year'] ?? '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <title>Manage Volumes - IIPJ Admin</title>
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
        
        .nav-menu a:hover {
            background: rgba(255, 255, 255, 0.1);
        }
        
        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }
        
        .page-header h1 {
            color: #1e3a8a;
        }
        
        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #1e3a8a;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
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
        
        .message {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }
        
        .message.success {
            background: #d1fae5;
            color: #065f46;
            border: 1px solid #10b981;
        }
        
        .message.error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #ef4444;
        }
        
        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: #374151;
        }
        
        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
        }
        
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #1e3a8a;
        }
        
        .special-edition-toggle {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 600;
            color: #374151;
        }
        
        .special-edition-toggle input[type="checkbox"] {
            width: auto;
        }
        
        .special-year-field {
            margin-top: 0.75rem;
            display: none;
        }
        
        .special-year-field.active {
            display: block;
        }
        
        .special-edition-note {
            margin-top: 0.35rem;
            color: #6b7280;
            font-size: 0.9rem;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .table-container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        th, td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid #e5e7eb;
        }
        
        th {
            background: #f9fafb;
            font-weight: 600;
            color: #374151;
        }
        
        tr:hover {
            background: #f9fafb;
        }
        
        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        .status-published {
            background: #d1fae5;
            color: #065f46;
        }
        
        .status-draft {
            background: #fee2e2;
            color: #991b1b;
        }
        
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-small {
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
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
                <li><a href="recent_updates.php">Recent Updates</a></li>
                <li><a href="change_password.php">Change Password</a></li>
                <li><a href="../index.php">View Site</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <?php if ($message): ?>
            <div class="message success"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>
        
        <?php if ($error): ?>
            <div class="message error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <?php if ($action === 'add' || $action === 'edit'): ?>
            <div class="page-header">
                <h1><?php echo $action === 'add' ? 'Add New Volume' : 'Edit Volume'; ?></h1>
                <a href="volumes.php" class="btn btn-secondary">Back to List</a>
            </div>
            
            <div class="form-container">
                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="<?php echo $action; ?>">
                    <?php if ($action === 'edit'): ?>
                        <input type="hidden" name="volume_id" value="<?php echo $volume['id']; ?>">
                    <?php endif; ?>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="volume_number">Volume Number *</label>
                            <input type="number" id="volume_number" name="volume_number" required
                                   value="<?php echo $volume ? htmlspecialchars($volume['volume_number']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="issue_number">Issue Number *</label>
                            <input type="text" id="issue_number" name="issue_number" required
                                   value="<?php echo $volume ? htmlspecialchars($volume['issue_number']) : ''; ?>">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="publication_date">Publication Date *</label>
                            <input type="date" id="publication_date" name="publication_date" required
                                   value="<?php echo $volume ? htmlspecialchars($volume['publication_date']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select id="status" name="status">
                                <option value="published" <?php echo ($volume && $volume['status'] === 'published') ? 'selected' : ''; ?>>Published</option>
                                <option value="draft" <?php echo ($volume && $volume['status'] === 'draft') ? 'selected' : ''; ?>>Draft</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="page_range">Page Range</label>
                            <input type="text" id="page_range" name="page_range" placeholder="e.g., 1-100"
                                   value="<?php echo $volume ? htmlspecialchars($volume['page_range']) : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="issn">ISSN</label>
                            <input type="text" id="issn" name="issn" value="<?php echo $volume ? htmlspecialchars($volume['issn']) : '3107-7269'; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="total_articles">Total Articles</label>
                        <input type="number" id="total_articles" name="total_articles" min="0" placeholder="e.g., 12"
                               value="<?php echo $volume ? htmlspecialchars($volume['total_articles']) : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label class="special-edition-toggle" for="is_special_edition">
                            <input type="checkbox" id="is_special_edition" name="is_special_edition" value="1" <?php echo $isSpecialEdition ? 'checked' : ''; ?>>
                            Mark as Special Edition
                        </label>
                        <div id="specialEditionYearField" class="special-year-field <?php echo $isSpecialEdition ? 'active' : ''; ?>">
                            <label for="special_edition_year">Special Edition Year</label>
                            <input type="number" id="special_edition_year" name="special_edition_year" min="1900" max="2100" placeholder="e.g., 2024"
                                   value="<?php echo htmlspecialchars($specialEditionYearValue); ?>" <?php echo $isSpecialEdition ? '' : 'disabled'; ?>>
                            <p class="special-edition-note">This year will be visible to readers whenever the volume is marked as a special edition.</p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="cover_image">Cover Image</label>
                        <input type="file" id="cover_image" name="cover_image" accept="image/*">
                        <?php if ($volume && $volume['cover_image']): ?>
                            <p style="margin-top: 0.5rem; color: #6b7280;">
                                Current: <a href="<?php echo SITE_URL . '/uploads/covers/' . $volume['cover_image']; ?>" target="_blank">View</a>
                            </p>
                        <?php endif; ?>
                    </div>
                    
                    <div class="form-group">
                        <label for="volume_pdf">Volume PDF</label>
                        <input type="file" id="volume_pdf" name="volume_pdf" accept="application/pdf">
                        <?php if ($volume && $volume['volume_pdf']): ?>
                            <p style="margin-top: 0.5rem; color: #6b7280;">
                                Current: <a href="<?php echo SITE_URL . '/uploads/pdfs/' . $volume['volume_pdf']; ?>" target="_blank">View</a>
                            </p>
                        <?php endif; ?>
                        <p style="margin-top: 0.5rem; color: #6b7280; font-size: 0.9rem;">
                            Max file size: <?php echo formatFileSize(MAX_FILE_SIZE); ?>
                        </p>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="4"><?php echo $volume ? htmlspecialchars($volume['description']) : ''; ?></textarea>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn"><?php echo $action === 'add' ? 'Add Volume' : 'Update Volume'; ?></button>
                        <a href="volumes.php" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
            
        <?php else: ?>
            <div class="page-header">
                <h1>Manage Volumes</h1>
                <a href="volumes.php?action=add" class="btn">Add New Volume</a>
            </div>
            
            <div class="table-container">
                <?php if (empty($volumes)): ?>
                    <p>No volumes found. <a href="volumes.php?action=add">Create your first volume</a></p>
                <?php else: ?>
                    <table>
                        <thead>
                            <tr>
                                <th>Volume</th>
                                <th>Issue</th>
                                <th>Publication Date</th>
                                <th>Total Articles</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($volumes as $vol): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($vol['volume_number']); ?></td>
                                    <td><?php echo htmlspecialchars($vol['issue_number']); ?></td>
                                    <td><?php echo date('F Y', strtotime($vol['publication_date'])); ?></td>
                                    <td><?php echo htmlspecialchars($vol['total_articles']); ?></td>
                                    <td>
                                        <span class="status-badge status-<?php echo $vol['status']; ?>">
                                            <?php echo ucfirst($vol['status']); ?>
                                        </span>
                                    </td>
                                    <td>
                                        <div class="actions">
                                            <a href="volumes.php?action=edit&id=<?php echo $vol['id']; ?>" class="btn btn-small">Edit</a>
                                            <form method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this volume? This will also delete all articles in it.');">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="volume_id" value="<?php echo $vol['id']; ?>">
                                                <button type="submit" class="btn btn-small btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const specialEditionCheckbox = document.getElementById('is_special_edition');
        const specialYearField = document.getElementById('specialEditionYearField');
        const specialYearInput = document.getElementById('special_edition_year');

        if (!specialEditionCheckbox || !specialYearField || !specialYearInput) {
            return;
        }

        const toggleSpecialEditionField = () => {
            if (specialEditionCheckbox.checked) {
                specialYearField.classList.add('active');
                specialYearInput.disabled = false;
            } else {
                specialYearField.classList.remove('active');
                specialYearInput.disabled = true;
            }
        };

        specialEditionCheckbox.addEventListener('change', toggleSpecialEditionField);
        toggleSpecialEditionField();
    });
</script>
</body>
</html>

