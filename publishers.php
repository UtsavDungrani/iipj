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
  <title>Publishers - India Independent Philosophical Journal</title>
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

    /* Container */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 3rem 2rem;
    }

    /* Publisher Card */
    .publisher-card {
      background: var(--bg-white);
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
      margin-bottom: 3rem;
    }

    .publisher-hero {
      background: linear-gradient(135deg,
          var(--primary-color) 0%,
          var(--secondary-color) 100%);
      padding: 3rem;
      text-align: center;
      color: white;
    }

    .publisher-logo-container {
      background: white;
      width: 200px;
      height: 200px;
      margin: 0 auto 2rem;
      border-radius: 15px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      overflow: hidden;
    }

    .publisher-logo {
      max-width: 100%;
      object-fit: contain;
    }

    .publisher-logo-placeholder {
      color: var(--text-light);
      font-style: italic;
      text-align: center;
      padding: 1rem;
    }

    .publisher-name {
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 0.5rem;
    }

    .publisher-tagline {
      font-size: 1.2rem;
      opacity: 0.9;
    }

    .publisher-content {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 3rem;
      padding: 3rem;
    }

    .publisher-section {
      margin-bottom: 2rem;
    }

    .section-title {
      font-size: 1.5rem;
      color: var(--primary-color);
      margin-bottom: 1rem;
      padding-bottom: 0.5rem;
      border-bottom: 2px solid var(--accent-color);
    }

    .contact-item {
      display: flex;
      align-items: start;
      gap: 1rem;
      margin-bottom: 1rem;
      padding: 1rem;
      background: var(--bg-light);
      border-radius: 8px;
    }

    .contact-icon {
      font-size: 1.5rem;
      color: var(--primary-color);
      min-width: 30px;
    }

    .contact-details {
      flex: 1;
    }

    .contact-label {
      font-weight: 600;
      color: var(--text-dark);
      margin-bottom: 0.25rem;
    }

    .contact-value {
      color: var(--text-light);
      line-height: 1.6;
    }

    .contact-value a {
      color: var(--primary-color);
      text-decoration: none;
    }

    .contact-value a:hover {
      text-decoration: underline;
    }

    .publisher-description {
      color: var(--text-dark);
      line-height: 1.8;
      margin-bottom: 1.5rem;
    }

    .info-list {
      list-style: none;
      padding: 0;
    }

    .info-list li {
      padding: 0.75rem;
      margin-bottom: 0.5rem;
      background: var(--bg-light);
      border-radius: 5px;
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }

    .info-list li:before {
      content: "✓";
      color: var(--success-color);
      font-weight: bold;
      font-size: 1.2rem;
    }

    .map-container {
      width: 100%;
      height: 400px;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      margin-top: 1.5rem;
    }

    .map-placeholder {
      width: 100%;
      height: 100%;
      background: var(--bg-light);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text-light);
      font-style: italic;
      text-align: center;
      padding: 1.2rem;
      border: 2px dashed var(--border-color);
    }

    .action-buttons {
      display: flex;
      gap: 1rem;
      margin-top: 2rem;
      flex-wrap: wrap;
      justify-content: center;
    }

    .btn {
      padding: 1rem 2rem;
      border-radius: 8px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
    }

    .btn-primary {
      background: var(--primary-color);
      color: white;
    }

    .btn-primary:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .btn-secondary {
      background: white;
      color: var(--primary-color);
      border: 2px solid var(--primary-color);
    }

    .btn-secondary:hover {
      background: var(--primary-color);
      color: white;
      transform: translateY(-2px);
    }

    .standards-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 1rem;
      margin-top: 1.5rem;
    }

    .standard-badge {
      background: var(--bg-light);
      padding: 1rem;
      border-radius: 8px;
      text-align: center;
      border: 2px solid var(--border-color);
      transition: all 0.3s;
    }

    .standard-badge:hover {
      border-color: var(--primary-color);
      transform: translateY(-2px);
    }

    .badge-icon {
      font-size: 2rem;
      margin-bottom: 0.5rem;
    }

    .badge-text {
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--text-dark);
    }

    /* Footer */
    .footer {
      background: var(--text-dark);
      color: white;
      padding: 3rem 2rem 1rem;
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

    .text-justify {
      text-align: justify;
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

      .publisher-content {
        grid-template-columns: 1fr;
        padding: 2rem 1.5rem;
      }

      .publisher-name {
        font-size: 2rem;
      }

      .action-buttons {
        flex-direction: column;
      }

      .btn {
        width: 100%;
        justify-content: center;
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
        <li><a href="publishers.php" class="active">Publishers</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="volumes.php">Volumes</a></li>
      </ul>
    </div>
  </nav>

  <!-- Breadcrumb -->
  <div class="breadcrumb">
    <div class="breadcrumb-container">
      <a href="index.php">Home</a> / Publishers
    </div>
  </div>

  <!-- Page Header -->
  <section class="page-header">
    <h1>Publisher Information</h1>
    <p>Committed to excellence in philosophical research publication</p>
  </section>

  <!-- Main Content -->
  <div class="container">
    <!-- Publisher Card -->
    <div class="publisher-card">
      <!-- Publisher Hero Section -->
      <div class="publisher-hero">
        <div class="publisher-logo-container">
          <img src="assets/images/main.png" class="publisher-logo" alt="Dr. Dhananjay Trivedi">
        </div>
        <h1 class="publisher-name">Dr. Dhananjay Trivedi</h1>
        <p class="publisher-tagline" style="word-spacing: 2px;">INDIA INDEPENDENT PHILOSOPHICAL JOURNAL</p>
      </div>

      <!-- Publisher Content -->
      <div class="publisher-content">
        <!-- Left Column -->
        <div>
          <!-- Contact Information -->
          <div class="publisher-section">
            <h2 class="section-title">Contact Information</h2>

            <div class="contact-item">
              <div class="contact-icon">📍</div>
              <div class="contact-details">
                <div class="contact-label">Address</div>
                <div class="contact-value">
                  Gyanmanjari Innovative University, Bhavnagar,<br />
                  Survey No.30, Sidsar Road, near Iscon Eleven,<br />
                  Bhavnagar, Gujarat 364001<br />
                  India
                </div>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">📞</div>
              <div class="contact-details">
                <div class="contact-label">Phone</div>
                <div class="contact-value">
                  <a href="tel:+91-9873594492">+91-9873594492</a>
                </div>
              </div>
            </div>

            <div class="contact-item">
              <div class="contact-icon">📧</div>
              <div class="contact-details">
                <div class="contact-label">Email</div>
                <div class="contact-value">
                  <a href="mailto:iipj.research@gmail.com">iipj.research@gmail.com</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Map -->
          <div class="publisher-section">
            <h2 class="section-title">Location</h2>
            <div class="map-container">
              <div class="map-placeholder">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29660.148464332597!2d72.24179287392504!3d21.68257797054135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395f574ba735c539%3A0x387d9b85bd2cd04e!2sGyanmanjari%20Innovative%20University!5e0!3m2!1sen!2sin!4v1762499559031!5m2!1sen!2sin"
                  width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Column -->
        <div>
          <!-- About Publisher -->
          <div class="publisher-section">
            <h2 class="section-title">About the Publisher</h2>
            <p class="publisher-description text-justify">
              Dr. Dhananjay Trivedi is a distinguished philosopher and
              academic leader specializing in Indian philosophy, comparative
              philosophy, and ethics. With extensive research experience and
              numerous publications in international journals, he brings
              scholarly excellence and vision to the India Independent
              Philosophical Journal.
            </p>
            <p class="publisher-description">
              <strong>Established:</strong> 2025
            </p>
          </div>

          <!-- Publishing Standards -->
          <div class="publisher-section">
            <h2 class="section-title">Publishing Standards</h2>
            <div class="standards-grid">
              <div class="standard-badge">
                <div class="badge-icon">📋</div>
                <div class="badge-text">ISSN Registered</div>
              </div>
              <div class="standard-badge">
                <div class="badge-icon">✓</div>
                <div class="badge-text">Peer Reviewed</div>
              </div>
              <div class="standard-badge">
                <div class="badge-icon">🔓</div>
                <div class="badge-text">Open Access</div>
              </div>
              <div class="standard-badge">
                <div class="badge-icon">⚖️</div>
                <div class="badge-text">Ethical Guidelines</div>
              </div>
            </div>
          </div>

          <!-- Action Buttons -->
          <div class="action-buttons">
            <a href="mailto:research.trivedi@gmail.com" class="btn btn-secondary">
              ✉️ Contact Publisher
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Distribution Information -->
    <div class="publisher-section">
      <h2 class="section-title">Distribution & Availability</h2>
      <p class="publisher-description">
        The India Independent Philosophical Journal is available through
        multiple academic platforms and databases to ensure maximum
        accessibility for researchers worldwide.
      </p>
      <ul class="info-list">
        <li>ResearchGate</li>
        <li>Academia.edu</li>
        <li>Google Scholar</li>
        <li>Direct Publisher Access</li>
      </ul>
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