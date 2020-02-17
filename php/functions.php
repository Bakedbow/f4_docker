<?php

function insertName($name, $dbi) {
    $sql = "INSERT INTO user (name)
                VALUES ('".$name."')";

    $res = $dbi->query($sql);

    if ($res) {
        header('location: index.php');
    } else {
        echo 'Something went wrong';
        exit;
    }
}

function searchName($name, $dbi) {
    $sql = "SELECT *
                FROM user
                WHERE name = " . $name;

    $res = $dbi->query($sql);
    $row = $res->fetch_assoc();
    return $row;
}





?>
