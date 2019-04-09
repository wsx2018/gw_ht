<?php
namespace app\common\model;

use think\Model;

/**用户表模型 */
class User extends Model{
    protected $pk = 'id';   //主键
    protected $readonly = ['id', 'username'];    //只读字段，避免被更新

    /**
     * 查询出所有用户,状态为1:正常的用户
     */
    public function userAll()
    {
        $list = User::where('is_status','1')->select();
        return $list;
    }

    /**
     * 根据账号密码查询用户
     */
    public function userPwd($username,$password)
    {
        $list = User::where('username',$username)->where('password',md5($password))->find();
        return $list;
    }

    /**
     * 用户名(账号是否存在)
     */
    public function usernameIsExistence($username){
        $user = User::where('username',$username)->find();
        
        return !empty($user);
    }
    
    /**
     * 修改器
     * 用户密码md5加密
     */
    public function setPasswordAttr($value)
    {
        return md5($value);
    }

    /**
     * 获取器
     * 用户状态获取转换
     */
    public function getStatusTextAttr($value,$data)
    {
        $status  = [1=>'正常',2=>'禁用'];
        return $status[$data['is_status']];
    }

    /**
     * 搜索器
     * 文件名搜索   username
     */
    public function searchUsernameAttr($query, $value, $data){
        $query->where('username','like', '%' . $value . '%');
    }
}