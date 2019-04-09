<?php
namespace app\common\model;

use think\Model;

class FileField extends Model
{
    protected $pk = 'id';
    
    /**
     * 根据fid返回记录
     */
    public function fidSelect($fid){
        $list = FileField::where('fid',$fid)->select();
        return $list;
    }
}