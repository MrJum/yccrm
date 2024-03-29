<?php /* Smarty version 2.6.26, created on 2019-12-16 18:24:26
         compiled from erp/fin_flow_record_show.html */ ?>
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
          <h5><i class="fa fa-home"></i>财务流水列表</h5>
          <div class="ibox-tools"><a href="?">
            <button type="button" class="btn btn-xs btn-danger"> <i class='fa fa-refresh'></i>刷新</button>
            </a> </div>
        </div>
        <div class="ibox-content table-responsive">
          <div class="row">
            <form id="pagerForm" method="post" class="form-inline">
              <div class="col-sm-3 m-b-xs"> 
				  		<a class="btn btn-info batch_operation"  data-act="export" href="javascript:void(0)">导出数据</a>
              </div>
              <div class="col-sm-9 m-b-xs text-right"> 
				  		<div class="form-group text-left  pd-b-5">
                  <select data-placeholder="选择回款账户..." name="bank_id" class="chosen-select bank-chosen-select" style="width: 150px;" tabindex="1">
            <option value="">所有回款账户</option>
					  <?php $_from = $this->_tpl_vars['bank']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
            		<option value="<?php echo $this->_tpl_vars['v']['bank_id']; ?>
" hassubinfo="true"><?php echo $this->_tpl_vars['v']['name']; ?>
 <?php echo $this->_tpl_vars['v']['card']; ?>
</option>
					  <?php endforeach; endif; unset($_from); ?>
          </select>
                </div>
                <div class="form-group text-left  pd-b-5">
                  <select data-placeholder="创建时间..." name="create_date" class="chosen-select" style="width: 150px;" >
                    <option value="0">创建时间所有</option>
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
                  <input type="text" name="name" placeholder="输入主题关键字搜索" class="form-control">
                </div>
                <div class="input-group"> <span class="input-group-btn">
                  <button type="button" class="btn btn-primary ajaxSearchForm"><i class="fa fa-search"></i> 搜索</button>
                  </span> </div>
              </div>
            </form>
          </div>
          <table class="table  table-hover sorttable 07fly-table" width="100%">
            <thead>
              <tr>
                <th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
                <th><span>银行帐号</span></th>
                <th width="100" orderField="by_rece" class="sort-filed"><span>收入</span></th>
                <th width="100" orderField="by_pay" class="sort-filed"><span>支出</span></th>
                <th width="100" orderField="by_balance" class="sort-filed"><span>余额</span></th>
                <th width="100"><span>类型</span></th>
                <th width="120"><span>关联单号</span></th>
                <th width="80"><span>创建人</span></th>
                <th width="150"><span>创建时间</span></th>
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
</body>
</html>
<script id="tableListTpl" type="text/html">
<% for(var i=0;i<list.length;i++) { %>
	<tr>
		<td><input name="record_id" class="checkboxCtrlId" value="<%=list[i]['record_id']%>" type="checkbox"></td>
		<td>
			<%=list[i]['blank_arr']['name']%>
			<br><small>(卡号：<%=list[i]['blank_arr']['card']%>)</small>
		</td>
		<td>+<%=list[i]['rece_money']%></td>
		<td>-<%=list[i]['pay_money']%></td>
		<td><%=list[i]['balance']%></td>
		<td><p><%:=list[i]['business']['name_html']%></p></td>
		<td><p><%:=list[i]['business']['title']%></p></td>	
		<td><%:=list[i]['create_user_arr']['name']%></td>	
		<td><%=list[i]['create_time']%></td>	


	</tr>
<% } %>
  <tr>
	<td colspan="10" align="left">
		支出金额合计：<span class="text-danger">&yen;<%=countMoney['total_pay_money']%></span>&nbsp;&nbsp;
		收入金额合计：<span class="text-danger">&yen;<%=countMoney['total_rece_money']%></span>&nbsp;&nbsp;
	</td>
  </tr>
</script>
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script>
<script type="text/javascript">
var ajaxUrl='<?php echo @ACT; ?>
/erp/FinFlowRecord/fin_flow_record_json/';
$(document).ready(function () {
	turnPage(1);//页面加载时初始化分页
	$('.chosen-select').chosen({search_contains: true});
	$('.chosen-select').chosen().change(function(){
		ajaxSearchFormData = $("form").serialize();
		turnPage(1);
	});

	$("body").on("click", ".batch_operation", function() {
		batch_act =$(this).attr("data-act")
		var chk_value =[]; 
    	$("tbody input[class='checkboxCtrlId']:checked").each(function(){ 
        chk_value.push($(this).val()); 
		}); 
		record_id_txt=chk_value.join(",");
		if(batch_act=="export"){
		   act_url="<?php echo @ACT; ?>
/erp/FinFlowRecord/fin_flow_record_export/";
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
			}
		});
	});

});
</script>