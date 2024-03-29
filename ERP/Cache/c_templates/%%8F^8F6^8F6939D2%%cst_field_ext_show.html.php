<?php /* Smarty version 2.6.26, created on 2019-07-29 13:52:16
         compiled from crm/cst_field_ext_show.html */ ?>
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
          <h5><i class="fa fa-home"></i>扩展字段管理</h5>
          <div class="ibox-tools"> <a href="?" class="btn btn-xs btn-danger"><i class="fa fa-refresh"></i>刷新</a> </div>
        </div>
        <div class="row">
          <div class="col-sm-2">
			  <div class="ibox-content"><span>表单管理</span></div>
			  <div class="ibox-content">
				  <p><a href="javascript:void(0)" class="left_menu" data-main="cst_customer" data-ext="cst_customer">客户信息</a></p>
				  <p><a href="javascript:void(0)" class="left_menu" data-main="cst_linkman" data-ext="cst_linkman">客户联系人</a></p>
				  <p><a href="javascript:void(0)" class="left_menu" data-main="sup_supplier" data-ext="sup_supplier">供应商信息</a></p>
				  <p><a href="javascript:void(0)" class="left_menu" data-main="sup_linkman" data-ext="sup_linkman">供应商联系人</a></p>
			  </div>
				</div>
          <div class="col-sm-10">
            <div class="ibox-content">
              <form id="pagerForm" method="post"  class="form-inline">
						<input type="hidden" name="main_table" id="main_table" value="">
						<input type="hidden" name="ext_table" id="ext_table" value="">
                <div class="col-sm-3 m-b-xs"> 
							<a class="btn btn-info single_operation" data-act="add" href="javascript:void(0)"><i class="fa fa-plus"></i>添加</a> 
							<a class="btn btn-danger batch_operation" href="#" data-act="del">批量删除</a> 
                </div>
                <div class="col-sm-9 m-b-xs text-right">
                  <div class="form-group  pd-b-5">
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
                    <th width="120">表单提示文字</th>
                    <th width="100">字段名称</th>
                    <th width="120">类型</th>
                    <th width="80">默认值</th>
                    <th width="80">最大值</th>
                    <th width="100" orderField="by_adt" class="sort-filed"><span>排序</span></th>
                    <th width="80">是否启用</th>
                    <th width="80">必填</th>
                    <th width="80">操作</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot class="ibox-content">
                  <tr>
                    <td colspan="10" align="center"></td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script id="tableListTpl" type="text/html">
