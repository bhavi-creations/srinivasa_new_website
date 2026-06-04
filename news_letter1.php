<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Newsletter</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    :root {
      --news_letter_1_dark: #001634;
      --news_letter_1_blue: #00295f;
      --news_letter_1_gold: #d99a32;
      --news_letter_1_text: #071d3a;
      --news_letter_1_light: #f7fbff;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      color: var(--news_letter_1_text);
      background: #fff;
    }

    .news_letter_1_navbar {
      background: linear-gradient(90deg, #001634, #00295f);
      padding: 18px 0;
    }

    .news_letter_1_logo {
      color: #fff;
      font-size: 28px;
      font-weight: 700;
      line-height: 1;
      text-decoration: none;
    }

    .news_letter_1_logo span {
      display: block;
      font-size: 13px;
      letter-spacing: 5px;
      color: #fff;
    }

    .news_letter_1_navbar .nav-link {
      color: #fff !important;
      font-weight: 700;
      font-size: 13px;
      margin: 0 13px;
    }

    .news_letter_1_btn_gold {
      background: linear-gradient(135deg, #f8d58b, #c98b2c);
      border: 0;
      color: #061936;
      padding: 13px 25px;
      border-radius: 8px;
      font-weight: 800;
    }

    .news_letter_1_hero {
      background:
        linear-gradient(90deg, #fff 0%, #fff 42%, rgba(255, 255, 255, .18) 100%),
        url("https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&w=1500&q=80");
      background-size: cover;
      background-position: center right;
      padding: 35px 0 70px;
    }

    .news_letter_1_breadcrumb {
      font-size: 13px;
      margin-bottom: 35px;
    }

    .news_letter_1_hero_title {
      font-family: Georgia, serif;
      font-size: 48px;
      font-weight: 800;
      line-height: 1.2;
      color: #071d3a;
    }

    .news_letter_1_hero_title span {
      color: #c97800;
    }

    .news_letter_1_hero_line {
      width: 35px;
      height: 2px;
      background: #d99a32;
      margin: 22px 0;
    }

    .news_letter_1_hero_text {
      max-width: 520px;
      line-height: 1.9;
      font-size: 17px;
    }

    .news_letter_1_section {
      padding: 35px 0;
    }

    .news_letter_1_heading {
      text-align: center;
      font-family: Georgia, serif;
      font-weight: 800;
      font-size: 24px;
      margin-bottom: 32px;
    }

    .news_letter_1_heading::before,
    .news_letter_1_heading::after {
      content: "—";
      color: #d99a32;
      margin: 0 18px;
    }

    .news_letter_1_subscribe_item {
      text-align: center;
      padding: 15px 20px;
      border-right: 1px solid #dfe8f5;
      height: 100%;
    }

    .news_letter_1_subscribe_item:last-child {
      border-right: 0;
    }

    .news_letter_1_subscribe_item i {
      font-size: 44px;
      color: #001f4f;
      margin-bottom: 18px;
    }

    .news_letter_1_subscribe_item h5 {
      font-size: 15px;
      font-weight: 800;
      margin-bottom: 10px;
    }

    .news_letter_1_subscribe_item p {
      font-size: 14px;
      line-height: 1.7;
      margin: 0;
    }

    .news_letter_1_get_box {
      background: #f4f7fb;
      border-radius: 12px;
      padding: 30px;
      min-height: 190px;
      background:
        linear-gradient(90deg, #f4f7fb 0%, #f4f7fb 65%, rgba(244, 247, 251, .2) 100%),
        url("https://randomuser.me/api/portraits/women/68.jpg");
      background-size: 190px;
      background-repeat: no-repeat;
      background-position: right bottom;
    }

    .news_letter_1_get_list {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .news_letter_1_get_list li {
      margin-bottom: 14px;
      font-size: 16px;
    }

    .news_letter_1_get_list i {
      color: #d99a32;
      margin-right: 10px;
    }

    .news_letter_1_join {
      background: linear-gradient(90deg, #001634, #00295f);
      border-radius: 12px;
      padding: 30px;
      color: #fff;
      margin-top: 30px;
    }

    .news_letter_1_join_icon {
      width: 95px;
      height: 95px;
      border-radius: 50%;
      border: 2px solid #d99a32;
      color: #d99a32;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 45px;
    }

    .news_letter_1_join h3 {
      font-family: Georgia, serif;
      font-weight: 800;
      font-size: 28px;
      margin-bottom: 8px;
    }

    .news_letter_1_join h3 span {
      color: #d99a32;
    }

    .news_letter_1_input_group {
      position: relative;
    }

    .news_letter_1_input_group i {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      color: #52637a;
      z-index: 2;
    }

    .news_letter_1_input {
      width: 100%;
      height: 55px;
      border: 0;
      border-radius: 8px;
      padding: 0 15px 0 45px;
      outline: 0;
    }

    .news_letter_1_secure {
      text-align: center;
      font-size: 13px;
      color: #dbe7ff;
      margin-top: 18px;
    }

    .news_letter_1_stats {
      margin-top: 18px;
      background: #f8fbff;
      border: 1px solid #dfe8f5;
      border-radius: 10px;
      padding: 18px 0;
    }

    .news_letter_1_stat_item {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 18px;
      border-right: 1px solid #dfe8f5;
      height: 100%;
    }

    .news_letter_1_stat_item:last-child {
      border-right: 0;
    }

    .news_letter_1_stat_item i {
      font-size: 38px;
      color: #001f4f;
    }

    .news_letter_1_stat_item h4 {
      margin: 0;
      font-weight: 900;
      font-size: 24px;
    }

    .news_letter_1_footer {
      background: linear-gradient(90deg, #001634, #00295f);
      color: #fff;
      padding: 45px 0 20px;
    }

    .news_letter_1_footer h5 {
      font-weight: 800;
      margin-bottom: 20px;
      font-size: 16px;
      color: #d99a32;
    }

    .news_letter_1_footer a {
      display: block;
      color: #dbe7ff;
      text-decoration: none;
      margin-bottom: 10px;
      font-size: 14px;
    }

    .news_letter_1_footer p {
      color: #dbe7ff;
      font-size: 14px;
      line-height: 1.7;
    }

    .news_letter_1_social a {
      display: inline-flex;
      width: 38px;
      height: 38px;
      border: 1px solid #d99a32;
      border-radius: 50%;
      align-items: center;
      justify-content: center;
      margin-right: 8px;
      color: #fff;
    }

    .news_letter_1_gallery {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 8px;
    }

    .news_letter_1_gallery img {
      width: 100%;
      height: 75px;
      object-fit: cover;
      border-radius: 8px;
    }

    .news_letter_1_footer_bottom {
      margin-top: 30px;
      padding-top: 20px;
      color: #dbe7ff;
      font-size: 14px;
    }

    @media(max-width:991px) {
      .news_letter_1_hero_title {
        font-size: 36px;
      }

      .news_letter_1_subscribe_item,
      .news_letter_1_stat_item {
        border-right: 0;
        margin-bottom: 25px;
      }

      .news_letter_1_get_box {
        background-image: none;
      }
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg news_letter_1_navbar">
    <div class="container">
      <a class="navbar-brand news_letter_1_logo" href="#">
        🦷 SRINIVASA <span>DENTAL</span>
      </a>

      <button class="navbar-toggler bg-light" data-bs-toggle="collapse" data-bs-target="#news_letter_1_menu">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="news_letter_1_menu">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
          <li class="nav-item"><a class="nav-link" href="#">ABOUT US</a></li>
          <li class="nav-item"><a class="nav-link" href="#">SERVICES <i class="bi bi-chevron-down ms-1"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="#">DOCTORS</a></li>
          <li class="nav-item"><a class="nav-link" href="#">GALLERY</a></li>
          <li class="nav-item"><a class="nav-link active" href="#">BLOG</a></li>
          <li class="nav-item"><a class="nav-link" href="#">CONTACT</a></li>
        </ul>

        <button class="news_letter_1_btn_gold">
          <i class="bi bi-calendar-event me-2"></i> BOOK APPOINTMENT
        </button>
      </div>
    </div>
  </nav>

  <section class="news_letter_1_hero">
    <div class="container">
      <div class="news_letter_1_breadcrumb">
        <i class="bi bi-house-door me-2"></i> Home
        <i class="bi bi-chevron-right mx-2"></i> <b>Newsletter</b>
      </div>

      <h1 class="news_letter_1_hero_title">
        Stay Informed.<br>
        <span>Stay Ahead in Oral Health.</span>
      </h1>

      <div class="news_letter_1_hero_line"></div>

      <p class="news_letter_1_hero_text">
        Subscribe to our newsletter and get expert dental tips, treatment updates, special offers, and more – straight
        to your inbox.
      </p>
    </div>
  </section>

  <section class="news_letter_1_section">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-lg-6">
          <h2 class="news_letter_1_heading">WHY SUBSCRIBE?</h2>

          <div class="row g-0">
            <div class="col-md-3 col-6">
              <div class="news_letter_1_subscribe_item">
                <i class="bi bi-stars"></i>
                <h5>Expert Dental Tips</h5>
                <p>Simple tips for a healthier smile.</p>
              </div>
            </div>

            <div class="col-md-3 col-6">
              <div class="news_letter_1_subscribe_item">
                <i class="bi bi-bell"></i>
                <h5>Treatment Updates</h5>
                <p>Know about the latest dental technologies and procedures.</p>
              </div>
            </div>

            <div class="col-md-3 col-6">
              <div class="news_letter_1_subscribe_item">
                <i class="bi bi-percent"></i>
                <h5>Exclusive Offers</h5>
                <p>Be the first to know about special offers and discounts.</p>
              </div>
            </div>

            <div class="col-md-3 col-6">
              <div class="news_letter_1_subscribe_item">
                <i class="bi bi-calendar-check"></i>
                <h5>Event & Camp Alerts</h5>
                <p>Stay updated on our dental camps and free check-up events.</p>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-6">
          <h2 class="news_letter_1_heading">WHAT YOU'LL GET</h2>

          <div class="news_letter_1_get_box">
            <ul class="news_letter_1_get_list">
              <li><i class="bi bi-check-circle"></i> Oral care tips & best practices</li>
              <li><i class="bi bi-check-circle"></i> Information about dental treatments</li>
              <li><i class="bi bi-check-circle"></i> Before & after smile transformations</li>
              <li><i class="bi bi-check-circle"></i> Answers to common dental questions</li>
              <li><i class="bi bi-check-circle"></i> Clinic updates, offers & much more!</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="news_letter_1_join">
        <div class="row align-items-center g-4">
          <div class="col-lg-4 d-flex align-items-center gap-4">
            <div class="news_letter_1_join_icon">
              <i class="bi bi-envelope"></i>
            </div>
            <div>
              <h3>Join Our <br><span>Newsletter Community</span></h3>
              <p class="mb-0">We respect your inbox. No spam, only valuable dental insights.</p>
            </div>
          </div>

          <div class="col-lg-3">
            <div class="news_letter_1_input_group">
              <i class="bi bi-person"></i>
              <input type="text" class="news_letter_1_input" placeholder="Your Name">
            </div>
          </div>

          <div class="col-lg-3">
            <div class="news_letter_1_input_group">
              <i class="bi bi-envelope"></i>
              <input type="email" class="news_letter_1_input" placeholder="Your Email Address">
            </div>
          </div>

          <div class="col-lg-2">
            <button class="news_letter_1_btn_gold w-100">SUBSCRIBE NOW</button>
          </div>
        </div>

        <div class="news_letter_1_secure">
          <i class="bi bi-lock"></i> Your information is safe with us. You can unsubscribe anytime.
        </div>
      </div>

      <div class="news_letter_1_stats">
        <div class="row g-3">
          <div class="col-lg-3 col-md-6">
            <div class="news_letter_1_stat_item">
              <i class="bi bi-people"></i>
              <div>
                <h4>5000+</h4><small>Happy Subscribers</small>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="news_letter_1_stat_item">
              <i class="bi bi-envelope"></i>
              <div>
                <h4>Monthly</h4><small>Useful Updates</small>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="news_letter_1_stat_item">
              <i class="bi bi-shield-check"></i>
              <div>
                <h4>Trusted Dental Care</h4><small>15+ Years of Excellence</small>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="news_letter_1_stat_item">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <h4>Your Smile,</h4><small>Our Priority</small>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <footer class="news_letter_1_footer">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-3">
          <div class="news_letter_1_logo mb-3">🦷 SRINIVASA <span>DENTAL</span></div>
          <p>At Srinivasa Dental, we are dedicated to providing world-class dental care with compassion and excellence.
          </p>

          <div class="news_letter_1_social">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
            <a href="#"><i class="bi bi-whatsapp"></i></a>
          </div>
        </div>

        <div class="col-lg-2">
          <h5>QUICK LINKS</h5>
          <a href="#">Home</a>
          <a href="#">About Us</a>
          <a href="#">Services</a>
          <a href="#">Doctors</a>
          <a href="#">Gallery</a>
          <a href="#">Blog</a>
          <a href="#">Contact</a>
        </div>

        <div class="col-lg-2">
          <h5>OUR SERVICES</h5>
          <a href="#">General Dentistry</a>
          <a href="#">Dental Implants</a>
          <a href="#">Cosmetic Dentistry</a>
          <a href="#">Orthodontics</a>
          <a href="#">Pediatric Dentistry</a>
          <a href="#">Teeth Whitening</a>
          <a href="#">Root Canal Treatment</a>
        </div>

        <div class="col-lg-2">
          <h5>CONTACT US</h5>
          <p><i class="bi bi-geo-alt me-2"></i> Plot No. 45, Srinivasa Heights, Main Road, Vizag</p>
          <p><i class="bi bi-telephone me-2"></i> +91 98765 43210</p>
          <p><i class="bi bi-envelope me-2"></i> info@srinivasadental.com</p>
          <p><i class="bi bi-clock me-2"></i> Mon - Sat: 9AM - 8PM</p>
        </div>

        <div class="col-lg-3">
          <h5>CLINIC GALLERY</h5>
          <div class="news_letter_1_gallery">
            <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=300&q=80">
            <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?auto=format&fit=crop&w=300&q=80">
            <img src="https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=300&q=80">
            <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&w=300&q=80">
            <img src="https://images.unsplash.com/photo-1598256989800-fe5f95da9787?auto=format&fit=crop&w=300&q=80">
            <img src="https://images.unsplash.com/photo-1593022356769-11f762e25ed9?auto=format&fit=crop&w=300&q=80">
          </div>
        </div>
      </div>

      <div class="news_letter_1_footer_bottom d-flex justify-content-between flex-wrap">
        <div>© 2024 Srinivasa Dental. All Rights Reserved.</div>
        <div>Privacy Policy &nbsp; | &nbsp; Terms & Conditions</div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>