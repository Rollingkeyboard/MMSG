<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml1" dir="ltr" lang="zh-cn" xml:lang="zh-cn">
<head>
	<title>多用户留言系统</title>
	<link rel="stylesheet" type="text/css" href="/Public/css/moodle.css">
	<link rel="stylesheet" type="text/css" href="/Public/css/moodle2.css">
	<script type="text/javascript" src="/Public/script.js"></script>
</head>
<body class="login course-1 notloggedin dir-ltr lang-zh_cn_utf8" id="login-index">
	<div id="page">
		<div id="header" class="clearfix">
			<h1 class="headermain">多用户留言系统</h1>
			<div class="headermenu">
				<div class="logininfo">
					<?php if(isset($_SESSION['logineduser'])): ?>欢迎您，<?php echo (session('logineduser')); ?>！ | <a href="/home/user/logout">注销</a>
					<?php else: ?>
						您还没有登录(<a href="/1home/user/login/">登录</a>)&nbsp;
						还没有用户名(<a href="/home/user/register/">注册</a>)<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- 面包屑 -->
		<div class="navbar clearfix">
			<div class="breadcrumb">
				<ul>
					<li class="first"><a href="/">多用户留言系统</a></li>
					<li><span class="arrow sep">&#x25BA;</span><?php echo ($view_title); ?></li>
				</ul>
			</div>
		</div>

		<!-- 显示留言板主题 -->
		<!-- start PF CONTENT -->
		<div id="content"><!-- 
			<div id="intro" class="generalbox box">
				<font size="+0" face="courier new">
					欢迎大家来到我的留言板。<br/>
					您有什么问题或想法，请书写下您的笔墨。<br/>
					如果您有其他的想法......<br/>
					您可以在这里和大家一起交流和讨论。<br/>
					如果您还没有用户名，请<a href=""></a>
				</font>
			</div> -->
			<div id="content">
    <div id="intro" class="generalbox box">
        <font size="+0" face="courier new">
            欢迎大家来到我的留言板。<br>
            您有什么问题或想法，请书写下您的笔墨。<br>                 
            如果您有其他的想法......<br>
            您可以在这里和大家一起交流和探讨。<br>
            如果您还没有用户名，请<a href="/home/user/register">注册</a>一个用户名，体验更多精彩。<br>
        </font>
    </div>

    <div class="singlebutton forumaddnew">
         <input type="submit" onclick="window.location.href='/home/msg/addmsg/';" value="添加一个新讨论话题">
    </div>
    <br>
    <table cellspacing="0" class="forumheaderlist">
            
        <!-- 表头信息 -->
        <tbody><tr>
            <th class="header topic" scope="col">留言</th>
            <th class="header author" colspan="1">留言人</th>
            <th class="header replies" scope="col">发表时间</th>
            <th class="header lastpost" scope="col">操作</th>
        </tr>   
        <?php if(is_array($lists)): foreach($lists as $key=>$vo): ?><tr class="">
            <td class="topic starter" width="40%"><a href="/home/msg/viewmsg/msgid/<?php echo ($vo["id"]); ?>"><?php echo ($vo["title"]); ?></a></td>
            <td width="20%" style="line-height: 35px;">
                <img class="userpicture" src="<?php echo ($vo["image"]); ?>" height="35" width="35">
                <span><?php echo ($vo["username"]); ?></span>
            </td>
            <td class="replies" width="20%"><?php echo ($vo["time"]); ?></td>
            <td class="lastpost" width="20%" style="text-align: center;">
            <?php if($vo["username"] == session('logineduser')): ?><a href="/home/msg/editmsg/msgid/<?php echo ($vo["id"]); ?>">编辑</a>
                <a href="/home/msg/deletemsg/msgid/<?php echo ($vo["id"]); ?>">删除</a><?php endif; ?>
            </td>
            
        </tr><?php endforeach; endif; ?>    
        </tbody>
    </table>

    <!-- 显示分页码（开始） -->
    <div class="paging">
        <?php echo ($pages); ?>
    </div>
    <!-- 显示分页码（结束） -->

</div>
		</div>
		<div id="footer">
			&copy;2018 <a href="http://www.coeji.xyz">首页</a>
		</div>
	</div>
</body>
</html>