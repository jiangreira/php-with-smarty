<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-13 19:14:19
  from '/var/www/html/sm02/templates/login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebbd68b71aa19_60871328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed9cda586806f0d4e25362e8303efd3947fdbafa' => 
    array (
      0 => '/var/www/html/sm02/templates/login.html',
      1 => 1589368458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ebbd68b71aa19_60871328 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
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
    <?php if (isset($_smarty_tpl->tpl_vars['registermsg']->value)) {?>
    <?php echo '<script'; ?>
>alert('<?php echo $_smarty_tpl->tpl_vars['registermsg']->value;?>
')<?php echo '</script'; ?>
>
    <?php }?>
    <div class="container">
        <div class="row align-item-center">
            <div class="col-12">
                <form method="POST" class="form-signin" action="api/sign.api.php?sign=login">
                    <img class="mb-4 rounded-circle" src="https://picsum.photos/id/453/130/130" alt="" width="130"
                        height="130">
                    <h1 class="h3 mb-3 font-weight-normal">請登入</h1>
                    <label for="inputEmail" class="sr-only">帳號</label>
                    <input type="email" id="inputEmail" name='email' class="form-control" placeholder="Email address"
                        value="<?php echo $_smarty_tpl->tpl_vars['old']->value;?>
" required autofocus>
                    <label for="inputPassword" class="sr-only">密碼</label>
                    <input type="password" id="inputPassword" name='password' class="form-control"
                        placeholder="Password" required>
                    <label for="vcode" class="sr-only">驗證碼</label>
                    <input type="text" id="vcode" name='vcode' class="form-control" placeholder="verification code">

                    <div class="mb-3">
                        <canvas width="150" height="70" id="captcha1"></canvas>
                    </div>
                    <?php if (isset($_smarty_tpl->tpl_vars['loginmsg']->value)) {?>
                    <p class="alert alert-danger" role="alert"><?php echo $_smarty_tpl->tpl_vars['loginmsg']->value;?>
</p>
                    <?php }?> 
                    <button onclick="return chkvcode()"class="btn btn-lg btn-primary btn-block">登入</button>
                    <hr>
                </form>
            </div>
            <div class="col-12">
                <span> 沒有帳號? </span>
                <a class="btn btn-primary" href="register.php">註冊</a>
            </div>
        </div>
    </div>



    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    <?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="captcha-mini.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        let origincode;
        $( document ).ready(function() {
            let captcha1 = new CaptchaMini({
                lineWidth: 1,   //线条宽度
                lineNum: 6,       //线条数量
                dotR: 2,          //点的半径
                dotNum: 25,       //点的数量
                preGroundColor: [10, 80],    //前景色区间
                backGroundColor: [150, 250], //背景色区间
                fontSize: 30,           //字体大小
                fontFamily: ['Georgia', '微软正黑', 'Helvetica', 'Arial'],  //字体类型
                fontStyle: 'stroke',      //字体绘制方法，有fill和stroke
                content: 'abcdefghjkmnpqrstuvxyz23456789ABCDEFGHJKMNPQRSTUVWXYZ',  //验证码内容
                length: 4    //验证码长度
            }); 
            captcha1.draw(document.querySelector('#captcha1'), code => {
                origincode=code;

            });
        });
        function chkvcode(){
            var inputvcode=$('#vcode').val();
            if( origincode != inputvcode) {
                return false;
            }else{
                return true;
            }

        }
    <?php echo '</script'; ?>
>

</body>
</html><?php }
}
