<?php
session_start();
require '../libs/Smarty.class.php';
$smarty = new Smarty;
// $smarty->debugging = true;
// $smarty->caching = true;
// $smarty->cache_lifetime = 120;
// 連線
if(($_SESSION['username'])){
    return header('Location:list.php');
}

if($_SESSION['registermsg']=='success'){
    $registermsg='註冊成功，請重新登入';
    $smarty->assign("registermsg", $registermsg);
    unset($_SESSION['registermsg']);
};
if($_SESSION['loginmsg']=='noemail'){
    $loginmsg='帳號錯誤';
    $smarty->assign("loginmsg", $loginmsg);
    unset($_SESSION['loginmsg']);
}elseif($_SESSION['loginmsg']=='wrongpassord'){
    $loginmsg='密碼錯誤';
    unset($_SESSION['loginmsg']);
}
$smarty->assign("title", "登入");
$smarty->display("login.html");
?>