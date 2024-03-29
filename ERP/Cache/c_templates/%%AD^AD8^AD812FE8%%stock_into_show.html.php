<?php /* Smarty version 2.6.26, created on 2019-07-29 13:35:19
         compiled from erp/stock_into_show.html */ ?>
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
          <h5><i class="fa fa-home"></i>入库单列表</h5>
          <div class="ibox-tools"><a href="javascript:void(0);" class="btn btn-xs btn-default btn-help-detail" data-type="stock_into"> <i class="fa fa-question-circle"> 操作说明</i></a> </div>
        </div>
        <div class="ibox-content table-responsive">
          <div class="row">
            <form id="pagerForm" method="post" class="form-inline">
              <div class="col-sm-3 m-b-xs">
				  		<a href="?" class="btn  btn-default"> <i class="fa fa-refresh"> 刷新</i></a>
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
                  <input type="text" name="keywords" placeholder="请输入商品名称或者SKU名称关键字" class="form-control">
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
                <th width="150" orderField="by_supplier" class="sort-filed"><span>对应单号</span></th>
				  		<th width="100"><span>仓库</span></th>
				  		<th width="120"><span>创建人/时间</span></th>
                <th width="100"><span>状态</span></th>
                <th width="100"><span>入库数量</span></th>
                <th width="120"><span>入库人员/时间</span></th>
                <th width="120"><span>入库类型</span></th>
                <th><span>备注</span></th>
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
		<td><input name="into_id" class="checkboxCtrlId" value="<%=list[i]['into_id']%>" type="checkbox"></td>
		<td><%=list[i]['title']%></td>
		<td><%=list[i]['store_arr']['name']%></td>
		<td>
			<%=list[i]['create_user_arr']['name']%>
			<p><small><%=list[i]['create_time']%></small></p>
	
		</td>	
		<td><%:=list[i]['status_arr']['status_name_html']%></td>
		<td><%=list[i]['number']%></td>
		<td>
			<%=list[i]['into_user_arr']['name']%>
			<p><small><%=list[i]['into_time']%></small></p>
		</td>
		<td><%=list[i]['into_type']%></td>
		<td><%=list[i]['intro']%></td>		
		<td class="text-center">
			<% for(var j=0;j<list[i]['status_arr']['status_operation'].length;j++) { %>
			<p><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['into_id']%>" data-act="<%=list[i]['status_arr']['status_operation'][j]['act']%>"><font color="<%=list[i]['status_arr']['status_operation'][j]['color']%>"><%=list[i]['status_arr']['status_operation'][j]['name']%></font></a></p>
			<% } %>
		</td>
	</tr>
<% } %>
</script>
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script>
<script type="text/javascript">
var ajaxUrl='<?php echo @ACT; ?>
/erp/StockInto/stock_into_json/';
$(document).ready(function () {
	 
	turnPage(1);//页面加载时初始化分页


	$("body").on("click", ".batch_operation", function() {
		batch_act =$(this).attr("data-act")
		var chk_value =[]; 
    	$("tbody input[class='checkboxCtrlId']:checked").each(function(){ 
        chk_value.push($(this).val()); 
		}); 
		into_id_txt=chk_value.join(",");
		if(batch_act=="export"){
		  	act_url="<?php echo @ACT; ?>
/index.php/erp/StockInto/stock_into_sure/";	
		}else if(batch_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/StockInto/stock_into_del/";
		}
    //alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value); 
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"into_id":into_id_txt},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1}); 
					turnPage(1);
				}
			}
		});
	});
	
	$("body").on("click", ".single_operation", function() {
		into_id =$(this).attr("data-id");
		single_act =$(this).attr("data-act")
		if(single_act=="stock_sure"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/StockInto/stock_into_sure/";	
		}else if(single_act=="delete"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/StockInto/stock_into_del/";
		}
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"into_id":into_id},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1}); 
					turnPage(1);
				}else{
					layer.msg(data.message, {icon: 5}); 
				}
			}
		});	
	});
});
</script>