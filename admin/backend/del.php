<?php
include '../connect.php';
include 'func.php';

$do = '';
$id = '';
$course_id = '';

if (isset($_GET['do']) && isset($_GET['id'])) {
    $do = $_GET['do'];
    $id = $_GET['id'];

    if (isset($_GET['courseId']))
        $course_id = $_GET['courseId'];
}
else
    header("Location: " . $_SERVER['HTTP_REFERER']);


if ($do == 'projectCat')
    delItems('categories', 'CatID', 'project-cat.php');

if ($do == 'projectAdd')
    delItems('projects', 'ProjectID', 'add-project.php');

if ($do == 'course')
    delItems('courses', 'CourseID', 'add-course.php');

if ($do == 'blogCat')
    delItems('blog_categories', 'CatID', 'blog-cat.php');

if ($do == 'blog')
    delItems('blogs', 'BlogID', 'add-blog.php');

if ($do == 'courseUsers')
    delItems('users', 'UserID', 'course-users.php?id=' . $course_id);

else
    header("Location: " . $_SERVER['HTTP_REFERER']);

?>