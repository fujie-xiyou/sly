<?php include('html.php');
include('config.php');
 ?>
<title>自动刷QQ空间留言</title>
<body>
<div id="main">
<?php
if(!$_POST['go'])
{
echo "这里是LOGO位置<form action='' method='post'>
<div id='liu'>填接受留言的QQ:</div><input name='toqq' value='' type='text'/><div  id='liu'>填留言QQ的SID:</div><input name='sid' value='' type='text'/><br/><input name='go' value='提交' type='submit'/></form><hr/>说明:你也可以自己给自己留言哦！";
}else {
$toqq=$_POST['toqq'];
$sid=$_POST['sid'];
$pd=file_get_contents('http://pt5.3g.qq.com/s?aid=nLogin3gqqbysid&3gqqsid='.$sid);
if(substr_count($pd,'登录成功')!=0||substr_count($pd,'在线')!=0)
{
if(substr_count(file_get_contents($db),$sid)==0)
{
$new=$toqq.';'.$sid.';'.date("Y/m/d H:i:s")."\r\n";
if(file_put_contents($db,$new,FILE_APPEND))
{
echo $toqq.'成功加入刷留言列队！';
}else {
echo "数据库出错"; }}
else{
echo"你提交的SID在数据库中已经存在，如果你想用一个QQ为多个QQ留言的话，我劝你别这么做，因为这样会很容易出现验证码！！";
}
} else {
echo $pd;}}
?><hr/>版本:v1.1<br/><a href='http://0gan.info'>创意＆源自灵感</a></div>
</body>
</html>