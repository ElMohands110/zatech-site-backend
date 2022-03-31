<?php
include '../connect.php';

$do = '';
if (isset($_GET['do']))
    $do = $_GET['do'];
else
    header("Location: " . $_SERVER['HTTP_REFERER']);

if ($do == 'cat') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catid = $_POST['catid'];
        $catname = $_POST['catname'];

        $sql = $con->prepare("UPDATE `categories` SET `CatName` = ?  WHERE `CatID` = ?");
        $sql->execute(array($catname, $catid));

        header("Location: ../project-cat.php");
    }
}

if ($do == 'project') {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $project_name = $_POST['project_name'];
        $project_photo = $_FILES['project_photo'];
        $project_cover = $_FILES['project_cover'];
        $describe = $_POST['describe'];
        $cat = $_POST['cat'];
        $projectid = $_POST['projectid'];

        $sql1 = $con->prepare("UPDATE `projects` SET `ProjectName` = ?, `ProjectDescrip` = ?, `Category` = ?
                                    WHERE `ProjectID` = ?");
        $sql1->execute(array($project_name, $describe, $cat, $projectid));

        $validation = array('jpeg', 'jpg', 'png');
        $path = '../../uploads/';

        $img_name = $_FILES['project_photo']['name'];
        $img_temp = $_FILES['project_photo']['tmp_name'];

        $cover_name = $_FILES['project_cover']['name'];
        $cover_temp = $_FILES['project_cover']['tmp_name'];

        $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $ext2 = strtolower(pathinfo($cover_name, PATHINFO_EXTENSION));

        $final_name = rand(1000000, 10000000000) . $ext;
        $final_name2 = rand(1000000, 10000000000) . $ext2;

        if (in_array($ext, $validation)) {
            $path1 = $path . strtolower($final_name);

            if (move_uploaded_file($img_temp, $path1)) {
                $sql2 = $con->prepare("UPDATE `projects` SET `ProjectPhoto` = ? WHERE `ProjectID` = ?");
                $sql2->execute(array('uploads/' . $final_name, $projectid));
            }
        }
        if (in_array($ext2, $validation)) {
            $path2 = $path . strtolower($final_name2);

            if (move_uploaded_file($cover_temp, $path2)) {
                $sql3 = $con->prepare("UPDATE `projects` SET `ProjectCover` = ? WHERE `ProjectID` = ?");
                $sql3->execute(array('uploads/' . $final_name2, $projectid));
            }
        }

        header("Location: ../add-project.php");
    } else header("Location: ../index.php");
}

if ($do == 'course') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $course_name = $_POST['course_name'];
        $course_describe = $_POST['course_describe'];
        $course_photo = $_FILES['course_photo'];
        $course_id = $_POST['course_id'];

        $sql1 = $con->prepare("UPDATE `courses` SET `CourseName` = ?, `CourseDescribe` = ?
                                    WHERE `CourseID` = ?");
        $sql1->execute(array($course_name, $course_describe, $course_id));

        $validation = array('jpeg', 'jpg', 'png');
        $path = '../../uploads/';

        $img_name = $_FILES['course_photo']['name'];
        $img_temp = $_FILES['course_photo']['tmp_name'];

        $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

        $final_name = rand(1000000, 10000000000) . $ext;

        if (in_array($ext, $validation)) {
            $path = $path . strtolower($final_name);

            if (move_uploaded_file($img_temp, $path)) {
                $sql2 = $con->prepare("UPDATE `courses` SET `CoursePhoto` = ?
                                    WHERE `CourseID` = ?");
                $sql2->execute(array('uploads/' . $final_name, $course_id));
            }
        }
        header("Location: ../add-course.php");
    } else header("Location: ../index.php");
}

if ($do == 'blogCat') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catid = $_POST['cat_id'];
        $catname = $_POST['cat_name'];

        $sql = $con->prepare("UPDATE `blog_categories` SET `CatName` = ?  WHERE `CatID` = ?");
        $sql->execute(array($catname, $catid));

        header("Location: ../blog-cat.php");
    } else header("Location: ../index.php");
}

if ($do == 'blog') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $blog_name = $_POST['blog_name'];
        $blog_photo = $_FILES['blog_photo'];
        $blog_cover = $_FILES['blog_cover'];
        $blog_describe = $_POST['blog_describe'];
        $blog_content = $_POST['blog_content'];
        $blog_cat = $_POST['blog_cat'];
        $blog_id = $_POST['blog_id'];

        $sql1 = $con->prepare("UPDATE `blogs` SET `BlogName` = ?, `BlogDescribe` = ?, `BlogContent` = ?, `BlogCat` = ?
                                    WHERE `BlogID` = ?");
        $sql1->execute(array($blog_name, $blog_describe, $blog_content, $blog_cat, $blog_id));

        $validation = array('jpeg', 'jpg', 'png');
        $path = '../../uploads/';

        $img_name = $blog_photo['name'];
        $img_temp = $blog_photo['tmp_name'];

        $cover_name = $blog_cover['name'];
        $cover_temp = $blog_cover['tmp_name'];

        $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $ext2 = strtolower(pathinfo($cover_name, PATHINFO_EXTENSION));

        $final_name = rand(1000000, 10000000000) . $ext;
        $final_name2 = rand(1000000, 10000000000) . $ext2;

        if (in_array($ext, $validation)) {
            $path1 = $path . strtolower($final_name);

            if (move_uploaded_file($img_temp, $path1)) {
                $sql2 = $con->prepare("UPDATE `blogs` SET `BlogPhoto` = ? WHERE `BlogID` = ?");
                $sql2->execute(array('uploads/' . $final_name, $blog_id));
            }
        }
        if (in_array($ext2, $validation)) {
            $path2 = $path . strtolower($final_name2);

            if (move_uploaded_file($cover_temp, $path2)) {
                $sql3 = $con->prepare("UPDATE `blogs` SET `BlogCover` = ? WHERE `BlogID` = ?");
                $sql3->execute(array('uploads/' . $final_name2, $blog_id));
            }
        }

        header("Location: ../add-blog.php");

    } else header("Location: ../index.php");
}

?>