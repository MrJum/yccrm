<?php /* Smarty version 2.6.26, created on 2019-07-29 13:52:43
         compiled from erp/fin_invoice_pay_show.html */ ?>
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
          <h5><i class="fa fa-home"></i> 开发票列表</h5>
          <div class="ibox-tools"><a href="?">
            <button type="button" class="btn btn-xs btn-danger"> <i class="fa fa-refresh"></i>刷新</button>
            </a> </div>
        </div>
        <div class="ibox-content table-responsive">
          <div class="row">
            <form id="pagerForm" method="post" class="form-inline">
              <div class="col-sm-3 m-b-xs"> 
				  		<a class="btn btn-info single_operation" data-act="add" href="javascript:void(0)"><i class="fa fa-plus"></i>添加</a>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-default dropdown-toggle">批量操作 <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="export">批量导出</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="delete">批量删除</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-9 m-b-xs text-right">
				  		<div class="form-group text-left  pd-b-5">
                  <select data-placeholder="收票日期所有..." name="rece_date" class="chosen-select" style="width: 150px;" >
                    <option value="0">收票日期所有</option>
                    <option value="3d">最近三天</option>
                    <option value="7d">最近一周</option>
                    <option value="15d">最近半月</option>
                    <option value="1m">最近一月</option>
                    <option value="3m">最近三月</option>
                    <option value="6m">最近六月</option>
                    <option value="12m">最近一年</option>
                  </select>
                </div>
                <div class="form-group text-left pd-b-5">
                  <select data-placeholder="创建日期所有..." name="create_date" class="chosen-select" style="width: 150px;" >
                    <option value="0">创建日期所有</option>
                    <option value="3d">最近三天</option>
                    <option value="7d">最近一周</option>
                    <option value="15d">最近半月</option>
                    <option value="1m">最近一月</option>
                    <option value="3m">最近三月</option>
                    <option value="6m">最近六月</option>
                    <option value="12m">最近一年</option>
                  </select>
                </div>
				  		<div class="input-group pd-b-5">
                  <input type="text" name="contract_name" placeholder="搜索请输入合同标题" class="form-control">
				  		</div>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn dropdown-toggle"><span class="caret"></span></button>
                  <div class="dropdown-menu">
                    <div class="ibox-content">
                      <div class="form-group">
                        <label>客户名称</label>
                        <input type="text" name="customer_name" placeholder="搜索客户名称" class="form-control">
                      </div>
                      <div class="form-group">
                        <label>金额</label>
                        <input type="text" name="money" placeholder="搜索金额" class="form-control">
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
                <th width="200" orderField="by_customer" class="sort-filed"><span>客户名称</span></th>
				  		<th width="150"><span>合同单号</span></th>
                <th width="200"><span>发票金额/编号</span></th>
				  		<th width="100" orderField="by_recedate" class="sort-filed"><span>开票时间</span></th>
                <th width="60"><span>期次</span></th>
                <th width="80"><span>创建人</span></th>
                <th><span>备注</span></th>
                <th width="60" class="text-center">操作</th>
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
		<td><input name="record_id" class="checkboxCtrlId" value="<%=list[i]['record_id']%>" type="checkbox"></td>
		<td><%=list[i]['customer']['name']%><p><small>创建于：<%=list[i]['create_time']%></small></p></td>
		<td><%=list[i]['contract']['title']%></td>
		<td>
			<p>内容：<%=list[i]['name']%></p>
			<p>编号：<%=list[i]['invoice_no']%></p>
			<p>金额：<%=list[i]['money']%></p>
			
		</td>
		<td><%=list[i]['pay_date']%></td>
		<td><%=list[i]['stages']%></td>
		<td><%=list[i]['create_user_arr']['name']%></td>
		<td class="overflow-td"><%:=list[i]['intro']%></td>		
		<td class="text-center">
		<p><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['record_id']%>" data-act="delete">删除</a></p>	
		</td>
	</tr>
<% } %>
  <tr>
	<td colspan="11" align="left">
		金额合计：<span class="text-danger">&yen;<%=countMoney['total_money']%></span>
	</td>
  </tr>
</script>
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script>
<script type="text/javascript">
var ajaxUrl='<?php echo @ACT; ?>
/index.php/erp/FinInvoicePay/fin_invoice_pay_json/';
$(document).ready(function () {
	$('.chosen-select').chosen({search_contains: true});
	$('.chosen-select').chosen().change(function(){
		ajaxSearchFormData = $("form").serialize();
		turnPage(1);
	});	 
	turnPage(1);//页面加载时初始化分页
	
	//添加
	$("body").on("click", ".fin_invoice_pay_add", function() {
		layer.open({
			type: 2,
			title: '添加收票记录',
			shadeClose: true,
			fixed: false, //不固定
			area: ['90%', '90%'],
			content: '<?php echo @ACT; ?>
/index.php/erp/FinInvoicePay/fin_invoice_pay_add/' //iframe的url
		});			
		return false;	
	});

	$("body").on("click", ".batch_operation", function() {
		batch_act =$(this).attr("data-act")
		var chk_value =[]; 
    	$("tbody input[class='checkboxCtrlId']:checked").each(function(){ 
        chk_value.push($(this).val()); 
		}); 
		record_id_txt=chk_value.join(",");
		if(batch_act=="delete"){
		   act_url="<?php echo @ACT; ?>
/index.php/erp/FinInvoicePay/fin_invoice_pay_del/";
		}else if(batch_act=="export"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/FinInvoicePay/fin_invoice_pay_del/";
		}
    //alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value); 
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"record_id":record_id_txt},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1}); 
				}
			},
			complete: function () {//完成响应
				turnPage(1);//页面加载时初始化分页
			}
		});
	});
	
	$("body").on("click", ".single_operation", function() {
		record_id =$(this).attr("data-id");
		single_act =$(this).attr("data-act");
		if(single_act=="add"){
			layer.open({
				type: 2,
				title: '添加收票记录',
				shadeClose: true,
				fixed: false, //不固定
				area: ['90%', '90%'],
				content: '<?php echo @ACT; ?>
/index.php/erp/FinInvoicePay/fin_invoice_pay_add/',
				end: function () {
					turnPage(1);//页面加载时初始化分页
				}
			});			
			return false;					
		}else if(single_act=="delete"){
			act_url="<?php echo @ACT; ?>
/index.php/erp/FinInvoicePay/fin_invoice_pay_del/";
			$.ajax({
				type: "POST",
				url: act_url,
				data:{"record_id":record_id},
				dataType:"json",
				success: function(data){
					if(data.statusCode=='200'){
						layer.msg('操作成功', {icon: 1}); 
					}
				},
				complete: function () {//完成响应
					turnPage(1);//页面加载时初始化分页
				}
			});
		}
		
	});
	
	
});
</script>