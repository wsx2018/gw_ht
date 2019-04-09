<?php
namespace app\admin\controller;

use think\Controller;
use app\common\model\File;
use app\common\model\FileClassify;
use app\common\model\User;
use app\admin\auth\BasicController;
// use think\facade\Request;

class Index extends BasicController
{
    public function index()
    {
        $userInfo = session('userInfo');

        $this->assign(
            [
                'username'=>$userInfo['username']
            ]
        );
        return $this->fetch();
    }

    /**
     * app列表页面
     */
    public function appListView()
    {
        /**读取配置 */
        $select_number = config('paginate.list_rows');     //查询条数

        /**实例化类 */
        $File = new File();

        /**获取参数 */
        $file_classify = 1;     //文件分类值  1:apk，2文档

        //搜索参数
        $search_val = input('param.search_val');

        
        $params = $this->request->param();      //保持分页状态

        $fileMap[] = ['is_status','=','1'];
        $fileMap[] = ['file_classify','=',$file_classify];
        $fileList = File::where($fileMap)
                ->withSearch(['file_name'], [
                    'file_name'		=>	$search_val
                ])
                ->order(['ranking'=>'asc','change_time'=>'desc'])
                ->paginate($select_number);
                
        $fileList->appends($params);            //保持分页状态

        foreach($fileList as &$v){
           //将list中的文件大小由字节大小转为kb等计量单位
           $v['file_size'] = byte_to_size($v['file_size']);
           //url中的\转为/
           $v['file_url'] = str_replace('\\','/',$v['file_url']);
        }

        //搜索条件
        $searchData = [             
            'search_val'=>$search_val
        ];

        $this->assign([
            'fileList' => $fileList,
            'select_number' => $select_number,
            'page' => $fileList->render(),
            'searchData'=>$searchData
        ]);
        return $this->fetch(); 
    }
    

    /**
     * 文件列表页面
     */
    public function wordListView()
    {
        /**读取配置 */
        $select_number = config('paginate.list_rows');     //查询条数

        /**实例化类 */
        $File = new File();

        /**获取参数 */
        $file_classify = 2;     //文件分类值  1:apk，2文档

        //搜索参数
        $search_val = input('param.search_val');

        
        $params = $this->request->param();      //保持分页状态

        $fileMap[] = ['is_status','=','1'];
        $fileMap[] = ['file_classify','=',$file_classify];
        $fileList = File::where($fileMap)
                ->withSearch(['file_name'], [
                    'file_name'		=>	$search_val
                ])
                ->order(['ranking'=>'asc','fid'=>'desc'])
                ->paginate($select_number);
                
        $fileList->appends($params);            //保持分页状态

        foreach($fileList as &$v){
        //将list中的文件大小由字节大小转为kb等计量单位
        $v['file_size'] = byte_to_size($v['file_size']);
        //url中的\转为/
        $v['file_url'] = str_replace('\\','/',$v['file_url']);
        }

        //搜索条件
        $searchData = [             
            'search_val'=>$search_val
        ];

        $this->assign([
            'fileList' => $fileList,
            'select_number' => $select_number,
            'page' => $fileList->render(),
            'searchData'=>$searchData
        ]);
        return $this->fetch(); 
    }

    /**
     * 文件上传页面
     */
    public function uploadView()
    {
        $FileClassify = new FileClassify();
        //文件分类
        $classifyList = $FileClassify->select();

        $this->assign(
            ['classifyList'=>$classifyList]
        );
        return $this->fetch();
    }

    /**
     * 管理员列表页面
     */
    public function userListView()
    {
        /**读取配置 */
        $select_number = config('paginate.list_rows');     //查询条数

        //获取参数
        $username = input('param.username');        //账号
        
        $userInfo = session('userInfo');
        $is_super_admin = $userInfo['username']=='admin' ?  true : false;

        $params = $this->request->param();      //保持分页状态

        $userList = User::withSearch(['username'], [
                    'username'		=>	$username
                ])
                ->paginate($select_number);
                
        $userList->appends($params);            //保持分页状态



        $this->assign(
            [
                'userList'=>$userList,
                'is_super_admin'=>$is_super_admin,            //是否为超级管理员
                'select_number' => $select_number,
                'page' => $userList->render(),
                'username'=>$username
            ]
        );
        return $this->fetch();
    }

    /**
     * 添加账号页面
     */
    public function userAddView()
    {
        return $this->fetch();
    }


     /**
     * 文件编辑页面 
     */
    public function fileEditPage()
    {
        /**参数获取 */
        $fid = input('param.fid',0);
        if(empty($fid)){
            $this->error('文件不存在');
        }

        $file = File::get($fid);
        $classifyList = db('file_classify')->select();

        // 赋值（当前作用域）
        if($file['file_classify']==1){
            session('pagePath.fileEditPage', 'Index/appListView');
        }else{
            session('pagePath.fileEditPage', 'Index/wordListView');
        }
       

        $this->assign([
            'file'=>$file,
            'classifyList'=>$classifyList
        ]);
        return $this->fetch();
    }

}
