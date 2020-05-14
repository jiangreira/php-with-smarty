<?php
require '../libs/Smarty.class.php';
$smarty = new Smarty;
$smarty->debugging = true;
$db = new PDO('mysql:host=localhost;dbname=Test_04;charset=utf8', 'root', 'kuma0315');
switch ($_GET['go']) {
    case 'register':
        return 
        break;
}
