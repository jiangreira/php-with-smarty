<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-09 01:13:48
  from '/var/www/html/sm02/templates/index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb5934c47ac22_91329152',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ba55d961c62c03c0e240268360ac7b39da4377ca' => 
    array (
      0 => '/var/www/html/sm02/templates/index.html',
      1 => 1588953808,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb5934c47ac22_91329152 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- @format -->

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
  </head>
  <body>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['content']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?> 這是Id:<?php echo $_smarty_tpl->tpl_vars['item']->value['Id'];?>
<br />
    這是Period:<?php echo $_smarty_tpl->tpl_vars['item']->value['Period'];?>
, 這是Data1:<?php echo $_smarty_tpl->tpl_vars['item']->value['data1'];?>
 這是Data2:<?php echo $_smarty_tpl->tpl_vars['item']->value['data2'];?>

    這是Data3:<?php echo $_smarty_tpl->tpl_vars['item']->value['data3'];?>
 這是Data4:<?php echo $_smarty_tpl->tpl_vars['item']->value['data4'];?>

    <hr />

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?> 這是html樣板
  </body>
</html>
<?php }
}
