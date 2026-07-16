<?php
include './db.connection/db_connection.php';

$limit = 6;
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;
$offset = ($page - 1) * $limit;

$service = isset($_GET['service']) ? trim($_GET['service']) : '';
$search  = isset($_GET['search']) ? trim($_GET['search']) : '';

$count_sql = "SELECT COUNT(*) FROM blogs WHERE 1=1";
$params = [];
$types = "";

if (!empty($service)) {
    $count_sql .= " AND service = ?";
    $params[] = $service;
    $types .= "s";
}

if (!empty($search)) {
    $count_sql .= " AND (title LIKE ? OR main_content LIKE ? OR service LIKE ?)";
    $search_param = "%" . $search . "%";
    $params[] = $search_param;
    $params[] = $search_param;
    $params[] = $search_param;
    $types .= "sss";
}

$count_stmt = $conn->prepare($count_sql);
if (!empty($params)) {
    $count_stmt->bind_param($types, ...$params);
}
$count_stmt->execute();
$total_rows = $count_stmt->get_result()->fetch_row()[0];
$total_pages = ceil($total_rows / $limit);
$count_stmt->close();

$sql = "SELECT id, slug, title, main_content, main_image, service, created_at 
        FROM blogs 
        WHERE 1=1";

if (!empty($service)) {
    $sql .= " AND service = ?";
}

if (!empty($search)) {
    $sql .= " AND (title LIKE ? OR main_content LIKE ? OR service LIKE ?)";
}

$sql .= " ORDER BY created_at DESC LIMIT ? OFFSET ?";

$main_params = $params;
$main_types = $types . "ii";
$main_params[] = $limit;
$main_params[] = $offset;

$stmt = $conn->prepare($sql);
$stmt->bind_param($main_types, ...$main_params);
$stmt->execute();
$result = $stmt->get_result();

$blogs = [];
while ($row = $result->fetch_assoc()) {
    $blogs[] = $row;
}
$stmt->close();

$popular_sql = "SELECT id, slug, title, main_image, created_at 
                FROM blogs 
                ORDER BY created_at DESC 
                LIMIT 5";
$popular_result = $conn->query($popular_sql);

$category_sql = "SELECT service, COUNT(*) AS total 
                 FROM blogs 
                 WHERE service IS NOT NULL AND service != '' 
                 GROUP BY service 
                 ORDER BY total DESC";
$category_result = $conn->query($category_sql);
?>


<?php include 'header.php'; ?>

