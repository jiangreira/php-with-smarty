<?php
$db = new PDO('mysql:host=localhost;dbname=Test_04;charset=utf8', 'root', 'kuma0315');
session_start();
switch ($_GET['sign']) {
    case 'login':
        print_r($_POST);
        $useremail = $_POST['email'];
        $userpasswod = $_POST['password'];
        $chkuser = 'SELECT * FROM members2 WHERE email="' . $useremail . '"';
        $rows = $db->query($chkuser)->fetchAll(PDO::FETCH_ASSOC);
        if (!$rows) {
            $_SESSION['loginmsg'] = 'noemail';
            return header('Location:../login.php');
        }
        // db裡的password
        $hashedPassword = $rows[0]['password'];
        // verity
        if (password_verify($userpasswod, $hashedPassword)) {
            $_SESSION['username'] = $rows[0]['username'];
            return header('Location:../list.php');
        } else {
            $_SESSION['loginmsg'] = 'wrongpassord';
            return header('Location:../login.php');
        }
        break;
    case 'register':
        // chk is double email
        $useremail = $_POST['email'];
        $chkemail = 'SELECT email FROM smmembers WHERE email="' . $useremail . '"';
        $chkemailrows = $db->query($chkemail)->fetchAll(PDO::FETCH_ASSOC);
        if ($chkemailrows) {
            $_SESSION['registermsg'] = 'doublemail';
            return header('Location:../register.php');
        }
        // chk password >= 8 length
        if (strlen($_POST['password']) < 9) {
            $_SESSION['registermsg'] = 'enoughpassword';
            return header('Location:../register.php');
        }
        // md5 password & insert into database
        $userpassword = md5($_POST['password']);
        $username = $_POST['username'];

        $sql = 'INSERT INTO smmembers VALUES ("null","' . $username . '","' . $useremail . '","' . $userpassword . '")';
        $db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
        // chkreally insert
        $rows = $db->query($chkemail)->fetchAll(PDO::FETCH_ASSOC);
        if ($rows) {
            $_SESSION['registermsg'] = 'success';
            return header('Location:../login.php');
        }
        break;
    case 'logout':
        session_destroy();
        return header('Location:../login.php');
        break;
};
