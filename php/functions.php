<?php

function checkDuplicate($name, $gameName, $dbi) {
    $sql = "SELECT name, gameName
                FROM user
                WHERE name = '" . $name  . "'
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

function msgNotify($msg) {
    $webhookurl = "https://hooks.slack.com/services/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";
    $msg = "Test **message** ";
    $json_data = array ('content'=>"$msg");
    $make_json = json_encode($json_data);
    $ch = curl_init( $webhookurl );
    curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt( $ch, CURLOPT_POST, 1);
    curl_setopt( $ch, CURLOPT_POSTFIELDS, $make_json);
    curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt( $ch, CURLOPT_HEADER, 0);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec( $ch );

//     $json_data = array("content"=>"test");
//     $make_json = json_encode($json_data);
//
//     $ch = curl_init( $webhook );
//
//     curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
//     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//       curl_setopt($ch, CURLOPT_POSTFIELDS, $make_json);
//       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//
//     $response = curl_exec( $ch );
// var_dump($response);exit;
}



?>
