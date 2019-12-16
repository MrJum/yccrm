<?php /* Smarty version 2.6.26, created on 2019-07-29 13:36:52
         compiled from crm/cst_dict_type_show.html */ ?>
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
          <h5><i class="fa fa-home"></i>字典分类</h5>
          <div class="ibox-tools"> <a href="<?php echo @ACT; ?>
/crm/CstDictType/cst_dict_type_add/" class="btn btn-xs btn-primary"><i class="fa fa-plus"></i> 添加</a> <a href="?" class="btn btn-xs btn-danger"><i class="fa fa-refresh"></i>刷新</a> </div>
        </div>
        <div class="ibox-content">
          <table class="table table-hover dataTables-example">
            <thead>
              <tr>
                <th width="22"><input type="checkbox" group="ids" class="checkboxCtrl"></th>
                <th width="60">分类名称</th>
                <th width="60">调用标识</th>
                <th width="100">备注</th>
                <th width="50">排序</th>
                <th width="30">操作</th>
              </tr>
            </thead>
            <tbody>
            
            <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
            <tr target="sid_user" rel="<?php echo $this->_tpl_vars['v']['id']; ?>
">
              <td><input name="ids" value="<?php echo $this->_tpl_vars['v']['id']; ?>
" type="checkbox"></td>
              <td><?php echo $this->_tpl_vars['v']['typename']; ?>
</td>
              <td><?php echo $this->_tpl_vars['v']['typetag']; ?>
</td>
              <td><?php echo $this->_tpl_vars['v']['intro']; ?>
</td>
              <td><?php echo $this->_tpl_vars['v']['sort']; ?>
</td>
              <td><a href="<?php echo @ACT; ?>
/crm/CstDictType/cst_dict_type_modify/id/<?php echo $this->_tpl_vars['v']['id']; ?>
/">修改</a> <a href="<?php echo @ACT; ?>
/crm/CstDictType/cst_dict_type_del/id/<?php echo $this->_tpl_vars['v']['id']; ?>
/">删除</a></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?>
              </tbody>
            
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo @APP; ?>
/View/template/js/content.js?v=1.0.0"></script>
</body>
</html>