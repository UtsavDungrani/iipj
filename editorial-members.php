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
  <title>Editorial Board - India Independent Philosophical Journal</title>
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
      --associate-color: #3b82f6;
      --regional-color: #8b5cf6;
      --advisory-color: #059669;
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
      margin-bottom: 2rem;
    }

    /* Statistics Cards */
    .stats-container {
      max-width: 813px;
      margin: -2rem auto 0;
      padding: 0 2rem;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 1.5rem;
      position: relative;
      z-index: 10;
    }

    .stat-card {
      background: var(--bg-white);
      padding: 1.5rem;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: bold;
      color: var(--primary-color);
    }

    .stat-label {
      color: var(--text-light);
      font-size: 0.9rem;
      margin-top: 0.5rem;
    }

    /* Container */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 3rem 2rem;
    }

    /* Filter Section */
    .filter-section {
      background: var(--bg-white);
      padding: 1.5rem;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      margin-bottom: 2rem;
    }

    .filter-container {
      display: flex;
      gap: 1rem;
      flex-wrap: wrap;
      align-items: center;
    }

    .filter-group {
      flex: 1;
      min-width: 200px;
    }

    .filter-label {
      display: block;
      font-weight: 600;
      margin-bottom: 0.5rem;
      color: var(--text-dark);
      font-size: 0.9rem;
    }

    .filter-input,
    .filter-select {
      width: 100%;
      padding: 0.75rem;
      border: 1px solid var(--border-color);
      border-radius: 5px;
      font-size: 1rem;
      font-family: inherit;
    }

    .filter-input:focus,
    .filter-select:focus {
      outline: none;
      border-color: var(--primary-color);
    }

    /* Section Header */
    .section-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 2rem;
      padding-bottom: 1rem;
      border-bottom: 3px solid var(--accent-color);
    }

    .section-title {
      font-size: 2rem;
      color: var(--primary-color);
    }

    .member-count-badge {
      background: var(--accent-color);
      color: white;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      font-weight: 600;
    }

    /* Chief Editor Featured Card */
    .chief-editor-featured {
      background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);
      padding: 2rem;
      border-radius: 15px;
      margin-bottom: 3rem;
      display: flex;
      gap: 2rem;
      align-items: center;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
    }

    .chief-editor-photo {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      object-fit: cover;
      border: 5px solid white;
    }

    .chief-editor-photo-placeholder {
      width: 150px;
      height: 150px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.2);
      border: 5px solid white;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-style: italic;
      text-align: center;
      padding: 1rem;
      font-size: 0.85rem;
    }

    .chief-editor-info {
      flex: 1;
      color: white;
    }

    .chief-editor-info h2 {
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

    .chief-editor-info p {
      opacity: 0.95;
      margin-bottom: 1rem;
    }

    .view-profile-btn {
      display: inline-block;
      padding: 0.75rem 1.5rem;
      background: white;
      color: var(--primary-color);
      text-decoration: none;
      border-radius: 5px;
      font-weight: 600;
      transition: all 0.3s;
    }

    .view-profile-btn:hover {
      background: var(--accent-color);
      color: white;
      transform: translateY(-2px);
    }

    /* Member Cards Grid */
    .members-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 2rem;
      margin-bottom: 3rem;
    }

    .member-card {
      background: var(--bg-white);
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: all 0.3s;
      cursor: pointer;
    }

    .member-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .member-photo-container {
      width: 100%;
      height: 250px;
      overflow: hidden;
      background: var(--bg-light);
    }

    .member-photo {
      width: 100%;
      object-fit: cover;
      transition: transform 0.3s;
    }

    .member-card:hover .member-photo {
      transform: scale(1.05);
    }

    .member-photo-placeholder {
      width: 100%;
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text-light);
      font-style: italic;
      text-align: center;
      padding: 2rem;
    }

    .member-info {
      padding: 1.5rem;
    }

    .member-name {
      font-size: 1.3rem;
      font-weight: bold;
      color: var(--text-dark);
      margin-bottom: 0.5rem;
    }

    .role-badge {
      display: inline-block;
      padding: 0.25rem 0.75rem;
      border-radius: 15px;
      font-size: 0.85rem;
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .role-chief {
      background: #fef3c7;
      color: #92400e;
    }

    .role-associate {
      background: #dbeafe;
      color: #1e40af;
    }

    .role-regional {
      background: #ede9fe;
      color: #5b21b6;
    }

    .role-advisory {
      background: #d1fae5;
      color: #065f46;
    }

    .member-institution {
      font-size: 0.95rem;
      color: var(--text-light);
      margin-bottom: 0.5rem;
      display: flex;
      align-items: start;
      gap: 0.5rem;
    }

    .member-location {
      font-size: 0.9rem;
      color: var(--text-light);
      margin-bottom: 1rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .specialization-tags {
      display: flex;
      flex-wrap: wrap;
      gap: 0.5rem;
      margin-bottom: 1rem;
    }

    .spec-tag {
      background: var(--bg-light);
      padding: 0.25rem 0.75rem;
      border-radius: 15px;
      font-size: 0.8rem;
      color: var(--text-dark);
      border: 1px solid var(--border-color);
    }

    .member-bio {
      font-size: 0.9rem;
      color: var(--text-dark);
      margin-bottom: 1rem;
      line-height: 1.5;
    }

    .member-contact {
      padding-top: 1rem;
      border-top: 1px solid var(--border-color);
    }

    .contact-email {
      font-size: 0.9rem;
      color: var(--primary-color);
      text-decoration: none;
      display: block;
      margin-bottom: 0.75rem;
    }

    .contact-email:hover {
      text-decoration: underline;
    }

    .profile-links {
      display: flex;
      gap: 0.75rem;
      flex-wrap: wrap;
    }

    .profile-icon-link {
      display: inline-block;
      padding: 0.4rem 0.8rem;
      background: var(--primary-color);
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 0.8rem;
      transition: all 0.3s;
    }

    .profile-icon-link:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
    }

    /* Editable Placeholder Styling */
    .editable-placeholder {
      border: 2px dashed var(--border-color);
      padding: 1rem;
      border-radius: 8px;
      background: #fefefe;
      color: var(--text-light);
      font-style: italic;
      text-align: center;
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

      .stats-container {
        grid-template-columns: 1fr;
      }

      .filter-container {
        flex-direction: column;
      }

      .chief-editor-featured {
        flex-direction: column;
        text-align: center;
      }

      .members-grid {
        grid-template-columns: 1fr;
      }

      .section-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
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
        <li>
          <a href="editorial-members.php" class="active">Editorial Board</a>
        </li>
        <li><a href="publishers.php">Publishers</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="volumes.php">Volumes</a></li>
      </ul>
    </div>
  </nav>

  <!-- Breadcrumb -->
  <div class="breadcrumb">
    <div class="breadcrumb-container">
      <a href="index.php">Home</a> / Editorial Board
    </div>
  </div>

  <!-- Page Header -->
  <section class="page-header">
    <h1>Editorial Board</h1>
    <p>Distinguished scholars driving philosophical research excellence</p>
  </section>

  <!-- Statistics Cards -->
  <div class="stats-container">
    <div class="stat-card">
      <div class="stat-number" id="totalMembers">9</div>
      <div class="stat-label">Board Members</div>
    </div>
    <div class="stat-card">
      <div class="stat-number" id="totalExpertise">15+</div>
      <div class="stat-label">Areas of Expertise</div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container">
    <!-- Chief Editor Featured Section -->
    <div class="chief-editor-featured">
      <img src="assets/images/main.png" alt="Chief Editor" class="chief-editor-photo" />
      <div class="chief-editor-info">
        <h2>Dr. Dhananjay Trivedi</h2>
        <p>
          <strong>Chief Editor</strong> | India Independent Philosophical
          Journal
        </p>
        <p>
          Leading the journal with a vision for philosophical excellence and
          scholarly innovation in Indian and global philosophy.
        </p>
        <a href="chief-editor.php" class="view-profile-btn">View Full Profile →</a>
      </div>
    </div>

    <!-- Managing Editor Featured Section -->
    <div class="chief-editor-featured">
      <img src="assets/images/m5.png" alt="Managing Editor" class="chief-editor-photo" />
      <div class="chief-editor-info">
        <h2>Prof. (Dr.) C. Upendra (IIT Indore)</h2>
        <p>
          <strong>Managing Editor</strong> | India Independent Philosophical
          Journal
        </p>
        <p>
          Leading the journal with a vision for philosophical excellence and
          scholarly innovation in Indian and global philosophy.
        </p>
        <p class="chief-editor-info">
          👤 Associate Professor, Subject: Philosophy
        </p>
        <p class="chief-editor-info">
          🏛️ School of Humanities & Social Sciences, IIT INDORE Khandwa Road,
          Simrol, Indore
        </p>
      </div>
    </div>

    <!-- Editorial members Section -->
    <div class="section-header">
      <h2 class="section-title">Editorial Members</h2>
      <span class="member-count-badge">6 Members</span>
    </div>
    <div class="members-grid" id="associateEditorsGrid">
      <!-- Member Card 1 -->
      <div class="member-card" data-role="associate" data-region="europe">
        <div class="member-photo-container">
          <img src="assets/images/m2.png" alt="Prof (Dr.) Gopalchandra Misra" class="member-photo"
            style="margin-top: -5px; margin-left: 31px; width: 83%" />
        </div>
        <div class="member-info">
          <h3 class="member-name">Prof. (Dr.) Gopalchandra Misra</h3>
          <p class="member-location">👤 Former Vice Chancellor,</p>
          <p class="member-institution">
            🏛️ University of Gour Banga, West Bengal
          </p>
        </div>
      </div>
		
		<!-- Member Card 2 -->
      <div class="member-card" data-role="associate" data-region="asia">
        <div class="member-photo-container">
          <div class="member-photo-placeholder">
            <img src="assets/images/m6.png" alt="Prof (Dr.) Jatashankar Tiwari" class="member-photo"
              style="margin-top: 188px" />
          </div>
        </div>
        <div class="member-info">
          <h3 class="member-name">Prof. (Dr.) Jatashankar Tiwari</h3>
          <p class="member-location">
            👤 Professor, Former Head of the Department of Philosophy
          </p>
          <p class="member-institution">
            🏛️ Allahabad University, Allahabad 211002
          </p>
        </div>
      </div>

      <!-- Member Card 3 -->
      <div class="member-card" data-role="associate" data-region="americas">
        <div class="member-photo-container">
          <div class="member-photo-placeholder">
            <img src="assets/images/m3.png" alt="Prof (Dr.) Dwarka Nath" class="member-photo" />
          </div>
        </div>
        <div class="member-info">
          <h3 class="member-name">Prof. (Dr.) Dwarka Nath</h3>
          <p class="member-location">
            👤 Professor, Former Head, Department of Philosophy
          </p>
          <p class="member-institution">
            🏛️ DDU Gorakhpur University Uttar Pradesh
          </p>
        </div>
      </div>
		<!-- Member Card 4 -->
      <div class="member-card" data-role="associate" data-region="asia">
        <div class="member-photo-container">
          <img src="assets/images/m1.png" alt="Prof (Dr.) Shivani Sharma" class="member-photo"
            style="margin-left: 35px; width: 81%" />
        </div>
        <div class="member-info">
          <h3 class="member-name">Prof. (Dr.) Shivani Sharma</h3>
          <p class="member-location">👤 Professor, Department of Philosoph</p>
          <p class="member-institution">
            🏛️ Panjab University Sector 14, Chandigarh
          </p>
        </div>
      </div>

      

      <!-- Member Card 5 -->
      <div class="member-card" data-role="associate" data-region="asia">
        <div class="member-photo-container">
          <div class="member-photo-placeholder">
            <img src="assets/images/m4.png" alt="Prof (Dr.) Prashant Shukla" class="member-photo"
              style="margin-top: 149px; height: auto" />
          </div>
        </div>
        <div class="member-info">
          <h3 class="member-name">Prof. (Dr.) Prashant Shukla</h3>
          <p class="member-location">
            👤 Department of Philosophy, Associate Professor
          </p>
          <p class="member-institution">
            🏛️ University of Lucknow
          </p>
        </div>
      </div>

      <!-- Member Card 6 -->
      <div class="member-card" data-role="associate" data-region="europe">
        <div class="member-photo-container">
          <div class="member-photo-placeholder">
            <img src="assets/images/m7.png" alt="Dr. Surendra Pratap Singh" class="member-photo"
              style="margin-top: 117px" />
          </div>
        </div>
        <div class="member-info">
          <h3 class="member-name">Dr. Surendra Pratap Singh</h3>
          <p class="member-location">
            👤 Assistant Professor, Plant Molecular Biology Laboratory,
            Department of Botany
          </p>
          <p class="member-institution">
            🏛️ Dayanand Anglo-Vedic (PG) College, Kanpur
          </p>
        </div>
      </div>
    </div>

    <div class="section-header">
      <h2 class="section-title">International Members</h2>
      <span class="member-count-badge">1 Members</span>
    </div>

    <div class="members-grid" id="associateEditorsGrid">
      <!-- Member Card 8 -->
      <div class="member-card" data-role="associate" data-region="americas">
        <div class="member-photo-container">
          <div class="member-photo-placeholder">
            <img src="assets/images/m8.png" alt="Prof (Dr.) Mario Lupoli" class="member-photo"
              style="margin-top: 40px" />
          </div>
        </div>
        <div class="member-info">
          <h3 class="member-name">Prof. (Dr.) Mario Lupoli</h3>
          <p class="member-location">
            👤 Assistant Professor, Faculty of Philosophy
          </p>
          <p class="member-institution">
            🏛️ Pontifical University Antonianum, Via Merulana 124, Rome
          </p>
        </div>
      </div>
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
    function toggleMenu() {
      const menu = document.getElementById("navMenu");
      menu.classList.toggle("active");
    }
  </script>
</body>

</html>