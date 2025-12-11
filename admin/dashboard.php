<?php
require_once '../config.php';
requireLogin();

$db = getDBConnection();

// Get statistics using only the volumes table
$statsQuery = "
    SELECT 
        COUNT(*) as total_volumes,
        COALESCE(SUM(total_articles), 0) as total_articles,
        COALESCE(SUM(total_downloads), 0) as total_downloads
    FROM volumes
    WHERE status = 'published'
";
$statsStmt = $db->prepare($statsQuery);
$statsStmt->execute();
$stats = $statsStmt->fetch();

// Get recent volumes
$recentQuery = "
    SELECT *
    FROM volumes
    ORDER BY created_at DESC
    LIMIT 5
";
$recentStmt = $db->prepare($recentQuery);
$recentStmt->execute();
$recentVolumes = $recentStmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../assets/images/favicon.png" />
    <title>Admin Dashboard - IIPJ</title>
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
            margin-bottom: 2rem;
        }

        .page-header h1 {
            color: #1e3a8a;
            margin-bottom: 0.5rem;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .stat-label {
            color: #6b7280;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #1e3a8a;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .action-card {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .action-card h3 {
            color: #1e3a8a;
            margin-bottom: 1rem;
        }

        .action-card p {
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background: #1e3a8a;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background 0.3s;
        }

        .btn:hover {
            background: #3b82f6;
        }

        .btn-secondary {
            background: #6b7280;
        }

        .btn-secondary:hover {
            background: #4b5563;
        }

        .recent-volumes {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .recent-volumes h2 {
            color: #1e3a8a;
            margin-bottom: 1rem;
        }

        .volume-list {
            list-style: none;
        }

        .volume-item {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .volume-item:last-child {
            border-bottom: none;
        }

        .volume-info {
            flex: 1;
        }

        .volume-title {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 0.25rem;
        }

        .volume-meta {
            color: #6b7280;
            font-size: 0.9rem;
        }

        .volume-status {
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
        <div class="page-header">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h1>
            <p>Manage your journal content from here</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Volumes</div>
                <div class="stat-value"><?php echo $stats['total_volumes']; ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Articles</div>
                <div class="stat-value"><?php echo $stats['total_articles']; ?></div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Downloads</div>
                <div class="stat-value"><?php echo number_format($stats['total_downloads']); ?></div>
            </div>
        </div>

        <div class="actions-grid">
            <div class="action-card">
                <h3>➕ Add New Volume</h3>
                <p>Create a new journal volume with PDF upload</p>
                <a href="volumes.php?action=add" class="btn">Add Volume</a>
            </div>
            <div class="action-card">
                <h3>👁️ View Site</h3>
                <p>Preview how your site looks to visitors</p>
                <a href="../index.php" class="btn btn-secondary" target="_blank">View Site</a>
            </div>
        </div>

        <div class="recent-volumes">
            <h2>Recent Volumes</h2>
            <?php if (empty($recentVolumes)): ?>
                <p>No volumes yet. <a href="volumes.php?action=add">Create your first volume</a></p>
            <?php else: ?>
                <ul class="volume-list">
                    <?php foreach ($recentVolumes as $volume): ?>
                        <li class="volume-item">
                            <div class="volume-info">
                                <div class="volume-title">Volume <?php echo $volume['volume_number']; ?>, Issue
                                    <?php echo $volume['issue_number']; ?>
                                </div>
                                <div class="volume-meta">
                                    Published: <?php echo date('F Y', strtotime($volume['publication_date'])); ?> •
                                    <?php echo $volume['total_articles']; ?> articles
                                </div>
                            </div>
                            <span class="volume-status status-<?php echo $volume['status']; ?>">
                                <?php echo ucfirst($volume['status']); ?>
                            </span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</body>

</html>