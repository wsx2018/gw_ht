<?php
namespace app\admin\auth;

use think\Controller;
use think\facade\Session;

/**控制器基类 */
class BasicController extends Controller{
    //定义控制器初始化方法_initialize，在该控制器的方法调用之前首先执行。    
    public function initialize(){     
        //判断登陆状态   
        if(!Session::has('userInfo.id')){        
            $this->error('请先登录系统',url('Login/login'));        
        }   
    }
}