<?php
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=mohana_mantra','harsha','harsha');
}
catch(PDOException $e)
{
  exit('Database error.');
}
?>