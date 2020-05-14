<?php
session_start();
require '../libs/Smarty.class.php';
$smarty = new Smarty;
if(($_SESSION['username'])){
    return header('Location:list.php');
}

if($_SESSION['registermsg']=='doublemail'){
    $registermsg='信箱重複註冊';
    $smarty->assign('registermsg',$registermsg);
    unset($_SESSION['registermsg']);
}elseif($_SESSION['registermsg']=='enoughpassword'){
    $registermsg='密碼需至少八位字元';
    $smarty->assign('registermsg',$registermsg);
    unset($_SESSION['registermsg']);
}


$smarty->display("register.html");

?>
