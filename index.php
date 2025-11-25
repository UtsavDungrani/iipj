<?php
require_once __DIR__ . '/config.php';

$db = getDBConnection();
$updatesStmt = $db->prepare("
    SELECT title, update_type, content, file_name, published_at
    FROM recent_updates
    WHERE is_published = 1
    ORDER BY published_at DESC
    LIMIT 5
");
$updatesStmt->execute();
$recentUpdates = $updatesStmt->fetchAll();
$shouldShowSlider = count($recentUpdates) > 4;
?>
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
  <title>India Independent Philosophical Journal - Home</title>
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

    /* Hero Section */
    .hero {
      background: linear-gradient(135deg,
          var(--primary-color) 0%,
          var(--secondary-color) 100%);
      color: white;
      padding: 4rem 2rem;
      text-align: center;
    }

    .hero-content {
      max-width: 1000px;
      margin: 0 auto;
    }

    .hero h1 {
      font-size: 3rem;
      margin-bottom: 1rem;
      font-weight: 700;
    }

    .hero .subtitle {
      font-size: 1.3rem;
      margin-bottom: 1rem;
      opacity: 0.95;
    }

    .issn-badge {
      display: inline-block;
      background: rgba(255, 255, 255, 0.2);
      padding: 0.5rem 1.5rem;
      border-radius: 50px;
      font-size: 1.1rem;
      margin: 1rem 0;
    }

    .cta-buttons {
      margin-top: 2rem;
      display: flex;
      gap: 1rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .btn {
      padding: 0.75rem 2rem;
      border-radius: 5px;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s;
      border: 2px solid transparent;
      cursor: pointer;
    }

    .btn-primary {
      background: var(--accent-color);
      color: white;
    }

    .btn-primary:hover {
      background: #b45309;
      transform: translateY(-2px);
    }

    .btn-secondary {
      background: transparent;
      color: white;
      border: 2px solid white;
    }

    .btn-secondary:hover {
      background: white;
      color: var(--primary-color);
    }

    /* Recent Updates */
    .recent-updates {
      background: var(--bg-white);
      padding: 2.5rem 2rem;
      position: relative;
      z-index: 11;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
    }

    .updates-container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .updates-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 1.5rem;
    }

    .updates-title {
      font-size: 2rem;
      color: var(--primary-color);
    }

    .updates-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 1.5rem;
    }

    .updates-list.slider-enabled {
      display: flex;
      gap: 1.5rem;
      overflow-x: auto;
      scroll-behavior: smooth;
      scroll-snap-type: x mandatory;
      padding-bottom: 0.5rem;
      padding-top: 0.5rem;
    }

    .updates-list.slider-enabled::-webkit-scrollbar {
      height: 8px;
    }

    .updates-list.slider-enabled::-webkit-scrollbar-thumb {
      background: rgba(30, 58, 138, 0.3);
      border-radius: 999px;
    }

    .updates-list.slider-enabled .update-card {
      flex: 0 0 calc(25% - 1rem);
      min-width: 260px;
      scroll-snap-align: start;
    }

    .update-card {
      border: 1px solid var(--border-color);
      border-radius: 12px;
      padding: 1.25rem;
      background: var(--bg-light);
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
      min-height: 200px;
      cursor: pointer;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .update-card:hover,
    .update-card:focus,
    .update-card:focus-within {
      outline: none;
      transform: translateY(-4px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
    }

    .slider-controls {
      display: flex;
      gap: 0.5rem;
      z-index: 50;
    }

    .slider-controls.hidden {
      display: none;
    }

    .slider-btn {
      border: none;
      background: rgba(30, 58, 138, 0.1);
      color: var(--primary-color);
      width: 40px;
      height: 40px;
      border-radius: 50%;
      font-size: 1.25rem;
      cursor: pointer;
      transition: background 0.2s ease, transform 0.2s ease;
      pointer-events: auto;
    }

    .slider-btn:hover {
      background: rgba(30, 58, 138, 0.2);
      transform: translateY(-2px);
    }

    .slider-btn:disabled {
      opacity: 0.4;
      cursor: not-allowed;
    }

    .update-card h3 {
      margin: 0;
      font-size: 1.15rem;
      color: var(--primary-color);
    }

    .update-meta {
      font-size: 0.9rem;
      color: var(--text-light);
    }

    .update-content {
      flex: 1;
      color: var(--text-dark);
      font-size: 0.95rem;
      line-height: 1.5;
    }

    .update-actions {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 0.5rem;
    }

    .badge {
      padding: 0.3rem 0.8rem;
      border-radius: 999px;
      font-size: 0.85rem;
      font-weight: 600;
    }

    .badge-text {
      background: rgba(30, 58, 138, 0.1);
      color: var(--primary-color);
    }

    .badge-pdf {
      background: rgba(217, 119, 6, 0.15);
      color: var(--accent-color);
    }

    .updates-empty {
      text-align: center;
      color: var(--text-light);
      padding: 1rem;
      border: 1px dashed var(--border-color);
      border-radius: 12px;
      background: #fff;
    }

    .updates-slider-area {
      position: relative;
    }

    .slider-controls {
      position: absolute;
      top: 50%;
      left: -5%;
      width: 110%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      transform: translateY(-50%);
      /* Allow pointer events so buttons remain clickable */
      pointer-events: auto;
      z-index: 60;
      padding: 0 0.5rem;
    }

    .slider-controls.hidden {
      opacity: 0;
      visibility: hidden;
    }

    /* Update Modal */
    .update-modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(15, 23, 42, 0.6);
      display: none;
      align-items: center;
      justify-content: center;
      padding: 1.5rem;
      z-index: 2000;
    }

    .update-modal-overlay.active {
      display: flex;
    }

    .update-modal {
      background: var(--bg-white);
      border-radius: 16px;
      max-width: 700px;
      width: min(95vw, 700px);
      max-height: 90vh;
      overflow-y: auto;
      position: relative;
      box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
      padding: 2rem;
    }

    .update-modal h3 {
      margin-bottom: 0.5rem;
      font-size: 1.5rem;
    }

    .update-modal-meta {
      color: var(--text-light);
      margin-bottom: 1rem;
      font-size: 0.95rem;
    }

    .update-modal-content {
      color: var(--text-dark);
      line-height: 1.7;
      font-size: 1rem;
    }

    .update-modal-actions {
      margin-top: 1.5rem;
      display: flex;
      justify-content: flex-end;
    }

    .update-modal-close {
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

    .update-modal-close:hover {
      color: var(--primary-color);
    }

    /* Stats Section */
    .stats {
      background: var(--bg-white);
      padding: 3rem 2rem;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-top: -2rem;
      position: relative;
      z-index: 10;
    }

    .stats-container {
      max-width: 1250px;
      margin: 0 auto;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 2rem;
      text-align: center;
    }

    .stat-item {
      padding: 1rem;
    }

    .stat-number {
      font-size: 2.5rem;
      font-weight: bold;
      color: var(--primary-color);
      display: block;
    }

    .stat-label {
      color: var(--text-light);
      font-size: 1rem;
      margin-top: 0.5rem;
    }

    /* Container */
    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 3rem 2rem;
    }

    /* Section Styles */
    .section {
      margin-bottom: 4rem;
    }

    .section-title {
      font-size: 2.5rem;
      margin-bottom: 1rem;
      color: var(--primary-color);
      border-bottom: 3px solid var(--accent-color);
      padding-bottom: 0.5rem;
      display: inline-block;
    }

    .section-content {
      margin-top: 2rem;
      background: var(--bg-white);
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      line-height: 1.8;
    }

    /* Editable Content Areas */
    .editable-content {
      border: 2px dashed var(--border-color);
      padding: 2rem;
      border-radius: 8px;
      background: #fefefe;
      min-height: 100px;
    }

    .content-placeholder {
      color: var(--text-light);
      font-style: italic;
    }

    /* Chief Editor Section */
    .chief-editor-card {
      display: grid;
      grid-template-columns: 250px 1fr;
      gap: 2rem;
      background: var(--bg-white);
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      align-items: start;
    }

    .editor-photo {
      width: 100%;
      height: 250px;
      border-radius: 10px;
      object-fit: cover;
      border: 4px solid var(--primary-color);
    }

    .editor-photo-placeholder {
      width: 100%;
      height: 250px;
      background: var(--bg-light);
      border-radius: 10px;
      border: 4px solid var(--primary-color);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--text-light);
      font-style: italic;
    }

    .editor-info h3 {
      font-size: 1.8rem;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
    }

    .editor-title {
      color: var(--accent-color);
      font-weight: 600;
      margin-bottom: 1rem;
    }

    /* Vision Section */
    .vision-box {
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      padding: 2rem;
      border-radius: 10px;
      border-left: 5px solid var(--primary-color);
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

    /* Additional Information - Grid Cards */
    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 1.5rem;
    }

    .info-card {
      background: var(--bg-white);
      border: 1px solid var(--border-color);
      border-radius: 10px;
      padding: 1.25rem 1.25rem 1rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .info-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 6px 16px rgba(0, 0, 0, 0.08);
    }

    .info-card h3 {
      font-size: 1.1rem;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
    }

    .info-card ul {
      margin-left: 1.25rem;
    }

    .info-card p {
      color: var(--text-dark);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .updates-header {
        flex-direction: column;
        align-items: flex-start;
      }

      .slider-controls-wrapper {
        width: 100%;
        justify-content: space-between;
      }

      .slider-controls {
        left: -8%;
        width: 116%;
      }

      .updates-list.slider-enabled {
        padding-bottom: 1rem;
      }

      .updates-list.slider-enabled .update-card {
        /* Show a single full-width card on mobile */
        flex: 0 0 85%;
        min-width: 85%;
        /* Center the card when snapped and avoid extra margins */
        scroll-snap-align: center;
        margin: 0;
        box-sizing: border-box;
      }

      .updates-list.slider-enabled .update-card:first-child {
        margin-left: 25px;
      }

      .updates-list.slider-enabled .update-card:last-child {
        margin-right: 25px;
      }

      /* Ensure first/last fill the viewport — remove extra inline padding and gaps */
      .updates-list.slider-enabled {
        padding-inline: 0;
        scroll-padding-inline: 0;
        gap: 50px;
      }

      .slider-btn {
        width: 36px;
        height: 36px;
      }

      .mobile-menu-btn {
        display: block;
      }

      /* Make logo image smaller and hide text on small screens */
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

      .hero h1 {
        font-size: 2rem;
      }

      .hero .subtitle {
        font-size: 1.1rem;
      }

      .chief-editor-card {
        grid-template-columns: 1fr;
      }

      .section-title {
        font-size: 2rem;
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
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="chief-editor.php">Chief Editor</a></li>
        <li><a href="editorial-members.php">Editorial Board</a></li>
        <li><a href="publishers.php">Publishers</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="volumes.php">Volumes</a></li>
      </ul>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-content">
      <h1>INDIA INDEPENDENT PHILOSOPHICAL JOURNAL</h1>
      <p class="subtitle">
        Advancing Philosophical Discourse Through Rigorous Academic Research
      </p>
      <div class="issn-badge">ISSN: 3107-7269</div>
      <div class="cta-buttons">
        <a href="volumes.php" class="btn btn-primary">Browse Volumes</a>
        <a href="#scope" class="btn btn-secondary">Learn More</a>
      </div>
    </div>
  </section>

  <!-- Stats Section -->
  <section class="stats">
    <div class="stats-container">
      <div class="stat-item">
        <span class="stat-number">1</span>
        <span class="stat-label">Volumes Published</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">16+</span>
        <span class="stat-label">Research Articles</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">International</span>
        <span class="stat-label">Peer Review</span>
      </div>
      <div class="stat-item">
        <span class="stat-number">Open Access</span>
        <span class="stat-label">Publication Model</span>
      </div>
    </div>
  </section>

  <?php if (!empty($recentUpdates)): ?>
    <section class="recent-updates">
      <div class="updates-container">
        <div class="updates-header">
          <h2 class="updates-title">Recent Updates</h2>
        </div>
        <div class="updates-slider-area">
          <div class="slider-controls <?php echo $shouldShowSlider ? '' : 'hidden'; ?>" id="updatesSliderControls">
            <button class="slider-btn" id="updatesPrevBtn" aria-label="Previous updates">&lsaquo;</button>
            <button class="slider-btn" id="updatesNextBtn" aria-label="Next updates">&rsaquo;</button>
          </div>
          <div class="updates-list <?php echo $shouldShowSlider ? 'slider-enabled' : ''; ?>" id="updatesSlider">
            <?php foreach ($recentUpdates as $update): ?>
              <div class="update-card" data-update-card tabindex="0" role="button" aria-label="View update details">
                <h3><?php echo htmlspecialchars($update['title']); ?></h3>
                <div class="update-meta">
                  <?php echo date('d M Y', strtotime($update['published_at'])); ?>
                </div>
                <?php if (!empty($update['content'])): ?>
                  <div class="update-content">
                    <?php echo nl2br(htmlspecialchars($update['content'])); ?>
                  </div>
                <?php endif; ?>
                <div class="update-actions">
                  <span class="badge <?php echo $update['update_type'] === 'pdf' ? 'badge-pdf' : 'badge-text'; ?>">
                    <?php echo strtoupper($update['update_type']); ?>
                  </span>
                  <?php if ($update['update_type'] === 'pdf' && !empty($update['file_name'])): ?>
                    <a href="<?php echo SITE_URL . '/uploads/updates/' . rawurlencode($update['file_name']); ?>"
                      class="btn btn-primary" target="_blank" rel="noopener" data-modal-ignore>Download PDF</a>
                  <?php endif; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <div class="update-modal-overlay" id="updateModal" aria-hidden="true">
    <div class="update-modal" role="dialog" aria-modal="true" aria-labelledby="updateModalTitle">
      <button class="update-modal-close" id="updateModalClose" aria-label="Close update">&times;</button>
      <h3 id="updateModalTitle"></h3>
      <div class="update-modal-meta" id="updateModalMeta"></div>
      <div class="update-modal-content" id="updateModalContent"></div>
      <div class="update-modal-actions" id="updateModalActions"></div>
    </div>
  </div>

  <!-- Main Content -->
  <div class="container">
    <!-- About the journal Section -->
    <section class="section" id="scope">
      <h2 class="section-title">About the Journal</h2>
      <div class="section-content editable-content">
        <p class="content-placeholder">
          The India Independent Philosophical Journal is a peer-reviewed scholarly periodical established in 2025. It is
          dedicated to creating an open and inclusive platform for philosophical reflection, dialogue, and research
          rooted in Indian as well as global traditions. The journal aims to revive the relevance of philosophical
          thinking in the contemporary world while remaining grounded in classical wisdom.<br><br>
          Philosophy today must transcend disciplinary boundaries to address ethical, existential, technological,
          environmental, and cultural challenges. This journal aspires to serve that need by promoting inquiry that is
          rigorous, critical, comparative, and constructive.

        </p>
      </div>
    </section>

    <!-- Vision Section -->
    <section class="section">
      <h2 class="section-title">Vision</h2>
      <div class="vision-box editable-content">
        <p class="content-placeholder">
        <p style="text-align: justify;">
          The India Independent Philosophical Journal seeks to reclaim the contemporary relevance of philosophy as a way
          of integrated and conscious living. In reviving Indian traditions such as Vedānta, Sāṃkhya-Yoga, Nyāya,
          Buddhism, and Jainism, alongside Western and global currents including phenomenology, post-structuralism,
          cognitive science, and AI ethics, we aim to foster dialogue that bridges tradition and the future. We welcome
          interdisciplinary thought that connects philosophy with science, education, digital transformation, and public
          life. This journal stands for honest inquiry, creative reasoning, and responsible scholarship.
        </p>
        </p>
      </div>
    </section>

    <!-- Scope and Aim Section -->
    <section class="section" id="scope">
      <h2 class="section-title">Scope and Aim</h2>
      <div class="section-content editable-content">
        <p class="content-placeholder">
          <strong>Aims:</strong><br />
        <ul style="margin-top: 1rem; margin-left: 2rem">
          <li>To promote high-quality philosophical research grounded in Indian traditions (Vedānta, Nyāya, Buddhism,
            Jainism, Yoga-Sāṃkhya, etc.).</li>
          <li>To foster dialogue between Eastern and Western schools of philosophy.</li>
          <li>To support interdisciplinary explorations of philosophy with education, technology, consciousness studies,
            ethics, and AI.</li>
          <li>To encourage young scholars and independent researchers to contribute to philosophical discourse.</li>
        </ul>
        </p>
        <p class="content-placeholder" style="margin-top: 2rem;">
          <strong>Scope:</strong><br />
        <p style="margin-top: 1rem;">The journal welcomes scholarly papers, critical essays, reviews, and conceptual
          reflections in areas including but not limited to:</p>
        <ul style="margin-left: 2rem">
          <li>Indian Philosophical Systems</li>
          <li>Comparative Philosophy</li>
          <li>Ethics and Applied Philosophy</li>
          <li>Philosophy of Mind and Consciousness Studies</li>
          <li>Philosophy of Science and Technology</li>
          <li>Philosophy of Religion</li>
          <li>Environmental Philosophy</li>
          <li>Educational Philosophy</li>
          <li>Cognitive Science and AI Ethics</li>
          <li>Gender and Dalit Philosophy</li>
          <li>Phenomenology, Existentialism, Post-structuralism</li>
        </ul>
        </p>
      </div>
    </section>

    <!-- Author Guidelines Section -->
    <section class="section">
      <h2 class="section-title">Author Guidelines</h2>
      <div class="vision-box editable-content">
        <p class="content-placeholder">
        <p style="text-align: justify;">
        <ul style="margin-left: 2rem">
          <li><b>Manuscript Length:</b> 3000–6000 words</li>
          <li><b>Abstract:</b> 200–300 words, with 4–6 keywords</li>
          <li><b>File Format:</b> MS Word (.docx)</li>
          <li><b>Font:</b> Times New Roman, Size 12 (English); Kruti Dev 010 (Hindi)</li>
          <li><b>Spacing:</b> Double-spaced</li>
          <li><b>Referencing:</b> APA 7th / Chicago Manual (consistent style)</li>
          <li><b>Languages Accepted:</b> English & Hindi</li>
          <li><b>Declaration:</b> Work must be original, unpublished, and not under review elsewhere</li>
          <li><b>Submission Email:</b> <a href="mailto:iipj.research@gmail.com">iipj.research@gmail.com</a></li>
          <li><b>Publication Fee: Rs.1500+</b>Postal charges (If Paper Gets selected )</li>
        </ul>
        </p>
        </p>
      </div>
    </section>

    <!-- Chief Editor Section -->
    <section class="section">
      <h2 class="section-title">Chief Editor</h2>
      <div class="chief-editor-card">
        <img src="assets/images/main.png" alt="Chief Editor" class="editor-photo" />
        <div class="editor-info">
          <h3>Dr. Dhananjay Trivedi</h3>
          <p class="editor-title">Chief Editor India Independent Philosophical Journal</p>
          <div class="editable-content" style="border: none; padding: 0">
            <p class="content-placeholder">
              <strong>Assistant Professor in Gyanmanjari Innovative University, Bhavnagar, Gujarat</strong><br /><br />
              Dr. Dhananjay Trivedi is a distinguished philosopher and
              academic leader specializing in Indian philosophy, comparative
              philosophy, and ethics. With extensive research experience and
              numerous publications in international journals, he brings
              scholarly excellence and vision to the India Independent
              Philosophical Journal.
            </p>
            <p style="margin-top: 1rem">
              <strong>Research Interests:</strong>Indian Philosophical Systems: Yoga, Vedānta, Sāṃkhya, and Gita
              Studies<br />
            </p>
            <a href="chief-editor.php" class="btn btn-primary" style="margin-top: 1rem; display: inline-block">View Full
              Profile</a>
          </div>
        </div>
      </div>
    </section>

    <!-- Additional Information Section -->
    <section class="section">
      <h2 class="section-title">Additional Information</h2>
      <div class="section-content editable-content">
        <div class="info-grid">
          <div class="info-card">
            <h3><strong>Frequency of publications</strong></h3>
            <ul>
              <li><b>Annual,</b> with one volume published every year.</li>
              <li>Special issues may be announced on contemporary or thematic topics.</li>
            </ul>
          </div>
          <div class="info-card">
            <h3><strong>Language</strong></h3>
            <ul>
              <li>The journal publishes content in <b>English</b> and <b>Hindi</b>.</li>
              <li>Papers must be written in grammatically correct, scholarly English. Transliteration of Indian terms
                (IAST) is encouraged where relevant.</li>
            </ul>
          </div>
          <div class="info-card">
            <h3><strong>Format of publications</strong></h3>
            <ul>
              <li><b>Print:</b> Print editions are issued annually for libraries, universities, and individual
                subscribers.</li>
            </ul>
          </div>
          <div class="info-card">
            <h3><strong>Publisher details</strong></h3>
            <p><b>Publisher Name and Address:</b><br>
              Dr. Dhananjay Trivedi<br>
              Assistant Professor, Department of Computer Engineering<br>
              Gyanmanjari Innovative University, Bhavnagar, Gujarat
            </p>
          </div>
          <div class="info-card">
            <h3><strong>Review policy</strong></h3>
            <p>The journal follows a double-blind peer-review process, ensuring anonymity and integrity in evaluation.
            </p>
            <p><b>Key aspects include:</b></p>
            <ul style="margin-top: 0.5rem;">
              <li>Each manuscript is reviewed by <b>two independent experts</b> in the field.</li>
              <li>Reviewers assess <b>originality, relevance, clarity, methodology, and philosophical contribution.</b>
              </li>
              <li>Authors receive <b>constructive feedback</b> and may be asked to revise and resubmit.</li>
              <li>Final acceptance is based on <b>editorial consensus.</b></li>
            </ul>
          </div>
          <div class="info-card">
            <h3><strong>Plagiarism policy</strong></h3>
            <ul>
              <li>The journal adheres strictly to <b>academic honesty</b>.</li>
              <li>All submissions are checked via <b>plagiarism detection software</b>.</li>
              <li>Plagiarism of more than <b>10% (uncited)</b> is grounds for <b>rejection</b>.</li>
              <li>Self-plagiarism and unethical citation practices are also not tolerated.</li>
            </ul>
          </div>
        </div>
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

    (function () {
      const slider = document.getElementById('updatesSlider');
      const prevBtn = document.getElementById('updatesPrevBtn');
      const nextBtn = document.getElementById('updatesNextBtn');
      const hasDesktopSlider = <?php echo json_encode($shouldShowSlider); ?>;
      const controls = document.getElementById('updatesSliderControls');
      const updateCount = slider.querySelectorAll('.update-card').length;

      if (!slider) {
        return;
      }

      const scrollAmount = () => slider.clientWidth * 0.8;

      const updateButtons = () => {
        if (!prevBtn || !nextBtn) {
          return;
        }
        const maxScroll = slider.scrollWidth - slider.clientWidth;
        prevBtn.disabled = slider.scrollLeft <= 0;
        nextBtn.disabled = slider.scrollLeft >= maxScroll - 5;
      };

      if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
          slider.scrollBy({ left: -scrollAmount(), behavior: 'smooth' });
        });

        nextBtn.addEventListener('click', () => {
          slider.scrollBy({ left: scrollAmount(), behavior: 'smooth' });
        });

        slider.addEventListener('scroll', updateButtons);
        window.addEventListener('resize', updateButtons);
        updateButtons();
      }

      const setControlsVisibility = () => {
        if (!controls) {
          return;
        }
        // Hide controls when there is only one update
        if (updateCount <= 1) {
          controls.classList.add('hidden');
          return;
        }

        if (slider.classList.contains('slider-enabled')) {
          controls.classList.remove('hidden');
        } else if (!hasDesktopSlider) {
          controls.classList.add('hidden');
        }
      };

      const toggleMobileSlider = () => {
        if (window.innerWidth <= 768) {
          // Only enable mobile slider behaviour when there are multiple updates
          if (updateCount > 1) {
            slider.classList.add('slider-enabled');
          } else {
            slider.classList.remove('slider-enabled');
          }
        } else if (!hasDesktopSlider) {
          slider.classList.remove('slider-enabled');
        }
        setControlsVisibility();
      };

      toggleMobileSlider();
      window.addEventListener('resize', toggleMobileSlider);
    })();

    (function () {
      const modalOverlay = document.getElementById('updateModal');
      const modalCloseBtn = document.getElementById('updateModalClose');
      const modalTitle = document.getElementById('updateModalTitle');
      const modalMeta = document.getElementById('updateModalMeta');
      const modalContent = document.getElementById('updateModalContent');
      const modalActions = document.getElementById('updateModalActions');
      const cards = document.querySelectorAll('[data-update-card]');

      if (!modalOverlay || !cards.length) {
        return;
      }

      const openModal = (card) => {
        const title = card.querySelector('h3');
        const meta = card.querySelector('.update-meta');
        const content = card.querySelector('.update-content');
        const actions = card.querySelector('.update-actions');

        modalTitle.innerHTML = title ? title.innerHTML : 'Update';
        modalMeta.textContent = meta ? meta.textContent : '';
        modalContent.innerHTML = content ? content.innerHTML : '<em>No additional details provided.</em>';
        modalActions.innerHTML = '';

        if (actions) {
          const actionsClone = actions.cloneNode(true);
          modalActions.appendChild(actionsClone);
          modalActions.style.display = 'flex';
        } else {
          modalActions.style.display = 'none';
        }

        modalOverlay.classList.add('active');
        modalOverlay.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';
      };

      const closeModal = () => {
        modalOverlay.classList.remove('active');
        modalOverlay.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';
      };

      cards.forEach((card) => {
        card.addEventListener('click', (event) => {
          if (event.target.closest('[data-modal-ignore]')) {
            return;
          }
          openModal(card);
        });

        card.addEventListener('keydown', (event) => {
          if (event.key === 'Enter' || event.key === ' ') {
            event.preventDefault();
            openModal(card);
          }
        });
      });

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
  </script>
</body>

</html>