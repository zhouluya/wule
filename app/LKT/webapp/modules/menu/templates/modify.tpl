<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <meta name="renderer" content="webkit|ie-comp|ie-stand">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport"
    content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
  <meta http-equiv="Cache-Control" content="no-siteapp" />

  {php}include BASE_PATH."/modules/assets/templates/top.tpl";{/php}


  {literal}
  <style>
    .button-conter {
      display: flex;
      justify-content: center;
    }

    #btn1 {
      margin-right: 5px;
    }
  </style>
  <script type="text/javascript">
    function check(f) {
      if (Trim(f.title.value) == "") {
        alert('菜单名称不能为空！');
        return false;
      }
    }
  </script>
  {/literal}
  <title>修改菜单</title>
</head>

<body>
  <nav class="breadcrumb">
    配置管理 <span class="c-gray en">&gt;</span> 菜单列管理
    <span class="c-gray en">&gt;</span> 修改菜单
  </nav>

  <div class="pd-20">
    <form name="form1" action="index.php?module=menu&action=modify" class="form form-horizontal" method="post"
      onsubmit="return check(this);" enctype="multipart/form-data">
      <input type="hidden" name="id" value="{$id}" />
      <input type="hidden" name="val" class="val" value="{$cid}">
      <input type="hidden" name="level" class="level" value="{$level}">
      <input type="hidden" name="status" class="status" value="{$status}">
      <div class="row cl">
        <label class="form-label col-4"><span class="c-red">*</span>菜单名称：</label>
        <div class="formControls col-4">
          <input type="text" class="input-text" value="{$title}" placeholder="" id="" name="title">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-4"><span class="c-red"></span>归类：</label>
        <div class="formControls col-1"> 
            <select name="select_1" class="select" onchange="one()" id="select_1">
              <option selected="true" value="0">一级菜单</option>
              {$list}
            </select>
          
        </div>
        <div class="formControls col-1">
            <select name="select_2" class="select" onchange="two()" id="select_2">
              <option selected="true" value="0">二级菜单</option>
              {$list1}
            </select>
          
        </div>
        <div class="formControls col-1"> 
            <select name="select_3" class="select" onchange="three()" id="select_3">
              <option selected="true" value="0">三级菜单</option>
              {$list2}
            </select>
          
        </div>
      </div>
      <div class="row cl" id="url" {if $level==1}style="display:none;" {/if}> <label class="form-label col-4"><span
          class="c-red"></span>路径：</label>
        <div class="formControls col-4">
          <input type="text" class="input-text" value="{$url}" placeholder="" id="" name="url">
        </div>
      </div>
      <div class="row cl" id="tubiao" {if $type !=0}style="display:none;" {/if}> <label
        class="form-label col-xs-4 col-sm-4"><span class="c-red"></span>图标：</label>
        <div class="formControls col-xs-8 col-sm-6">

          <img id="thumb_url" {if $image !='' }src="{$image}" {else} src='../LKT/images/nopic.jpg'
            style="height:100px;width:100px" {/if}>
          <input type="hidden" id="picurl" name="image" datatype="*" nullmsg="请选择图片" />
          <input type="hidden" name="oldpic" value="{$image}">
          <button class="btn btn-success" id="image" type="button">选择图片</button>
        </div>
        <div class="col-4"> </div>
      </div>
      <div class="row cl" id="tubiao1" {if $type !=0}style="display:none;" {/if}> <label
        class="form-label col-xs-4 col-sm-4"><span class="c-red"></span>点击后图标：</label>
        <div class="formControls col-xs-8 col-sm-6">
          <img id="thumb_url1" {if $image1 !='' }src="{$image1}" {else} src='../LKT/images/nopic.jpg'
            style="height:100px;width:100px" {/if}>
          <input type="hidden" id="picurl1" name="image1" datatype="*" nullmsg="请选择图片" />
          <input type="hidden" name="oldpic1" value="">
          <button class="btn btn-success" id="image1" type="button">选择图片</button>
        </div>
        <div class="col-4"> </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-4 col-sm-4"><span class="c-red">*</span>类型：</label>
        <div class="formControls col-xs-8 col-sm-6 skin-minimal">
          <div class="radio-box">
            <input name="type" type="radio" id="sex-0" value="0" {if $type==0}checked{/if}> <label
              for="sex-0">平台</label>
          </div>
          <div class="radio-box">
            <input type="radio" id="sex-1" name="type" value="1" {if $type==1}checked{/if}> <label
              for="sex-1">小程序</label>
          </div>
          <div class="radio-box">
            <input type="radio" id="sex-2" name="type" value="2" {if $type==2}checked{/if}> <label
              for="sex-2">APP</label>
          </div>
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-4"><span class="c-red"></span>排序：</label>
        <div class="formControls col-4">
          <input type="text" class="input-text" value="{$sort}" placeholder="" id="" name="sort">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-4"></label>
        <div class="formControls col-4">
          <button id="btn1" class="btn btn-primary radius" type="submit" name="Submit">提
            交</button>
        </div>
      </div>
    </form>

  </div>

