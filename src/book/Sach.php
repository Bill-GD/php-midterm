<?php

include_once "../database.php";

$query = "select * from Sach";

$db_result = $db->query($query)->fetchAll();

echo "<h2> Book list </h2>";

foreach ($db_result as $db_row) {
  echo 'ID = ' . $db_row['MaSach'] . ', Name = ' . $db_row['TenSach'] . ', Count = ' . $db_row['SoLuong'];
  echo "<br>";
}