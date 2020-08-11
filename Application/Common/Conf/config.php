<?php
return array(
	//'配置项'=>'配置值'
	
	 /* 数据库设置 */
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  '127.0.0.1', // 服务器地址
    'DB_NAME'               =>  'xx_cese',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    
    'DEFAULT_MODULE'        =>  'Home',     //默认模块
        'DB_CHARSET'            =>  'utf8mb4',      // 数据库编码默认采用utf8
    'URL_ROUTER_ON'         =>  true,
    //'DEFAULT_CONTROLLER' => 'Login', // 默认控制器名称
    //'DEFAULT_ACTION' => 'login', // 默认操作名称
      // 视图输出字符串内容替换
    'TMPL_PARSE_STRING'  =>array(
        '__UPLOAD__'=> "/Static/wx/img",
        '__STATICWX__'=> "/Static/wx",
        '__QINIUBABA__'=> "http://img.duyoli.com",
        //小说
        '__STATICXS__'=> "/Static/xs",
           '__AURL__'=> "https://www.xbiquge6.com",

    ),

    //七牛配置
  'UPLOAD_SITEIMG_QINIU' => array (
        'maxSize'   => 15 * 1024 * 1024,//文件大小
        'rootPath'  => './',
        'saveName'  => array ('uniqid', ''),
        'driver'    => 'Qiniu',
        'driverConfig' => array(
            'accessKey'    =>  '-ELTVMhi-c-u8H5ge1VYH4-m7VkIE6qzZb1YfuT5',
            'secretKey'     =>  'xUYWQzu3cOYCommEeffTwJDYqpQQ-uWAdyc-Tb8L',
            'domain'        =>  'img.duyoli.com',//域名
            'bucket'        =>  'img',
        ),
    ),

 'THINK_EMAIL' => array(

'SMTP_HOST' => 'smtp.qq.com', //SMTP服务器

'SMTP_PORT' => '465', //SMTP服务器端口

'SMTP_USER' => '1226272209@qq.com', //SMTP服务器用户名

'SMTP_PASS' => 'blttpuyqohsegjeh', //SMTP服务器密码

'FROM_EMAIL' => '1226272209@qq.com',

'FROM_NAME' => '小飞侠', //发件人名称

'REPLY_EMAIL' => '测试', //回复EMAIL（留空则为发件人EMAIL）

'REPLY_NAME' => '你好', //回复名称（留空则为发件人名称）

'SESSION_EXPIRE'=>'72',
), 

);