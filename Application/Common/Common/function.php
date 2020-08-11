<?php
//$to:邮箱  $name:标题 $subject:标题  $body:内容
function think_send_mail($to, $name, $subject = '', $body = '', $attachment = null){

$config = C('THINK_EMAIL');

vendor('PHPMailer.class#phpmailer'); //从PHPMailer目录导class.phpmailer.php类文件
vendor('SMTP');
$mail = new PHPMailer(); //PHPMailer对象

$mail->CharSet = 'UTF-8'; //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码

$mail->IsSMTP(); // 设定使用SMTP服务

$mail->SMTPDebug = 0; // 关闭SMTP调试功能

// 1 = errors and messages

// 2 = messages only

$mail->SMTPAuth = true; // 启用 SMTP 验证功能

$mail->SMTPSecure = 'ssl'; // 使用安全协议

$mail->Host = $config['SMTP_HOST']; // SMTP 服务器

$mail->Port = $config['SMTP_PORT']; // SMTP服务器的端口号

$mail->Username = $config['SMTP_USER']; // SMTP服务器用户名

$mail->Password = $config['SMTP_PASS']; // SMTP服务器密码

$mail->SetFrom($config['FROM_EMAIL'], $config['FROM_NAME']);

$replyEmail = $config['REPLY_EMAIL']?$config['REPLY_EMAIL']:$config['FROM_EMAIL'];

$replyName = $config['REPLY_NAME']?$config['REPLY_NAME']:$config['FROM_NAME'];

$mail->AddReplyTo($replyEmail, $replyName);

$mail->Subject = $subject;

$mail->AltBody = "为了查看该邮件，请切换到支持 HTML 的邮件客户端"; 

$mail->MsgHTML($body);

$mail->AddAddress($to, $name);

if(is_array($attachment)){ // 添加附件

foreach ($attachment as $file){

is_file($file) && $mail->AddAttachment($file);

}

}

return $mail->Send() ? true : $mail->ErrorInfo;

}
function curl($utl){
	$curl = curl_init(); 
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查   
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2); // 从证书中检查SSL加密算法是否存在   
curl_setopt($curl, CURLOPT_URL,$utl); 
curl_setopt($curl, CURLOPT_HEADER, 1);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);// 这个是主要参数
$url = curl_exec($curl); 
curl_close($curl);
return $url;
}
?>