<% for(var i=0;i<list.length;i++) { %>
	<tr>
		<td><input name="field_ext_id" class="checkboxCtrlId" value="<%=list[i]['field_ext_id']%>" type="checkbox"></td>
		<td><%=list[i]['show_name']%></td>
		<td><%=list[i]['field_name']%></td>
		<td><%=list[i]['field_type_arr']['name']%></td>
		<td><%=list[i]['default']%></td>
		<td><%=list[i]['maxlength']%></td>
		<td><input type="text" name="sort" value="<%=list[i]['sort']%>" class="form-control w50 modify_sort" data-id="<%=list[i]['field_ext_id']%>" size="5"></td>
		<td>
		  <div class="onoffswitch">
       		<input type="checkbox" class="onoffswitch-checkbox" data-id="<%=list[i]['field_ext_id']%>"  id="field_visible_id_<%=list[i]['field_ext_id']%>"  <%if(list[i]['visible']==1){%> checked  <%}%>  >
	   		<label class="onoffswitch-label" for="field_visible_id_<%=list[i]['field_ext_id']%>"> 
	   			<span class="onoffswitch-inner"></span> 
				 <span class="onoffswitch-switch"></span> 
			 </label>
      	</div>
		</td>
		<td> <%if(list[i]['is_must']==0){%> <span class="badge badge-danger">否</span> <%}else{%> <span class="badge badge-primary">是</span> <%}%></td>
		<td>
			<p><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['field_ext_id']%>" data-act="modify">修改</a></p>
			<%if(list[i]['is_system']==0){%> 
				<p><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['field_ext_id']%>" data-act="del">删除</a></p> 
			<%}%> 
		</td>
	</tr>
<% } %>
</script> 
<!-- 自定义js --> 
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script> 
<script>
var ajaxUrl='<?php echo @ACT; ?>
/index.php/crm/CstFieldExt/cst_field_ext_json/';
$(document).ready(function () {
	//页面加载时初始化分页
	turnPage(1);
	
	$('.chosen-select').chosen({search_contains: true});
	$('.chosen-select').chosen().change(function(){
		ajaxSearchFormData = $("form").serialize();
		turnPage(1);
	});
		
//左边搜索
	$("body").on("click", ".left_menu", function() {
		main =$(this).attr("data-main");
		ext	 =$(this).attr("data-ext");
		$("#main_table").val(main);
		$("#ext_table").val(ext);
		ajaxSearchFormData = $("form").serialize();
		turnPage(1);			
	});

	$("body").on("click", ".batch_operation", function() {
		batch_act =$(this).attr("data-act")
		var chk_value =[]; 
    	$("tbody input[class='checkboxCtrlId']:checked").each(function(){ 
        chk_value.push($(this).val()); 
		}); 
		field_ext_id_txt=chk_value.join(",");
		if(batch_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/crm/CstFieldExt/cst_field_ext_del/";
		}
    //alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value); 
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"field_ext_id":field_ext_id_txt},
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
		field_ext_id =$(this).attr("data-id");
		single_act =$(this).attr("data-act")
		if(single_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/crm/CstFieldExt/cst_field_ext_del/";
			$.ajax({
				type: "POST",
				url: act_url,
				data:{"field_ext_id":field_ext_id},
				dataType:"json",
				success: function(data){
					if(data.statusCode=='200'){
						layer.msg('操作成功', {icon: 1}); 
						turnPage(1);
					}
				}
			});
		}else if(single_act=="add"){
			main_table=$("#main_table").val();
			ext_table=$("#ext_table").val();
			layer.open({
				type: 2,
				title: '添加字段',
				shadeClose: true,
				fixed: false, //不固定
				area: ['90%', '90%'],
				content: '<?php echo @ACT; ?>
/crm/CstFieldExt/cst_field_ext_add/main_table/'+main_table+'/ext_table/'+ext_table+'/',
				end: function () {
					turnPage(1);//页面加载时初始化分页
				}
			});			
			return false;		
		}else if(single_act=="modify"){
			layer.open({
				type: 2,
				title: '修改字段',
				shadeClose: true,
				fixed: false, //不固定
				area: ['90%', '90%'],
				content: '<?php echo @ACT; ?>
/crm/CstFieldExt/cst_field_ext_modify/field_ext_id/'+field_ext_id+'/',
				end: function () {
					turnPage(1);//页面加载时初始化分页
				}
			});			
			return false;		
		}
	});

	$("body").on("click", ".onoffswitch-checkbox", function() {
			id =$(this).attr("data-id")
			ischecked=$(this).prop('checked');
			if(ischecked){
			   visible='1';
			}else{
				visible='0';
			}
			$.ajax({
				type: "POST",
				url: "<?php echo @ACT; ?>
/index.php/crm/CstFieldExt/cst_field_ext_modify_visible/",
				data:{"visible":visible,"field_ext_id":id},
				dataType:"json",
				success: function(data){
					if(data.statusCode=='200'){
						layer.msg('操作成功', {icon: 1});   
					}
					console.log(data.rtnstatus);
				}
			});
		});
	$("body").on("blur", ".modify_sort", function() {
		id 	=$(this).attr("data-id")
		sort=$(this).val();
		$.ajax({
			type: "POST",
			url: "<?php echo @ACT; ?>
/index.php/crm/CstFieldExt/cst_field_ext_modify_sort/",
			data:{"sort":sort,"field_ext_id":id},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1});   
				}
				console.log(data.rtnstatus);
			}
		});
	});	
});
</script>
</body>
</html>