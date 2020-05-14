<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-11 23:20:00
  from '/var/www/html/sm02/templates/navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5eb96d200a0f78_75476468',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b4c1d40b97bfedc51030f8de9c84ac744667e4d6' => 
    array (
      0 => '/var/www/html/sm02/templates/navbar.tpl',
      1 => 1589210396,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5eb96d200a0f78_75476468 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php">Laravel Practice</a>
    <span class="text-info d-none d-lg-block">Hi,<?php echo $_SESSION['username'];?>
</span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
        <ul class="navbar-nav ml-auto mr-4">
            <li class="nav-item <?php if ($_smarty_tpl->tpl_vars['nowpage']->value == 'home') {?> active<?php }?> ">
                <a class="nav-link" href="home.php">Home </a>
            </li>
            <li class="nav-item <?php if ($_smarty_tpl->tpl_vars['nowpage']->value == 'list') {?> active<?php }?> ">
                <a class="nav-link" href="list.php">List</a>
            </li>
            <li class="nav-item <?php if ($_smarty_tpl->tpl_vars['nowpage']->value == 'create') {?> active<?php }?> ">
                <a class="nav-link" href="create.php">Create</a>
            </li>
            <li class="nav-item <?php if ($_smarty_tpl->tpl_vars['nowpage']->value == 'charts') {?> active<?php }?> ">
                <a class="nav-link" href="charts.php">Charts</a>
            </li>
        </ul>
     

        <a class="btn btn-outline-info my-2 my-sm-0 mr-2" href="api/sign.api.php?sign=logout">Log Out</a>

    </div>

</nav><?php }
}
