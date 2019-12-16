<?php /* Smarty version 2.6.26, created on 2019-07-29 13:52:11
         compiled from goods/goods_category_show.html */ ?>
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
					<h5><i class="fa fa-home"></i> 商品分类</h5>
					<div class="ibox-tools"> <a href="javascript:void(0);" class="single_operation" data-act="add">
						<button type="button" class="btn btn-xs btn-primary"><i class='fa fa-plus'></i> 添加</button>
						</a> <a href="?">
						<button type="button" class="btn btn-xs btn-danger"> <i class='fa fa-refresh'></i>刷新</button>
						</a> </div>
				</div>
				<div class="ibox-content">
					<div class="treeClassBody"><?php echo $this->_tpl_vars['treeHtml']; ?>
</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script>
<script type="text/javascript">
$(document).ready(function () {
	//更改排序
	$("body").on("blur", ".treeSort", function() {
		category_id =$(this).attr("data-id");
		sort =$(this).val();
		$.ajax({
			type: "POST",
			url: "<?php echo @ACT; ?>
/index.php/goods/GoodsCategory/goods_category_modify_sort/",
			data:{"sort":sort,"category_id":category_id},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1});   
				}
			}
		});
	});
	//更改名称
	$("body").on("blur", ".treeName", function() {
		category_id =$(this).attr("data-id");
		value =$(this).val();
		$.ajax({
			type: "POST",
			url: "<?php echo @ACT; ?>
/goods/GoodsCategory/goods_category_modify_name/",
			data:{"name":value,"category_id":category_id},
			dataType:"json",
			success: function(data){
				if(data.statusCode=='200'){
					layer.msg('操作成功', {icon: 1});   
				}
			}
		});
	});
	$("body").on("click", ".single_operation", function() {
		category_id =$(this).attr("data-id");
		single_act =$(this).attr("data-act")
		if(single_act=="add"){
			layer.open({
				type: 2,
				title: '添加分类',
				shadeClose: true,
				fixed: false, //不固定
				area: ['800px', '500px'],
				content: '<?php echo @ACT; ?>
/goods/GoodsCategory/goods_category_add/category_id/'+category_id+'/' //iframe的url
			});			
			return false;	
		}else if(single_act=="modify"){
			layer.open({
				type: 2,
				title: '修改分类',
				shadeClose: true,
				fixed: false, //不固定
				area: ['800px', '500px'],
				content: '<?php echo @ACT; ?>
/goods/GoodsCategory/goods_category_modify/category_id/'+category_id+'/' //iframe的url
			});			
			return false;
		}else if(single_act=="del"){
			act_url="<?php echo @ACT; ?>
/goods/GoodsCategory/goods_category_del/";
			$.ajax({
				type: "POST",
				url: act_url,
				data:{"category_id":category_id},
				dataType:"json",
				success: function(data){
					if(data.statusCode=='200'){
						layer.msg('操作成功', {icon: 1}); 
					}
				}
			});			
		}
	});
});
</script>