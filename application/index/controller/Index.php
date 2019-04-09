<?php
namespace app\index\controller;

use think\Controller;
use app\common\model\File;
use app\common\model\FileField;

/**用户文件下载 */
class Index extends Controller
{
    /**
     * 下载列表界面
     */
    public function index(){
        /**读取配置 */
        $select_number = config('paginate.list_rows');     //查询条数

        /**实例化类 */
        $File = new File();

        /**获取参数 */
        $file_classify = input('get.file_classify');   //文件分类 1:apk，2文档
        if(empty($file_classify)) $file_classify = 1;  //初次进入页面时或者为空时的默认分类为1

        
        $params = $this->request->param();      //保持分页状态

        $fileMap[] = ['is_status','=','1'];
        $fileMap[] = ['file_classify','=',$file_classify];
        $fileList = File::where($fileMap)
                ->order(['ranking'=>'asc','fid'=>'desc'])
                ->paginate($select_number);
            
        $fileList->appends($params);            //保持分页状态

        //分页数据赋予
        $page = $fileList->render();


        foreach($fileList as &$v){
           //将list中的文件大小由字节大小转为kb等计量单位
           $v['file_size'] = byte_to_size($v['file_size']);
           //url中的\转为/
           $v['file_url'] = str_replace('\\','/',$v['file_url']);
        }

        $this->assign([
            'file_classify'  => $file_classify,
            'fileList' => $fileList,
            'select_number' => $select_number,
            'page' => $page
        ]);
        return $this->fetch(); 
    }


    /**
     * 文件详情视图
     */
    public function fileDetailsView(){
        /*参数获取*/
        $fid = input('fid');    
        

        $where[] = ["fid","=",$fid];
        $where[] = ["is_status","=",1];
        $fileList = File::where($where)->find();

        //url中的\转为/
        $fileList['file_url'] = str_replace('\\','/',$fileList['file_url']);

        $this->assign([
            "fileList"=>$fileList
        ]);
        return $this->fetch();
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
}
