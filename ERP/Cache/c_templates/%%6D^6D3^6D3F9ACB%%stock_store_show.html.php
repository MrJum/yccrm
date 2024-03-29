<?php /* Smarty version 2.6.26, created on 2019-07-29 13:52:13
         compiled from erp/stock_store_show.html */ ?>
<!DOCTYPE html>
<html>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-sm-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5><i class="fa fa-home"></i>仓库管理</h5>
          <div class="ibox-tools"><a href="?" class="btn btn-xs btn-danger"><i class="fa fa-refresh"></i>刷新</a> </div>
        </div>
        <div class="ibox-content">
          <form id="pagerForm" method="post"  class="form-inline">
            <div class="col-sm-3 m-b-xs"> 
					 <a class="btn btn-info single_operation" data-act="add" data-id="0">添加数据</a>
					 <a class="btn btn-danger batch_operation" href="#" data-act="del">批量删除</a>
            </div>
            <div class="col-sm-9 m-b-xs text-right">
              <div class="form-group">
                <input type="text" name="name" placeholder="输入搜索名称" class="form-control">
              </div>
              <div class="input-group"> <span class="">
                <button type="button" class="btn btn-primary ajaxSearchForm"><i class="fa fa-search"></i> 搜索</button>
                </span> </div>
            </div>
          </form>
        </div>
        <div class="ibox-content">
          <table class="table table-hover sorttable 07fly-table" width="100%">
            <thead>
              <tr>
                <th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
                <th width="120">仓库名称</th>
                <th>仓库管理人员</th>
                <th width="150" orderField="by_adt" class="sort-filed"><span>排序</span></th>
                <th width="120">是否启用</th>
                <th width="80">操作</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
				<table class="table 07fly-table"><tfoot class="ibox-content">
              <tr>
                <td colspan="5" align="center"></td>
              </tr>
            </tfoot></table>
        </div>
      </div>
    </div>
  </div>
</div>
<script id="tableListTpl" type="text/html">
<% for(var i=0;i<list.length;i++) { %>
	<tr>
		<td><input name="store_id" class="checkboxCtrlId" value="<%=list[i]['store_id']%>" type="checkbox"></td>
		<td><%=list[i]['name']%></td>
		<td><%=list[i]['card']%></td>
		<td><input type="text" name="sort" value="<%=list[i]['sort']%>" class="form-control w50 modify_sort" data-id="<%=list[i]['store_id']%>" size="5"></td>
		<td>
		  <div class="onoffswitch">
       		<input type="checkbox" class="onoffswitch-checkbox" data-id="<%=list[i]['store_id']%>"  id="id_<%=list[i]['store_id']%>"  <%if(list[i]['visible']==1){%> checked  <%}%>  >
	   		<label class="onoffswitch-label" for="id_<%=list[i]['store_id']%>"> 
	   			<span class="onoffswitch-inner"></span> 
				 <span class="onoffswitch-switch"></span> 
			 </label>
      	</div>
		</td>
		<td width='10'>
			<div class="btn-group">
				<button data-toggle="dropdown" class="btn btn-info dropdown-toggle">操作 <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['store_id']%>" data-act="modify">修改</a></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['store_id']%>" data-act="del">删除</a></li>
				</ul>
			</div>
		</td>
	</tr>
<% } %>
</script> 
<!-- 自定义js --> 
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script> 
<script>
var ajaxUrl='<?php echo @ACT; ?>
/index.php/erp/StockStore/stock_store_json/';
$(document).ready(function () {
	
	turnPage(1);//页面加载时初始化分页

	$("body").on("click", ".batch_operation", function() {
		batch_act =$(this).attr("data-act")
		var chk_value =[]; 
    	$("tbody input[class='checkboxCtrlId']:checked").each(function(){ 
        chk_value.push($(this).val()); 
		}); 
		store_id_txt=chk_value.join(",");
		if(batch_act=="del"){
			act_url="<?php echo @ACT; ?>
/erp/StockStore/stock_store_del/";
		}
    //alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value); 
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"store_id":store_id_txt},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1});
					turnPage(1);
				}
			},
			complete: function () {//完成响应
			}
		});
	});
	
	$("body").on("click", ".single_operation", function() {
		store_id =$(this).attr("data-id");
		single_act =$(this).attr("data-act")
		if(single_act=="del"){
			act_url="<?php echo @ACT; ?>
/erp/StockStore/stock_store_del/";
		}else if(single_act=="add"){
			layer.open({
				type: 2,
				title: '添加仓库',
				shadeClose: true,
				fixed: false, //不固定
				area: ['800px', '500px'],
				content: '<?php echo @ACT; ?>
/erp/StockStore/stock_store_add/' //iframe的url
			});			
			return false;	
		}else if(single_act=="modify"){
			layer.open({
				type: 2,
				title: '修改仓库',
				shadeClose: true,
				fixed: false, //不固定
				area: ['800px', '500px'],
				content: '<?php echo @ACT; ?>
/erp/StockStore/stock_store_modify/store_id/'+store_id+'/' //iframe的url
			});			
			return false;	
		}
		
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"store_id":store_id},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1}); 
					turnPage(1);
				}
			}
		});
	});

	$("body").on("click", ".onoffswitch-checkbox", function() {
			store_id =$(this).attr("data-id")
			ischecked=$(this).prop('checked');
			if(ischecked){
			   visble='1';
			}else{
				visble='0';
			}
			$.ajax({
				type: "POST",
				url: "<?php echo @ACT; ?>
/erp/StockStore/stock_store_modify_visible/",
				data:{"visble":visble,"store_id":store_id},
				dataType:"json",
				success: function(data){
					if(data.statusCode=='200'){
						layer.msg('操作成功', {icon: 1});   
					}
					console.log(data.message);
				}
			});
		});
	$("body").on("blur", ".modify_sort", function() {
		store_id 	=$(this).attr("data-id")
		sort=$(this).val();
		$.ajax({
			type: "POST",
			url: "<?php echo @ACT; ?>
/erp/StockStore/stock_store_modify_sort/",
			data:{"sort":sort,"store_id":store_id},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1});   
				}
				console.log(data.message);
			}
		});
	});	
});
</script>
</body>
</html>