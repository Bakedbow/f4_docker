<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');
?>

<?php
include('db.php');
include('functions.php');

$message = '';
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    if (!empty($_POST['name'])) {
        $message = insertName($_POST['name'], $dbi);
    }
    if (!empty($_POST ['search'])) {
        $message = searchName($_POST['search'], $dbi);
    }
}

// if ($conn->connect_error) {
//     echo 'connection failed' . $conn->connect_error;
// }
// echo 'Sucessfully connected to MYSQL';


// $sql = 'DROP TABLE user';
// $dbi->query($sql);

// $sql = 'SELECT *
// FROM information_schema.tables
// WHERE table_schema = "test_db"
//  AND table_name = "user"
// LIMIT 1;';
// $res = $dbi->query($sql);
// if ($row = $res->fetch_assoc()) {
//     echo "</br>Table EXISTS";
// } else {
//     echo "</br> Creating table...";
//     $sql = 'CREATE TABLE `test_db`.`user` (
//       `user_id` INT NOT NULL AUTO_INCREMENT,
//       `name` VARCHAR(45) NOT NULL,
//   PRIMARY KEY (user_id));';
//
//   $res = $dbi->query($sql);
//     if ($res) {
//         echo "</br>Table Created";
//     } else {
//         echo "</br> Table was unable to be created";
//     }
// }

include('name.php');
include('search.php');

$name = [];
$sql = 'SELECT name
            FROM user';

$res = $dbi->query($sql);
while ($row = $res->fetch_assoc()) {
    $name[] = $row['name'];
}
include('display.php');


?>

<script>
function openTab  (evt, tabName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
