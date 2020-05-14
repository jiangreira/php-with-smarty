<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-13 10:13:03
  from '/var/www/html/sm02/templates/list.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebb57afbaf8e5_33950423',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f96cde124380d4acaa4a13ab914f2689b40d7b91' => 
    array (
      0 => '/var/www/html/sm02/templates/list.html',
      1 => 1589335981,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5ebb57afbaf8e5_33950423 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
	<head>
        <meta charset="UTF-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+TC&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<style>
			html,
			body {
				height: 100%;
				font-family: "Noto Sans TC", sans-serif;
			}
		</style>
	</head>
	<body>
        <?php $_smarty_tpl->_subTemplateRender('file:navbar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        
        <!-- msg -->
        <?php if (isset($_smarty_tpl->tpl_vars['createmsg']->value)) {?>
        <?php echo '<script'; ?>
>alert('<?php echo $_smarty_tpl->tpl_vars['createmsg']->value;?>
')<?php echo '</script'; ?>
>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['updatemsg']->value)) {?>
        <?php echo '<script'; ?>
>alert('<?php echo $_smarty_tpl->tpl_vars['updatemsg']->value;?>
')<?php echo '</script'; ?>
>
        <?php }?>
        <!-- end -->
		<div class="container mt-3 d-flex justify-content-center">
			<h4 class="mt-3 mb-3">清單列表</h4>
			<hr />
			<button id="createbtn" class="btn btn-primary float-right mb-3 mr-2">新增</button>
			<button id="deletebtn" class="btn btn-primary float-right mb-3 mr-2">刪除</button>
			<button id="exportbtn" class="btn btn-primary float-right mb-3">匯出</button>
		</div>
		<div class="container">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">選取</th>
						<th scope="col">功能</th>
						<th scope="col">#</th>
						<th scope="col">區間</th>
						<th scope="col">寬頻有線(total)</th>
						<th scope="col">寬頻無線(total)</th>
						<th scope="col">行動上網(total)</th>
					</tr>
				</thead>
				<tbody>
                    <?php if ($_smarty_tpl->tpl_vars['selectdata']->value == 'nodata') {?>
                    <tr>
                        <td colspan="7" class="text-center">無資料</td>
                    </tr>
                    <?php } else { ?>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['selectdata']->value, 'detail');
$_smarty_tpl->tpl_vars['detail']->iteration = 0;
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['detail']->value) {
$_smarty_tpl->tpl_vars['detail']->iteration++;
$__foreach_detail_0_saved = $_smarty_tpl->tpl_vars['detail'];
?>
					<tr>
						<td class="text-center">
							<input class="form-check-input" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['detail']->value['Id'];?>
" id="defaultCheck1" />
						</td>
						<td><a href="edit.php?id=<?php echo $_smarty_tpl->tpl_vars['detail']->value['Id'];?>
" class="btn btn-info btn-sm material-icons">create</a></td>
						<td><?php echo $_smarty_tpl->tpl_vars['detail']->iteration;?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['detail']->value['Period'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['detail']->value['BCable'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['detail']->value['BWireless'];?>
</td>
						<td><?php echo $_smarty_tpl->tpl_vars['detail']->value['Mobile'];?>
</td>
                    </tr>
                    <?php
$_smarty_tpl->tpl_vars['detail'] = $__foreach_detail_0_saved;
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    <?php }?>
				</tbody>
			</table>
		</div>
		<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"><?php echo '</script'; ?>
>
        <!-- 選取匯出 -->
        <?php echo '<script'; ?>
>
        $('#exportbtn').click(function(){
            var perioddata=[];
            $("input[type=checkbox]:checked").each(function () {
                perioddata.push($(this).val());
            });
            if(perioddata.length==0){
                alert('請至少選一筆');
            }
            $.ajax({
                type: "post",
                url: 'api/excel.api.php?do=test',
                data: { perioddata },
                success: function(response) {
                    response=JSON.parse(response);
                    var a = document.createElement("a");
                    a.href = response.file; 
                    a.download = response.name;
                    document.body.appendChild(a);
                    a.click();
                    a.remove();
                    location.reload();
                    }
                })
            })
    <?php echo '</script'; ?>
>
    <!-- 選取刪除 -->
    <?php echo '<script'; ?>
>
        $('#deletebtn').click(function(){
            var deldata=[];
            $("input[type=checkbox]:checked").each(function () {
                deldata.push($(this).val());
            });
            $num=deldata.length;
            if($num==0){
                alert('請至少選一筆');
            }
            $.ajax({
                type: "POST",
                url: 'api/data.api.php?data=del',
                data: { deldata },
                success: function(re) {
                    if(re){
                        if(confirm($num+'筆資料已刪除')){
                            location.reload();
                        }
                    }
                }
            });
        })
        
    <?php echo '</script'; ?>
>
    <!-- 導向 -->
    <?php echo '<script'; ?>
>
        $('#createbtn').click(function(){
            window.location = "create.php"
        })
    <?php echo '</script'; ?>
>
	</body>
</html>
<?php }
}
