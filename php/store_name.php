<?php

include('db.php');
$nameInput = $_POST['name'];
$sql = "INSERT INTO user (name)
            VALUES ('".$_POST['name']."')";

$res = $dbi->query($sql);

header('location: index.php');

?>
