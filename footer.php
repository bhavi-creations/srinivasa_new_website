<footer class="home_section_footer">
  <div class="container">
    <div class="row g-4">
      <div class="col-lg-3">
        <div class="home_section_logo mb-3">
          <!-- 🦷 SRINIVASA <span>DENTAL</span> -->
          <img src="./assets/img/Srinivasa_new.png" alt=" logo" class="img-fluid" style="max-width: 280px;">


        </div>
        <p>At Srinivasa Dental, we are dedicated to providing world-class dental care with compassion and excellence.</p>
        <div class="home_section_social">
          <a href="https://www.facebook.com/srinivasadentalkakinada/" target="_blank"><i class="bi bi-facebook"></i></a>
          <a href="https://www.instagram.com/srinivasadentalkakinada/" target="_blank"><i class="bi bi-instagram"></i></a>
          <a href="https://www.youtube.com/@srinivasadentalkakinada" target="_blank"><i class="bi bi-youtube"></i></a>
          <a href="https://www.linkedin.com/login/?session_redirect=https%3A%2F%2Fwww.linkedin.com%2Fcompany%2F99449038%2Fadmin%2Fdashboard%2F" target="_blank"><i class="bi bi-whatsapp"></i></a>
        </div>
      </div>

      <div class="col-lg-2 d-md-6 d-none d-md-block ">
        <h5> LINKS</h5>
        <a href="Home.php">Home</a>
        <a href="About-Srinivasa-Multispeciality-Dental-Hospital.php">About Us</a>
        <a href="Services-Srinivasa-Multispeciality-Dental-Hospital.php">Services</a>


        <a href="blogs_srinivasa_multispeciality_dental_hospital.php">Blog</a>
        <a href="news_letter.php"> News Letter</a>
        <a href="Contact-Srinivasa-Multispeciality-Dental-Hospital.php">Contact Us</a>
        <a href="Appointment-Srinivasa-Dental-Hospital.php">Appointment</a>
      </div>

      <!-- <div class="col-lg-2">
        <h5>OUR SERVICES</h5>
        <a href="#">General Dentistry</a>
        <a href="#">Dental Implants</a>
        <a href="#">Cosmetic Dentistry</a>
        <a href="#">Orthodontics</a>
        <a href="#">Pediatric Dentistry</a>
        <a href="#">Root Canal Treatment</a>
      </div> -->

      <div class="col-lg-4 d-md-6">
        <h5>CONTACT US</h5>
        <p><i class="bi bi-geo-alt me-2"></i>
          Beside MRF showroom, opp Vivekananda statue- kulaicheruvu park , Kakinada, Andhra Pradesh 533001</p>
        <p><i class="bi bi-telephone me-2"></i> +919290019948</p>
        <p><i class="bi bi-envelope me-2"></i> srinivasadentalkakinada@gmail.com</p>
        <p><i class="bi bi-clock me-2"></i> Mon - Sat: 9:00 AM - 8:30 PM <br> &nbsp; &nbsp; &nbsp; Sunday: 9:00 AM - 1:00 PM </p>
      </div>

      <!-- <div class="col-lg-3">
        <h5>GALLERY</h5>
        <div class="home_section_gallery">
          <img src="./assets/img/2.png" class="img-fluid">
          <img src="assets\img\3.png" class="img-fluid">
          <img src="assets\img\4.png" class="img-fluid">
          <img src="assets\img\5.png" class="img-fluid">
          <img src="assets\img\6.png" class="img-fluid">
          <img src="assets\img\7.png" class="img-fluid">
        </div>
      </div> -->

      <div class="col-lg-3">
        <h5>GALLERY</h5>

        <div class="footer_gallery_new">

          <img src="./assets/img/2.png" class="footer_gallery_img">
          <img src="./assets/img/3.png" class="footer_gallery_img">
          <img src="./assets/img/4.png" class="footer_gallery_img">
          <img src="./assets/img/5.png" class="footer_gallery_img">
          <img src="./assets/img/6.png" class="footer_gallery_img">
          <img src="./assets/img/7.png" class="footer_gallery_img">

        </div>
      </div>


      <!-- Image Popup -->

      <div class="footer_gallery_popup" id="footerGalleryPopup">

        <span class="footer_gallery_close">&times;</span>

        <img class="footer_gallery_popup_img" id="footerPopupImage">

      </div>









    </div>

    <!-- <div class="home_section_newsletter">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h5><i class="bi bi-envelope me-2"></i> Subscribe to our Newsletter</h5>
          <p class="mb-0">Get updates on dental health tips and exclusive offers.</p>
        </div>
        <div class="col-lg-6">
          <div class="input-group">
            <input class="form-control" placeholder="Enter your email">
            <button class="home_section_btn_gold">SUBSCRIBE</button>
          </div>
        </div>
      </div>
    </div> -->

    <div class="home_section_copyright d-flex justify-content-between flex-wrap">
      <div>© 2026 Srinivasa Dental. All Rights Reserved.</div>
      <div>Privacy Policy &nbsp; | &nbsp; Terms & Conditions</div>
    </div>
  </div>
</footer>

<script>
  const footerImages=document.querySelectorAll(".footer_gallery_img");

const footerPopup=document.getElementById("footerGalleryPopup");

const footerPopupImg=document.getElementById("footerPopupImage");

const footerClose=document.querySelector(".footer_gallery_close");


footerImages.forEach(img=>{

img.addEventListener("click",()=>{

footerPopup.classList.add("active");

footerPopupImg.src=img.src;

});

});


footerClose.addEventListener("click",()=>{

footerPopup.classList.remove("active");

});


footerPopup.addEventListener("click",(e)=>{

if(e.target===footerPopup){

footerPopup.classList.remove("active");

}

});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>