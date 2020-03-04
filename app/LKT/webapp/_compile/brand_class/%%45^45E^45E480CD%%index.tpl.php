<?php /* Smarty version 2.6.26, created on 2020-03-03 19:07:13
         compiled from index.tpl */ ?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<?php include BASE_PATH."/modules/assets/templates/top.tpl"; ?>


<title>商品品牌</title>
<?php echo '
    <style type="text/css">
        td a{
            width: 29%;
            float: left;
            margin: 2%!important;
        }
    </style>
'; ?>


</head>
<body>

<nav class="breadcrumb">
    商品管理 <span class="c-gray en">&gt;</span> 
    品牌管理 
</nav>


<div class="pd-20">
    <div style="clear:both;">
        <button  class="btn newBtn radius" onclick="location.href='index.php?module=brand_class&action=add';">
        	<img src="images/icon1/add.png" alt="" />新增品牌
        </button>
    </div>
    <div class="mt-20">
        <table class="table table-border table-bordered table-bg table-hover">
            <thead>
                <tr class="text-c">
                    <th>ID</th>
                    <th>品牌图片</th>
                    <th>品牌名称	</th>
                    <!-- <th>状态</th> -->
                    <th>添加时间</th>
                    <th style="width: 180px;">操作</th>
                </tr>
            </thead>
            <tbody>
            <?php $_from = $this->_tpl_vars['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['f1'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['f1']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['item']):
        $this->_foreach['f1']['iteration']++;
?>
                <tr class="text-c">
                    <!-- <td><?php echo $this->_foreach['f1']['iteration']; ?>
</td> -->
                    <td><?php echo $this->_tpl_vars['item']->brand_id; ?>
</td>
                    <td><?php if ($this->_tpl_vars['item']->brand_pic != ''): ?><image class='pimg' src="<?php echo $this->_tpl_vars['uploadImg']; ?>
<?php echo $this->_tpl_vars['item']->brand_pic; ?>
" style="width: 50px;height:50px;"/><?php else: ?><span>暂无图片</span><?php endif; ?></td>
                    <td><?php echo $this->_tpl_vars['item']->brand_name; ?>
</td>
                    <td><?php echo $this->_tpl_vars['item']->brand_time; ?>
</td>
                    <td>
                        <a style="text-decoration:none" class="ml-5" href="index.php?module=brand_class&action=modify&cid=<?php echo $this->_tpl_vars['item']->brand_id; ?>
" title="修改" >
                        	<div style="align-items: center;font-size: 12px;display: flex;">
                            	<div style="margin:0 auto;;display: flex;align-items: center;"> 
                                <img src="images/icon1/xg.png"/>&nbsp;修改
                            	</div>
                            </div>
                        </a>

                        <?php if ($this->_tpl_vars['item']->tistrue == '1'): ?>
                            <font class="ml-5" style="color:red;" title="已删除"><i class="Hui-iconfont">&#xe6e2;</i></font>
                        <?php else: ?>
                            <a style="text-decoration:none" class="ml-5" href="javascript:void(0)" onclick="confirm('确定要删除此商品品牌吗?','<?php echo $this->_tpl_vars['item']->brand_id; ?>
')">
                            	<div style="align-items: center;font-size: 12px;display: flex;">
	                            	<div style="margin:0 auto;;display: flex;align-items: center;"> 
	                                <img src="images/icon1/del.png"/>&nbsp;删除
	                            	</div>
	                            </div>
                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            </form>
            <?php endforeach; endif; unset($_from); ?>
            </tbody>
        </table>
    </div>
    <div style="text-align: center;display: flex;justify-content: center;"><?php echo $this->_tpl_vars['pages_show']; ?>
</div>
</div>
 <div id="outerdiv" style="position:fixed;top:0;left:0;background:rgba(0,0,0,0.7);z-index:2;width:100%;height:100%;display:none;"><div id="innerdiv" style="position:absolute;"><img id="bigimg" src="" /></div></div> 

<?php include BASE_PATH."/modules/assets/templates/footer.tpl"; ?>


<?php echo '
<script type="text/javascript">
$(function(){  
    $(".pimg").click(function(){
        var _this = $(this);//将当前的pimg元素作为_this传入函数
        imgShow("#outerdiv", "#innerdiv", "#bigimg", _this);
    });
});
function imgShow(outerdiv, innerdiv, bigimg, _this){  
    var src = _this.attr("src");//获取当前点击的pimg元素中的src属性  
    $(bigimg).attr("src", src);//设置#bigimg元素的src属性  
  
        /*获取当前点击图片的真实大小，并显示弹出层及大图*/  
    $("<img/>").attr("src", src).load(function(){  
        var windowW = $(window).width();//获取当前窗口宽度  
        var windowH = $(window).height();//获取当前窗口高度  
        var realWidth = this.width;//获取图片真实宽度  
        var realHeight = this.height;//获取图片真实高度  
        var imgWidth, imgHeight;  
        var scale = 0.9;//缩放尺寸，当图片真实宽度和高度大于窗口宽度和高度时进行缩放  
          
        if(realHeight>windowH*scale) {//判断图片高度  
            imgHeight = windowH*scale;//如大于窗口高度，图片高度进行缩放  
            imgWidth = imgHeight/realHeight*realWidth;//等比例缩放宽度  
            if(imgWidth>windowW*scale) {//如宽度扔大于窗口宽度  
                imgWidth = windowW*scale;//再对宽度进行缩放  
            }  
        } else if(realWidth>windowW*scale) {//如图片高度合适，判断图片宽度  
            imgWidth = windowW*scale;//如大于窗口宽度，图片宽度进行缩放  
                        imgHeight = imgWidth/realWidth*realHeight;//等比例缩放高度  
        } else {//如果图片真实高度和宽度都符合要求，高宽不变  
            imgWidth = realWidth;  
            imgHeight = realHeight;  
        }  
                $(bigimg).css("width",imgWidth);//以最终的宽度对图片缩放  
          
        var w = (windowW-imgWidth)/2;//计算图片与窗口左边距  
        var h = (windowH-imgHeight)/2;//计算图片与窗口上边距  
        $(innerdiv).css({"top":h, "left":w});//设置#innerdiv的top和left属性  
        $(outerdiv).fadeIn("fast");//淡入显示#outerdiv及.pimg  
    });  
      
    $(outerdiv).click(function(){//再次点击淡出消失弹出层  
        $(this).fadeOut("fast");  
    });  
}

function appendMask(content,src){
	$("body").append(`
        <div class="maskNew">
            <div class="maskNewContent">
                <a href="javascript:void(0);" class="closeA" onclick=closeMask1() ><img src="images/icon1/gb.png"/></a>
                <div class="maskTitle">提示</div>
                <div style="text-align:center;margin-top:30px"><img src="images/icon1/${src}.png"></div>
                <div style="height: 50px;position: relative;top:20px;font-size: 22px;text-align: center;">
                    ${content}
                </div>
                <div style="text-align:center;margin-top:30px">
                    <button class="closeMask" onclick=closeMask1() >确认</button>
                </div>
            </div>
        </div>
    `)
}
function closeMask(id){
	$(".maskNew").remove();
    $.ajax({
    	type:"post",
    	url:"index.php?module=brand_class&action=del&cid="+id,
    	async:true,
    	success:function(res){
    		if(res==1){
    			appendMask("删除成功","cg");
            }else if(res==2){
    			appendMask("该品牌正在使用，不允删除","ts");
            }else{
                appendMask("删除失败","ts");
            }
    	}
    });
}
function closeMask1(){
	$(".maskNew").remove();
    location.replace(location.href);
}
function confirm (content,id){
	$("body").append(`
        <div class="maskNew">
            <div class="maskNewContent">
                <a href="javascript:void(0);" class="closeA" onclick=closeMask1() ><img src="images/icon1/gb.png"/></a>
                <div class="maskTitle">提示</div>
                <div style="text-align:center;margin-top:30px"><img src="images/icon1/ts.png"></div>
                <div style="height: 50px;position: relative;top:20px;font-size: 22px;text-align: center;">
                    ${content}
                </div>
                <div style="text-align:center;margin-top:30px">
                    <button class="closeMask" style="margin-right:20px" onclick=closeMask("${id}") >确认</button>
                    <button class="closeMask" onclick=closeMask1() >取消</button>
                </div>
            </div>
        </div>
    `)
}
function confirm1 (content,id,content1){
    $("body").append(`
        <div class="maskNew">
            <div class="maskNewContent">
                <a href="javascript:void(0);" class="closeA" onclick=closeMask1() ><img src="images/icon1/gb.png"/></a>
                <div class="maskTitle">提示</div>
                <div style="text-align:center;margin-top:30px"><img src="images/icon1/ts.png"></div>
                <div style="height: 50px;position: relative;top:20px;font-size: 22px;text-align: center;">
                    ${content}
                </div>
                <div style="text-align:center;margin-top:30px">
                    <button class="closeMask" style="margin-right:20px" onclick=closeMask2("${id}","${content1}") >确认</button>
                    <button class="closeMask" onclick=closeMask1() >取消</button>
                </div>
            </div>
        </div>
    `)
}
function closeMask2(id,content){
    $(".maskNew").remove();
    $.ajax({
        type:"post",
        url:"index.php?module=brand_class&action=status&id="+id,
        async:true,
        success:function(res){
            if(content=="启用"){
                if(res==1){
                    appendMask("启用成功","cg");
                }else{
                    appendMask("启用失败","ts");
                }
            }else{
                if(res==1){
                    appendMask("禁用成功","cg");
                }else if(res==2){
                    appendMask("该品牌正在使用，不允禁用","ts");
                }else{
                    appendMask("禁用失败","ts");
                }
            }
        }
    });
}
</script>
'; ?>

</body>
</html>