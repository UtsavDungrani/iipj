<?php
// Detect if running on localhost or production server
$is_localhost = ($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1' || $_SERVER['HTTP_HOST'] === 'localhost:80' || $_SERVER['HTTP_HOST'] === 'localhost:8080');

// Database Configuration
if ($is_localhost) {
    // Localhost configuration
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'iipj');
} else {
    // Hostinger (Production) configuration
    define('DB_HOST', 'localhost');  // Change this to your Hostinger database host
    define('DB_USER', 'u221873998_iipj');       // Change this to your Hostinger database user
    define('DB_PASS', 'Uts@v1907');   // Change this to your Hostinger database password
    define('DB_NAME', 'u221873998_iipj');   // Change this to your Hostinger database name
}

// Site Configuration
define('SITE_URL', $is_localhost ? 'http://localhost/iipj' : 'https://your-production-domain.com');
define('UPLOAD_DIR', __DIR__ . '/uploads/');
define('PDF_DIR', UPLOAD_DIR . 'pdfs/');
define('COVER_DIR', UPLOAD_DIR . 'covers/');
define('UPDATE_DIR', UPLOAD_DIR . 'updates/');
define('MAX_FILE_SIZE', 120 * 1024 * 1024); // 50MB

// Session Configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_secure', 0); // Set to 1 for HTTPS

// Timezone
date_default_timezone_set('Asia/Kolkata');

// Error Reporting (disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database Connection
function getDBConnection()
{
    static $conn = null;

    if ($conn === null) {
        try {
            $conn = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    return $conn;
}

// Create upload directories if they don't exist
function createUploadDirectories()
{
    $dirs = [UPLOAD_DIR, PDF_DIR, COVER_DIR, UPDATE_DIR];
    foreach ($dirs as $dir) {
        if (!file_exists($dir)) {
            mkdir($dir, 0755, true);
        }
    }
}

// Initialize directories
createUploadDirectories();

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Helper function to check if user is logged in
function isLoggedIn()
{
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// Helper function to require login
function requireLogin()
{
    if (!isLoggedIn()) {
        // Check if we're in admin folder or root
        $adminPath = (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) ? 'login.php' : '../admin/login.php';
        header('Location: ' . $adminPath);
        exit;
    }
}

// Helper function to sanitize input
function sanitizeInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

// Helper function to format file size
function formatFileSize($bytes)
{
    if ($bytes >= 1073741824) {
        return number_format($bytes / 1073741824, 2) . ' GB';
    } elseif ($bytes >= 1048576) {
        return number_format($bytes / 1048576, 2) . ' MB';
    } elseif ($bytes >= 1024) {
        return number_format($bytes / 1024, 2) . ' KB';
    } else {
        return $bytes . ' bytes';
    }
}

?>