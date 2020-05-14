<?php
session_start();
require '../libs/Smarty.class.php';
$smarty = new Smarty;

if(!isset($_SESSION['username'])){
    return header('Location:login.php');
}
$db = new PDO('mysql:host=localhost;dbname=Test_04;charset=utf8', 'root', 'kuma0315');
$rows = $db->query('SELECT * FROM detail WHERE 1')->fetchAll(PDO::FETCH_ASSOC);
$chkrows =count($rows);
if ($chkrows >= 1) {
    foreach ($rows as $key => $row) {
        $data[] = array(
            'Id' => $row['iddetail'],
            'Period' => $row['Period'],
            'BCable' => $row['B_ADSL'] + $row['B_Cable_Modem'] + $row['B_FTTX ']+ $row['B_Leased_Line'],
            'BWireless' => $row['WB_PWLAN'] + $row['WB_3GDate'] + $row['WB_4GDate'],
            'Mobile' => $row['M_3GDataCard'] + $row['M_3GPhone'] + $row['M_4GDataCard ']+ $row['M_4GPhone']
        );
    };
} else {
    $data = 'nodata';
}
if($_SESSION['createmsg']=='ok'){
    $createmsg='期數:'.$_SESSION['createperiod'].'新增成功!';
    unset($_SESSION['createmsg']);
    unset($_SESSION['createperiod']);
    $smarty->assign('createmsg',$createmsg);
}
if($_SESSION['updatemsg']=='ok'){
    $updatemsg='期數:'.$_SESSION['updateperiod'].'修改成功!';
    unset($_SESSION['updatemsg']);
    unset($_SESSION['updateperiod']);
    $smarty->assign('updatemsg',$updatemsg);
}

$smarty->assign('selectdata',$data);
$smarty->assign('nowpage','list');
$smarty->assign("title", "清單");
$smarty->display("list.html");
?>