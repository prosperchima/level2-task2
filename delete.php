<?php
session_start();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    unset($_SESSION["tasks"] [$id]);
    header("location: index.php");
} else {
    echo "Nothing to delete";
}
