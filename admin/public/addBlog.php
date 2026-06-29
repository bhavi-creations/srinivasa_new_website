<?php
// Database connection
include '../../db.connection/db_connection.php';

// Character set ni set cheyali - Telugu mariyu HTML styles symbols correct ga save avvadaniki
$conn->set_charset("utf8mb4");

// Unique filename
function generateUniqueFileName($fileName)
{
    $ext = pathinfo($fileName, PATHINFO_EXTENSION);
    return uniqid() . '_' . time() . '.' . $ext;
}

// Allowed image types
$allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // ================= FORM DATA =================
    $blog_id = isset($_POST['id']) ? intval($_POST['id']) : 0;

    $title = $_POST['title'] ?? '';
    $slug = $_POST['slug'] ?? '';

    // Quill editor nundi vache HTML (with colors) ikkada save avthundi
    $main_content = $_POST['main_content'] ?? '';
    $full_content = $_POST['full_content'] ?? '';

    $service = $_POST['service'] ?? '';
    $logo_link = $_POST['logo_link'] ?? '';

    $telugu_title = $_POST['telugu_title'] ?? '';
    $telugu_main_content = $_POST['telugu_main_content'] ?? '';
    $telugu_full_content = $_POST['telugu_full_content'] ?? '';

    $section1_content = $_POST['section1_content'] ?? '';
    $section2_content = $_POST['section2_content'] ?? '';
    $section3_content = $_POST['section3_content'] ?? '';

    $hashtags = $_POST['hashtags'] ?? '';
    $keypoints = $_POST['keypoints'] ?? '';

    $hashtags_json = json_encode(array_map('trim', explode(',', $hashtags)));
    $keypoints_json = json_encode(array_map('trim', explode(',', $keypoints)));

    if (empty($title) || empty($slug) || empty($main_content) || empty($full_content) || empty($service)) {
        die("Required fields missing");
    }

    // ================= UPLOAD FUNCTION =================
    function uploadImage($fileKey, $folder, $allowed_extensions)
    {
        if (!empty($_FILES[$fileKey]['name'])) {

            $ext = strtolower(pathinfo($_FILES[$fileKey]['name'], PATHINFO_EXTENSION));
            if (!in_array($ext, $allowed_extensions)) {
                die("Invalid file: $fileKey");
            }

            $dir = __DIR__ . "/../uploads/$folder/";
            if (!is_dir($dir)) mkdir($dir, 0777, true);

            $fileName = generateUniqueFileName($_FILES[$fileKey]['name']);

            if (move_uploaded_file($_FILES[$fileKey]['tmp_name'], $dir . $fileName)) {
                return $fileName;
            }
        }
        return '';
    }

    // ================= FILE UPLOADS =================
    $title_image_path = uploadImage('title_image', 'photos', $allowed_extensions);
    $main_image_path  = uploadImage('main_image', 'photos', $allowed_extensions);
    $logo_path        = uploadImage('logo', 'logos', $allowed_extensions);

    $section1_image = uploadImage('section1_image', 'photos', $allowed_extensions);
    $section2_image = uploadImage('section2_image', 'photos', $allowed_extensions);
    $section3_image = uploadImage('section3_image', 'photos', $allowed_extensions);

    // VIDEO
    $video_path = '';
    if (!empty($_FILES['video']['name'])) {
        $video_dir = __DIR__ . "/../uploads/videos/";
        if (!is_dir($video_dir)) mkdir($video_dir, 0777, true);

        $video_name = generateUniqueFileName($_FILES['video']['name']);
        move_uploaded_file($_FILES['video']['tmp_name'], $video_dir . $video_name);
        $video_path = $video_name;
    }

    // ================= UPDATE =================
    if ($blog_id > 0) {

        // Keep old files if not uploaded
        $title_image_path = $title_image_path ?: ($_POST['old_title_image'] ?? '');
        $main_image_path  = $main_image_path  ?: ($_POST['old_main_image'] ?? '');
        $logo_path        = $logo_path        ?: ($_POST['old_logo'] ?? '');
        $section1_image   = $section1_image   ?: ($_POST['old_section1_image'] ?? '');
        $section2_image   = $section2_image   ?: ($_POST['old_section2_image'] ?? '');
        $section3_image   = $section3_image   ?: ($_POST['old_section3_image'] ?? '');
        $video_path       = $video_path       ?: ($_POST['old_video'] ?? '');

        $stmt = $conn->prepare("UPDATE blogs SET
            title=?, slug=?, main_content=?, full_content=?,
            telugu_title=?, telugu_main_content=?, telugu_full_content=?,
            hashtags=?, keypoints=?,
            title_image=?, main_image=?, video=?,
            service=?, logo=?, logo_link=?,
            section1_content=?, section1_image=?,
            section2_content=?, section2_image=?,
            section3_content=?, section3_image=?
            WHERE id=?");

        $stmt->bind_param(
            "sssssssssssssssssssssi",
            $title,
            $slug,
            $main_content,
            $full_content,
            $telugu_title,
            $telugu_main_content,
            $telugu_full_content,
            $hashtags_json,
            $keypoints_json,
            $title_image_path,
            $main_image_path,
            $video_path,
            $service,
            $logo_path,
            $logo_link,
            $section1_content,
            $section1_image,
            $section2_content,
            $section2_image,
            $section3_content,
            $section3_image,
            $blog_id
        );
    }

    // ================= INSERT =================
    else {

        $stmt = $conn->prepare("INSERT INTO blogs
        (title, slug, main_content, full_content,
        telugu_title, telugu_main_content, telugu_full_content,
        hashtags, keypoints,
        title_image, main_image, video,
        service, logo, logo_link,
        section1_content, section1_image,
        section2_content, section2_image,
        section3_content, section3_image, created_at)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,NOW())");

        $stmt->bind_param(
            "sssssssssssssssssssss",
            $title,
            $slug,
            $main_content,
            $full_content,
            $telugu_title,
            $telugu_main_content,
            $telugu_full_content,
            $hashtags_json,
            $keypoints_json,
            $title_image_path,
            $main_image_path,
            $video_path,
            $service,
            $logo_path,
            $logo_link,
            $section1_content,
            $section1_image,
            $section2_content,
            $section2_image,
            $section3_content,
            $section3_image
        );
    }

    // ================= EXECUTE =================
    if (!$stmt->execute()) {
        die("Error: " . $stmt->error);
    }

    $stmt->close();

    header("Location: allBlog.php");
    exit();
}

$conn->close();
