<?php /* Smarty version 2.6.26, created on 2019-07-29 13:35:39
         compiled from erp/pos_contract_add.html */ ?>
<!DOCTYPE html>
<html>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body class="gray-bg">
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="ibox-content">
    <form class="form-horizontal" method="post" action="#">
      <div class="form-group">
        <label class="col-sm-2 control-label">合同编号</label>
        <div class="col-sm-10">
          <input name="contract_no" class="form-control" type="text" value="<?php echo $this->_tpl_vars['number']; ?>
" required/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">标题</label>
        <div class="col-sm-10">
          <input name="title" class="form-control" type="text" placeholder="输入标题" required/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group text-left">
        <label class="col-sm-2 control-label">供应商名称</label>
        <div class="col-sm-10">
          <select data-placeholder="选择供应商名称..." name="supplier_id" class="chosen-select supplier-chosen-select" style="width: 200px;" tabindex="2">
            <option value="">请选供应商名称</option>           
					  <?php $_from = $this->_tpl_vars['supplier']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>	  
            <option value="<?php echo $this->_tpl_vars['v']['supplier_id']; ?>
" hassubinfo="true"><?php echo $this->_tpl_vars['v']['name']; ?>
</option>
					  <?php endforeach; endif; unset($_from); ?>
          </select>
        </div>
      </div>
      <div class="form-group text-left">
        <label class="col-sm-2 control-label">客户联系人</label>
        <div class="col-sm-10">
          <select data-placeholder="选择客户联系人" name="linkman_id" class="chosen-select linkman-chosen-select" style="width: 200px;" tabindex="2">
            <option value="">请选选择客户联系人</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">采购时间</label>
        <div class="col-sm-10">
          <input name="start_date" class="form-control datepicker" type="text"  placeholder="选择合同采购时间"/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">预计到货时间</label>
        <div class="col-sm-10">
          <input name="end_date" class="form-control datepicker" type="text" placeholder="选择预计到货时间"/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">合同金额</label>
        <div class="col-sm-10">
          <input name="money" class="form-control" type="text" placeholder="签订合同金额" required/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">介绍</label>
        <div class="col-sm-10">
          <textarea name="intro" class="form-control"></textarea>
        </div>
      </div>
      <div class="form-group text-left">
        <label class="col-sm-2 control-label">我方代表</label>
        <div class="col-sm-10">
          <select data-placeholder="选择我方代表..." name="our_user_id" class="chosen-select sys_user-chosen-select" style="width: 200px;" tabindex="2">
            <option value="">请选我方代表</option>           
					  <?php $_from = $this->_tpl_vars['sys_user']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>	  
            <option value="<?php echo $this->_tpl_vars['v']['id']; ?>
" hassubinfo="true"><?php echo $this->_tpl_vars['v']['name']; ?>
</option>
					  <?php endforeach; endif; unset($_from); ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-8">
          <button class="btn btn-w-m btn-info save-form" type="button">保存数据</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- 自定义js --> 
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script> 
<script>
$(document).ready(function () {
	$(".datepicker").datepicker({
		language: "zh-CN",
		autoclose: true,//选中之后自动隐藏日期选择框
		clearBtn: true,//清除按钮
		todayBtn: true,//今日按钮
		format: "yyyy-mm-dd",
	});
	
	//下拉选择+联动效果
	$('.chosen-select').chosen({search_contains: true});
	$(".supplier-chosen-select").val("<?php echo $this->_tpl_vars['supplier_id']; ?>
").trigger("chosen:updated");
	var linkman_url="<?php echo @ACT; ?>
/erp/SupLinkman/sup_linkman_select/";
	if("<?php echo $this->_tpl_vars['supplier_id']; ?>
"!=""){
	   findLinkmanChosenSelect('linkman-chosen-select',linkman_url,"<?php echo $this->_tpl_vars['supplier_id']; ?>
");
	 }
	//选择用户跳出联系人
	$('.supplier-chosen-select').on('change', function(e, params) {
		change_val=$(this).val();
		findLinkmanChosenSelect('linkman-chosen-select',linkman_url,change_val);
	});
	
	//数据保存
	$("body").on("click", ".save-form", function() {
		FormData=$("form").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo @ACT; ?>
/erp/PosContract/pos_contract_add/",
			data:FormData,
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1}); 		
				}
			},    
			complete: function() {
				parent.location.reload(); 
				setTimeout(function(){
					//关闭窗口
					var index = parent.layer.getFrameIndex(window.name); //获取窗口索引
					parent.layer.close(index);
				 },800);
   		  },
		});		
	});
});
</script>
</body>
</html>