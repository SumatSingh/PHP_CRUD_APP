<?php
$conn = mysqli_connect('localhost', 'root', '', 'crud');
if ($conn) {
  echo "";
} else {
  echo "Conection refused";
}
?>