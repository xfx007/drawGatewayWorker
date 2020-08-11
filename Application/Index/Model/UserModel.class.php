<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
   public function upload_logo($file, $data){
   //在添加商品基本数据之前，先实现文件上传，得到图片地址信息
      if($file && $file['error'] == 0){
         //实例化文件上传类
         //自定义配置数据
         $config = array(
            'maxSize'       =>  5 * 1024 * 1024, //上传的文件大小限制 (0-不做限制) byte
              'exts'          =>  array('jpg', 'png', 'gif', 'jpeg'), //允许上传的文件后缀
              'rootPath'      =>  ROOT_PATH . UPLOAD_PATH, //保存根路径
         );
         $upload = new \Think\Upload($config);
         $upload_res = $upload -> uploadOne($file);
          dump($upload_res);die;
         if(!$upload_res){
            //上传失败，获取错误信息
            $error = $upload -> getError();
            //将上传类的错误信息，记录到模型类上error属性上
            $this -> error = $error;
            return false;
         }
         //上传成功，需要拼接文件保存路径，用于添加到数据表
         $data['goods_big_img'] = UPLOAD_PATH . $upload_res['savepath'] . $upload_res['savename'];

         //商品logo图片上传成功，生成缩略图
         // 实例化Image类
         $image = new \Think\Image();
         // 使用open方法打开原始图片（需要真实的文件路径）
         $image -> open( ROOT_PATH . $data['goods_big_img']);
         // 使用thumb方法生成缩略图（需要传递最大宽度和最大高度限制）
         $image -> thumb(188, 188);
         // 使用save方法保存缩略图图片（需要真实的文件路径）
         $thumb_img = UPLOAD_PATH . $upload_res['savepath'] . 'thumb_' . $upload_res['savename'];
         $image -> save( ROOT_PATH . $thumb_img);
         //将缩略图的路径保存到$data中，最终保存到数据表
         $data['goods_small_img'] = $thumb_img;
         //数据处理成功，返回新的$data
         return $data;
      }else{
         return $data;
      }
}

}