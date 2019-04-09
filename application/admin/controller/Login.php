<?php 
namespace app\admin\controller;

use think\Controller;
use think\facade\Request;
use think\facade\Session;

use app\common\model\User;

/**登录注册控制器 */
class Login extends Controller{
    /**用户登录页 */
    public function login(){
        return $this->fetch();
    }

    /** 
     * 用户登录api 
     */
    public function userLoginApi(){
        /**参数获取 */
        $post = input('post.');

        $user = User::where('username',$post['username'])
                    ->where('password',md5($post['password']))
                    ->find();
        if(empty($user)){
            $this->error('账号密码错误!');
            exit;
        }
        if($user->is_status==2){
            $this->error('账号已被禁用');
        }
        
        //将登陆信息保存到session中
        Session::set('userInfo.id',$user->id);
        Session::set('userInfo.username',$user->username);

        $this->success('登陆成功','index/index');
    }

    /**
     * 退出登录
     */
    public function logindo()
    {
        // 清除session（当前作用域）
        session(null);

        $this->success('退出登录成功，正在跳转登录页',url('login'));
    }

}