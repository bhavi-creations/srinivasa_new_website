<?php
include './db.connection/db_connection.php';

$pdf_sql = "SELECT title, pdf_path FROM pdf_uploads";
$pdf_result = $conn->query($pdf_sql);
?>

<?php include 'header.php' ; ?>





  <section class="news_letter_1_hero ">
    <div class="container">
      <div class="news_letter_1_breadcrumb">
        <i class="fas fa-home me-2"></i> Home
        <i class="fas fa-chevron-right mx-2"></i> <b>Newsletter</b>
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
 <main id="main">
    <section id="contact" class="contact">
        <div class="container">
            <div class="section-title">
                <h2>News Letter</h2>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                if ($pdf_result->num_rows > 0) {
                    while ($pdf_row = $pdf_result->fetch_assoc()) {
                        $pdf_filename = trim($pdf_row['pdf_path']); // Remove extra spaces
                        $pdf_path = "admin/uploads/pdf/" . $pdf_filename; // Construct correct path

                        // Check if the file exists before displaying
                        if (!empty($pdf_filename) && file_exists(__DIR__ . "/$pdf_path")) {
                            echo '<div class="col-12 col-md-4 my-2">';
                            echo '<div class="pdf-container">';
                            echo '<p class="text-center mt-3 " style="font-size: 20px; font-family: Poppins, sans-serif; font-weight: 600; color:#c97800;">'
                                . htmlspecialchars($pdf_row['title']) .
                                '</p>';

                            echo '<embed src="' . $pdf_path . '" type="application/pdf" width="100%" height="400px" />';
                            echo '<br>';
                            echo '<div class="d-flex justify-content-center">';
                            echo '<a href="' . $pdf_path . '" class="btn btn-success mt-3" target="_blank" style="color:#ffffff; background:#c97800;">Open PDF</a>';
                            echo '</div>';                            echo '</div>';
                            echo '</div>';
                        } else {
                            echo "<p class='text-danger'>PDF not found: $pdf_filename</p>";
                        }
                    }
                } else {
                    echo "<p class='text-danger'>No PDF files found.</p>";
                }
                ?>
            </div>
        </div>
    </section>
</main> 













  <section class="news_letter_1_section">
    <div class="container">
      <!-- <div class="row g-4 align-items-center">
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
      </div> -->

     <div class="service_section_cta">
            <div class="row align-items-center g-4">
                <div class="col-lg-3 d-flex align-items-center gap-3">
                    <!-- <div class="service_section_cta_icon"><i class="bi bi-calendar2-check"></i></div> -->
                    <div>
                        <div class="service_section_cta_title">Ready for a Healthier Smile?</div>
                        <small>Book your appointment today and experience the difference.</small>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-md-3 col-6 service_section_cta_feature">
                          <i class="fas fa-stethoscope"></i>
                          <p>Expert<br>Doctors</p>
                        </div>
                        <div class="col-md-3 col-6 service_section_cta_feature">
                            <i class="bi bi-cpu"></i>
                            <p>Advanced<br>Technology</p>
                        </div>
                        <div class="col-md-3 col-6 service_section_cta_feature">
                            <i class="bi bi-heart-pulse"></i>
                            <p>Painless<br>Treatment</p>
                        </div>
                        <div class="col-md-3 col-6 service_section_cta_feature">
                            <i class="bi bi-emoji-smile"></i>
                            <p>Comfortable<br>Environment</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <a href="Appointment-Srinivasa-Dental-Hospital.php">
                        <button class="service_section_btn_gold w-100 mb-3">
                            BOOK APPOINTMENT
                            <!-- <i class="bi bi-arrow-right ms-2"></i> -->
                        </button></a>

                    <a href="Contact-Srinivasa-Multispeciality-Dental-Hospital.php">
                        <button class="service_section_btn_outline w-100">
                            <i class="bi bi-telephone me-2"></i> CALL US NOW
                        </button>
                    </a>
                </div>
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
                <h4>Monthly</h4><small>News Letter Updates</small>
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

  <?php include 'footer.php'; ?>