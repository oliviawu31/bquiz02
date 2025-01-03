<?php include_once "db.php";

// 以下兩行可省略
$id=$_POST['id'];
$user=$_SESSION['user'];

$chk=$log->count(['news'=>$id,'user'=>$user]);

if($chk>0){
    $Log->del(['news'=>$id,'user'=>$user]);
}else{
    $Log->save(['news'=>$id,'user'=>$user]);
}