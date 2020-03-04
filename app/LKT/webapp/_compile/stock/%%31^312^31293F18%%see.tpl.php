<?php /* Smarty version 2.6.26, created on 2020-03-03 19:07:09
         compiled from see.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../include_path/header.tpl", 'smarty_include_vars' => array('sitename' => "DIY头部")));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
   

<nav class="breadcrumb">
    商品管理 <span class="c-gray en">&gt;</span> 
    <a href="index.php?module=stock">库存管理</a> <span class="c-gray en">&gt;</span> 
    库存详情 <span class="c-gray en">&gt;</span> 
    <a href="javascript:history.go(-1)">返回</a>
</nav>


<div class="pd-20 page_absolute">
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover">
            <thead>
                <tr class="text-c tab_tr">
                    <th class="tab_num">序号</th>
                    <th class="tab_title">商品名称</th>
                    <th >商品售价</th>
                    <th>商品规格</th>
                    <th>商品状态</th>
                    <th >商品总库存</th>
                    <th >入库/出库状态</th>
                    <th >入库/出库数量</th>
                    <th class="tab_time">入库/出库时间</th>
                </tr>
            </thead>
            <tbody>
            <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['f1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['f1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['f1']['iteration']++;
?>
                <tr class="text-c tab_td">
                    <td><?php echo $this->_foreach['f1']['iteration']; ?>
</td>
                    <td><?php echo $this->_tpl_vars['item']->product_title; ?>
</td>
                    <td><?php echo $this->_tpl_vars['item']->price; ?>
</td>
                    <td><?php echo $this->_tpl_vars['item']->specifications; ?>
</td>
                    <td>
                        <div class="tab_block">
                            <?php if ($this->_tpl_vars['item']->status == 0): ?>
                                <span style="background-color: #5eb95e;" class="badge statu badge-success">已上架</span>
                            <?php elseif ($this->_tpl_vars['item']->status == 1): ?>
                                <span class="badge statu badge-default">已下架</span>
                            <?php elseif ($this->_tpl_vars['item']->status == 2): ?>
                                <span class="badge statu badge-default">待上架</span>
                            <?php endif; ?>
                        </div>
                    </td>
                    <td><?php echo $this->_tpl_vars['item']->total_num; ?>
</td>
                     <?php if ($this->_tpl_vars['item']->type == 0): ?>
                        <td>入库</td>
                        
                    <?php else: ?>
                        <td>出库</td>
              
                    <?php endif; ?>
                    <?php if ($this->_tpl_vars['item']->type != 2): ?>
                        <td <?php if ($this->_tpl_vars['item']->type == 0): ?>style="color: #0abf0a;"<?php else: ?>style="color:red;"<?php endif; ?>><?php echo $this->_tpl_vars['item']->flowing_num; ?>
</td>
                        
                    <?php else: ?>
                        <td><?php echo $this->_tpl_vars['item']->flowing_num; ?>
</td>
              
                    <?php endif; ?>
                    <td class="tab_time"><?php echo $this->_tpl_vars['item']->add_date; ?>
</td>
                </tr>
            <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center;display: flex;justify-content: center;"><?php echo $this->_tpl_vars['pages_show']; ?>
</div>
    <div class="page_h20"></div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "../../include_path/footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php echo '
<script type="text/javascript">

var aa=$(".pd-20").height()-56;
var bb=$(".table-border").height();
if(aa<bb){
	$(".page_h20").css("display","block")
}else{
	$(".page_h20").css("display","none")
}
</script>
'; ?>

</body>
</html>