<?php
session_start();
$db = new PDO('mysql:host=localhost;dbname=Test_04;charset=utf8', 'root', 'kuma0315');
require '../libs/Smarty.class.php';
$smarty = new Smarty;
// $smarty->debugging = true;

$sql='SELECT iddetail,Period FROM detail';
$rows=$db->query($sql)->fetchALL(PDO::FETCH_ASSOC);
// print_r($rows);

$smarty->assign('chart1',$rows);
$smarty->assign('nowpage','charts');
$smarty->assign("title", "圖表");
$smarty->display("charts.html");
?>