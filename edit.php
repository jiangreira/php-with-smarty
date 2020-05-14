<?php
session_start();
require '../libs/Smarty.class.php';
$smarty = new Smarty;
if(!isset($_SESSION['username'])){
    return header('Location:login.php');
}

$db = new PDO('mysql:host=localhost;dbname=Test_04;charset=utf8', 'root', 'kuma0315');

$id=$_GET['id'];
$data=$db->query('SELECT * FROM detail WHERE iddetail="'.$id.'"')->fetchAll(PDO::FETCH_ASSOC);



$smarty->assign('data',$data);
$smarty->assign("title", "編輯");
$smarty->display("edit.html");
?>