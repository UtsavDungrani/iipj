<?php
require_once '../config.php';
requireLogin();

$message = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error = 'All fields are required';
    } elseif ($new_password !== $confirm_password) {
        $error = 'New passwords do not match';
    } elseif (strlen($new_password) < 6) {
        $error = 'Password must be at least 6 characters long';
    } else {
        try {
            $db = getDBConnection();
            $stmt = $db->prepare("SELECT password FROM users WHERE id = :id");
            $stmt->execute([':id' => $_SESSION['user_id']]);
            $user = $stmt->fetch();

            if ($user && password_verify($current_password, $user['password'])) {
                $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
                $updateStmt = $db->prepare("UPDATE users SET password = :password WHERE id = :id");
                $updateStmt->execute([
                    ':password' => $hashedPassword,
                    ':id' => $_SESSION['user_id']
                ]);
                $message = 'Password changed successfully!';
            } else {
                $error = 'Current password is incorrect';
            }
        } catch (Exception $e) {
            $error = 'Error: ' . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <title>Change Password - IIPJ Admin</title>
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
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
        }

        .form-container {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-header h1 {
            color: #1e3a8a;
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

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            font-size: 1rem;
        }

        .form-group input:focus {
            outline: none;
            border-color: #1e3a8a;
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

        .form-actions {
            display: flex;
            gap: 1rem;
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
        <div class="form-container">
            <div class="page-header">
                <h1>Change Password</h1>
            </div>

            <?php if ($message): ?>
                <div class="message success"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="message error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>

                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" required minlength="6">
                    <small style="color: #6b7280; margin-top: 0.5rem; display: block;">Minimum 6 characters</small>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm New Password</label>
                    <input type="password" id="confirm_password" name="confirm_password" required minlength="6">
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn">Change Password</button>
                    <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>