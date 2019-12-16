<?php /* Smarty version 2.6.26, created on 2019-07-29 13:34:46
         compiled from erp/sup_linkman_show.html */ ?>
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
          <h5><i class="fa fa-home"></i> 联系人管理</h5>
          <div class="ibox-tools"><a href="?">
            <button type="button" class="btn btn-xs btn-danger"> <i class="fa fa-refresh"></i>刷新</button>
            </a> </div>
        </div>
        <div class="ibox-content table-responsive">
          <div class="row">
            <form id="pagerForm" method="post" class="form-inline">
              <div class="col-sm-3 m-b-xs">
				  		<a class="btn btn-info single_operation" href="javascript:void(0);" data-act="add"><i class="fa fa-plus"></i>添加</a>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-deault dropdown-toggle">批量操作 <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="online">批量发短信</a></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="offline">批量发邮件</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="del">批量删除</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-9 m-b-xs text-right">
				  		<div class="input-group pd-b-5">
                  <input type="text" name="keywords" placeholder="请输入姓名/手机号/座机/QQ" class="form-control">
				  		</div>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                  <div class="dropdown-menu">
                    <div class="ibox-content">
                      <div class="form-group">
                        <label>供应商名称</label>
                        <input type="text" name="customer_name" placeholder="搜索供应商名称" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>通信地址</label>
                        <input type="text" name="address" placeholder="搜索通信地址" class="form-control">
                      </div>
                      <div class="form-group">
                        <button type="button" class="btn btn-primary btn-xs btn-block ajaxSearchForm"><i class="fa fa-search"></i> 搜索</button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="input-group">
                  <span class="input-group-btn">
                  <button type="button" class="btn btn-primary ajaxSearchForm"><i class="fa fa-search"></i> 搜索</button>
                  </span> </div>
              </div>
            </form>
          </div>
          <table class="table table-hover sorttable 07fly-table" width="100%">
            <thead>
              <tr>
                <th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
                <th width="150" orderField="by_supplier" class="sort-filed"><span>供应商名称</span></th>
				  		<th width="120"><span>姓名</span></th>
				  		<th width="80"><span>性别</span></th>
                <th width="100"><span>职位</span></th>
                <th width="120"><span>手机</span></th>
                <th width="120"><span>座机</span></th>
                <th width="120"><span>QQ</span></th>
                <th><span>邮箱</span></th>
                <th width="80" class="text-center">操作</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
			  <table class="table 07fly-table"><tfoot class="ibox-content"><tr><td align="center" class="pagestring"></td></tr></tfoot></table>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script id="tableListTpl" type="text/html">
<% for(var i=0;i<list.length;i++) { %>
	<tr>
		<td><input name="linkman_id" class="checkboxCtrlId" value="<%=list[i]['linkman_id']%>" type="checkbox"></td>
		<td><%=list[i]['supplier_name']%></td>
		<td><%=list[i]['name']%></td>
		<td>
			<%if(list[i]['gender']=1){%>
			 	男
			<%}else{%> 
			 	女
			<%}%> 
		</td>
		<td><%=list[i]['postion']%></td>
		<td><%=list[i]['mobile']%></td>
		<td><%=list[i]['tel']%></td>
		<td><%=list[i]['qicq']%></td>		
		<td><%=list[i]['email']%></td>		
		<td width='10'>
			<div class="btn-group">
				<button data-toggle="dropdown" class="btn btn-default dropdown-toggle">操作 <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li class="divider"></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['linkman_id']%>" data-act="modify">修改</a></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['linkman_id']%>" data-act="del">删除</a></li>
				</ul>
			</div>
		</td>
	</tr>
<% } %>
</script>
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script>
<script type="text/javascript">
var ajaxUrl='<?php echo @ACT; ?>
/index.php/erp/SupLinkman/sup_linkman_json/';
$(document).ready(function () {
	 
	turnPage(1);//页面加载时初始化分页


	$("body").on("click", ".batch_operation", function() {
		batch_act =$(this).attr("data-act")
		var chk_value =[]; 
    	$("tbody input[class='checkboxCtrlId']:checked").each(function(){ 
        chk_value.push($(this).val()); 
		}); 
		linkman_id_txt=chk_value.join(",");
		if(batch_act=="recommend"){
		   act_url="<?php echo @ACT; ?>
/index.php/erp/SupLinkman/sup_linkman_modify_recommend/";
		}else if(batch_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/SupLinkman/sup_linkman_del/";
		}
    //alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value); 
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"linkman_id":linkman_id_txt},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1}); 
				}
			},
			complete: function () {//完成响应
			}
		});
	});
	
	$("body").on("click", ".single_operation", function() {
		linkman_id =$(this).attr("data-id");
		single_act =$(this).attr("data-act")
		if(single_act=="add"){
			layer.open({
				type: 2,
				title: '添加联系人',
				shadeClose: true,
				fixed: false, //不固定
				area: ['90%', '90%'],
				content: '<?php echo @ACT; ?>
/index.php/erp/SupLinkman/sup_linkman_add/',
				end: function () {
					turnPage(1);//页面加载时初始化分页
				}
			});			
			return false;	
		}else if(single_act=="modify"){
			layer.open({
				type: 2,
				title: '修改联系人',
				shadeClose: true,
				fixed: false, //不固定
				area: ['90%', '90%'],
				content: '<?php echo @ACT; ?>
/erp/SupLinkman/sup_linkman_modify/linkman_id/'+linkman_id+'/',
				end: function () {
					turnPage(1);//页面加载时初始化分页
				}
			});			
			return false;	
		}else if(single_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/SupLinkman/sup_linkman_del/";
			$.ajax({
				type: "POST",
				url: act_url,
				data:{"linkman_id":linkman_id},
				dataType:"json",
				success: function(data){
					if(data.statusCode=='200'){
						layer.msg('操作成功', {icon: 1}); 
						turnPage(1);//页面加载时初始化分页
					}
				}
			});
		}
	});
	
	
});
</script>