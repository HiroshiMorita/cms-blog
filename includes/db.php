<?php
//MAMP用
// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "root";
// $db['db_name'] = "cms-blog";

// foreach($db as $key => $value){
// define(strtoupper($key), $value);
// }

// $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


//Docker-LEMP用
$db['db_host'] = "db";
$db['db_user'] = "root";
$db['db_pass'] = "root";
$db['db_name'] = "cms-blog";

foreach($db as $key => $value){
define(strtoupper($key), $value);
}

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// try {
//   $dsn = 'mysql:host=db;dbname=cms-blog;';
//   $db = new PDO($dsn, 'root', 'root');

//   $sql = 'SELECT version();';
//   $stmt = $db->prepare($sql);
//   $stmt->execute();
//   $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//   var_dump($result);
// } catch (PDOException $e) {
//   echo $e->getMessage();
//   exit;
// }
?>