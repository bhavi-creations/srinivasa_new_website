<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clear Aligners</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --clear_aligners_dark: #001634;
            --clear_aligners_blue: #00295f;
            --clear_aligners_gold: #d99a32;
            --clear_aligners_text: #071d3a;
            --clear_aligners_light: #f7fbff;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            color: var(--clear_aligners_text);
            background: #fff;
        }

        .clear_aligners_navbar {
            background: linear-gradient(90deg, #001634, #00295f);
            padding: 18px 0;
        }

        .clear_aligners_logo {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            line-height: 1;
            text-decoration: none;
        }

        .clear_aligners_logo span {
            display: block;
            font-size: 13px;
            letter-spacing: 5px;
            color: #fff;
        }

        .clear_aligners_navbar .nav-link {
            color: #fff !important;
            font-weight: 700;
            font-size: 13px;
            margin: 0 13px;
            position: relative;
        }

        .clear_aligners_navbar .nav-link.active {
            color: #f5b041 !important;
        }

        .clear_aligners_navbar .nav-link.active::after {
            content: "";
            position: absolute;
            left: 13px;
            right: 13px;
            bottom: -12px;
            height: 2px;
            background: var(--clear_aligners_gold);
        }

        .clear_aligners_btn_gold {
            background: linear-gradient(135deg, #f8d58b, #c98b2c);
            border: 0;
            color: #061936;
            padding: 13px 25px;
            border-radius: 8px;
            font-weight: 800;
        }

        .clear_aligners_btn_blue {
            background: linear-gradient(90deg, #001634, #00295f);
            color: #fff;
            border: 0;
            padding: 14px 28px;
            border-radius: 6px;
            font-weight: 800;
        }

        .clear_aligners_btn_outline {
            background: #fff;
            color: #071d3a;
            border: 1px solid #d99a32;
            padding: 14px 28px;
            border-radius: 6px;
            font-weight: 800;
        }

        .clear_aligners_hero {
            background:
                linear-gradient(90deg, #fff 0%, #fff 42%, rgba(255, 255, 255, .05) 100%),
                url("https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=1500&q=80");
            background-size: cover;
            background-position: center right;
            padding: 35px 0 60px;
            position: relative;
        }

        .clear_aligners_breadcrumb {
            font-size: 13px;
            margin-bottom: 35px;
            color: #071d3a;
        }

        .clear_aligners_hero_title {
            font-family: Georgia, serif;
            font-size: 48px;
            font-weight: 800;
            color: #071d3a;
            margin-bottom: 15px;
        }

        .clear_aligners_hero_subtitle {
            font-family: Georgia, serif;
            font-size: 32px;
            font-weight: 800;
            color: #c98422;
            max-width: 520px;
            line-height: 1.3;
        }

        .clear_aligners_hero_text {
            max-width: 520px;
            line-height: 1.8;
            margin: 22px 0;
        }

        .clear_aligners_hero_features {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            margin: 30px 0;
        }

        .clear_aligners_hero_feature {
            text-align: center;
            border-right: 1px solid #dfe8f5;
            padding-right: 30px;
            font-size: 13px;
            font-weight: 800;
        }

        .clear_aligners_hero_feature:last-child {
            border-right: 0;
        }

        .clear_aligners_hero_feature i {
            display: block;
            font-size: 34px;
            color: #001f4f;
            margin-bottom: 8px;
        }

        .clear_aligners_video_box {
            position: absolute;
            right: 60px;
            bottom: 60px;
            width: 260px;
            background: linear-gradient(135deg, #001634, #00295f);
            color: #fff;
            border-radius: 14px;
            padding: 32px;
        }

        .clear_aligners_play {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 1px solid #d99a32;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            margin-bottom: 15px;
        }

        .clear_aligners_section {
            padding: 35px 0;
        }

        .clear_aligners_heading {
            font-family: Georgia, serif;
            font-size: 30px;
            font-weight: 800;
            text-align: center;
            margin-bottom: 28px;
        }

        .clear_aligners_heading::before,
        .clear_aligners_heading::after {
            content: "—";
            color: #d99a32;
            margin: 0 18px;
        }

        .clear_aligners_choose_card {
            border: 1px solid #e2eaf5;
            border-radius: 10px;
            padding: 25px 18px;
            text-align: center;
            height: 100%;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .04);
            background: #fff;
        }

        .clear_aligners_icon {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            background: #eef5ff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            color: #00295f;
            font-size: 32px;
        }

        .clear_aligners_choose_card h5 {
            font-size: 15px;
            font-weight: 800;
            line-height: 1.5;
        }

        .clear_aligners_process_card {
            border: 1px solid #e2eaf5;
            border-radius: 10px;
            padding: 25px 16px;
            text-align: center;
            height: 100%;
            position: relative;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .04);
        }

        .clear_aligners_process_number {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: #003b8f;
            color: #fff;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 13px;
        }

        .clear_aligners_process_card h5 {
            font-weight: 800;
            font-size: 15px;
        }

        .clear_aligners_process_card p {
            font-size: 13px;
            line-height: 1.6;
        }

        .clear_aligners_info_card {
            border: 1px solid #e2eaf5;
            border-radius: 10px;
            padding: 28px;
            height: 100%;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .04);
            background: #fff;
        }

        .clear_aligners_info_dark {
            background: linear-gradient(135deg, #001634, #00295f);
            color: #fff;
        }

        .clear_aligners_info_card h3 {
            font-family: Georgia, serif;
            font-size: 22px;
            font-weight: 800;
            margin-bottom: 20px;
        }

        .clear_aligners_info_card ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .clear_aligners_info_card li {
            margin-bottom: 13px;
            font-size: 14px;
            line-height: 1.6;
        }

        .clear_aligners_info_card li i {
            color: #d99a32;
            margin-right: 8px;
        }

        .clear_aligners_before_after {
            display: flex;
            gap: 25px;
            justify-content: center;
            align-items: center;
        }

        .clear_aligners_before_after img {
            width: 45%;
            height: 130px;
            object-fit: cover;
            border-radius: 8px;
        }

        .clear_aligners_ba_label {
            display: flex;
            justify-content: center;
            gap: 130px;
            margin-top: 12px;
            font-size: 12px;
            font-weight: 800;
        }

        .clear_aligners_ba_label span {
            background: #001634;
            color: #fff;
            padding: 6px 14px;
            border-radius: 5px;
        }

        .clear_aligners_steps li {
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .clear_aligners_steps strong {
            min-width: 28px;
            height: 28px;
            background: #003b8f;
            color: #fff;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
        }

        .clear_aligners_faq_card {
            border: 1px solid #e2eaf5;
            border-radius: 10px;
            padding: 22px 25px;
            height: 100%;
            box-shadow: 0 8px 25px rgba(0, 0, 0, .04);
        }

        .clear_aligners_faq_card h5 {
            font-size: 16px;
            font-weight: 800;
            display: flex;
            justify-content: space-between;
        }

        .clear_aligners_faq_card p {
            font-size: 14px;
            margin-bottom: 0;
            line-height: 1.7;
        }

        .clear_aligners_cta {
            background: linear-gradient(90deg, #001634, #00295f);
            color: #fff;
            border-radius: 14px;
            padding: 28px 35px;
            margin-top: 25px;
        }

        .clear_aligners_cta_icon {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f8d58b, #c98b2c);
            color: #061936;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 35px;
        }

        .clear_aligners_cta h3 {
            font-family: Georgia, serif;
            font-weight: 800;
        }

        .clear_aligners_footer {
            background: linear-gradient(90deg, #001634, #00295f);
            color: #fff;
            padding: 45px 0 20px;
        }

        .clear_aligners_footer h5 {
            font-weight: 800;
            margin-bottom: 20px;
            font-size: 16px;
        }

        .clear_aligners_footer a {
            display: block;
            color: #dbe7ff;
            text-decoration: none;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .clear_aligners_footer p {
            color: #dbe7ff;
            font-size: 14px;
            line-height: 1.7;
        }

        .clear_aligners_social a {
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

        .clear_aligners_gallery {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 8px;
        }

        .clear_aligners_gallery img {
            width: 100%;
            height: 75px;
            object-fit: cover;
            border-radius: 8px;
        }

        .clear_aligners_footer_bottom {
            margin-top: 30px;
            padding-top: 20px;
            color: #dbe7ff;
            font-size: 14px;
        }

        @media(max-width:991px) {
            .clear_aligners_hero_title {
                font-size: 38px;
            }

            .clear_aligners_hero_subtitle {
                font-size: 26px;
            }

            .clear_aligners_video_box {
                position: static;
                margin-top: 25px;
                width: 100%;
            }

            .clear_aligners_hero_feature {
                border-right: 0;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg clear_aligners_navbar">
        <div class="container">
            <a class="navbar-brand clear_aligners_logo" href="#">
                🦷 SRINIVASA <span>DENTAL</span>
            </a>

            <button class="navbar-toggler bg-light" data-bs-toggle="collapse" data-bs-target="#clear_aligners_menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="clear_aligners_menu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">ABOUT US</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">SERVICES <i class="bi bi-chevron-down ms-1"></i></a></li>
                    <li class="nav-item"><a class="nav-link" href="#">DOCTORS</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">GALLERY</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">BLOG</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">CONTACT</a></li>
                </ul>

                <button class="clear_aligners_btn_gold">
                    <i class="bi bi-calendar-event me-2"></i> BOOK APPOINTMENT
                </button>
            </div>
        </div>
    </nav>

    <section class="clear_aligners_hero">
        <div class="container">
            <div class="clear_aligners_breadcrumb">
                <i class="bi bi-house-door me-2"></i> Home <i class="bi bi-chevron-right mx-2"></i> Services <i class="bi bi-chevron-right mx-2"></i> <b>Clear Aligners</b>
            </div>

            <h1 class="clear_aligners_hero_title">CLEAR ALIGNERS</h1>
            <h2 class="clear_aligners_hero_subtitle">Straighten Your Smile, Discreetly & Comfortably.</h2>
            <p class="clear_aligners_hero_text">
                Clear aligners are custom-made, transparent trays that gently move your teeth into the right position – without braces or wires.
            </p>

            <div class="clear_aligners_hero_features">
                <div class="clear_aligners_hero_feature"><i class="bi bi-lips"></i>Virtually<br>Invisible</div>
                <div class="clear_aligners_hero_feature"><i class="bi bi-emoji-smile"></i>Comfortable<br>& Removable</div>
                <div class="clear_aligners_hero_feature"><i class="bi bi-calendar3"></i>Fewer Dental<br>Visits</div>
                <div class="clear_aligners_hero_feature"><i class="bi bi-shield-check"></i>Safe &<br>Effective</div>
            </div>

            <button class="clear_aligners_btn_blue me-3">
                BOOK APPOINTMENT <i class="bi bi-calendar-event ms-2"></i>
            </button>
            <button class="clear_aligners_btn_outline">
                <i class="bi bi-telephone me-2"></i> CALL US NOW
            </button>

            <div class="clear_aligners_video_box">
                <div class="clear_aligners_play"><i class="bi bi-play-fill"></i></div>
                <h5>HOW IT WORKS</h5>
                <p class="mb-0">Watch our video to see how clear aligners work and transform your smile.</p>
            </div>
        </div>
    </section>

    <section class="clear_aligners_section">
        <div class="container">
            <h2 class="clear_aligners_heading">Why Choose Clear Aligners?</h2>

            <div class="row g-3">
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="clear_aligners_choose_card">
                        <div class="clear_aligners_icon"><i class="bi bi-heart-pulse"></i></div>
                        <h5>Nearly invisible – no one will notice</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="clear_aligners_choose_card">
                        <div class="clear_aligners_icon"><i class="bi bi-heart-pulse"></i></div>
                        <h5>Removable – eat, drink & brush with ease</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="clear_aligners_choose_card">
                        <div class="clear_aligners_icon"><i class="bi bi-scissors"></i></div>
                        <h5>Smooth & comfortable – no metal or wires</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="clear_aligners_choose_card">
                        <div class="clear_aligners_icon"><i class="bi bi-person-badge"></i></div>
                        <h5>Customized for precise results</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="clear_aligners_choose_card">
                        <div class="clear_aligners_icon"><i class="bi bi-calendar-check"></i></div>
                        <h5>Fewer appointments & more convenience</h5>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="clear_aligners_choose_card">
                        <div class="clear_aligners_icon"><i class="bi bi-heart-pulse"></i></div>
                        <h5>Effective for teens & adults</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="clear_aligners_section pt-0">
        <div class="container">
            <h2 class="clear_aligners_heading">The Clear Aligner Process</h2>

            <div class="row g-3">
                <div class="col-lg-2 col-md-4">
                    <div class="clear_aligners_process_card"><span class="clear_aligners_process_number">01</span>
                        <div class="clear_aligners_icon"><i class="bi bi-search-heart"></i></div>
                        <h5>Consultation</h5>
                        <p>We evaluate your smile and discuss your goals.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="clear_aligners_process_card"><span class="clear_aligners_process_number">02</span>
                        <div class="clear_aligners_icon"><i class="bi bi-display"></i></div>
                        <h5>Digital Scan</h5>
                        <p>We take a 3D scan of your teeth – no messy impressions.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="clear_aligners_process_card"><span class="clear_aligners_process_number">03</span>
                        <div class="clear_aligners_icon"><i class="bi bi-display"></i></div>
                        <h5>Treatment Plan</h5>
                        <p>A customized plan is created to show your smile journey.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="clear_aligners_process_card"><span class="clear_aligners_process_number">04</span>
                        <div class="clear_aligners_icon"><i class="bi bi-lips"></i></div>
                        <h5>Aligners Delivery</h5>
                        <p>You receive your aligners and wear them as directed.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="clear_aligners_process_card"><span class="clear_aligners_process_number">05</span>
                        <div class="clear_aligners_icon"><i class="bi bi-calendar3"></i></div>
                        <h5>Progress Check</h5>
                        <p>Regular check-ups to monitor your progress.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4">
                    <div class="clear_aligners_process_card"><span class="clear_aligners_process_number">06</span>
                        <div class="clear_aligners_icon"><i class="bi bi-stars"></i></div>
                        <h5>Beautiful Results</h5>
                        <p>Enjoy a straighter, healthier and more confident smile!</p>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-3">
                <div class="col-lg-3">
                    <div class="clear_aligners_info_card clear_aligners_info_dark">
                        <h3>Who Can Benefit?</h3>
                        <ul>
                            <li><i class="bi bi-check-circle-fill"></i>Crowded or crooked teeth</li>
                            <li><i class="bi bi-check-circle-fill"></i>Gaps between teeth</li>
                            <li><i class="bi bi-check-circle-fill"></i>Overbite, underbite & crossbite</li>
                            <li><i class="bi bi-check-circle-fill"></i>Mild to moderate bite issues</li>
                            <li><i class="bi bi-check-circle-fill"></i>Teens and adults looking for a discreet solution</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="clear_aligners_info_card">
                        <h3>Before & After</h3>
                        <div class="clear_aligners_before_after">
                            <img src="https://images.unsplash.com/photo-1609840114035-3c981b782dfe?auto=format&fit=crop&w=500&q=80">
                            <img src="https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=500&q=80">
                        </div>
                        <div class="clear_aligners_ba_label">
                            <span>BEFORE</span>
                            <span>AFTER</span>
                        </div>
                        <p class="text-center mt-3 mb-0"><small>*Results may vary from person to person.</small></p>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="clear_aligners_info_card">
                        <h3>How It Works</h3>
                        <ul class="clear_aligners_steps">
                            <li><strong>1</strong> Wear each aligner for 20–22 hours/day</li>
                            <li><strong>2</strong> Change to the next aligner every 1–2 weeks</li>
                            <li><strong>3</strong> Gradual movements bring your teeth into the right position</li>
                            <li><strong>4</strong> Complete the series for a perfect smile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="clear_aligners_section pt-0">
        <div class="container">
            <h2 class="clear_aligners_heading">Frequently Asked Questions</h2>

            <div class="row g-3">
                <div class="col-lg-4">
                    <div class="clear_aligners_faq_card">
                        <h5>Are clear aligners visible? <i class="bi bi-chevron-down"></i></h5>
                        <p>No, clear aligners are nearly invisible and very discreet.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="clear_aligners_faq_card">
                        <h5>Can I eat and drink with aligners? <i class="bi bi-chevron-down"></i></h5>
                        <p>You can remove them while eating or drinking anything except water.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="clear_aligners_faq_card">
                        <h5>How long does treatment take? <i class="bi bi-chevron-down"></i></h5>
                        <p>Treatment duration varies, but most cases are completed in 6 to 18 months.</p>
                    </div>
                </div>
            </div>

            <div class="clear_aligners_cta">
                <div class="row align-items-center g-3">
                    <div class="col-lg-1">
                        <div class="clear_aligners_cta_icon"><i class="bi bi-calendar3"></i></div>
                    </div>
                    <div class="col-lg-6">
                        <h3>Ready to Start Your Smile Journey?</h3>
                        <p class="mb-0">Book your consultation today and take the first step towards a confident, beautiful smile.</p>
                    </div>
                    <div class="col-lg-5 text-lg-end">
                        <button class="clear_aligners_btn_gold me-3">
                            <i class="bi bi-calendar-event me-2"></i> BOOK APPOINTMENT
                        </button>
                        <button class="clear_aligners_btn_outline">
                            <i class="bi bi-telephone me-2"></i> CALL US NOW
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="clear_aligners_footer">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3">
                    <div class="clear_aligners_logo mb-3">🦷 SRINIVASA <span>DENTAL</span></div>
                    <p>At Srinivasa Dental, we are dedicated to providing world-class dental care with compassion and excellence.</p>
                    <div class="clear_aligners_social">
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
                    <a href="#">Contact Us</a>
                </div>

                <div class="col-lg-2">
                    <h5>OUR SERVICES</h5>
                    <a href="#">General Dentistry</a>
                    <a href="#">Dental Implants</a>
                    <a href="#">Cosmetic Dentistry</a>
                    <a href="#">Orthodontics</a>
                    <a href="#">Pediatric Dentistry</a>
                    <a href="#">Teeth Whitening</a>
                    <a href="#">Clear Aligners</a>
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
                    <div class="clear_aligners_gallery">
                        <img src="https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=300&q=80">
                        <img src="https://images.unsplash.com/photo-1629909615184-74f495363b67?auto=format&fit=crop&w=300&q=80">
                        <img src="https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=300&q=80">
                        <img src="https://images.unsplash.com/photo-1588776814546-1ffcf47267a5?auto=format&fit=crop&w=300&q=80">
                        <img src="https://images.unsplash.com/photo-1598256989800-fe5f95da9787?auto=format&fit=crop&w=300&q=80">
                        <img src="https://images.unsplash.com/photo-1593022356769-11f762e25ed9?auto=format&fit=crop&w=300&q=80">
                    </div>
                </div>
            </div>

            <div class="clear_aligners_footer_bottom d-flex justify-content-between flex-wrap">
                <div>© 2024 Srinivasa Dental. All Rights Reserved.</div>
                <div>Privacy Policy &nbsp; | &nbsp; Terms & Conditions</div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>