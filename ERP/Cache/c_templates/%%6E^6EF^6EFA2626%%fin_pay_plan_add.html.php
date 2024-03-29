<?php /* Smarty version 2.6.26, created on 2019-12-16 18:24:23
         compiled from erp/fin_pay_plan_add.html */ ?>
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
		<div class="form-group text-left">
        <label class="col-sm-2 control-label">供应商名称</label>
        <div class="col-sm-8">
          <select data-placeholder="选择分类..." name="supplier_id" class="chosen-select supplier-chosen-select" style="width: 200px;" tabindex="2">
            <option value="">请选供应商</option>
					  <?php $_from = $this->_tpl_vars['supplier']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
					  <option value="<?php echo $this->_tpl_vars['v']['supplier_id']; ?>
" hassubinfo="true"><?php echo $this->_tpl_vars['v']['name']; ?>
</option>
					  <?php endforeach; endif; unset($_from); ?>
          </select>
			<input type="hidden" name="supplier_name">
        </div>
      </div>
		<div class="form-group text-left">
        <label class="col-sm-2 control-label">采购订单</label>
        <div class="col-sm-8">
          <select data-placeholder="请选供应商采购订单..." name="contract_id" class="chosen-select contract-chosen-select" style="width: 200px;" tabindex="1">
            <option value="">请选供应商采购订单</option>
          </select>
				<input type="hidden" name="contract_name">
        </div>
      </div>		
		<div class="form-group">
        <label class="col-sm-2 control-label">总金额</label>
        <div class="col-sm-8">
          <input name="money" class="form-control" type="text" readonly/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">去零金额</label>
        <div class="col-sm-8">
          <input name="zero_money" class="form-control" type="text" readonly/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">已付金额</label>
        <div class="col-sm-8">
          <input name="pay_money" class="form-control" type="text" readonly/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">已收发票金额</label>
        <div class="col-sm-8">
          <input name="invoice_money" class="form-control" type="text" readonly/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">计划付款日期</label>
        <div class="col-sm-10">
          <input name="plan_date" class="form-control datepicker" type="text"  placeholder="选择计划付款日期"/>
          <span class="help-block m-b-none"></span> </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">期次</label>
        <div class="col-sm-8">
          <input name="stages" class="form-control" type="text" placeholder="请输入付款期次" />
          <span class="help-block m-b-none"></span> </div>
      </div>
		<div class="form-group">
        <label class="col-sm-2 control-label">金额</label>
        <div class="col-sm-8">
          <input name="plan_money" class="form-control" type="text"/>
          <span class="help-block m-b-none"></span> </div>
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
		todayBtn: false,//今日按钮
		format: "yyyy-mm-dd",
	});
	
	$('.chosen-select').chosen({search_contains: true});
	$(".chosen-select").val("<?php echo $this->_tpl_vars['supplier_id']; ?>
").trigger("chosen:updated");
	
	var chance_url="<?php echo @ACT; ?>
/erp/PosContract/pos_contract_select_pay/";
	//选择用户跳出联系人
	$('.supplier-chosen-select').on('change', function(e, params) {
		change_val=$(this).val();
		change_text=$(this).find('option:selected').text();
		$(".form-horizontal input[name='supplier_name']").val(change_text);
		findPosContractChosenSelect('contract-chosen-select',chance_url,change_val);
		contract_id=$('.contract-chosen-select option:selected').val();
		calc_contract(contract_id);
	});
	
	//调用关联订单数据
	function calc_contract(contract_id){
		$.ajax({
			type: "POST",
			url: "<?php echo @ACT; ?>
/erp/PosContract/pos_contract_get_one_json/",
			data:{"contract_id":contract_id},
			dataType:"json",
			success: function(data){
				$(".form-horizontal input[name='money']").val(data.money);
				$(".form-horizontal input[name='zero_money']").val(data.zero_money);
				$(".form-horizontal input[name='pay_money']").val(data.pay_money);
				$(".form-horizontal input[name='invoice_money']").val(data.invoice_money);
				$(".form-horizontal input[name='plan_money']").val(data.owe_money);
				$(".form-horizontal input[name='contract_name']").val(data.title);
			},    
			complete: function() { },
		});		
	}
	
	$("body").on("click", ".save-form", function() {
		FormData=$("form").serialize();
		$.ajax({
			type: "POST",
			url: "<?php echo @ACT; ?>
/erp/FinPayPlan/fin_pay_plan_add/",
			data:FormData,
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1}); 		
				}else{
					layer.msg(data.message, {icon: 5}); 		
				}
			},    
			complete: function() {   
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