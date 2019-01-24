<?php
session_start();
if (isset($_GET["id"])) {
    $id =  $_GET["id"];
    $data = $_SESSION["tasks"][$id];
    $_SESSION["tasks"] [$id] = [
        "name" => $data["name"],
        "is_done" => $data["is_done"] == false ? true : false,
    ];

    header("location: index.php");
}

