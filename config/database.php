<?php
// koneksi ke database
$mysqli = mysqli_connect("localhost", "root", "", "bynhcollection");

function query($query)
{
  global $mysqli;
  $result = mysqli_query($mysqli, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
