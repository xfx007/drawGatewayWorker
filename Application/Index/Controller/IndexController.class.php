<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends Controller {
        public function index() { 
            $uid = I('uid'); //发信人ID，获取登录时ID，和下方message()中的I('uid')不同
            session('uid', $uid); 
            $this->display(); 
        } 
        function bind() { 
            $uid = session('uid');  //发信人ID  将uid和client_id绑定
            $client_id = I('client_id'); 
            $gateway = new \Org\Util\Gateway(); 
            $gateway->bindUid($client_id, $uid); 
            $message = '绑定成功' . $uid . '-' . $client_id; 
            $gateway->sendToUid($uid, $message); 
        } 
        function message() { 
            $to_uid = I('to_uid');       //收信人ID
            $x = I('x');                //点击位置x坐标                                  
            $y = I('y');                //点击位置y坐标                               
            $radius = I('radius');      //半径                
            $caseStr = I('caseStr');    //使用函数类型                   
            $type = I('type');          //填充还是描边
            $fillColor = I('fillColor'); 
            $strokeColor = I('strokeColor'); 
            $gateway = new \Org\Util\Gateway(); 
            $data['x'] = $x; 
            $data['y'] = $y; 
            $data['radius'] = $radius; 
            $data['caseStr'] = $caseStr; 
            $data['type'] = $type; 
            $data['fillColor'] = $fillColor; 
            $data['strokeColor'] = $strokeColor; 
            $data['from_uid'] = session('uid');
            $data['to_uid'] = $to_uid; 
            $gateway->sendToUid($to_uid, json_encode($data));  //发给对方 
            echo json_encode($data); //返回给自己
        }
    }