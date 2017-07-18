<?php
$time=file_get_contents('db/time.db');
if($time<=time()-298)
{
include('config.php');
$data=file($data);
$data=$data[array_rand($data,1)];
$user=file($db);
foreach($user as $user)
{
$user=explode(';',trim($user));
$toqq=$user[0];
$sid=$user[1];
$url='http://blog60.z.qq.com/mmsgb/add_msg.jsp?sid='.$sid;
$post_data="msg=".urlencode($data)."&B_UID=".$toqq."&sign=0";
$ch=curl_init();
curl_setopt ($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_URL,$url) ;
curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);
curl_exec($ch);
curl_close ($ch);
}
echo file_put_contents('db/time.db',time())?'<hr/>time.db更新成功！<br/>':'<hr/>time.db更新失败！';
}else{
echo'这个时候访问本文件，数据库中的所有QQ都将被留言一次，这是相当危险的，为了不让你遗臭万年，这一次访问系统没有去留言，还不快去念佛烧香！！！';
}
?>