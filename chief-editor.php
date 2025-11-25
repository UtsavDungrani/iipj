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
  <title>Chief Editor - India Independent Philosophical Journal</title>
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

    /* Hero Profile Section */
    .profile-hero {
      background: var(--bg-white);
      padding: 3rem;
      border-radius: 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      margin-bottom: 3rem;
      display: grid;
      grid-template-columns: 300px 1fr;
      gap: 3rem;
      align-items: start;
    }

    .profile-photo-section {
      text-align: center;
    }

    .profile-photo {
      width: 100%;
      height: 300px;
      border-radius: 15px;
      object-fit: cover;
      border: 5px solid var(--primary-color);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .profile-photo-placeholder {
      width: 100%;
      height: 300px;
      background: var(--bg-light);
      border-radius: 15px;
      border: 5px solid var(--primary-color);
      display: flex;
      align-items: center;
      justify-content: center;
      flex-direction: column;
      color: var(--text-light);
      font-style: italic;
      padding: 1rem;
      text-align: center;
    }

    .profile-links {
      margin-top: 1.5rem;
      display: flex;
      gap: 0.75rem;
      justify-content: center;
      flex-wrap: wrap;
    }

    .profile-link-btn {
      padding: 0.5rem 1rem;
      background: var(--primary-color);
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 0.9rem;
      transition: all 0.3s;
    }

    .profile-link-btn:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
    }

    .profile-main-info h1 {
      font-size: 2.5rem;
      color: var(--primary-color);
      margin-bottom: 0.5rem;
    }

    .profile-title {
      font-size: 1.3rem;
      color: var(--accent-color);
      font-weight: 600;
      margin-bottom: 1rem;
    }

    .profile-affiliation {
      font-size: 1.1rem;
      color: var(--text-light);
      margin-bottom: 1.5rem;
    }

    .contact-info {
      background: var(--bg-light);
      padding: 1rem;
      border-radius: 8px;
      margin-top: 1.5rem;
    }

    .contact-info p {
      margin: 0.5rem 0;
    }

    .contact-info a {
      color: var(--primary-color);
      text-decoration: none;
    }

    .contact-info a:hover {
      text-decoration: underline;
    }

    /* Content Sections */
    .content-section {
      background: var(--bg-white);
      padding: 2.5rem;
      border-radius: 10px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
      margin-bottom: 2rem;
    }

    .section-title {
      font-size: 1.8rem;
      color: var(--primary-color);
      margin-bottom: 1.5rem;
      border-bottom: 3px solid var(--accent-color);
      padding-bottom: 0.5rem;
      display: inline-block;
    }

    .editable-content {
      border: 2px dashed var(--border-color);
      padding: 1.5rem;
      border-radius: 8px;
      background: #fefefe;
      min-height: 80px;
    }

    .content-placeholder {
      color: var(--text-light);
      font-style: italic;
    }

    /* Two Column Layout */
    .two-column-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2rem;
    }

    /* Lists */
    .styled-list {
      list-style: none;
      margin-left: 0;
    }

    .styled-list li {
      padding: 0.75rem 0;
      border-bottom: 1px solid var(--border-color);
      display: flex;
      align-items: start;
    }

    .styled-list li:before {
      content: "▸";
      color: var(--accent-color);
      font-weight: bold;
      margin-right: 0.75rem;
    }

    .styled-list li:last-child {
      border-bottom: none;
    }


    /* Quote Box */
    .quote-box {
      background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
      padding: 2rem;
      border-radius: 10px;
      border-left: 5px solid var(--primary-color);
      font-style: italic;
      font-size: 1.1rem;
      color: var(--text-dark);
      margin: 2rem 0;
    }

    /* Download Button */
    .download-cv-btn {
      display: inline-block;
      padding: 0.75rem 2rem;
      background: var(--accent-color);
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: 600;
      transition: all 0.3s;
      margin-top: 1rem;
    }

    .download-cv-btn:hover {
      background: #b45309;
      transform: translateY(-2px);
    }

    /* Link Button */
    .link-button {
      display: inline-block;
      padding: 0.75rem 2rem;
      background: var(--primary-color);
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-weight: 600;
      transition: all 0.3s;
      margin-bottom: 1rem;
    }

    .link-button:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
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

    .text-justify {
      text-align: justify;
    }

    /* Table Styling */
    table.styled-table {
      width: 100%;
      border-collapse: collapse;
      margin: 1rem 0;
    }

    table.styled-table tr {
      border-bottom: 1px solid var(--border-color);
      transition: background-color 0.2s;
    }

    table.styled-table tr:last-child {
      border-bottom: none;
    }

    table.styled-table tr:hover {
      background-color: var(--bg-light);
    }

    table.styled-table td {
      padding: 1rem 0.5rem;
      vertical-align: top;
      color: inherit;
      font-style: inherit;
    }

    table.styled-table td:first-child {
      width: 40%;
      min-width: 180px;
      padding-right: 1.5rem;
    }

    table.styled-table td:last-child {
      line-height: 1.6;
    }

    table.styled-table td strong {
      font-weight: 600;
      color: inherit;
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

      .profile-hero {
        grid-template-columns: 1fr;
        padding: 2rem;
        gap: 2rem;
      }

      .two-column-grid {
        grid-template-columns: 1fr;
      }

      .profile-main-info h1 {
        font-size: 2rem;
      }

      table.styled-table td:first-child {
        width: 35%;
        min-width: 150px;
      }

      table.styled-table td {
        padding: 0.75rem 0.25rem;
        font-size: 0.95rem;
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
        <li><a href="chief-editor.php" class="active">Chief Editor</a></li>
        <li><a href="editorial-members.php">Editorial Board</a></li>
        <li><a href="publishers.php">Publishers</a></li>
        <li><a href="gallery.php">Gallery</a></li>
        <li><a href="volumes.php">Volumes</a></li>
      </ul>
    </div>
  </nav>

  <!-- Breadcrumb -->
  <div class="breadcrumb">
    <div class="breadcrumb-container">
      <a href="index.php">Home</a> / Chief Editor
    </div>
  </div>

  <!-- Page Header -->
  <section class="page-header">
    <h1>Chief Editor</h1>
    <p>Editorial Leadership & Academic Profile</p>
  </section>

  <!-- Main Content -->
  <div class="container">
    <!-- Profile Hero Section -->
    <div class="profile-hero">
      <div class="profile-photo-section">
        <img src="assets/images/main.png" class="profile-photo" alt="Dr. Dhananjay Trivedi" />
        <div class="profile-links">
          <a href="https://www.researchgate.net/profile/Dhananjay-Trivedi-4" target="_blank"
            class="profile-link-btn">ResearchGate</a>
          <a href="https://www.linkedin.com/in/dr-dhananjay-trivedi-phd-4054931a4/" target="_blank"
            class="profile-link-btn">LinkedIn</a>
          <a href="https://scholar.google.com/citations?hl=en&user=FqUkLzkAAAAJ" target="_blank"
            class="profile-link-btn">Google Scholar</a>
          <a href="https://orcid.org/my-orcid?orcid=0000-0002-8886-959X" target="_blank"
            class="profile-link-btn">ORCID</a>
        </div>
      </div>
      <div class="profile-main-info">
        <h1>Dr. Dhananjay Trivedi</h1>
        <p class="profile-title">
          Chief Editor, India Independent Philosophical Journal
        </p>
        <p class="profile-affiliation">Assistant Professor in Gyanmanjari Innovative University, Bhavnagar, Gujarat</p>
        <div class="editable-content content-placeholder text-justify">
          <p>
            Dr. Dhananjay Trivedi is a distinguished philosopher and
            academic leader specializing in Indian philosophy, comparative
            philosophy, and ethics. With extensive research experience and
            numerous publications in international journals, he brings
            scholarly excellence and vision to the India Independent
            Philosophical Journal.
          </p>
        </div>
        <div class="contact-info">
          <p>
            <strong>Email:</strong>
            <a href="mailto:iipj.research@gmail.com">iipj.research@gmail.com</a>
          </p>
          <p>
            <strong>Phone no:</strong>
            <a href="tel:+91-9873594492">+91-9873594492</a>
          </p>
        </div>
      </div>
    </div>

    <!-- Biography Section -->
    <div class="content-section">
      <h2 class="section-title">Biography</h2>
      <div class="editable-content content-placeholder text-justify">
        <p>
          <b>Dr. Dhananjay Trivedi</b> is a dedicated scholar and educator
          specialising in Philosophy, Hindu Studies, Yoga, AI and Ethics. His
          research integrates the traditional Indian philosophical framework
          with contemporary global concerns such as AI, technology,
          consciousness, and human values.
        </p>
        <p>
          He serves as the <b>Chief Editor</b> of the India Independent
          Philosophical Journal (ISSN 3107-7269) and is an
          <b>Assistant Professor</b> in the Department of Computer Engineering at Gyanmanjari
          Innovative University, Bhavnagar, Gujarat.
        </p>
        <p>
          With over five years of teaching experience as a scholar, Dr.
          Trivedi is committed to advancing interdisciplinary philosophical
          inquiry, fostering dialogues between Eastern and Western schools of
          thought, and promoting youth research engagement.
        </p>
      </div>
    </div>

    <!-- Two Column Sections -->
    <div class="two-column-grid">
      <!-- Academic Qualifications -->
      <div class="content-section">
        <h2 class="section-title">Academic Qualifications</h2>
        <div class="editable-content">
          <table class="styled-table content-placeholder">
            <tr>
              <td><strong>Ph.D. (Philosophy)</strong></td>
              <td>DAV PG College, Kanpur (CSJM University), 2024</td>
            </tr>
            <tr>
              <td><strong>M.A. (Philosophy)</strong></td>
              <td>CSJM University, Kanpur, 2018</td>
            </tr>
            <tr>
              <td><strong>B.Tech (ECE)</strong></td>
              <td>UPTU (Uttar Pradesh Technical University), 2014</td>
            </tr>
            <tr>
              <td><strong>UGC-NET</strong></td>
              <td>Qualified in Philosophy and Hindu Studies</td>
            </tr>
            <tr>
              <td><strong>ICPR Junior Research Fellowship (JRF)</strong></td>
              <td>Government of India</td>
            </tr>
          </table>
        </div>
      </div>

      <!-- Research Interests -->
      <div class="content-section">
        <h2 class="section-title">Research Interests</h2>
        <div class="editable-content text-justify">
          <ul class="styled-list content-placeholder">
            <li>
              Indian Philosophical Systems: Yoga, Vedānta, Sāṃkhya, and Gita
              Studies
            </li>
            <li>Ethics and Value-based Education</li>
            <li>Consciousness Studies and Philosophy of Mind</li>
            <li>AI, Technology, and Indian Knowledge Systems (IKS)</li>
            <li>Comparative Philosophy (Eastern & Western Thought)</li>
            <li>Cultural and Interdisciplinary Studies</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Publications Section -->
    <div class="content-section">
      <h2 class="section-title">Publications</h2>
      <div class="editable-content content-placeholder">
        <a href="https://www.researchgate.net/publication/396466644_INDIA_INDEPENDENT_PHILOSOPHICAL_JOURNAL_VOLUME-1_AUGUST_2025_ISSN_NO-_3107-7269_Chief_Editor-_Dr_Dhananjay_Trivedi"
          class="link-button" target="_blank">View Publications</a>
        <ul class="styled-list text-justify">
          <li>Trivedi, D. (2025). Philosophical enquiry of duḥkha (pain) in Śrīmad Bhagavad Gītā and Yoga-Sūtra. India
            Independent Philosophical Journal, 1, 14–26. ISSN 3107-7269.</li>
          <li>Trivedi, D., & Singh, R. P. (2023). Scientific and psychological explanation of brahmacharya (celibacy) in
            Yoga-Sūtra. Kanpur Philosophers, Vol-10(1B), 274. (PDF on ResearchGate).</li>
          <li>Trivedi, D. (2022). Scientific explanation of fasting (upavāsa) in yoga for purification. Kanpur
            Philosophers.</li>
          <li>Trivedi, D. (2024). Importance of Aṣṭāṅga-Yoga in education. International Journal of Research in
            Humanities & Social Sciences, 10(3), 41–25.</li>
          <li>Trivedi, D. (2024). Psychological and cultural effect of the four bhāvanās of Yoga-Sūtra. DOI:
            10.13140/RG.2.2.15691.60963.</li>
          <li>Trivedi, D. (2023). योगदर्शन में ईश्वर की अवधारणा: एक दार्शनिक विश्लेषण Kanpur Philosophers, (July 2023).
            — p. 376.</li>
          <li>Trivedi, D. (2024). योगदर्शन में चित्तविक्षेप की अवधारणा : एक दार्शनिक विश्लेषण , 70(1), 158–165.</li>
          <li>“पतञ्जलि योग-सूत्र में यम की अवधारणा: दार्शनिक एवं आध्यात्मिक विश्लेषण – , Kanpur Philosophers, UGC-Care
            Journal July 2023.</li>
          <li>Trivedi, D. (2024). From oppression to empowerment: A philosophical framework for women’s liberation. In
            Collected Studies in Contemporary Philosophy. Mittal Publications.</li>
          <li>Trivedi, D. (2024). Exploring the Philosophical Understanding of Education and Consciousness. Satyam
            Publishing House. ISBN: 978-93-5909-641-4.</li>
        </ul>
      </div>
    </div>

    <!-- Two Column Sections -->
    <div class="two-column-grid">
      <!-- Academic Positions -->
      <div class="content-section">
        <h2 class="section-title">Academic Positions</h2>
        <div class="editable-content">
          <table class="styled-table content-placeholder">
            <tr>
              <td><strong>Assistant Professor</strong></td>
              <td>Department of CE, GMIU, Bhavnagar, Gujarat, June 2025 – Present</td>
            </tr>
            <tr>
              <td><strong>Chief Editor</strong></td>
              <td>India Independent Philosophical Journal, 2025 – Present</td>
            </tr>
            <tr>
              <td><strong>Project Manager</strong></td>
              <td>India Development Foundation, Oct 2024 – June 2025</td>
            </tr>
            <tr>
              <td><strong>Research Scholar</strong></td>
              <td>DAV PG College, Kanpur, 2019-2024</td>
            </tr>
            <tr>
              <td><strong>Trainer</strong></td>
              <td>Personality Development & Soft Skills, 2019-2024</td>
            </tr>
          </table>
        </div>
      </div>

      <!-- Awards & Recognition -->
      <div class="content-section">
        <h2 class="section-title">Awards & Recognition</h2>
        <div class="editable-content">
          <ul class="styled-list content-placeholder">
            <li>ICPR Junior Research Fellowship (JRF)</li>
            <li>UGC-NET Qualified - 2022 and 2024</li>
            <li>Topped Ph.D. Entrance Examination - 2019</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Editorial Philosophy Section -->
    <div class="content-section">
      <h2 class="section-title">Editorial Philosophy</h2>
      <div class="editable-content content-placeholder text-justify">
        <p>
          Philosophy must transcend academic boundaries to engage with human,
          social, and technological realities.
        </p>
        <p>
          As Chief Editor, Dr. Trivedi envisions the India Independent
          Philosophical Journal as a platform where classical Indian wisdom
          dialogues with global thought systems. The editorial ethos
          emphasizes:
        </p>
        • Rigor, originality, and philosophical depth. <br />
        • Ethical research and academic transparency. <br />
        • Inclusivity—encouraging both established scholars and emerging
        researchers. <br />
        • Interdisciplinary inquiry connecting philosophy with education, AI,
        consciousness, and sustainability.
      </div>
    </div>

    <!-- Message to Authors -->
    <div class="content-section">
      <h2 class="section-title">Message to Contributors</h2>
      <div class="editable-content content-placeholder text-justify">
        <p>
          <strong>“जातस्य हि ध्रुवो मृत्युर्ध्रुवं जन्म मृतस्य च ।
            तस्मादपरिहार्येऽर्थे न त्वं शोचितुमर्हसि”</strong><br /><br />
        <p>“To understand the above verse, I can say Philosophy is not merely
          an academic exercise—it is a conscious movement to know the truth
          and reach to liberation. Through this journal, we invite scholars to
          explore ideas that challenge conventions, illuminate reality, and
          cultivate wisdom. Let us together build a community of thought that
          is rooted in Indian traditions yet open to the world.” </p><br>
        <b>– Dr.Dhananjay Trivedi</b><br>
        Chief Editor, India Independent Philosophical Journal <br>
        Assistant Professor, Gyanmanjari Innovative University,
        Bhavnagar, Gujarat
        </p>
      </div>
    </div>

    <!-- Download CV Section -->
    <div class="content-section" style="text-align: center">
      <h2 class="section-title">Curriculum Vitae</h2>
      <p>
        Download the complete academic curriculum vitae for detailed
        information.
      </p>
      <a href="assets/N Dr. Assiatant prof- Dhananjay.pdf" class="download-cv-btn">Download CV</a>
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