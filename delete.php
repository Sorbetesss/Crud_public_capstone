<?php
include "db_conn.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM `student` WHERE `student_id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: index.php ?msg=Student deleted successfully");
        exit;
    } else {
        header("Location: index.php?msg=Failed to delete student");
        exit;
    }
}
?>