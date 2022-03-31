<?php

// Delete Function
function delItems($tbl, $itemid, $page) {
    global $id, $con;
    $sql = $con->prepare("DELETE FROM `$tbl` WHERE `$itemid` = :ztest");
    $sql->bindParam(':ztest', $id);
    $sql->execute();
    header("Location: ../$page");
}

?>