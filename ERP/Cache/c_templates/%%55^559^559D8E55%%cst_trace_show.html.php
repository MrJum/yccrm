<?php /* Smarty version 2.6.26, created on 2019-07-29 14:07:24
         compiled from crm/cst_trace_show.html */ ?>
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
          <h5><i class="fa fa-home"></i>跟踪记录列表</h5>
          <div class="ibox-tools"><a href="?">
            <button type="button" class="btn btn-xs btn-danger"><i class="fa fa-refresh"></i>刷新</button>
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
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="online">批量发短信</a></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="offline">批量发邮件</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="del">批量删除</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-9 m-b-xs text-right">
              <div class="form-group text-left">
                <select data-placeholder="选择沟通阶段..." name="salestage" class="chosen-select salestage-chosen-select" style="width: 150px;" tabindex="2">
                  <option value="">所有沟通阶段</option> 
							<?php $_from = $this->_tpl_vars['salestage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
					  <option value="<?php echo $this->_tpl_vars['v']['dict_id']; ?>
" hassubinfo="true"><?php echo $this->_tpl_vars['v']['name']; ?>
</option>
							<?php endforeach; endif; unset($_from); ?>
                </select>
              </div>
				  		<div class="input-group pd-b-5">
                  <input type="text" name="name" placeholder="输入主题关键字搜索" class="form-control">
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
                        <label>备注内容</label>
                        <input type="text" name="intro" placeholder="搜索备注内容" class="form-control">
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
                <th width="150" ><span>跟踪记录主题</span></th>
                <th width="150" orderField="by_customer" class="sort-filed"><span>客户名称</span></th>
				  		<th width="120" orderField="by_conntime" class="sort-filed"><span>最近联系时间</span></th>
				  		<th><span>沟通内容</span></th>
                <th width="120" orderField="by_nexttime" class="sort-filed"><span>下次联系时间</span></th>
                <th width="80"><span>沟通方式</span></th>
                <th width="80"><span>当前阶段</span></th>
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
		<td><input name="trace_id" class="checkboxCtrlId" value="<%=list[i]['trace_id']%>" type="checkbox"></td>
		<td><%=list[i]['name']%><br><small>(创建：<%=list[i]['create_time']%>)</small></td>
		<td><%=list[i]['customer_name']%><br><small>(代表：<%=list[i]['linkman']['name']%>)</small></td>
		<td><%=list[i]['conn_time']%></td>
		<td class="overflow-td"><%=list[i]['intro']%></td>	
		<td><%=list[i]['next_time']%></td>
		<td><%=list[i]['salemode_name']%></td>
		<td><%=list[i]['salestage_name']%></td>	
		<td width='10'>
			<div class="btn-group">
				<button data-toggle="dropdown" class="btn btn-default dropdown-toggle">操作 <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li class="divider"></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['trace_id']%>" data-act="modify">修改</a></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['trace_id']%>" data-act="del">删除</a></li>
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
/index.php/crm/CstTrace/cst_trace_json/';
$(document).ready(function () {
	turnPage(1);//页面加载时初始化分页
	$('.chosen-select').chosen({search_contains: true});
	$('.chosen-select').chosen().change(function(){
		ajaxSearchFormData = $("form").serialize();
		turnPage(1);
	});
	//添加
	$("body").on("click", ".cst_trace_add", function() {
		layer.open({
			type: 2,
			title: '添加跟踪记录',
			shadeClose: true,
			fixed: false, //不固定
			area: ['90%', '90%'],
			content: '<?php echo @ACT; ?>
/index.php/crm/CstTrace/cst_trace_add/' //iframe的url
		});			
		return false;	
	});

	$("body").on("click", ".batch_operation", function() {
		batch_act =$(this).attr("data-act")
		var chk_value =[]; 
    	$("tbody input[class='checkboxCtrlId']:checked").each(function(){ 
        chk_value.push($(this).val()); 
		}); 
		trace_id_txt=chk_value.join(",");
		if(batch_act=="recommend"){
		   act_url="<?php echo @ACT; ?>
/index.php/crm/CstTrace/cst_trace_modify_recommend/";
		}else if(batch_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/crm/CstTrace/cst_trace_del/";
		}
    //alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value); 
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"trace_id":trace_id_txt},
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
		trace_id =$(this).attr("data-id");
		single_act =$(this).attr("data-act")
		if(single_act=="add"){
			layer.open({
				type: 2,
				title: '添加跟踪记录',
				shadeClose: true,
				fixed: false, //不固定
				area: ['90%', '90%'],
				content: '<?php echo @ACT; ?>
/index.php/crm/CstTrace/cst_trace_add/',
				end: function () {
					turnPage(1);//页面加载时初始化分页
				}
			});			
			return false;	
		}else if(single_act=="modify"){
			layer.open({
				type: 2,
				title: '修改跟踪记录',
				shadeClose: true,
				fixed: false, //不固定
				area: ['90%', '90%'],
				content: '<?php echo @ACT; ?>
/index.php/crm/CstTrace/cst_trace_modify/trace_id/'+trace_id+'/',
				end: function () {
					turnPage(1);//页面加载时初始化分页
				}
			});			
			return false;	
		}else if(single_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/crm/CstTrace/cst_trace_del/";
		}
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"trace_id":trace_id},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1}); 
				}
			}
		});
	});
	
	
});
</script>