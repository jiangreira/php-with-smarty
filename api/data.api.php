<?php
$db = new PDO('mysql:host=localhost;dbname=Test_04;charset=utf8', 'root', 'kuma0315');
session_start();

switch ($_GET['do']) {
    case 'add':
        $postPeriod = $_POST['period'];
        $_SESSION['postdata'] = array();
        $postdata = $_POST;

        if ($postPeriod == null || empty($postPeriod)) {
            $_SESSION['createmsg'] = 'periodempty';
            array_push($_SESSION['postdata'], $postdata);
            return header('Location:../create.php');
        };

        $chk = is_numeric($postPeriod);
        if ($chk == null || empty($chk)) {
            $_SESSION['createmsg'] = 'periodnotnum';
            array_push($_SESSION['postdata'], $postdata);
            return header('Location:../create.php');
        }

        $sql = 'INSERT INTO detail (iddetail,Period,B_ADSL,B_Cable_Modem,B_FTTX,B_Leased_Line,WB_PWLAN,WB_3GDate,WB_4GDate,M_3GPhone,M_3GDataCard,M_4GPhone,M_4GDataCard,created_at,updated_at) VALUES(null,' . $_POST['period'] . ',' . $_POST['BADSL'] . ',' . $_POST['BCableModem'] . ',' . $_POST['BFTTX'] . ',' . $_POST['BLeasedLine'] . ',' . $_POST['WBWLAN'] . ',' . $_POST['WB3G'] . ',' . $_POST['WB4G'] . ',' . $_POST['M3GPhone'] . ',' . $_POST['M3GDataCard'] . ',' . $_POST['M4GPhone'] . ',' . $_POST['M4GDataCard'] . ',NOW(),NOW())';
        $db->query($sql)->fetchall(PDO::FETCH_ASSOC);

        // chk insert success
        $chkinsert = $db->query('SELECT * FROM detail WHERE Period="' . $postPeriod . '"');
        if ($chkinsert) {
            $_SESSION['createmsg'] = 'ok';
            $_SESSION['createperiod'] = $postPeriod;
            return header('Location:../list.php');
        } else {
            $_SESSION['othererror'] = 'othererror';
            array_push($_SESSION['postdata'], $postdata);
            return header('Location:../create.php');
        }

        break;
    case 'edit':
        $id = $_GET['id'];
        $sql = 'UPDATE detail SET B_ADSL=' . $_POST['BADSL'] . ',B_Cable_Modem=' . $_POST['BCableModem'] . ',B_FTTX=' . $_POST['BFTTX'] .
            ',B_Leased_Line=' . $_POST['BLeasedLine'] . ',WB_PWLAN=' . $_POST['WBWLAN'] . ',WB_3GDate=' . $_POST['WB3G'] . ',WB_4GDate=' . $_POST['WB4G'] .
            ',M_3GPhone=' . $_POST['M3GPhone'] . ',M_3GDataCard=' . $_POST['M3GDataCard'] . ',M_4GPhone=' . $_POST['M4GPhone'] . ',M_4GDataCard=' . $_POST['M4GDataCard'] .
            ',updated_at=NOW() WHERE iddetail=' . $id;
        $result = $db->query($sql)->execute();

        $_SESSION['updatedate'] = array();
        $postdata = $_POST;

        if ($result) {
            $_SESSION['updatemsg'] = 'ok';
            $_SESSION['updateperiod'] = $_POST['period'];
            return header('Location:../list.php');
        } else {
            return '<script>alert("somethingwrong");window.location.go(-1);<script>';
        }
        break;
}
switch ($_GET['data']) {
    case 'del':
        $postdata = $_POST['deldata'];
        $num = count($postdata);
        $words = "";
        for ($i = 0; $i < $num; $i++) {
            if ($i == 0) {
                $words = $postdata[$i];
            } else {
                $words = $words . ',' . $postdata[$i];
            }
        }
        if ($num === 0) {
            echo 'none';
        } elseif ($num === 1) {
            $result = $db->query('DELETE FROM detail WHERE iddetail="' . $words . '"')->execute();
        } else {
            $result = $db->query('DELETE FROM detail WHERE iddetail IN"(' . $words . ')"')->execute();
        }
        if ($result) echo 'ok';

        break;
    case 'chart1':
        $data = $_POST['perioddata'];
        $only = $_POST['num'];
        if ($only === '0') {
            $rows = $db->query('SELECT * FROM detail WHERE iddetail=' . $data)->fetchAll(PDO::FETCH_ASSOC);
            // print_r('SELECT * FROM detail WHERE iddetail=' . $data);
        } elseif ($only === '1') {
            $rows = $db->query('SELECT * FROM detail WHERE iddetail IN(' . $data . ')')->fetchAll(PDO::FETCH_ASSOC);
            // print_r('SELECT * FROM detail WHERE iddetail IN(' . $data . ')');
        }
        $rew = array();
        foreach ($rows as $key => $row) {
            $rew['period'][$key] = array('Period' => $row['Period']);
            $rew['data'][$key] = array(
                'Period' => $row['Period'],
                'B_ADSL' => $row['B_ADSL'],
                'B_Cable_Modem' => $row['B_Cable_Modem'],
                'BCable' => $row['B_ADSL'] + $row['B_Cable_Modem'] + $row['B_FTTX '] + $row['B_Leased_Line'],
                'BWireless' => $row['WB_PWLAN '] + $row['WB_3GDate '] + $row['WB_4GDate'],
                'Mobile' => $row['M_3GDataCard'] + $row['M_3GPhone'] + $row['M_4GDataCard'] + $row['M_4GPhone']
            );
            $rew['title'] = array('BCable', 'BWireless', 'B_ADSL', 'B_Cable_Modem', 'Mobile');
        }
        $newdata = json_encode($rew);
        echo $newdata;

        break;

}
