<?php
include 'connect.php';

$do = '';
if (isset($_GET['do']))
    $do = $_GET['do'];
else header("Location: contact.php");

if ($do == 'message') {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $sql = $con->prepare("INSERT INTO `messages` (`Name`, `Email`, `Phone`, `Message`, `Subject`) VALUE (:zname, :zemail, :zphone, :zmsg, :zsub)");
        $sql->execute(array(
            'zname' => $name,
            'zemail' => $email,
            'zphone' => $phone,
            'zmsg' => $message,
            'zsub' => $subject
        ));
        header("Location: contact.php");

    } else header("Location: contact.php");

} else header("Location: contact.php");

?>