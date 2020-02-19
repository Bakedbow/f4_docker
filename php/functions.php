<?php

function checkDuplicate($name, $dbi) {
    $sql = "SELECT name
                FROM user
                WHERE name = '" . $name . "'";

    $res = $dbi->query($sql);
    $row = $res->fetch_assoc();

    if (!empty($row)) {
        return true;
    } else {
        return false;
    }
}

function insertName($name, $dbi) {
    $check = checkDuplicate($name, $dbi);

    if ($check) {
        echo '<span style="color: red;"><b>Name already exist in database.</b></span>';
    } else {
        $sql = "INSERT INTO user (name)
                    VALUES ('".$name."')";

        $res = $dbi->query($sql);

        if ($res) {
            return $msg =  '<span style="color: green;"><b>Added name to database.</b></span>';
            //header('location: index.php');
        } else {
            return $msg = '<span style="color: red;"><b>Something went wrong.</b></span>';
            exit;
        }
    }
}

function searchName($name, $dbi) {
    $sql = "SELECT name
                FROM user
                WHERE name = '" . $name . "'";

    $res = $dbi->query($sql);
    $row = $res->fetch_assoc();

    if (!empty($row)) {
        return $msg = '<span style="color: green;"><b>Found ' .  $row['name'] . '</b></span>';
    } else {
        return $msg = '<span style="color: red;"><b>Could not find name.</b></span>';
    }
}





?>
