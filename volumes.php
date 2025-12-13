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
    <title>Journal Volumes - India Independent Philosophical Journal</title>
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
            --success-color: #059669;
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
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
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
            padding: 3rem 2rem;
            text-align: center;
        }

        .page-header h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
        }

        .page-header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        /* Statistics */
        .statistics {
            max-width: 811px;
            margin: -2rem auto 3rem;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            position: relative;
            z-index: 10;
        }

        .stat-card {
            background: var(--bg-white);
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .card-download {
            display: none;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--text-light);
            font-size: 1rem;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
        }

        /* Search & Filter */
        .filters-section {
            background: var(--bg-white);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 3rem;
        }

        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .search-input {
            flex: 1;
            min-width: 250px;
            padding: 0.75rem 1rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .search-btn {
            padding: 0.75rem 2rem;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
        }

        .search-btn:hover {
            background: var(--secondary-color);
        }

        .filters-row {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .filter-group {
            flex: 1;
            min-width: 200px;
        }

        .filter-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--text-dark);
        }

        .filter-select {
            width: 100%;
            padding: 0.75rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            background: white;
            cursor: pointer;
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        /* View Toggle */
        .view-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .view-toggle {
            display: flex;
            gap: 0.5rem;
        }

        .view-btn {
            padding: 0.5rem 1rem;
            background: var(--bg-white);
            border: 2px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .view-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .results-count {
            color: var(--text-light);
        }

        /* Loading State */
        .loading {
            text-align: center;
            padding: 3rem;
            color: var(--text-light);
        }

        .spinner {
            border: 4px solid var(--border-color);
            border-top: 4px solid var(--primary-color);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Error State */
        .error-message {
            background: #fee;
            border: 2px solid #fcc;
            color: #c33;
            padding: 2rem;
            border-radius: 12px;
            text-align: center;
        }

        /* Volume Grid */
        .volumes-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 2rem;
        }

        .volume-card {
            background: var(--bg-white);
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .volume-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .volume-header {
            background: linear-gradient(135deg,
                    var(--primary-color) 0%,
                    var(--secondary-color) 100%);
            color: white;
            padding: 1.5rem;
        }

        .volume-cover {
            width: 100%;
            height: 200px;
            object-fit: cover;
            background: rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 3rem;
            font-weight: bold;
        }

        .volume-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .volume-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .special-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: var(--accent-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            margin-top: 0.75rem;
        }

        .volume-body {
            padding: 1.5rem;
        }

        .volume-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .info-icon {
            color: var(--primary-color);
        }

        .volume-actions {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .btn {
            flex: 1;
            padding: 0.75rem;
            border-radius: 8px;
            text-decoration: none;
            text-align: center;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background: var(--secondary-color);
        }

        .btn-secondary {
            background: var(--bg-light);
            color: var(--primary-color);
            border: 2px solid var(--border-color);
        }

        .btn-secondary:hover {
            background: var(--border-color);
        }

        .expand-btn {
            width: 100%;
            padding: 0.75rem;
            background: var(--bg-light);
            border: none;
            border-top: 1px solid var(--border-color);
            cursor: pointer;
            font-weight: 600;
            color: var(--primary-color);
            transition: background 0.3s;
        }

        .expand-btn:hover {
            background: var(--border-color);
        }

        /* Articles List */
        .articles-list {
            display: none;
            padding: 1.5rem;
            background: var(--bg-light);
            border-top: 1px solid var(--border-color);
        }

        .articles-list.active {
            display: block;
        }

        .article-item {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 1px solid var(--border-color);
        }

        .article-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .article-authors {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .article-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 0.75rem;
        }

        .article-actions {
            display: flex;
            gap: 0.5rem;
        }

        .article-btn {
            padding: 0.4rem 1rem;
            font-size: 0.85rem;
            border-radius: 6px;
            text-decoration: none;
            background: var(--primary-color);
            color: white;
            border: none;
            cursor: pointer;
            transition: background 0.3s;
        }

        .article-btn:hover {
            background: var(--secondary-color);
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 3rem;
        }

        .page-btn {
            padding: 0.75rem 1.25rem;
            background: var(--bg-white);
            border: 2px solid var(--border-color);
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .page-btn:hover {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .page-btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
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

        /* Volume Modal */
        .volume-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(15, 23, 42, 0.6);
            display: none;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            z-index: 2000;
        }

        .volume-modal-overlay.active {
            display: flex;
        }

        .volume-modal {
            background: var(--bg-white);
            border-radius: 16px;
            max-width: 900px;
            width: min(95vw, 900px);
            max-height: 90vh;
            overflow-y: auto;
            position: relative;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            padding: 2rem;
        }

        .volume-modal-header {
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 1rem;
            margin-bottom: 1.5rem;
        }

        .volume-modal-title {
            font-size: 1.75rem;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .volume-modal-meta {
            color: var(--text-light);
            font-size: 0.95rem;
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .volume-modal-close {
            position: absolute;
            top: 0.75rem;
            right: 0.75rem;
            border: none;
            background: transparent;
            font-size: 1.75rem;
            line-height: 1;
            cursor: pointer;
            color: var(--text-light);
            transition: color 0.2s ease;
        }

        .volume-modal-close:hover {
            color: var(--primary-color);
        }

        .volume-modal-cover {
            width: 100%;
            max-height: 300px;
            object-fit: contain;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            background: var(--bg-light);
            border: 1px solid var(--border-color);
        }

        .volume-modal-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding: 1rem;
            background: var(--bg-light);
            border-radius: 8px;
        }

        .volume-modal-info-item {
            display: flex;
            flex-direction: column;
            gap: 0.25rem;
        }

        .volume-modal-info-label {
            font-size: 0.85rem;
            color: var(--text-light);
            font-weight: 600;
        }

        .volume-modal-info-value {
            font-size: 1rem;
            color: var(--text-dark);
        }

        .volume-modal-actions {
            margin-top: 1.5rem;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .volume-modal-articles {
            margin-top: 2rem;
        }

        .volume-modal-articles h3 {
            font-size: 1.25rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid var(--accent-color);
        }

        .volume-modal-article-item {
            background: var(--bg-light);
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            border-left: 4px solid var(--primary-color);
        }

        .volume-modal-article-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 1.05rem;
        }

        .volume-modal-article-authors {
            color: var(--text-light);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .volume-modal-article-meta {
            display: flex;
            gap: 1rem;
            font-size: 0.85rem;
            color: var(--text-light);
            margin-bottom: 0.75rem;
            flex-wrap: wrap;
        }

        .volume-modal-article-actions {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .volume-card {
            cursor: pointer;
        }

        /* Responsive */
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

            .page-header h1 {
                font-size: 2rem;
            }

            .volumes-grid {
                grid-template-columns: 1fr;
            }

            .search-bar {
                flex-direction: column;
            }

            .filters-row {
                flex-direction: column;
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
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="volumes.php" class="active">Volumes</a></li>
            </ul>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="breadcrumb-container">
            <a href="index.php">Home</a> / Journal Volumes
        </div>
    </div>

    <!-- Page Header -->
    <section class="page-header">
        <h1>Journal Volumes & Archives</h1>
        <p>Browse our complete collection of published research</p>
    </section>

    <!-- Statistics -->
    <div class="statistics" id="statistics">
        <div class="stat-card">
            <div class="stat-number" id="totalVolumes">-</div>
            <div class="stat-label">Total Volumes</div>
        </div>
        <div class="stat-card">
            <div class="stat-number" id="totalArticles">-</div>
            <div class="stat-label">Published Articles</div>
        </div>
        <div class="stat-card card-download">
            <div class="stat-number" id="totalDownloads">-</div>
            <div class="stat-label">Total Downloads</div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <!-- Search & Filter -->
        <div class="filters-section">
            <div class="search-bar">
                <input type="text" id="searchInput" class="search-input"
                    placeholder="Search by title, author, or keyword..." />
                <button class="search-btn" onclick="filterVolumes()">
                    🔍 Search
                </button>
            </div>
            <div class="filters-row">
                <div class="filter-group">
                    <label class="filter-label">Filter by Year</label>
                    <select id="yearFilter" class="filter-select" onchange="filterVolumes()">
                        <option value="">All Years</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Sort by</label>
                    <select id="sortFilter" class="filter-select" onchange="filterVolumes()">
                        <option value="newest">Latest First</option>
                        <option value="oldest">Oldest First</option>
                        <option value="volume">Volume Number</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- View Controls -->
        <div class="view-controls" style="display: none;">
            <div class="results-count" id="resultsCount">Loading volumes...</div>
        </div>

        <!-- Loading State -->
        <div id="loadingState" class="loading">
            <div class="spinner"></div>
            <p>Loading journal volumes...</p>
        </div>

        <!-- Error State -->
        <div id="errorState" class="error-message" style="display: none">
            <h3>⚠️ Unable to Load Volumes</h3>
            <p>Please check your connection and try again.</p>
            <button class="btn btn-primary" onclick="loadVolumes()" style="margin-top: 1rem">
                🔄 Retry
            </button>
        </div>

        <!-- Volumes Grid -->
        <div id="volumesContainer" class="volumes-grid"></div>
    </div>

    <!-- Volume Modal -->
    <div class="volume-modal-overlay" id="volumeModal" aria-hidden="true">
        <div class="volume-modal" role="dialog" aria-modal="true" aria-labelledby="volumeModalTitle">
            <button class="volume-modal-close" id="volumeModalClose" aria-label="Close volume">&times;</button>
            <div class="volume-modal-header">
                <h2 class="volume-modal-title" id="volumeModalTitle"></h2>
                <div class="volume-modal-meta" id="volumeModalMeta"></div>
            </div>
            <div id="volumeModalCover"></div>
            <div class="volume-modal-info" id="volumeModalInfo"></div>
            <div class="volume-modal-actions" id="volumeModalActions"></div>
        </div>
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
        // Global variables
        let allVolumes = [];
        let filteredVolumes = [];

        // Toggle mobile menu
        function toggleMenu() {
            const menu = document.getElementById("navMenu");
            menu.classList.toggle("active");
        }

        // Load volumes from backend
        async function loadVolumes() {
            const loadingState = document.getElementById("loadingState");
            const errorState = document.getElementById("errorState");
            const volumesContainer = document.getElementById("volumesContainer");

            loadingState.style.display = "block";
            errorState.style.display = "none";
            volumesContainer.innerHTML = "";

            try {
                // Fetch data from PHP backend
                const response = await fetch("get_volumes.php");

                if (!response.ok) {
                    throw new Error("Failed to fetch volumes");
                }

                const data = await response.json();
                allVolumes = data.volumes || [];
                filteredVolumes = [...allVolumes];

                // Update statistics
                updateStatistics(data);

                // Populate year filter
                populateYearFilter();

                // Display volumes
                displayVolumes();

                loadingState.style.display = "none";
            } catch (error) {
                console.error("Error loading volumes:", error);
                loadingState.style.display = "none";
                errorState.style.display = "block";
            }
        }

        // Update statistics
        function updateStatistics(data) {
            document.getElementById("totalVolumes").textContent =
                data.totalVolumes || 0;
            document.getElementById("totalArticles").textContent =
                data.totalArticles || 0;
            document.getElementById("totalDownloads").textContent =
                data.totalDownloads || "0";
        }

        // Populate year filter
        function populateYearFilter() {
            const yearFilter = document.getElementById("yearFilter");
            const years = [
                ...new Set(
                    allVolumes.map((v) => new Date(v.publicationDate).getFullYear())
                ),
            ];
            years.sort((a, b) => b - a);

            yearFilter.innerHTML = '<option value="">All Years</option>';
            years.forEach((year) => {
                yearFilter.innerHTML += `<option value="${year}">${year}</option>`;
            });
        }

        // Filter volumes
        function filterVolumes() {
            const searchTerm = document
                .getElementById("searchInput")
                .value.toLowerCase();
            const yearFilter = document.getElementById("yearFilter").value;
            const sortFilter = document.getElementById("sortFilter").value;

            filteredVolumes = allVolumes.filter((volume) => {
                const matchesSearch =
                    !searchTerm ||
                    volume.volumeNumber.toString().includes(searchTerm) ||
                    volume.issueNumber.toString().includes(searchTerm) ||
                    volume.articles.some(
                        (article) =>
                            article.title.toLowerCase().includes(searchTerm) ||
                            article.authors.some((author) =>
                                author.name.toLowerCase().includes(searchTerm)
                            ) ||
                            (article.keywords && article.keywords.some((keyword) =>
                                keyword.toLowerCase().includes(searchTerm)
                            ))
                    );

                const matchesYear =
                    !yearFilter ||
                    new Date(volume.publicationDate).getFullYear().toString() ===
                    yearFilter;

                return matchesSearch && matchesYear;
            });

            // Sort volumes
            if (sortFilter === "newest") {
                filteredVolumes.sort(
                    (a, b) => new Date(b.publicationDate) - new Date(a.publicationDate)
                );
            } else if (sortFilter === "oldest") {
                filteredVolumes.sort(
                    (a, b) => new Date(a.publicationDate) - new Date(b.publicationDate)
                );
            } else if (sortFilter === "volume") {
                filteredVolumes.sort((a, b) => a.volumeNumber - b.volumeNumber);
            }

            displayVolumes();
        }

        // Display volumes
        function displayVolumes() {
            const container = document.getElementById("volumesContainer");
            const resultsCount = document.getElementById("resultsCount");

            resultsCount.textContent = `Showing ${filteredVolumes.length} volume(s)`;

            if (filteredVolumes.length === 0) {
                container.innerHTML =
                    '<div style="text-align: center; padding: 3rem; color: var(--text-light);">No volumes found matching your criteria.</div>';
                return;
            }

            container.innerHTML = filteredVolumes
                .map(
                    (volume) => `
                <div class="volume-card" data-volume-card data-volume-id="${volume.volumeId}" tabindex="0" role="button" aria-label="View volume details">
                    <div class="volume-header">
                        <div class="volume-cover">
                            ${volume.coverImage
                            ? `<img src="${volume.coverImage}" alt="Volume ${volume.volumeNumber}" style="width: 100%; height: 100%; object-fit: cover;">`
                            : `V${volume.volumeNumber}`
                        }
                        </div>
                            ${volume.isSpecialEdition
                            ? `<span class="special-badge">✨ Special Edition${volume.specialEditionYear ? ` (${volume.specialEditionYear})` : ''}</span>`
                            : ''
                        }
                        <div class="volume-title">Volume ${volume.volumeNumber
                        }, Issue ${volume.issueNumber}</div>
                        <div class="volume-meta">
                            <span>📅 ${formatDate(
                            volume.publicationDate
                        )}</span>
                            <span>📄 ${volume.totalArticles} Articles</span>
                        </div>
                    </div>
                    <div class="volume-body">
                        <div class="volume-info">
                            <div class="info-item">
                                <span class="info-icon">📖</span>
                                <span>Pages ${volume.pageRange || 'N/A'}</span>
                            </div>
                            <div class="info-item">
                                <span class="info-icon">🔢</span>
                                <span>ISSN ${volume.issn}</span>
                            </div>
                        </div>
                        <div class="volume-actions">
                            ${volume.pdfUrl
                            ? `<a href="${volume.pdfUrl}" class="btn btn-primary" target="_blank" rel="noopener" data-modal-ignore>📥 Download PDF</a>`
                            : `<button class="btn btn-primary" disabled data-modal-ignore>PDF Unavailable</button>`
                        }
                        </div>
                    </div>
                    <div id="articles-${volume.volumeId}" class="articles-list">
                        <h3 style="margin-bottom: 1rem; color: var(--primary-color);">Articles in this Issue</h3>
                        ${volume.articles && volume.articles.length > 0
                            ? volume.articles
                                .map(
                                    (article, index) => `
                            <div class="article-item">
                                <div class="article-title">${index + 1}. ${article.title
                                        }</div>
                                <div class="article-authors">By: ${article.authors && article.authors.length > 0
                                            ? article.authors.map((a) => a.name).join(", ")
                                            : 'N/A'
                                        }</div>
                                <div class="article-meta">
                                    ${article.pageNumbers ? `<span>Pages: ${article.pageNumbers}</span>` : ''}
                                    ${article.doi
                                            ? `<span>DOI: ${article.doi}</span>`
                                            : ""
                                        }
                                    <span>📥 ${article.downloads || 0
                                        } downloads</span>
                                </div>
                                <div class="article-actions">
                                    ${article.pdfUrl
                                            ? `<a href="${article.pdfUrl}" class="article-btn" target="_blank" rel="noopener">Download PDF</a>`
                                            : ""
                                        }
                                    ${article.abstract ? `<button class="article-btn" onclick="showAbstract('${article.abstract.replace(/'/g, "\\'").replace(/\n/g, '\\n')}')">View Abstract</button>` : ''}
                                </div>
                            </div>
                        `
                                )
                                .join("")
                            : '<p>No articles in this volume.</p>'
                        }
                    </div>
                </div>
            `
                )
                .join("");
        }

        // Toggle articles visibility
        function toggleArticles(volumeId) {
            const articlesList = document.getElementById(`articles-${volumeId}`);
            articlesList.classList.toggle("active");
        }

        // Show abstract in a modal/alert
        function showAbstract(abstract) {
            alert('Abstract:\n\n' + abstract);
        }

        // Format date
        function formatDate(dateString) {
            const options = { year: "numeric", month: "long" };
            return new Date(dateString).toLocaleDateString("en-US", options);
        }

        // Volume Modal functionality
        (function () {
            const modalOverlay = document.getElementById('volumeModal');
            const modalCloseBtn = document.getElementById('volumeModalClose');
            const modalTitle = document.getElementById('volumeModalTitle');
            const modalMeta = document.getElementById('volumeModalMeta');
            const modalCover = document.getElementById('volumeModalCover');
            const modalInfo = document.getElementById('volumeModalInfo');
            const modalActions = document.getElementById('volumeModalActions');

            if (!modalOverlay) {
                return;
            }

            const openVolumeModal = (volume) => {
                // Set title
                modalTitle.textContent = `Volume ${volume.volumeNumber}, Issue ${volume.issueNumber}`;

                // Set meta information
                modalMeta.innerHTML = `
                    <span>📅 ${formatDate(volume.publicationDate)}</span>
                    <span>📄 ${volume.totalArticles || 0} Articles</span>
                    ${volume.isSpecialEdition ? `<span>✨ Special Edition${volume.specialEditionYear ? ` (${volume.specialEditionYear})` : ''}</span>` : ''}
                `;

                // Set cover image
                if (volume.coverImage) {
                    modalCover.innerHTML = `<img src="${volume.coverImage}" alt="Volume ${volume.volumeNumber}" class="volume-modal-cover">`;
                } else {
                    modalCover.innerHTML = '';
                }

                // Set info grid
                modalInfo.innerHTML = `
                    <div class="volume-modal-info-item">
                        <span class="volume-modal-info-label">Volume Number</span>
                        <span class="volume-modal-info-value">${volume.volumeNumber}</span>
                    </div>
                    <div class="volume-modal-info-item">
                        <span class="volume-modal-info-label">Issue Number</span>
                        <span class="volume-modal-info-value">${volume.issueNumber}</span>
                    </div>
                    <div class="volume-modal-info-item">
                        <span class="volume-modal-info-label">Publication Date</span>
                        <span class="volume-modal-info-value">${formatDate(volume.publicationDate)}</span>
                    </div>
                    <div class="volume-modal-info-item">
                        <span class="volume-modal-info-label">Page Range</span>
                        <span class="volume-modal-info-value">${volume.pageRange || 'N/A'}</span>
                    </div>
                    <div class="volume-modal-info-item">
                        <span class="volume-modal-info-label">ISSN</span>
                        <span class="volume-modal-info-value">${volume.issn || 'N/A'}</span>
                    </div>
                    <div class="volume-modal-info-item">
                        <span class="volume-modal-info-label">Total Articles</span>
                        <span class="volume-modal-info-value">${volume.totalArticles || 0}</span>
                    </div>
                `;

                // Set actions
                if (volume.pdfUrl) {
                    modalActions.innerHTML = `
                        <a href="${volume.pdfUrl}" class="btn btn-primary" target="_blank" rel="noopener">
                            📥 Download Full Volume PDF
                        </a>
                    `;
                } else {
                    modalActions.innerHTML = `
                        <button class="btn btn-primary" disabled>PDF Unavailable</button>
                    `;
                }

                // Show modal
                modalOverlay.classList.add('active');
                modalOverlay.setAttribute('aria-hidden', 'false');
                document.body.style.overflow = 'hidden';
            };

            const closeModal = () => {
                modalOverlay.classList.remove('active');
                modalOverlay.setAttribute('aria-hidden', 'true');
                document.body.style.overflow = '';
            };

            // Handle volume card clicks
            document.addEventListener('click', (event) => {
                const volumeCard = event.target.closest('[data-volume-card]');
                if (volumeCard && !event.target.closest('[data-modal-ignore]')) {
                    const volumeId = volumeCard.getAttribute('data-volume-id');
                    const volume = allVolumes.find(v => v.volumeId == volumeId);
                    if (volume) {
                        event.preventDefault();
                        openVolumeModal(volume);
                    }
                }
            });

            // Handle keyboard navigation
            document.addEventListener('keydown', (event) => {
                const volumeCard = event.target.closest('[data-volume-card]');
                if (volumeCard && (event.key === 'Enter' || event.key === ' ')) {
                    if (!event.target.closest('[data-modal-ignore]')) {
                        event.preventDefault();
                        const volumeId = volumeCard.getAttribute('data-volume-id');
                        const volume = allVolumes.find(v => v.volumeId == volumeId);
                        if (volume) {
                            openVolumeModal(volume);
                        }
                    }
                }
            });

            // Close modal handlers
            modalCloseBtn?.addEventListener('click', closeModal);

            modalOverlay.addEventListener('click', (event) => {
                if (event.target === modalOverlay) {
                    closeModal();
                }
            });

            document.addEventListener('keydown', (event) => {
                if (event.key === 'Escape' && modalOverlay.classList.contains('active')) {
                    closeModal();
                }
            });
        })();

        // Load volumes on page load
        document.addEventListener("DOMContentLoaded", loadVolumes);
    </script>
</body>

</html>