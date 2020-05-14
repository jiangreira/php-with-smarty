<?php
session_start();
require '../libs/Smarty.class.php';
$smarty = new Smarty;
if(!isset($_SESSION['username'])){
    return header('Location:login.php');
}

$db = new PDO('mysql:host=localhost;dbname=Test_04;charset=utf8', 'root', 'kuma0315');

if ($_SESSION['createmsg'] == 'periodempty') {
    $createmsg = '期數不得為空';
    $repostdata = $_SESSION['postdata'];
    unset($_SESSION['createmsg']);
    unset($_SESSION['postdata']);
    $smarty->assign('createmsg', $createmsg);
    $smarty->assign('repostdata', $repostdata);
} elseif ($_SESSION['createmsg'] == 'periodnotnum') {
    $createmsg = '不得輸入文字，請輸入數字';
    $repostdata = $_SESSION['postdata'];
    unset($_SESSION['createmsg']);
    unset($_SESSION['postdata']);
    $smarty->assign('createmsg', $createmsg);
    $smarty->assign('repostdata', $repostdata);
} elseif ($_SESSION['othererror'] == 'othererror') {
    $error = 'Something wrong! Please try again';
    $repostdata = $_SESSION['postdata'];
    unset($_SESSION['error']);
    unset($_SESSION['postdata']);
    $smarty->assign('error', $error);
    $smarty->assign('repostdata', $repostdata);
}

$smarty->assign('nowpage', 'create');
$smarty->assign("title", "新增");
$smarty->display("create.html");
