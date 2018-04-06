<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <base href="<?php echo site_url();?>">
  <title>博客文章管理 Johnny的博客 - SYSIT个人博客</title>
      <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
  <link rel="stylesheet" type="assets/text/css" href="css/jquery.css" media="screen">
  <script type="text/javascript" src="assets/js/jquery-1.js"></script>
  <script type="text/javascript" src="assets/js/jquery.js"></script>
  <script type="text/javascript" src="assets/js/jquery_002.js"></script>
  <script type="text/javascript" src="assets/js/oschina.js"></script>
  <style type="text/css">
    body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}	
  </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
<div id="OSC_Banner">
    <div id="OSC_Slogon"><?php echo $this->session->userdata('uname')?>'s Blog</div>
    <div id="OSC_Channels">
        <ul>
        <li><a href="#" class="project">心情 here...</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div><!-- #EndLibraryItem --><div id="OSC_Topbar">
	  <div id="VisitorInfo">
		当前访客身份：
				<?php echo $this->session->userdata('uname')?> [ <a href="#">退出</a> ]
				<span id="OSC_Notification">
			<a href="#" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
																				</span>
    </div>
		<div id="SearchBar">
    		<form action="#">
								<input name="user" value="154693" type="hidden">
																								<input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
				<input class="SUBMIT" value="搜索" type="submit">
    		</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="blog/index">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle">博客文章管理</span>
    </div>
    <div id="AdminMenu"><ul>
	<li class="caption">个人信息管理		
		<ol>
			<li><a href="inbox.htm">站内留言(0/1)</a></li>
			<li><a href="user/profile">编辑个人资料</a></li>
			<li><a href="user/chpwd">修改登录密码</a></li>
			<li><a href="userSettings.htm">网页个性设置</a></li>
		</ol>
	</li>		
</ul>
<ul>
	<li class="caption">博客管理	
		<ol>
			<li><a href="newBlog.htm">发表博客</a></li>
			<li><a href="blogCatalogs.htm">博客设置/分类管理</a></li>
			<li class="current"><a href="blog/blogs">文章管理</a></li>
			<li><a href="blogComments.htm">博客评论管理</a></li>
		</ol>
	</li>
</ul>
</div>
    <div id="AdminContent">
<div class="MainForm BlogArticleManage">
  <h3 class="title">共有 3 篇博客，每页显示 40 个，共 1 页</h3>
    <div id="BlogOpts">
	<a href="javascript:;" onclick="select_all();">全选</a>&nbsp;|
	<a href="javascript:;" onclick="unselect_all();">取消</a>&nbsp;|
	<a href="javascript:;" onclick="select_other();">反向选择</a>&nbsp;|
	<a href="javascript:;" onclick="delete_sel();">删除选中</a>
  </div>
  	<ul>
  		<?php foreach($blogs as $blog){?>
		<li class="row_1">
		<input name="blog" value="<?php echo $blog->BLOG_ID?>" type="checkbox">
		<a href="viewPost_comment.htm" target="_blank"><?php echo $blog->TITLE?></a>
		<small><?php echo $blog->ADD_TIME?></small>
	   </li>
	   <?php } ?>
	</ul>
  </div>

</div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script type="text/javascript">
	function select_all(){
		$("input[name='blog']").attr('checked',true);
	}
	function unselect_all(){
		$("input[name='blog']").attr('checked',false);
	}
	function select_other(){
		$("input[name='blog']").each(function(){
			$(this).attr("checked",!$(this).attr("checked"));
		})
	}
	function delete_sel(){
		var val = $(":checked").val();
		//console.log(val);
		$.get('blog/delete_blog',{blog_id:val},function(data){
			  //alert("Data Loaded: " + data);
			  //console.log(data);
			  if(data == 'success'){
			  	$(".row_1:has(:checked)").remove();
			  	alert('删除成功');
			  }else{
			  	alert('删除失败');
			  }
		});
	}
</script>
</body></html>