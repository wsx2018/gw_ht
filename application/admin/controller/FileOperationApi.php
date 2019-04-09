<?php
namespace app\admin\controller;

use app\admin\auth\BasicController;
use app\common\model\File;
use think\Db;
// use think\facade\Request;

//文件操作控制器
class FileOperationApi extends BasicController{

     /**
     * 单文件上传api
     */
    public function uploadFileApi(){
        /**获取参数 */
        $file_name = input('post.file_name');        //文件名称
        $file_classify = input('post.file_classify'); //获取上传的文件的分类
        $introduce = input('post.introduce');    //详细介绍
        $version_number = input('param.version_number');    //版本号
        $ranking = input('param.ranking');              //排名排序


        if(!input('?param.file_name'))
        {
           $this->error('缺少文件名，请重试');
        }
       

        /**读取配置 */
        $upload_path = config('upload.upload_path');         //获取配置文件upload中的文件上传目录路径
        $files = request()->file('files');                  // 获取表单上传文件 例如上传了001.jpg    多文件上传


        $info = $files->move($upload_path);
        if($info){
            // 成功上传后 获取上传信息
            $file_info = $info->getInfo();                          //获取文件信息
            
            $addData = [
                'file_name'=>$file_name,
                'file_classify'=>$file_classify,
                'format'=>$info->getExtension(),        //获取文件格式 .jpg等形式
                'file_size'=>$file_info['size'],         //获取文件大小
                'file_url'=>$upload_path.$info->getSaveName(),  //文件的url
                'file_status'=>1,                               //文件状态
                'introduce'=>$introduce,                  //详细介绍
                'ranking'=>$ranking
            ];
            if(!empty($version_number)){
                $addData['version_number'] = $version_number;
            }

        }else{
            // 上传失败获取错误信息
            echo $files->getError();
        }
        if(empty($addData)) return false;

        
        /**实例化类 */
        $File = new File();

        //批量添加file表记录
        $fileAdd = $File->save($addData);

        if($fileAdd===false){
            $this->error('上传失败');
        }

        $this->success('上传成功');
    }


     /**
     * 多文件上传api
     */
    public function uploadFileAllApi(){
        /**获取参数 */
        $file_nameArr = input('post.file_name');        //文件名称
        $file_classifyArr = input('post.file_classify'); //获取上传的文件的分类
        $titleArr = input('post.title');     //获取上传文件的标题
        $introduceArr = input('post.introduce');    //详细介绍
        $version_number = input('param.version_number');    //版本号


        /**读取配置 */
        $upload_path = config('upload.upload_path');         //获取配置文件upload中的文件上传目录路径
        $files = request()->file('files');                  // 获取表单上传文件 例如上传了001.jpg    多文件上传

        /**实例化类 */
        $File = new File();
        
        $addData = array();
        foreach($files as $k=>$file){
            $addData[$k] = array();

            $info = $file->move($upload_path);
            if($info){
                // 成功上传后 获取上传信息
                $file_info = $info->getInfo();                          //获取文件信息
                
                $addData[$k] = [
                    'file_name'=>$file_nameArr[$k],
                    'title'=>$titleArr[$k],
                    'file_classify'=>$file_classifyArr[$k],
                    'format'=>$info->getExtension(),        //获取文件格式 .jpg等形式
                    'file_size'=>$file_info['size'],         //获取文件大小
                    'file_url'=>$upload_path.$info->getSaveName(),  //文件的url
                    'file_status'=>1,                               //文件状态
                    'introduce'=>$introduceArr[$k],                  //详细介绍
                ];
                if(!empty($version_number)){
                    $addData[$k]['version_number'] = $version_number[$k];
                }

            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
        if(empty($addData)) return false;

        //批量添加file表记录
        $fileAdd = $File->saveAll($addData);

        if($fileAdd===false){
            $this->error('上传失败');
        }

        $this->success('上传成功');
    }
    
    /**
     * 文件下载
     */
    public function fileDownloadApi()
    {   
        $file_url  = input('param.file_url');        //下载文件的url地址
        $file_name = input('param.file_name');       //下载文件的文件名
        
        //下载文件的路径是服务器路径而不是URL路径，如果要下载的文件不存在，系统会抛出异常。
        return download($file_url, $file_name);
    }

    /**
     * 文件删除
     */
    public function fileDelApi(){
        /**获取参数 */
        $fid = input('param.fid');
        
        if(empty($fid)) exit;       //fid不能为空

        $file = File::get($fid);
        $file->is_status = 2;
        $file->save();

        if($file===false){
            $this->error('删除失败');
        }

        $this->success('删除成功');
        // return json($ajaxMap);
    }

    /**
     * 文件编辑api
     */
    public function fileEditApi(){
        /**获取参数 */
        $fid = input('param.fid');
        $file_name =  input('param.file_name');
        $file_classify = input('param.file_classify');
        $version_number = input('param.version_number');
        $introduce = input('param.introduce');
        $ranking = input('param.ranking');

        if(empty($fid)) $this->error('文件不存在');
        if(empty($file_name)) $this->error('文件名格式错误');

        //查询出该条文件记录
        $file = File::get($fid);

        if (!empty($_FILES['new_files']['name'])) {
            /**读取配置 */
            $upload_path = config('upload.upload_path');         //获取配置文件upload中的文件上传目录路径
            $files = request()->file('new_files');                  // 获取表单上传文件 例如上传了001.jpg    多文件上传

            $info = $files->move($upload_path);
            if ($info) {
                // 成功上传后 获取上传信息
                $file_info = $info->getInfo();                          //获取文件信息

                //修改文件信息
                $file->format = $info->getExtension();        //获取文件格式 .jpg等形式
                $file->file_size =  $file_info['size'];         //获取文件大小
                $file->file_url = $upload_path.$info->getSaveName();  //文件的url
            } else {
                // 上传失败获取错误信息
                echo $files->getError();
            }
        }

        $file->file_name = $file_name;
        $file->file_classify = $file_classify;      
        $file->version_number = $version_number;            //文件版本号
        $file->introduce = $introduce;                      //简介
        $file->ranking = $ranking;                          //排序
        $file->save();
        
        if($file===false){
            $this->error('修改文件信息失败');
        }

        $pagePath = session('pagePath.fileEditPage');
        $this->success('修改文件信息成功',$pagePath);
    }

}