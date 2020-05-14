<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-11 20:04:24
  from '/var/www/html/sm02/templates/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb93f48c1cfe5_66628270',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed9cda586806f0d4e25362e8303efd3947fdbafa' => 
    array (
      0 => '/var/www/html/sm02/templates/login.html',
      1 => 1589198661,
      2 => 'file',
    ),
  ),
  'cache_lifetime' => 120,
),true)) {
function content_5eb93f48c1cfe5_66628270 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            font-family: 'Noto Sans TC', sans-serif;
        }

        body {
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
        }

        .form-signin .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }

        .form-signin .form-control:focus {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: -2px;
            border-radius: 0;
        }

        .form-signin input[type="text"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>
<body class="text-center">
    <div class="container">
        <div class="row align-item-center">
            <div class="col-12">
                <form method="POST" class="form-signin" action="api/sign.api.php?sign=login">
                    <img class="mb-4 rounded-circle" src="https://picsum.photos/id/453/130/130" alt="" width="130"
                        height="130">
                    <h1 class="h3 mb-3 font-weight-normal">請登入</h1>
                    <label for="inputEmail" class="sr-only">帳號</label>
                    <input type="email" id="inputEmail" name='email' class="form-control" placeholder="Email address"
                        value="" required autofocus>
                    <label for="inputPassword" class="sr-only">密碼</label>
                    <input type="password" id="inputPassword" name='password' class="form-control"
                        placeholder="Password" required>
                    <label for="vcode" class="sr-only">驗證碼</label>
                    <input type="text" id="vcode" name='vcode' class="form-control" placeholder="verification code"
                        >
                    <div class="mb-3">
                    </div>
                    <!--   -->
                    <button class="btn btn-lg btn-primary btn-block">登入</button>
                    <hr>
                </form>
            </div>
            <div class="col-12">
                <span> 沒有帳號? </span>
                <a class="btn btn-primary" href="register.php">註冊</a>
            </div>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>

</body>
</html><?php }
}
