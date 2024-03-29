<?php /* Smarty version 2.6.26, created on 2019-07-29 13:34:44
         compiled from erp/sup_supplier_show.html */ ?>
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
          <h5><i class="fa fa-home"></i> 供应商列表</h5>
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
                  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">批量操作 <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="del">批量删除</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-9 m-b-xs text-right">
				  		<div class="input-group pd-b-5">
                  <input type="text" name="name" placeholder="请输入供应商名字关键词" class="form-control">
				  		</div>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn  dropdown-toggle"><span class="caret"></span></button>
                  <div class="dropdown-menu">
                    <div class="ibox-content">
                      <div class="form-group">
                        <label>电话</label>
                        <input type="text" name="tel" placeholder="搜索供应商电话" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>手机号</label>
                        <input type="text" name="mobile" placeholder="搜索店铺手机号" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>联系地址</label>
                        <input type="text" name="content" placeholder="搜索店铺联系地址" class="form-control">
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
                <th width="200" orderField="by_supplier" class="sort-filed"><span>供应商名称</span></th>
				  		<th width="100"><span>经济类型</span></th>
				  		<th width="100"><span>行业类型</span></th>
                <th width="100" ><span>联系人</span></th>
                <th width="100"><span>电话</span></th>
                <th width="100"><span>传真</span></th>
                <th width="100"><span>邮箱</span></th>
                <th ><span>介绍</span></th>
                <th width="80">操作</th>
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
		<td><input name="supplier_id" class="checkboxCtrlId" value="<%=list[i]['supplier_id']%>" type="checkbox"></td>
		<td><%=list[i]['name']%><br><small>(创建：<%=list[i]['create_time']%>)</small></td>
		<td><%=list[i]['ecotype_name']%></td>
		<td><%=list[i]['trade_name']%></td>
		<td><%=list[i]['linkman']%></td>
		<td><%=list[i]['tel']%></td>
		<td><%=list[i]['fax']%></td>
		<td><%=list[i]['email']%></td>
		<td class="overflow-td"><%=list[i]['intro']%></td>
		
		<td width='10'>
			<div class="btn-group">
				<button data-toggle="dropdown" class="btn btn-default dropdown-toggle">操作 <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['supplier_id']%>" data-act="linkman">添加联系人</a></li>
					<li class="divider"></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['supplier_id']%>" data-act="modify">修改</a></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['supplier_id']%>" data-act="del">删除</a></li>
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
/index.php/erp/SupSupplier/sup_supplier_json/';
$(document).ready(function () {
	 
	turnPage(1);//页面加载时初始化分页

	
	$("body").on("click", ".batch_operation", function() {
		batch_act =$(this).attr("data-act")
		var chk_value =[]; 
    	$("tbody input[class='checkboxCtrlId']:checked").each(function(){ 
        chk_value.push($(this).val()); 
		}); 
		supplier_id_txt=chk_value.join(",");
		if(batch_act=="recommend"){
		   act_url="<?php echo @ACT; ?>
/index.php/erp/SupSupplier/sup_supplier_modify_recommend/";
		}else if(batch_act=="recommend_off"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/SupSupplier/sup_supplier_modify_recommend_off/";
		}else if(batch_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/SupSupplier/sup_supplier_del/";
		}
    //alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value); 
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"supplier_id":supplier_id_txt},
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
		supplier_id =$(this).attr("data-id");
		single_act =$(this).attr("data-act")
		if(single_act=="linkman"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/SupLinkman/cst_linkman_add/";
			layer.open({
				type: 2,
				title: '添加联系人',
				shadeClose: true,
				fixed: false, //不固定
				area: ['800px', '500px'],
				content: '<?php echo @ACT; ?>
/index.php/erp/SupLinkman/cst_linkman_add/supplier_id/'+supplier_id+'/' //iframe的url
			});			
			return false;	
		}else if(single_act=="add"){
			layer.open({
				type: 2,
				title: '添加供应商家',
				shadeClose: true,
				fixed: false, //不固定
				area: ['90%', '90%'],
				content: '<?php echo @ACT; ?>
/erp/SupSupplier/sup_supplier_add/',
				end: function () {
					turnPage(1);//页面加载时初始化分页
				}
			});			
			return false;	
		}else if(single_act=="modify"){
			layer.open({
				type: 2,
				title: '修改供应商家',
				shadeClose: true,
				fixed: false, //不固定
				area: ['90%', '90%'],
				content: '<?php echo @ACT; ?>
/index.php/erp/SupSupplier/sup_supplier_modify/supplier_id/'+supplier_id+'/',
				end: function () {
					turnPage(1);//页面加载时初始化分页
				}
			});			
			return false;
		}else if(single_act=="chance"){
			layer.open({
				type: 2,
				title: '添加销售机会',
				shadeClose: true,
				fixed: false, //不固定
				area: ['800px', '500px'],
				content: '<?php echo @ACT; ?>
/index.php/erp/CstChance/cst_chance_add/supplier_id/'+supplier_id+'/' //iframe的url
			});			
			return false;
		}else if(single_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/SupSupplier/sup_supplier_del/";
			$.ajax({
				type: "POST",
				url: act_url,
				data:{"supplier_id":supplier_id},
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