{php}include BASE_PATH."/modules/assets/templates/footer.tpl";{/php}

  {literal}
  <script>
    KindEditor.ready(function (K) {
      var editor = K.editor({
        allowFileManager: true,
        uploadJson: "index.php?module=system&action=uploadImg&m=menu", //上传功能
        fileManagerJson: 'kindeditor/php/file_manager_json.php', //网络空间
      });
      //上传背景图片
      K('#image').click(function () {
        editor.loadPlugin('image', function () {
          editor.plugin.imageDialog({
            showRemote: false, //网络图片不开启
            //showLocal : false, //不开启本地图片上传
            imageUrl: K('#picurl').val(),
            clickFn: function (url, title, width, height, border, align) {
              K('#picurl').val(url);
              $('#thumb_url').attr("src", url);
              document.getElementById('thumb_url').style = '';
              editor.hideDialog();
            }
          });
        });
      });
      //上传背景图片
      K('#image1').click(function () {
        editor.loadPlugin('image', function () {
          editor.plugin.imageDialog({
            showRemote: false, //网络图片不开启
            //showLocal : false, //不开启本地图片上传
            imageUrl: K('#picurl1').val(),
            clickFn: function (url, title, width, height, border, align) {
              K('#picurl1').val(url);
              $('#thumb_url1').attr("src", url);
              document.getElementById('thumb_url1').style = '';

              editor.hideDialog();
            }
          });
        });
      });
    });
    var status = $(".status").val();
    if (status == 1) {
      $("#select_1").attr("disabled", "disabled").css("background-color", "#EEEEEE;");
      $("#select_2").attr("disabled", "disabled").css("background-color", "#EEEEEE;");
      $("#select_3").attr("disabled", "disabled").css("background-color", "#EEEEEE;");
    }

    var level = $(".level").val();
    if (level != 0) {
      // document.getElementById('zname').style.display = '';
      // document.getElementById('name').disabled = 'false';

      document.getElementById('tubiao').style.display = 'none';
      document.getElementById('tubiao1').style.display = 'none';
      document.getElementById('url').style.display = '';

    } else {
      // document.getElementById('zname').style.display = '';
      // document.getElementById('name').disabled = '';

      document.getElementById('tubiao').style.display = '';
      document.getElementById('tubiao1').style.display = '';
      document.getElementById('url').style.display = 'none';

    }
    $("select.select").change(function () {
      var s_id = $(this).val();
      if (s_id == 0) {
        document.getElementById('tubiao').style.display = '';
      } else {
        document.getElementById('tubiao').style.display = 'none';
      }
      // $.ajax({
      //     type: "GET",
      //     url: location.href+'&action=ajax&s_id='+s_id,
      //     data: "",
      //     success: function(msg){
      //         obj = JSON.parse(msg);
      //         if(obj.status == 1){
      //             document.getElementById('zname').style.display = '';
      //             document.getElementById('name').disabled = 'false';
      //             if(obj.res == 1){
      //                 document.getElementById('url').style.display = 'none';
      //             }else{
      //                 document.getElementById('url').style.display = '';
      //             }
      //             $("#name").val(obj.name);
      //         }else{
      //             document.getElementById('zname').style.display = '';
      //             document.getElementById('url').style.display = 'none';
      //             document.getElementById('name').disabled = '';
      //             $("#name").val('');
      //         }
      //     }
      // });
    });
    function one() {
      var dropElement1 = document.getElementById("select_1");
      var dropElement2 = document.getElementById("select_2");
      var dropElement3 = document.getElementById("select_3");
      var v = dropElement1.value;

      RemoveDropDownList(dropElement2);
      RemoveDropDownList(dropElement3);

      if (v != 0) {
        $('.val').val(v);
        $('.level').val(1);
        $.ajax({
          type: "POST",
          url: location.href + '&action=ajax&v=' + v,
          data: "",
          success: function (msg) {
            obj = JSON.parse(msg);
            $("#select_2").append(obj);
          }
        });
      } else {
        $('.val').val('');
        $('.level').val('');
      }
    }
    function two() {
      var dropElement1 = document.getElementById("select_1");
      var dropElement2 = document.getElementById("select_2");
      var dropElement3 = document.getElementById("select_3");
      var v = dropElement2.value;


      RemoveDropDownList(dropElement3);

      if (v != 0) {
        $('.val').val(v);
        $('.level').val(2);
        $.ajax({
          type: "POST",
          url: location.href + '&action=ajax&v=' + v,
          data: "",
          success: function (msg) {
            obj = JSON.parse(msg);
            $("#select_3").append(obj);
          }
        });
      } else {
        var dropElement1 = document.getElementById("select_1");
        var v1 = dropElement1.value;
        $('.val').val(v1);
        $('.level').val(1);
      }
    }
    function three() {
      var dropElement3 = document.getElementById("select_3");
      var v = dropElement3.value;
      if (v != 0) {
        $('.val').val(v);
        $('.level').val(3);
      } else {
        var dropElement2 = document.getElementById("select_2");
        var v1 = dropElement2.value;
        $('.val').val(v1);
        $('.level').val(2);
      }

    }
    function RemoveDropDownList(obj) {
      if (obj) {
        var len = obj.options.length;
        if (len > 0) {
          //alert(len);
          for (var i = len; i >= 1; i--) {
            obj.remove(i);
          }
        }
      }
    }
  </script>
  {/literal}
</body>

</html>