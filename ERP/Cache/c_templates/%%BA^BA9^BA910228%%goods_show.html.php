<?php /* Smarty version 2.6.26, created on 2019-07-29 13:52:09
         compiled from goods/goods_show.html */ ?>
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
          <h5><i class="fa fa-home"></i> 商品列表</h5>
          <div class="ibox-tools"> <a href="<?php echo @ACT; ?>
/goods/Goods/goods_add/" >
            <button type="button" class="btn btn-xs btn-primary"><i class='fa fa-plus'></i> 添加</button>
            </a> <a href="?">
            <button type="button" class="btn btn-xs btn-danger"> <i class='fa fa-refresh'></i>刷新</button>
            </a> </div>
        </div>
        <div class="ibox-content table-responsive">
          <div class="row">
            <form id="pagerForm" method="post"  class="form-inline">
              <div class="col-sm-3 m-b-xs"> <a class="btn btn-info" href="<?php echo @ACT; ?>
/goods/Goods/goods_add/">发布商品</a>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-danger dropdown-toggle">批量操作 <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="recommend">批量推荐</a></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="recommend_off">取消推荐</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="online">批量上架</a></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="offline">批量下架</a></li>
                    <li class="divider"></li>
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="del">批量删除</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-9 m-b-xs text-right">
                <div data-toggle="buttons" class="btn-group">
                  <label class="btn btn-sm btn-white">
                    <input type="radio" id="option1" name="options">
                    出售中</label>
                  <label class="btn btn-sm btn-white active">
                    <input type="radio" id="option2" name="options">
                    已下架</label>
                  <label class="btn btn-sm btn-white">
                    <input type="radio" id="option3" name="options">
                    推荐</label>
                </div>
                <div class="input-group pd-b-5">
                  <input type="text" name="goods_name" placeholder="请输入商品名字关键词" class="form-control">
                </div>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn  dropdown-toggle"><span class="caret"></span></button>
                  <div class="dropdown-menu">
                    <div class="ibox-content">
                      <div class="form-group">
                        <label>店铺名称</label>
                        <input type="text" name="name" placeholder="搜索店铺名称" class="form-control">
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
                <div class="input-group"> <span class="input-group-btn">
                  <button type="button" class="btn btn-primary ajaxSearchForm"><i class="fa fa-search"></i> 搜索</button>
                  </span> </div>
              </div>
            </form>
          </div>
          <table class="table table-hover sorttable 07fly-table" width="100%">
            <thead>
              <tr>
                <th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
                <th>商品名称</th>
                <th width="80" align="center" orderField="by_price" class="sort-filed"><span>价格</span></th>
                <th width="80" orderField="by_stock" class="sort-filed"><span>库存</span></th>
                <th width="80" orderField="by_sale" class="sort-filed"><span>销售</span></th>
                <th width="80" orderField="by_sort" class="sort-filed"><span>排序</span></th>
                <th width="50">操作</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot class="ibox-content">
              <tr>
                <td colspan="8" align="center"></td>
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
		<td><input name="goods_id" class="checkboxCtrlId" value="<%=list[i]['goods_id']%>" type="checkbox"></td>
		<td>
			<div class='row'><div class="col-sm-12"><p>商家编码：<%=list[i]['code']%>创建时间：<%=list[i]['create_time']%></p></div></div>
			<div class="row">
				<div class="col-sm-2">
					<%if(list[i]['defaultpic'].length>1){%>
						  <img src="<%=list[i]['defaultpic']%>" width="60" height="60">
			　		<%}else{%> 
　　　　　　				<img src="/upload/images/defaultpic.jpg" width="60" height="60">
	  				<%}%> 
				</div>
				<div class="col-sm-10"><a href="<?php echo @ACT; ?>
/goods/Goods/goods_modify/goods_id/<%=list[i]['goods_id']%>/"><%=list[i]['goods_name']%></a></div>
			</div>
		</td>
		<td><%=list[i]['price']%></td>
		<td><%=list[i]['stock']%></td>
		<td><%=list[i]['attr_name']%></td>
		<td><input type="text" name="sort" value="<%=list[i]['sort']%>" class="form-control w50 goods_sort" data-id="<%=list[i]['goods_id']%>"></td>
		<td width='10'>
			<div class="btn-group">
				<button data-toggle="dropdown" class="btn btn-info dropdown-toggle">操作 <span class="caret"></span></button>
				<ul class="dropdown-menu">
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['goods_id']%>" data-act="recommend">推荐</a></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['goods_id']%>" data-act="recommend_off">取消推荐</a></li>
					<li class="divider"></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['goods_id']%>" data-act="online">上架</a></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['goods_id']%>" data-act="offline">下架</a></li>
					<li class="divider"></li>
					<li><a href="<?php echo @ACT; ?>
/goods/Goods/goods_modify/goods_id/<%=list[i]['goods_id']%>/">修改</a></li>
					<li><a href="javascript:void(0)" class="single_operation" data-id="<%=list[i]['goods_id']%>" data-act="del">删除</a></li>
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
/index.php/goods/Goods/goods_json/';
$(document).ready(function () {
	 
	turnPage(1);//页面加载时初始化分页
	
	//更改排序
	$("body").on("blur", ".goods_sort", function() {
		goods_id =$(this).attr("data-id");
		sort_val =$(this).val();
		$.ajax({
			type: "POST",
			url: "<?php echo @ACT; ?>
/index.php/goods/Goods/goods_modify_sort/",
			data:{"sort":sort_val,"goods_id":goods_id},
			dataType:"json",
			success: function(data){
				if(data.rtnstatus=='success'){
					layer.msg('操作成功', {icon: 1});   
				}
				console.log(data.rtnstatus);
			}
		});
	});

	$("body").on("click", ".batch_operation", function() {
		batch_act =$(this).attr("data-act")
		var chk_value =[]; 
    	$("tbody input[class='checkboxCtrlId']:checked").each(function(){ 
        chk_value.push($(this).val()); 
		}); 
		goods_id_txt=chk_value.join(",");
		if(batch_act=="recommend"){
		   act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_modify_recommend/";
		}else if(batch_act=="recommend_off"){
			act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_modify_recommend_off/";
		}else if(batch_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_del/";
			
		}else if(batch_act=="online"){
			act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_modify_online/";
		}else if(batch_act=="offline"){
			act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_modify_offline/";
		}
    //alert(chk_value.length==0 ?'你还没有选择任何内容！':chk_value); 
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"goods_id":goods_id_txt},
			dataType:"json",
			success: function(data){
				if(data.rtnstatus=='success'){
					layer.msg('操作成功', {icon: 1}); 
				}
			},
			complete: function () {//完成响应
				turnPage(1);
			}
		});
	});
	
	$("body").on("click", ".single_operation", function() {
		goods_id =$(this).attr("data-id");
		single_act =$(this).attr("data-act")
		if(single_act=="recommend"){
		   act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_modify_recommend/";
		}else if(single_act=="recommend_off"){
			act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_modify_recommend_off/";
		}else if(single_act=="del"){
			act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_del/";
		}else if(single_act=="online"){
			act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_modify_online/";
		}else if(single_act=="offline"){
			act_url="<?php echo @ACT; ?>
/index.php/goods/Goods/goods_modify_offline/";
		}
		$.ajax({
			type: "POST",
			url: act_url,
			data:{"goods_id":goods_id},
			dataType:"json",
			success: function(data){
				if(data.rtnstatus=='success'){
					layer.msg('操作成功', {icon: 1}); 
					turnPage(1);
				}
			}
		});
	});
	
	
});
</script>