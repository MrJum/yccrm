<?php /* Smarty version 2.6.26, created on 2019-07-30 10:56:13
         compiled from erp/stock_out_list_show.html */ ?>
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
          <h5><i class="fa fa-home"></i> 出库明细列表</h5>
          <div class="ibox-tools"><a href="?">
            <button type="button" class="btn btn-xs btn-danger"> <i class="fa fa-refresh"></i>刷新</button>
            </a> </div>
        </div>
        <div class="ibox-content table-responsive">
          <div class="row">
            <form id="pagerForm" method="post" class="form-inline">
              <div class="col-sm-3 m-b-xs">
				  		<a href="?" class="btn  btn-default"> <i class="fa fa-refresh"> 刷新</i></a>
                <div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-deault dropdown-toggle">批量操作 <span class="caret"></span></button>
                  <ul class="dropdown-menu">
                    <li><a href="javascript:void(0)" class="batch_operation" data-act="online">批量导出</a></li>
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
				  		<th width="120"><span>商品编号/SKUID</span></th>
                <th width="200" orderField="by_supplier" class="sort-filed"><span>商品名称/SKU名称</span></th>
				  		<th width="100"><span>数量</span></th>
				  		<th width="120"><span>商品类型</span></th>
				  		<th width="120"><span>仓库名称</span></th>
                <th width="150"><span>对应出库单</span></th>
                <th width="150"><span>出库时间</span></th>
                <th><span>备注</span></th>
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
		<td><input name="list_id" class="checkboxCtrlId" value="<%=list[i]['list_id']%>" type="checkbox"></td>
		<td>
			<p>商品：<%=list[i]['goods_id']%></p>
			<p>SKU：<%=list[i]['sku_id']%></p>
		</td>
		<td>
			<p>商品名：<%=list[i]['goods_name']%></p>
			<p>SKU名：<%=list[i]['sku_name']%></p>
		</td>
		<td><%=list[i]['number']%></td>
		<td><%=list[i]['goods_category']['category_name']%></td>	
		<td><%=list[i]['store']['name']%></td>	
		<td><%=list[i]['title']%></td>
		<td><%=list[i]['out_time']%></td>
		<td><%=list[i]['intro']%></td>		
	</tr>
<% } %>
</script>
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script>
<script type="text/javascript">
var ajaxUrl='<?php echo @ACT; ?>
/erp/StockOutList/stock_out_list_json/';
$(document).ready(function () {
	 
	turnPage(1);//页面加载时初始化分页

	
});
</script>