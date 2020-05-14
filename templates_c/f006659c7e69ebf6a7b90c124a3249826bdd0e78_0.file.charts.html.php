<?php
/* Smarty version 3.1.34-dev-7, created on 2020-05-13 17:50:26
  from '/var/www/html/sm02/templates/charts.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5ebbc2e2ac8b35_34863891',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f006659c7e69ebf6a7b90c124a3249826bdd0e78' => 
    array (
      0 => '/var/www/html/sm02/templates/charts.html',
      1 => 1589363424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:navbar.tpl' => 1,
  ),
),false)) {
function content_5ebbc2e2ac8b35_34863891 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="container mt-3">
        <h4 class="mt-3 mb-3">圖表數據</h4>
        <table class="table mb-3">
            <tr>
                <th><span>圖表一</span></th>
                <th>
                    <div id="choose1">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['chart1']->value, 'data');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['data']->value) {
?>
                        <input class="choose1 ml-2 text-wrap" name="choose1[]" type="checkbox" id="<?php echo $_smarty_tpl->tpl_vars['data']->value['iddetail'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['iddetail'];?>
"><?php echo $_smarty_tpl->tpl_vars['data']->value['Period'];?>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                </th>
                <th><button id='choose1btn' class="btn btn-primary">更新/產生</button></th>
                <button onclick="testimg()">匯出圖片</button>
            </tr>
        </table>
        <div class="chart-container" style="position: relative; height:40vh; width:40vw">
            <canvas id="myChart1" width="400" height="400"></canvas>
        </div>
    </div>



    <?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.4.1.min.js"integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        var myLineChart;
        var choose1data;
        var choose1length;
        var Period=new Array();
        var BCable=new Array();
        var BWireless=new Array();
        var BADSL=new Array();
        var B_Cable_Modem=new Array();
        var Mobile=new Array();
        var chart1dataset=new Array();
        var color=['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)']
        var chart1= document.getElementById("myChart1").getContext("2d");
        $('#choose1btn').click(function(){
            var perioddata=[];
            var num;
            $("input[type=checkbox]:checked").each(function () {
                perioddata.push($(this).val());
            });
            if(perioddata.length===1){
                num=0;
            }else {
                num=1;
            }
            perioddata=perioddata.toString();
            $.ajax({
                type: "POST",
                url: 'api/data.api.php?data=chart1',
                data: { perioddata ,num},
                success: function(response) {
                   choose1data=JSON.parse(response);
                   choose1data.data.forEach(function(data){
                        Period.push(data.Period);
                        BCable.push(parseInt(data.BCable));
                        BWireless.push(parseInt(data.BWireless));
                        BADSL.push(parseInt(data.B_ADSL));
                        B_Cable_Modem.push(parseInt(data.B_Cable_Modem));
                        Mobile.push(parseInt(data.Mobile));
                   });
                   var choose1length=choose1data.data.length;

                   for(i=0;i<choose1length;i++){
                       chart1dataset[i]={
                        "label":Period[i],
                        "data":Array(BCable[i],BWireless[i],BADSL[i],B_Cable_Modem[i],Mobile[i]),
                        "borderWidth":2,
                        "borderColor":color[i],
                        "fill":false
                       }
                       
                   };
                   myLineChart = new Chart(chart1, {
                       type: 'line',
                       data: {
                            labels: choose1data.title,
                            datasets:  chart1dataset 
                       }
                    });
                }
            })
        })


        function testimg(){
            var url=document.getElementById("myChart1").toDataURL(); 
            // var url=myLineChart.toBase64Image();
            console.log(url)
            $.ajax({
                type: "POST",
                url: 'api/excel.api.php?do=exportimgexcel',
                data: { url},
                success: function(response) {
                    console.log(response)
                    // response=JSON.parse(response);
                    // var a = document.createElement("a");
                    // a.href = response.file; 
                    // a.download = response.name;
                    // document.body.appendChild(a);
                    // a.click();
                    // a.remove();
                    // location.reload();
                }
            })
        }
    <?php echo '</script'; ?>
> 
</body>
</html><?php }
}
