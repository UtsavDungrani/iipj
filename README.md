# India Independent Philosophical Journal - PHP Admin System

A complete PHP-based content management system for managing journal volumes, articles, and PDF uploads.

## Features

- **Admin Panel**: Full-featured admin dashboard for managing content
- **PDF Upload**: Upload and manage volume PDFs and article PDFs
- **Database Integration**: MySQL database for storing all content
- **User Authentication**: Secure login system for administrators
- **Volume Management**: Add, edit, and delete journal volumes
- **Article Management**: Manage articles with authors, abstracts, and keywords
- **Public Display**: Beautiful user-facing page to browse volumes and articles

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher (or MariaDB 10.3+)
- Apache web server (or Nginx with PHP-FPM)
- mod_rewrite enabled (for Apache)

## Installation

### 1. Database Setup

1. Create a MySQL database:

   ```sql
   CREATE DATABASE iipj_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
   ```

2. Import the database schema:

   ```bash
   mysql -u your_username -p iipj_db < database_schema.sql
   ```

   Or using phpMyAdmin:

   - Go to phpMyAdmin
   - Select the `iipj_db` database
   - Click on "Import" tab
   - Choose `database_schema.sql` file and click "Go"

### 2. Configuration

1. Open `config.php` and update the database credentials:

   ```php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   define('DB_NAME', 'iipj_db');
   ```

2. Update the site URL:
   ```php
   define('SITE_URL', 'http://localhost/IIPJ');
   ```
   Change this to your actual domain/URL.

### 3. File Permissions

Make sure the upload directories are writable:

```bash
mkdir -p uploads/pdfs uploads/covers
chmod 755 uploads uploads/pdfs uploads/covers
```

### 4. Default Login Credentials

**Username:** `admin`  
**Password:** `admin123`

⚠️ **IMPORTANT:** Change the default password immediately after first login!

To change the password, update it in the database:

```sql
UPDATE users SET password = '$2y$10$...' WHERE username = 'admin';
```

(Use PHP's `password_hash()` function to generate a new hash)

Or use this PHP script to change password:

```php
<?php
require_once 'config.php';
$db = getDBConnection();
$newPassword = password_hash('your_new_password', PASSWORD_DEFAULT);
$stmt = $db->prepare("UPDATE users SET password = :password WHERE username = 'admin'");
$stmt->execute([':password' => $newPassword]);
echo "Password updated!";
?>
```

## File Structure

```
IIPJ/
├── admin/                   # Admin panel folder
│   ├── login.php           # Admin login page
│   ├── logout.php          # Logout handler
│   ├── dashboard.php       # Admin dashboard
│   ├── volumes.php         # Volume management
│   ├── articles.php        # Article management
│   └── change_password.php # Password change utility
├── config.php              # Configuration file
├── get_volumes.php         # API endpoint for volumes
├── volumes.php             # Public volumes page
├── database_schema.sql     # Database schema
├── uploads/                # Upload directory
│   ├── pdfs/              # PDF files
│   └── covers/            # Cover images
└── README.md              # This file
```

## Usage

### Admin Panel

1. Access the admin login page: `http://localhost/IIPJ/admin/login.php`
2. Login with default credentials (admin/admin123)
3. Navigate to "Manage Volumes" to add/edit volumes
4. Upload volume PDFs and cover images
5. Add articles to volumes with author information
6. Upload article PDFs

### Public Site

1. Access the volumes page: `http://localhost/IIPJ/volumes.php`
2. Browse volumes and articles
3. Download PDFs
4. Search and filter by year, author, keywords

## Admin Features

### Volume Management

- Add new volumes with volume number, issue number, publication date
- Upload volume PDF files
- Upload cover images
- Set publication status (published/draft)
- Edit and delete volumes
- View article count per volume

### Article Management

- Add articles to volumes
- Add multiple authors per article
- Add abstract, keywords, DOI
- Upload article PDF files
- Set display order
- Edit and delete articles

## Database Schema

### Tables

- **users**: Admin users for authentication
- **volumes**: Journal volumes/issues
- **articles**: Articles within volumes
- **authors**: Author information
- **article_authors**: Many-to-many relationship between articles and authors

## Security Notes

1. Change default admin password immediately
2. Use strong passwords for database users
3. Keep PHP and MySQL updated
4. Configure proper file permissions
5. Consider using HTTPS in production
6. Regularly backup the database
7. Review and sanitize all user inputs (already implemented)

## Troubleshooting

### Database Connection Error

- Check database credentials in `config.php`
- Verify MySQL service is running
- Ensure database exists and user has proper permissions

### File Upload Issues

- Check `uploads/` directory permissions (should be 755 or 775)
- Verify `upload_max_filesize` and `post_max_size` in PHP.ini
- Check disk space availability

### PDFs Not Displaying

- Verify `SITE_URL` is correct in `config.php`
- Check file paths in `uploads/pdfs/` directory
- Ensure files are uploaded correctly

### Session Issues

- Check PHP session configuration
- Verify session directory is writable
- Clear browser cookies if login persists

## Support

For issues or questions, please contact the development team.

## License

Copyright © 2025 India Independent Philosophical Journal. All rights reserved.
