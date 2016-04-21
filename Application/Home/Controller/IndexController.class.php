<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class IndexController extends BaseController {

    public function index() {
        // $this->assign("ad_info", $this->getAd());
        // $this->assign('webtitle',L('T_HOME'));
        $this->display();
    }

    /**
     * UC登录测试
     */
    function test(){
        header("content-type:text/html;charset=utf8");
        $uc = new \Ucenter\Client\Client();
        $user = M('user');
        $result = $user->field('id,phone,pass,email,name,nickname,avatar')->limit('1')->where('id = 1489')->select();
        // echo '<pre>';
        // @var_dump( $result );
        // exit;
        // $salt = substr(uniqid(rand()), -6);
        // $password = md5(md5($result['0']['pass']).$salt);
        // $re = $uc->uc_user_login("admin", "admin");//也可以$uc->ucUserLogin(),兼容驼峰式风格
        $register =  $uc->uc_user_register('U'.$result['0']['phone'],$result['0']['pass'],$result['0']['phone'].'@vkbrother.com');
        if ($register) {
           $ress = $uc->uc_avatar($register,'http://app.vyanke.com'.$result['0']['avatar']);
        }
        dump($ress);
    }

}