<style>
    .pagination-wrap {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
    }

    .pagination-wrap a {
        text-decoration: none;
    }

    .page-btn {
        min-width: 42px;
        height: 42px;
        border: 1px solid #d7d7d7;
        background: #fff;
        color: #333;
        border-radius: 50%;
        font-size: 15px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .page-btn:hover {
        background: #943483;
        color: #fff;
        border-color: #943483;
        transform: translateY(-2px);
    }

    .page-btn.active {
        background: #943483;
        color: #fff;
        border-color: #943483;
        box-shadow: 0 8px 20px rgba(148, 52, 131, 0.3);
    }

    .pagination-wrap .page-btn:not(.active) {
        cursor: pointer;
    }

    .pagination-wrap button {
        outline: none;
    }

    .pagination-wrap a:last-child .page-btn {
        border-radius: 25px;
        padding: 0 18px;
        width: auto;
    }

    .blog_section {
        display: flex;
        justify-content: center;
        color: #d27800;
        font-weight: 600;
        margin-top: 20px;
        font-family: Georgia, serif;
    }
</style>
<section class="blogs_section_hero">
    <div class="container">
        <div class="blogs_section_breadcrumb">
            <i class="fas fa-home me-2"></i> Home <i class="fas fa-chevron-right mx-2"></i> <b>Blog</b>
        </div>

        <h1 class="blogs_section_hero_title">Our Blogs</h1>
        <div class="blogs_section_hero_subtitle">Insights. Tips. Trends. All About Better Oral Health.</div>
        <p class="blogs_section_hero_text">
            Explore our expert articles to learn more about dental care, treatments, and tips for a healthier, brighter smile.
        </p>

        <!-- <div class="blogs_section_search_box">
                <input type="text" class="form-control" placeholder="Search blogs...">
                <button>SEARCH</button>
            </div> -->
    </div>
</section>

<!-- <section class="blogs_section_topics">
        <div class="container">
            <div class="blogs_section_topics_box">
                <div class="blogs_section_topic_item"><i class="fas fa-heart-pulse"></i>General<br>Dentistry</div>
                <div class="blogs_section_topic_item"><i class="fas fa-award"></i>Dental<br>Implants</div>
                <div class="blogs_section_topic_item"><i class="fas fa-tooth"></i>Orthodontics<br>(Braces & Aligners)</div>
                <div class="blogs_section_topic_item"><i class="fas fa-star"></i>Cosmetic<br>Dentistry</div>
                <div class="blogs_section_topic_item"><i class="bi bi-brightness-high"></i>Oral Health<br>Care</div>
                <div class="blogs_section_topic_item"><i class="fas fa-child"></i>Pediatric<br>Dentistry</div>
                <div class="blogs_section_topic_item"><i class="bi bi-tools"></i>Root Canal<br>Treatment</div>
                <div class="blogs_section_topic_item"><i class="bi bi-emoji-smile"></i>Smile<br>Makeover</div>
                <div class="blogs_section_topic_item"><i class="bi bi-grid-3x3-gap-fill"></i>View All<br>Topics</div>
            </div>
        </div>
    </section> -->


<h1 class="blog_section">Blogs</h1>
<section class="blogs_section_main">
    <div class="container">

        <div class="row mb-4">
            <div class="col-lg-8">
                <form method="GET" action="blogs_srinivasa_multispeciality_dental_hospital.php" class="d-flex gap-2">
                    <?php if (!empty($service)): ?>
                        <input type="hidden" name="service" value="<?php echo htmlspecialchars($service); ?>">
                    <?php endif; ?>

                    <input type="text" name="search" class="form-control"
                        placeholder="Search blogs..."
                        value="<?php echo htmlspecialchars($search); ?>">

                    <button class="btn btn-warning" type="submit">
                        Search
                    </button>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">

                <?php if (count($blogs) > 0): ?>

                    <?php
                    $featured = $blogs[0];
                    $featured_img = !empty($featured['main_image'])
                        ? "admin/uploads/photos/" . htmlspecialchars($featured['main_image'])
                        : "default_image.png";

                    $featured_url = "fullblog.php?id=" . (!empty($featured['slug'])
                        ? urlencode($featured['slug'])
                        : $featured['id']);

                    $featured_date = date("M d, Y", strtotime($featured['created_at']));
                    $featured_preview = substr(strip_tags(html_entity_decode($featured['main_content'])), 0, 160);
                    ?>

                    <div class="blogs_section_label">FEATURED BLOG</div>

                    <div class="blogs_section_featured_card"
                        onclick="window.location.href='<?php echo $featured_url; ?>';"
                        style="cursor:pointer;">

                        <div class="row g-0">
                            <div class="col-md-5">
                                <img class="blogs_section_featured_img"
                                    src="<?php echo $featured_img; ?>"
                                    alt="<?php echo htmlspecialchars($featured['title']); ?>">
                            </div>

                            <div class="col-md-7">
                                <div class="blogs_section_featured_content">
                                    <span class="blogs_section_badge">
                                        <?php echo !empty($featured['service']) ? htmlspecialchars($featured['service']) : 'FEATURED'; ?>
                                    </span>

                                    <h2><?php echo htmlspecialchars($featured['title']); ?></h2>

                                    <div class="blogs_section_meta">
                                        <span><i class="fas fa-calendar"></i> <?php echo $featured_date; ?></span>
                                        <span><i class="fas fa-clock"></i> 5 min read</span>
                                    </div>

                                    <p><?php echo $featured_preview; ?>...</p>

                                    <a href="<?php echo $featured_url; ?>" class="blogs_section_read_more">
                                        Read More <i class="fas fa-chevron-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="blogs_section_label">ALL BLOGS</div>

                    <div class="row g-4">
                        <?php for ($i = 1; $i < count($blogs); $i++):
                            $row = $blogs[$i];

                            $image_path = !empty($row['main_image'])
                                ? "admin/uploads/photos/" . htmlspecialchars($row['main_image'])
                                : "default_image.png";

                            $final_url = "fullblog.php?id=" . (!empty($row['slug'])
                                ? urlencode($row['slug'])
                                : $row['id']);

                            $formatted_date = date("M d, Y", strtotime($row['created_at']));
                            $preview = substr(strip_tags(html_entity_decode($row['main_content'])), 0, 90);
                        ?>

                            <div class="col-md-4">
                                <div class="blogs_section_blog_card"
                                    onclick="window.location.href='<?php echo $final_url; ?>';"
                                    style="cursor:pointer;">

                                    <img src="<?php echo $image_path; ?>"
                                        alt="<?php echo htmlspecialchars($row['title']); ?>">

                                    <div class="blogs_section_blog_card_content">
                                        <h4><?php echo htmlspecialchars($row['title']); ?></h4>

                                        <div class="blogs_section_meta">
                                            <span><?php echo $formatted_date; ?></span>
                                            <span>5 min read</span>
                                        </div>

                                        <p><?php echo $preview; ?>...</p>

                                        <a href="<?php echo $final_url; ?>" class="blogs_section_read_more">
                                            Read More <i class="bi bi-arrow-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        <?php endfor; ?>
                    </div>

                    <?php if ($total_pages > 1): ?>
                        <div class="pagination-wrap mt-4">
                            <?php
                            $url_parts = [];
                            if (!empty($service)) $url_parts[] = "service=" . urlencode($service);
                            if (!empty($search)) $url_parts[] = "search=" . urlencode($search);

                            $base_url = "blogs_srinivasa_multispeciality_dental_hospital.php?" . (count($url_parts) > 0 ? implode("&", $url_parts) . "&" : "");

                            for ($p = 1; $p <= $total_pages; $p++) {
                                $active_class = ($p == $page) ? 'active' : '';
                                echo "<a href='{$base_url}page={$p}'><button class='page-btn {$active_class}'>{$p}</button></a>";
                            }

                            if ($page < $total_pages) {
                                $next_page = $page + 1;
                                echo "<a href='{$base_url}page={$next_page}'><button class='page-btn'>Next</button></a>";
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                <?php else: ?>
                    <p style="text-align:center; padding:40px; font-weight:bold;">
                        No blog posts found.
                    </p>
                <?php endif; ?>

                <div class="blogs_section_newsletter">
                    <div class="row align-items-center g-3">
                        <div class="col-lg-2">
                            <div class="blogs_section_news_icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>

                        <div class="col-lg-5">
                            <h3>Stay Updated with Dental Tips</h3>
                            <p class="mb-0">
                                Subscribe to our newsletter and get latest articles straight to your inbox.
                            </p>
                        </div>

                        <div class="col-lg-5">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email address">
                                <button>SUBSCRIBE</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-4">
                <div class="blogs_section_sidebar_card">
                    <h3>Popular Posts</h3>

                    <?php if ($popular_result && $popular_result->num_rows > 0): ?>
                        <?php while ($p_row = $popular_result->fetch_assoc()):
                            $p_img = !empty($p_row['main_image'])
                                ? "admin/uploads/photos/" . htmlspecialchars($p_row['main_image'])
                                : "default_image.png";

                            $p_url = "fullblog.php?id=" . (!empty($p_row['slug'])
                                ? urlencode($p_row['slug'])
                                : $p_row['id']);

                            $p_date = date("M d, Y", strtotime($p_row['created_at']));
                        ?>

                            <div class="blogs_section_popular_item"
                                onclick="window.location.href='<?php echo $p_url; ?>';"
                                style="cursor:pointer;">

                                <img src="<?php echo $p_img; ?>"
                                    alt="<?php echo htmlspecialchars($p_row['title']); ?>">

                                <div>
                                    <h5><?php echo htmlspecialchars($p_row['title']); ?></h5>
                                    <small><i class="bi bi-clock"></i> <?php echo $p_date; ?></small>
                                </div>
                            </div>

                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No popular posts available.</p>
                    <?php endif; ?>

                    <a href="blogs_srinivasa_multispeciality_dental_hospital.php">
                        <button class="blogs_section_view_btn">VIEW ALL BLOGS</button>
                    </a>
                </div>

                <div class="blogs_section_category_box">
                    <h3>Categories</h3>

                    <a href="blogs_srinivasa_multispeciality_dental_hospital.php" style="text-decoration:none;">
                        <div class="blogs_section_category_item">
                            <span>All Articles</span>
                            <span><?php echo $total_rows; ?></span>
                        </div>
                    </a>

                    <?php if ($category_result && $category_result->num_rows > 0): ?>
                        <?php while ($cat = $category_result->fetch_assoc()): ?>
                            <a href="blogs_srinivasa_multispeciality_dental_hospital.php?service=<?php echo urlencode($cat['service']); ?>" style="text-decoration:none;">
                                <div class="blogs_section_category_item <?php echo ($service == $cat['service']) ? 'active' : ''; ?>">
                                    <span><?php echo htmlspecialchars($cat['service']); ?></span>
                                    <span><?php echo $cat['total']; ?></span>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p>No categories found.</p>
                    <?php endif; ?>

                    <hr>

                    <a href="blogs_srinivasa_multispeciality_dental_hospital.php" class="blogs_section_read_more">
                        VIEW ALL CATEGORIES <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>