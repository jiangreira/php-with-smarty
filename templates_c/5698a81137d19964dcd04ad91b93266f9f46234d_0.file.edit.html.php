<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-12 22:33:26
  from '/var/www/html/sm02/templates/edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebab3b62f39d9_97444531',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5698a81137d19964dcd04ad91b93266f9f46234d' => 
    array (
      0 => '/var/www/html/sm02/templates/edit.html',
      1 => 1589294004,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5ebab3b62f39d9_97444531 (Smarty_Internal_Template $_smarty_tpl) {
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
    html,body {
        height: 100%;
        font-family: 'Noto Sans TC', sans-serif;
    }
    .h5color {
            color: #ffc107;
            font-weight: 300;
    }
    ::placeholder {
        color: #e1dade !important;
        }

    .errorcolor {
        margin-left: 1rem;
        color: red;
        }
    </style>

</head>
<body>
    <?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
    <?php echo '<script'; ?>
>alert('<?php echo $_smarty_tpl->tpl_vars['error']->value;?>
')<?php echo '</script'; ?>
>
    <?php }?>
    <div class="container mt-3">
        <h4 class="mt-3 mb-3">數據編輯</h4>
        <hr>
    </div>
    <div class="container">
        <form method="POST" action="api/data.api.php?do=edit&id=<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['iddetail'];?>
">
            <button class="btn btn-primary float-right">編輯</button>
            <h5 class='h5color'>數據期間</h5>
            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="period">年月</label>
                <span class='errorcolor'><?php echo $_smarty_tpl->tpl_vars['createmsg']->value;?>
</span>
                <input type="text" name="period" class="form-control" id="period" placeholder="108/01" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['Period'];?>
" disabled>
                <input type="hidden" name="period" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['Period'];?>
">
              </div>
          
            </div>
            <h5 class='h5color'>寬頻上網-(有線)</h5>
            <div class="form-row">
              <div class="form-group col-6 col-md-3">
                <label for="BADSL">ADSL</label>
                <input type="number" name="BADSL" class="form-control" id="BADSL" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['B_ADSL'];?>
">
              </div>
              <div class="form-group col-6 col-md-3">
                <label for="BCableModem">Cable_Modem</label>
                <input type="number" name="BCableModem" class="form-control" id="BCableModem" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['B_Cable_Modem'];?>
">
              </div>
              <div class="form-group col-6 col-md-3">
                <label for="BFTTX">FTTX</label>
                <input type="number" name="BFTTX" class="form-control" id="BFTTX" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['B_FTTX'];?>
">
              </div>
              <div class="form-group col-6 col-md-3">
                <label for="BLeasedLine">Leased_Line</label>
                <input type="number" name="BLeasedLine" class="form-control" id="BLeasedLine" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['B_Leased_Line'];?>
">
              </div>
            </div>
            <h5 class='h5color'>寬頻上網-(無線)</h5>
            <div class="form-row">
              <div class="form-group col-6 col-md-4">
                <label for="WBWLAN">行動寬頻_PWLAN</label>
                <input type="number" name="WBWLAN" class="form-control" id="WBWLAN" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['WB_PWLAN'];?>
">
              </div>
              <div class="form-group col-6 col-md-4">
                <label for="WB3G">行動寬頻_3G數據</label>
                <input type="number" name="WB3G" class="form-control" id="WB3G" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['WB_3GDate'];?>
">
              </div>
              <div class="form-group col-6 col-md-4">
                <label for="WB4G">行動寬頻_4G數據</label>
                <input type="number" name="WB4G" class="form-control" id="WB4G" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['WB_4GDate'];?>
">
              </div>
            </div>
            <h5 class='h5color'>行動上網</h5>
            <div class="form-row">
              <div class="form-group col-6 col-md-3">
                <label for="M3GDataCard">3GDataCard</label>
                <input type="number" name="M3GDataCard" class="form-control" id="M3GDataCard" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['M_3GDataCard'];?>
">
              </div>
              <div class="form-group col-6 col-md-3">
                <label for="M3GPhone">3GPhone</label>
                <input type="number" name="M3GPhone" class="form-control" id="M3GPhone" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['M_3GPhone'];?>
">
              </div>
              <div class="form-group col-6 col-md-3">
                <label for="M4GDataCard">4DataCard</label>
                <input type="number" name="M4GDataCard" class="form-control" id="M4GDataCard" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['M_4GDataCard'];?>
">
              </div>
              <div class="form-group col-6 col-md-3">
                <label for="M4GPhone">4GPhone</label>
                <input type="number" name="M4GPhone" class="form-control" id="M4GPhone" value="<?php echo $_smarty_tpl->tpl_vars['data']->value[0]['M_4GPhone'];?>
">
              </div>
            </div>
          
          
          </form>
    </div>
    
   <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
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
</body>
</html><?php }
}
