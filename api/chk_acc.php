<?php include_once "db.php";

// 兩種寫法
// $acc=$_GET['acc'];
// echo $res=$User->count(['acc'=>$acc]);

// 簡化版本
echo $User->count($_GET);

?>