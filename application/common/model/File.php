<?php
namespace app\common\model;

use think\Model;

class File extends Model
{
    protected $pk = 'fid';
    protected $auto = ['change_time'];       //数据完成
    protected $insert = ['upload_date'];     //插入数据时触发
    /**
     * 查询出file表中的所有记录
     * is_status 1:正常 2:删除
     */
    public function fileAll(){
        $all = File::where('is_status','1')->select();
        return $all;
    }

    /**
     * 批量添加
     */
    public function fileAddAll($list){
        $addAll = File::saveAll($list);
        return $addAll;
    }

    /**
     * 动态查询数据
     */
    public function fileFid($fid){
        // 根据fid字段查询文件信息
        $file = File::getByFid($fid);

        return $file;
    }

    /**
     * 根据文件分类字段classify来查询
     */
    public function FileclassifyAll($map){
        $list = File::where('is_status','1')->select();
        return $list;
    }

    /**
     * 修改器
     * 自动写入upload_date 字段
     * 上传时间、建立
     */
    public function setUploadDateAttr($upload_date){
        $upload_date = date('Y-m-d H:i:s',time());
        return $upload_date;
    }

    /**
     * 修改器
     * 自动写入change_time 字段
     * 修改时间
     */
    public function setChangeTimeAttr($change_time)
    {
        $change_time = date('Y-m-d H:i:s',time());
        return $change_time;
    }

    /**
     * 获取器
     * 文件状态获取转换
     */
    public function getStatusAttr($value){
        $status  = [1=>'正常',2=>'删除'];
        return $status[$value];
    }

    /**
     * 搜索器
     * 文件名搜索   file_name
     */
    public function searchFileNameAttr($query, $value, $data){
        $query->where('file_name','like', '%' . $value . '%');
    }

    /**
     * 搜索器
     * 标题(简介)搜索 title
     */
    public function searchTitleAttr($query, $value, $data){
        $query->where('title','like', '%' . $value . '%'); 
    }

    

}