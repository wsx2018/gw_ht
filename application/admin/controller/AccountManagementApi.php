<?php
namespace app\admin\controller;

use app\admin\auth\BasicController;
use app\common\model\User;

/**账号管理控制器 */
class AccountManagementApi extends BasicController{
   
    /**添加用户 */
    public function userAddApi(){
        $username = input('param.username');
        $password = input('param.password');
        $remarks = input('param.remarks');

        $userInfo = session('userInfo');
        if($userInfo['username'] !== 'admin'){
            $this->error('你没有权限进行此操作');
        }

        $User = new User();
        if($User->usernameIsExistence($username)){
            $this->error('账号已经存在');
        }

        $userAdd = User::create([
            'username'=>$username,
            'password'=>$password,
            'is_status'=>1,
            'creation_time'=>date('Y-m-d H:i:s',time()),
            'remarks'=>$remarks
        ]);

        if($userAdd===false){
            $this->error('账号添加失败');
        }
        $this->success('账号添加成功');
    }

    /**
     * 禁用账号
     */
    public function banUsername()
    {
        $ban_username = input('param.ban_username');
        
        $userInfo = session('userInfo');
        if($userInfo['username']!=='admin'){
            $this->error('你没有权限进行此操作');
        }
        if($ban_username==='admin'){
            $this->error('无法禁用超级管理员');
        }
        if(empty($ban_username)){
            $this->error('操作的目标账号有误');
        }

        $user = User::where('username',$ban_username)->find();
        $user->is_status  = 2;
        $userSave = $user->save();
        
        if($userSave===false){
            $this->error('禁用失败');
        }

        $this->success('禁用成功');
    }

    /**
     * 开通账号
     */
    public function openUsername()
    {
        $open_username = input('param.open_username');
        
        $userInfo = session('userInfo');
        if($userInfo['username']!=='admin'){
            $this->error('你没有权限进行此操作');
        }
        if(empty($open_username)){
            $this->error('操作的目标账号有误');
        }

        $user = User::where('username',$open_username)->find();
        $user->is_status  = 1;
        $userSave = $user->save();
        
        if($userSave===false){
            $this->error('开通失败');
        }

        $this->success('开通成功');
    }

}
