<?php
include './db.connection/db_connection.php';

$blog_input = isset($_GET['id']) ? trim($_GET['id']) : '';

if (empty($blog_input)) {
    echo "<h1 style='text-align:center; margin-top:50px;'>Invalid Blog Request</h1>";
    exit;
}

$stmt = $conn->prepare("
    SELECT 
        id, title, slug, main_content, full_content, 
        title_image, main_image, video, created_at,
        telugu_title, telugu_main_content, telugu_full_content,
        section1_image, service, hashtags, keypoints
    FROM blogs 
    WHERE id = ? OR slug = ?
    LIMIT 1
");

$stmt->bind_param("ss", $blog_input, $blog_input);
$stmt->execute();
$result = $stmt->get_result();
$blog = $result->fetch_assoc();

if (!$blog) {
    echo "<h1 style='text-align:center; margin-top:50px;'>Blog Not Found!</h1>";
    exit;
}

$blog_id = $blog['id'];
$title = $blog['title'];
$main_content = $blog['main_content'];
$full_content = $blog['full_content'];
$main_image = $blog['main_image'];
$video = $blog['video'];
$service = !empty($blog['service']) ? $blog['service'] : 'BLOG';
$date = !empty($blog['created_at']) ? date("M d, Y", strtotime($blog['created_at'])) : date("M d, Y");

$telugu_title = !empty($blog['telugu_title']) ? $blog['telugu_title'] : $title;
$telugu_main_content = !empty($blog['telugu_main_content']) ? $blog['telugu_main_content'] : $main_content;
$telugu_full_content = !empty($blog['telugu_full_content']) ? $blog['telugu_full_content'] : $full_content;

$feature_img = !empty($main_image) 
    ? "./admin/uploads/photos/" . htmlspecialchars($main_image) 
    : "https://images.unsplash.com/photo-1606811971618-4486d14f3f99?auto=format&fit=crop&w=1100&q=80";

$stmt->close();

$likes_count = 0;
$dislikes_count = 0;

$count_stmt = $conn->prepare("SELECT reaction, COUNT(*) as total FROM blog_reactions WHERE blog_id = ? GROUP BY reaction");
$count_stmt->bind_param("i", $blog_id);
$count_stmt->execute();
$res = $count_stmt->get_result();

while ($row = $res->fetch_assoc()) {
    if ($row['reaction'] == 'like') $likes_count = $row['total'];
    if ($row['reaction'] == 'dislike') $dislikes_count = $row['total'];
}
$count_stmt->close();

$popular_sql = "SELECT id, slug, title, main_image, created_at FROM blogs WHERE id != $blog_id ORDER BY created_at DESC LIMIT 4";
$popular_result = $conn->query($popular_sql);

$category_sql = "
    SELECT service, COUNT(*) AS total 
    FROM blogs 
    WHERE service IS NOT NULL AND service != '' 
    GROUP BY service 
    ORDER BY total DESC
";
$category_result = $conn->query($category_sql);

$current_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
?>

<?php include 'header.php'; ?>



<section class="full_blogs_section_main">
  <div class="container">

    <div class="d-flex justify-content-center mb-4">
      <button id="english-btn" class="lang-btn active btn btn-outline-dark">English</button>
      <button id="telugu-btn" class="lang-btn ms-3 btn btn-outline-dark">తెలుగు</button>
    </div>

    <div class="full_blogs_section_breadcrumb">
      <i class="fas fa-home me-2"></i> Home
      <i class="fas fa-chevron-right mx-2"></i> Blog
      <i class="fas fa-chevron-right mx-2"></i>
      <b id="crumb-en"><?= htmlspecialchars($title) ?></b>
      <b id="crumb-te" style="display:none;"><?= htmlspecialchars($telugu_title) ?></b>
    </div>

    <div class="row g-5">
      <div class="col-lg-8">

        <span class="full_blogs_section_badge"><?= htmlspecialchars($service) ?></span>

        <h1 class="full_blogs_section_title">
          <span id="title-en"><?= htmlspecialchars($title) ?></span>
          <span id="title-te" style="display:none;"><?= htmlspecialchars($telugu_title) ?></span>
        </h1>

        <div class="full_blogs_section_meta">
          <span><i class="fas fa-calendar-alt"></i> <?= $date ?></span>
          <span><i class="fas fa-user-edit"></i> Editor</span>
          <span><i class="fas fa-clock"></i> 5 min read</span>
        </div>

        <?php if (!empty($video)): ?>
          <video controls class="full_blogs_section_feature_img">
            <source src="./admin/uploads/videos/<?= htmlspecialchars($video) ?>" type="video/mp4">
          </video>
        <?php else: ?>
          <img class="full_blogs_section_feature_img" src="<?= $feature_img ?>" alt="<?= htmlspecialchars($title) ?>">
        <?php endif; ?>

        <article class="full_blogs_section_article">
          <div id="main-en">
            <?= $main_content ?>
          </div>

          <div id="main-te" style="display:none;">
            <?= $telugu_main_content ?>
          </div>

          <div id="full-en">
            <?= $full_content ?>
          </div>

          <div id="full-te" style="display:none;">
            <?= $telugu_full_content ?>
          </div>
        </article>

        <div class="d-flex justify-content-center vote-section my-4">
          <button id="like-btn" class="btn btn-outline-success me-3">
            👍 Like (<span id="like-count"><?= $likes_count ?></span>)
          </button>
          <button id="dislike-btn" class="btn btn-outline-danger">
            👎 Dislike (<span id="dislike-count"><?= $dislikes_count ?></span>)
          </button>
        </div>

        <div class="full_blogs_section_cta">
          <div class="row align-items-center">
            <div class="col-md-4">
              <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="">
            </div>
            <div class="col-md-8">
              <div class="full_blogs_section_cta_content">
                <h3>Ready to Transform Your Smile?</h3>
                <p>Our expert team is here to help you achieve the smile you've always dreamed of.</p>
                <a href="appointment_srinivasa_dental_hospital.php">
                  <button class="full_blogs_section_btn_blue">
                    <i class="bi bi-calendar-event me-2"></i> BOOK AN APPOINTMENT
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-4">

        <div class="full_blogs_section_sidebar_box">
          <h3>About the Author</h3>
          <div class="full_blogs_section_author">
            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
            <div>
              <h5>Dr. Srikanth R.</h5>
              <small>MDS - Cosmetic Dentistry</small><br>
              <small>15+ Years Experience</small>
            </div>
          </div>
          <p>Dr. Srikanth is a cosmetic dentistry specialist with a passion for creating beautiful, natural-looking smiles.</p>
          <div class="full_blogs_section_social_round">
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="full_blogs_section_sidebar_box full_blogs_section_share_box">
          <h3>Share This Article</h3>
          <div class="full_blogs_section_social_round">
            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($current_url) ?>"><i class="bi bi-facebook"></i></a>
            <a target="_blank" href="https://twitter.com/intent/tweet?url=<?= urlencode($current_url) ?>&text=<?= urlencode($title) ?>"><i class="bi bi-twitter-x"></i></a>
            <a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=<?= urlencode($current_url) ?>"><i class="bi bi-linkedin"></i></a>
            <a target="_blank" href="https://api.whatsapp.com/send?text=<?= urlencode($title . ' ' . $current_url) ?>"><i class="bi bi-whatsapp"></i></a>
            <a href="mailto:?subject=<?= urlencode($title) ?>&body=<?= urlencode($current_url) ?>"><i class="bi bi-envelope"></i></a>
          </div>
        </div>

        <div class="full_blogs_section_sidebar_box">
          <h3>Popular Posts</h3>

          <?php if ($popular_result && $popular_result->num_rows > 0): ?>
            <?php while ($p = $popular_result->fetch_assoc()): 
              $p_img = !empty($p['main_image']) 
                ? "./admin/uploads/photos/" . htmlspecialchars($p['main_image']) 
                : "default_image.png";

              $p_url = "fullblog.php?id=" . (!empty($p['slug']) ? urlencode($p['slug']) : $p['id']);
              $p_date = date("M d, Y", strtotime($p['created_at']));
            ?>
              <div class="full_blogs_section_popular_item" onclick="window.location.href='<?= $p_url ?>'" style="cursor:pointer;">
                <img src="<?= $p_img ?>" alt="">
                <div>
                  <h5><?= htmlspecialchars($p['title']) ?></h5>
                  <small><i class="bi bi-clock"></i> <?= $p_date ?></small>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <p>No popular posts found.</p>
          <?php endif; ?>

          <a href="blogs.php">
            <button class="full_blogs_section_outline_btn">VIEW ALL POSTS</button>
          </a>
        </div>

        <div class="full_blogs_section_sidebar_box">
          <h3>Categories</h3>

          <?php if ($category_result && $category_result->num_rows > 0): ?>
            <?php while ($cat = $category_result->fetch_assoc()): ?>
              <a href="blogs.php?service=<?= urlencode($cat['service']) ?>" style="text-decoration:none;">
                <div class="full_blogs_section_category_item">
                  <span><?= htmlspecialchars($cat['service']) ?></span>
                  <span><?= $cat['total'] ?></span>
                </div>
              </a>
            <?php endwhile; ?>
          <?php else: ?>
            <p>No categories found.</p>
          <?php endif; ?>

          <hr>

          <a href="blogs.php" class="full_blogs_section_read_more">
            VIEW ALL CATEGORIES <i class="bi bi-arrow-right ms-1"></i>
          </a>
        </div>

      </div>
    </div>
  </div>
</section>

<script>
document.getElementById("english-btn").addEventListener("click", function () {
  document.getElementById("title-en").style.display = "inline";
  document.getElementById("main-en").style.display = "block";
  document.getElementById("full-en").style.display = "block";
  document.getElementById("crumb-en").style.display = "inline";

  document.getElementById("title-te").style.display = "none";
  document.getElementById("main-te").style.display = "none";
  document.getElementById("full-te").style.display = "none";
  document.getElementById("crumb-te").style.display = "none";

  this.classList.add("active");
  document.getElementById("telugu-btn").classList.remove("active");
});

document.getElementById("telugu-btn").addEventListener("click", function () {
  document.getElementById("title-en").style.display = "none";
  document.getElementById("main-en").style.display = "none";
  document.getElementById("full-en").style.display = "none";
  document.getElementById("crumb-en").style.display = "none";

  document.getElementById("title-te").style.display = "inline";
  document.getElementById("main-te").style.display = "block";
  document.getElementById("full-te").style.display = "block";
  document.getElementById("crumb-te").style.display = "inline";

  this.classList.add("active");
  document.getElementById("english-btn").classList.remove("active");
});
</script>



<?php include 'footer.php'; ?>