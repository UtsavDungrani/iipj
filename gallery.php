<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta property="og:title" content="India Independent Philosophical Journal">
    <meta property="og:description" content="Advancing Philosophical Discourse Through Rigorous Academic Research.">
    <meta property="og:image" content="https://iipj.in/assets/images/logo.png">
    <meta property="og:url" content="https://iipj.in">
    <link rel="icon" type="image/png" href="assets/images/favicon.png" />
    <title>Gallery - India Independent Philosophical Journal</title>
    <style>
        :root {
            --primary-color: #1e3a8a;
            --secondary-color: #3b82f6;
            --accent-color: #d97706;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --bg-light: #f9fafb;
            --bg-white: #ffffff;
            --border-color: #e5e7eb;
            --shadow-soft: 0 4px 18px rgba(30, 58, 138, 0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Georgia", "Times New Roman", serif;
            line-height: 1.6;
            color: var(--text-dark);
            background-color: var(--bg-light);
        }

        /* Navigation */
        .navbar {
            background: var(--primary-color);
            color: white;
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.12);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: white;
            font-weight: 700;
            line-height: 1;
        }

        .logo img {
            display: block;
            height: 56px;
            width: auto;
            border-radius: 6px;
        }

        .logo-text {
            font-family: "Georgia", "Times New Roman", serif;
            font-size: 1.125rem;
            color: white;
            text-decoration: none;
            white-space: nowrap;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-menu a {
            color: white;
            text-decoration: none;
            font-size: 1rem;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: var(--accent-color);
        }

        .active {
            color: var(--accent-color) !important;
        }

        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Breadcrumb */
        .breadcrumb {
            background: var(--bg-white);
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }

        .breadcrumb-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            color: var(--text-light);
        }

        .breadcrumb a {
            color: var(--primary-color);
            text-decoration: none;
        }

        .breadcrumb a:hover {
            text-decoration: underline;
        }

        /* Page Header */
        .page-header {
            background: linear-gradient(135deg,
                    var(--primary-color) 0%,
                    var(--secondary-color) 100%);
            color: white;
            padding: 3.5rem 2rem;
            text-align: center;
        }

        .page-header h1 {
            font-size: 2.75rem;
            margin-bottom: 0.75rem;
            letter-spacing: 1px;
        }

        .page-header p {
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.15rem;
            opacity: 0.9;
        }

        /* Intro Section */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        .intro-card {
            background: var(--bg-white);
            border-radius: 16px;
            padding: 2.5rem;
            box-shadow: var(--shadow-soft);
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            align-items: center;
        }

        .intro-card h2 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .intro-card p {
            color: var(--text-light);
            margin-bottom: 1rem;
        }

        .intro-card ul {
            list-style: none;
            margin-top: 1.5rem;
            display: grid;
            gap: 0.75rem;
        }

        .intro-card li {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: #f8fafc;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            color: var(--text-dark);
        }

        .intro-card strong {
            color: var(--primary-color);
        }

        .instructions-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            background: rgba(30, 58, 138, 0.08);
            border: 1px dashed rgba(30, 58, 138, 0.35);
            color: var(--primary-color);
            padding: 0.4rem 0.75rem;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .callout-card {
            background: #eef2ff;
            border-left: 4px solid var(--primary-color);
            border-radius: 12px;
            padding: 1.75rem;
            color: var(--text-dark);
            box-shadow: var(--shadow-soft);
        }

        .callout-card h3 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--primary-color);
        }

        /* Gallery */
        .gallery-section {
            margin-top: 3rem;
        }

        .gallery-header {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .gallery-header h2 {
            font-size: 2.25rem;
            color: var(--primary-color);
        }

        .gallery-header p {
            color: var(--text-light);
            max-width: 600px;
        }

        .gallery-grid {
            column-count: 1;
            column-gap: 1.75rem;
        }

        .gallery-item {
            background: var(--bg-white);
            border-radius: 16px;
            overflow: hidden;
            margin-bottom: 1.75rem;
            display: inline-block;
            width: 100%;
            box-shadow: var(--shadow-soft);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            break-inside: avoid;
        }

        .gallery-item:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 26px rgba(30, 58, 138, 0.18);
        }

        .gallery-item img {
            display: block;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .gallery-item figcaption {
            padding: 1rem 1.25rem 1.25rem;
            font-size: 0.95rem;
            color: var(--text-light);
        }

        .gallery-item figcaption strong {
            display: block;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1.05rem;
        }

        .placeholder {
            border: 2px dashed rgba(30, 58, 138, 0.25);
            background: rgba(30, 58, 138, 0.04);
        }

        .placeholder-box {
            padding: 2.5rem 2rem;
            text-align: center;
            color: var(--primary-color);
            font-size: 0.95rem;
        }

        .placeholder-box h3 {
            font-size: 1.2rem;
            margin-bottom: 0.75rem;
        }

        .placeholder-box pre {
            margin-top: 1.25rem;
            text-align: left;
            background: rgba(255, 255, 255, 0.85);
            padding: 1rem;
            border-radius: 10px;
            font-size: 0.85rem;
            line-height: 1.4;
            color: #1f2937;
            overflow-x: auto;
        }

        .gallery-notes {
            margin-top: 2rem;
            padding: 1.5rem;
            border-radius: 12px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            color: var(--text-dark);
        }

        .gallery-notes h3 {
            color: var(--primary-color);
            margin-bottom: 0.75rem;
            font-size: 1.1rem;
        }

        .gallery-notes ul {
            margin-left: 1.25rem;
            display: grid;
            gap: 0.5rem;
            list-style: disc;
        }

        /* Footer */
        .footer {
            background: var(--text-dark);
            color: white;
            padding: 3rem 2rem 1rem;
            margin-top: 4rem;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer h4 {
            color: var(--accent-color);
            margin-bottom: 1rem;
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-light);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .intro-card {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 992px) {
            .gallery-grid {
                column-count: 2;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-btn {
                display: block;
            }

            .logo img {
                height: 40px;
            }

            .logo-text {
                display: none;
            }

            .nav-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                right: 0;
                background: var(--primary-color);
                flex-direction: column;
                padding: 1rem;
                gap: 1rem;
            }

            .nav-menu.active {
                display: flex;
            }

            .page-header {
                padding: 2.5rem 1.5rem;
            }

            .page-header h1 {
                font-size: 2rem;
            }

            .gallery-grid {
                column-count: 1;
            }
        }

        @media (min-width: 1200px) {
            .gallery-grid {
                column-count: 3;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="logo">
                <img src="assets/images/logo.png" alt="India Independent Philosophical Journal logo" />
                <span class="logo-text">India Independent Philosophical Journal</span>
            </a>
            <button class="mobile-menu-btn" onclick="toggleMenu()">☰</button>
            <ul class="nav-menu" id="navMenu">
                <li><a href="index.php">Home</a></li>
                <li><a href="chief-editor.php">Chief Editor</a></li>
                <li><a href="editorial-members.php">Editorial Board</a></li>
                <li><a href="publishers.php">Publishers</a></li>
                <li><a href="gallery.php" class="active">Gallery</a></li>
                <li><a href="volumes.php">Volumes</a></li>
            </ul>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="breadcrumb-container">
            <a href="index.php">Home</a> / Gallery
        </div>
    </div>

    <!-- Page Header -->
    <section class="page-header">
        <h1>IIPJ Visual Library</h1>
        <p>A living showcase of events, publications, and philosophical journeys captured through imagery.</p>
    </section>

    <!-- Intro -->
    <div class="container">
        <!-- Gallery -->
        <section class="gallery-section">
            <div class="gallery-header">
                <h2>Featured Moments</h2>
            </div>

            <div class="gallery-grid">
                <figure class="gallery-item">
                    <img src="assets/images/g2.jpg" alt="" />
                </figure>

                <figure class="gallery-item">
                    <img src="assets/images/g3.jpg" alt="" />
                </figure>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div>
                <h4>About IIPJ</h4>
                <p>
                    India Independent Philosophical Journal is committed to promoting
                    philosophical research and scholarly excellence.
                </p>
            </div>
            <div>
                <h4>Quick Links</h4>
                <ul style="list-style: none">
                    <li>
                        <a href="index.php" style="color: white; text-decoration: none">Home</a>
                    </li>
                    <li>
                        <a href="volumes.php" style="color: white; text-decoration: none">Volumes</a>
                    </li>
                    <li>
                        <a href="gallery.php" style="color: white; text-decoration: none">Gallery</a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>Contact</h4>
                <p>
                    Email: iipj.research@gmail.com<br />
                    ISSN: 3107-7269
                </p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>
                &copy; 2025 India Independent Philosophical Journal. All rights
                reserved.
            </p>
        </div>
    </footer>

    <script>
        function toggleMenu() {
            const menu = document.getElementById("navMenu");
            menu.classList.toggle("active");
        }
    </script>
</body>

</html>