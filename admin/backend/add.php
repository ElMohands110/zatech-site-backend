<?php

include '../config.php';


    include '../connect.php';

    $validation = array('jpeg', 'jpg', 'png');
    $path = '../../uploads/';

    $do = '';
    if (isset($_GET['do']))
        $do = $_GET['do'];
    else header("Location: ../index.php");

    if ($do == 'cat') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cat_name = $_POST['cat'];
            $sql = $con->prepare("INSERT INTO `categories` (`CatName`) VALUES (:zname)");
            $sql->execute(array(
                'zname' => $cat_name
            ));
            header("Location: ../project-cat.php");
        } else header("Location: ../index.php");
    }

    if ($do == 'project') {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $project_name = $_POST['projectName'];
            $project_photo = $_FILES['projectPhoto'];
            $project_cover = $_FILES['projectCover'];
            $describe = $_POST['describe'];
            $cat = $_POST['cat'];

            $img_name = $_FILES['projectPhoto']['name'];
            $img_temp = $_FILES['projectPhoto']['tmp_name'];

            $cover_name = $project_cover['name'];
            $cover_temp = $project_cover['tmp_name'];

            $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
            $ext2 = strtolower(pathinfo($cover_name, PATHINFO_EXTENSION));

            $final_name = rand(1000000, 10000000000) . $ext;
            $final_name2 = rand(1000000, 10000000000) . $ext2;

            if (in_array($ext, $validation) && in_array($ext2, $validation)) {
                $path1 = $path . strtolower($final_name);
                $path2 = $path . strtolower($final_name2);

                if (move_uploaded_file($img_temp, $path1) && move_uploaded_file($cover_temp, $path2)) {

                    $sql = $con->prepare("INSERT INTO `projects` (`ProjectName`, `ProjectPhoto`, `ProjectCover`, `ProjectDescrip`, `Category`)
                                    VALUES (:zname, :zphoto, :zcover, :zdescribe, :zcat)");
                    $sql->execute(array(
                        'zname' => $project_name,
                        'zphoto' => 'uploads/' . $final_name,
                        'zcover' => 'uploads/' . $final_name2,
                        'zdescribe' => $describe,
                        'zcat' => $cat
                    ));
                }
            }

            header("Location: ../add-project.php");
        } else header("Location: ../index.php");
    }

    if ($do == 'course') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $course_name = $_POST['courseName'];
            $course_describe = $_POST['courseDescribe'];
            $course_cover = $_FILES['course_cover'];

            $img_name = $_FILES['course_cover']['name'];
            $img_temp = $_FILES['course_cover']['tmp_name'];

            $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));

            $final_name = rand(1000000, 10000000000) . $ext;

            if (in_array($ext, $validation)) {
                $path = $path . strtolower($final_name);

                if (move_uploaded_file($img_temp, $path)) {
                    $sql = $con->prepare("INSERT INTO `courses` (`CourseName`, `CourseDescribe`, `CoursePhoto`)
                                    VALUES (:zname, :zdescribe, :zphoto)");
                    $sql->execute(array(
                        'zname' => $course_name,
                        'zdescribe' => $course_describe,
                        'zphoto' => 'uploads/' . $final_name
                    ));
                }
            }
            header("Location: ../add-course.php");
        } else header("Location: ../index.php");
    }

    if ($do == 'blogCat') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $cat_name = $_POST['cat_name'];

            $sql = $con->prepare("INSERT INTO `blog_categories` (`CatName`) VALUES (:zname)");
            $sql->execute(array(
                'zname' => $cat_name,
            ));
            header("Location: ../blog-cat.php");
        } else header("Location: ../index.php");
    }

    if ($do == 'blog') {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $blog_name = $_POST['blog_name'];
            $blog_photo = $_FILES['blog_photo'];
            $blog_cover = $_FILES['blog_cover'];
            $blog_cat = $_POST['blog_cat'];
            $blog_describe = $_POST['blog_describe'];
            $blog_content = $_POST['blog_content'];

            $img_name = $blog_photo['name'];
            $img_temp = $blog_photo['tmp_name'];

            $cover_name = $blog_cover['name'];
            $cover_temp = $blog_cover['tmp_name'];

            $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
            $ext2 = strtolower(pathinfo($cover_name, PATHINFO_EXTENSION));

            $final_name = rand(1000000, 10000000000) . $ext;
            $final_name2 = rand(1000000, 10000000000) . $ext2;

            if (in_array($ext, $validation) && in_array($ext2, $validation)) {
                $path1 = $path . strtolower($final_name);
                $path2 = $path . strtolower($final_name2);

                if (move_uploaded_file($img_temp, $path1) && move_uploaded_file($cover_temp, $path2)) {

                    $sql = $con->prepare("INSERT INTO `blogs` (`BlogName`, `BlogCat`, `BlogPhoto`, `BlogCover`, `BlogDescribe`, `BlogContent`, `DATE`)
                                        VALUES (:zname, :zcat, :zphoto, :zcover, :zdescibe, :zcontent, now())");
                    $sql->execute(array(
                        'zname' => $blog_name,
                        'zcat' => $blog_cat,
                        'zphoto' => 'uploads/' . $final_name,
                        'zcover' => 'uploads/' . $final_name2,
                        'zdescibe' => $blog_describe,
                        'zcontent' => $blog_content
                    ));
                }
            }
            header("Location: ../add-blog.php");
        } else header("Location: ../index.php");
    }
?>