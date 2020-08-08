<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

/**
 * Utils.php
 * 部分工具
 *
 * @author     Siphils
 * @version    since 1.9.0
 */

class Utils
{
   


    public static function avatarHtml($obj){
        $email = $obj->mail;
        $avatorSrc = Utils::getAvator($email,65);
        return ''.$avatorSrc.'';
    }

    //上面调用下面，判断是否QQ邮箱，如果是则输出QQ头像
    public static function getAvator($email,$size){
    $options = Helper::options();
    $gravatar = $options->commUrl;
    if ($email) {
        if (strpos($email, "@qq.com") !== false) {
            $email = str_replace('@qq.com', '', $email);
            if(is_numeric($email)){
            echo  '<img nogallery src="https://q.qlogo.cn/g?b=qq&nk='. $email .'&s=100" class="img-40px photo img-square normal-shadow" height="48" width="48">';
            }else{
                $mmail = $email.'@qq.com';
                $email = md5($mmail);
                echo '<img nogallery src=\"//cdn.v2ex.com/gravatar/" . $email . "? class="img-40px photo img-square normal-shadow" height="48" width="48">';
            }
        } else {
            $email = md5($email);
            echo '<img nogallery src="'. $gravatar .'"? class="img-40px photo img-square normal-shadow" height="48" width="48">';
        }
    } else {
        echo '<img nogallery src="'. $gravatar .'" . $email . "? class="img-40px photo img-square normal-shadow" height="48" width="48">';
    }
    }


}

