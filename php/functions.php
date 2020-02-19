<?php

function checkDuplicate($name, $gameName, $dbi) {
    $sql = "SELECT name, gameName
                FROM user
                WHERE name = '" . $name . "'
                OR gameName = '" . $gameName . "'";

    $res = $dbi->query($sql);
    $row = $res->fetch_assoc();

    if (!empty($row)) {
        return true;
    } else {
        return false;
    }
}

function insertName($name, $gameName, $dbi) {
    $check = checkDuplicate($name, $gameName, $dbi);

    if ($check) {
        echo '<span style="color: red;"><b>Name already exist in database.</b></span>';
    } else {
        $sql = "INSERT INTO user (name, gameName)
                    VALUES ('".$name."','" . $gameName . "')";

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
    $sql = "SELECT name, gameName
                FROM user
                WHERE name = '" . $name . "'
                OR gameName = '" . $name . "'";

    $res = $dbi->query($sql);
    $row = $res->fetch_assoc();

    if (!empty($row)) {
        return $msg = '<span style="color: green;"><b>Real Name - ' .  $row['name'] . '</b></span>
                                <br><span style="color: green;"><b>Game Name -' . $row['gameName'] . '</b></span>';
    } else {
        return $msg = '<span style="color: red;"><b>Could not find name.</b></span>';
    }
}





?>
