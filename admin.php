<?php
include('config.php');
include('html.php');
?>
<title>后台管理</title>
<body>
<div id="main">
<?php
if(isset($_COOKIE['pwd'])) {
if($_COOKIE['pwd']==md5($pwd))
{
if($_GET['do']==1){
echo setcookie("pwd","",time()-10000)?'COOKIE 清除成功！<a href="admin.php">返回</a>':'COOKIE 清除失败！<a href="admin.php">返回</a>';
}else{
echo"<a href='admin.php?do=1'>清除登陆信息</a><div id='liu'>后台管理专区</div><a href='file.php?filename=".$db."'>编辑用户数据</a><br/><a href='file.php?filename=config.php'>修改配置文件</a><br/><a href='file.php'>修改其它文件</a><hr/>后台还应该有什么功能呢？征集中。。。";
}} else{
echo"密码已经修改了！<br/>";
echo setcookie("pwd","",time()-10000)?'COOKIE清除成功！<br/>请刷新后重新登陆！':'COOKIE清除失败！！'; }}
else{
if($_POST['ok']){
if($_POST['pwd']==$pwd){
if(setcookie('pwd',md5($_POST['pwd'])))
$msg='登录成功，请刷新！';
else
$msg='浏览器或服务器不支持COOKIE!';
} else{
$msg='密码错误怎么登陆？';
}} else{ $msg='你还没登录。'; }
echo $msg."<form action='' method='post'>
<div id='liu'>请输入密码:</div><input name='pwd' type='text'/><br/><input name='ok' value='提交' type='submit'/></form>";
}
?><hr/><a href='http://0gan.info'>创意＆源自灵感</a>
</div>
</body>
</html>