<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
    exit;
}

/**
 * Contents.php
 * 文章/页面相关组件 
 *
 * @author     Siphils
 * @version    since 1.9.0
 */

class Content
{
 

    public static function returnCommentList($obj,$comments){
        if ($comments->have()){
            echo '<div class="h5 mb-4"><i class="text-xl text-primary iconfont icon-Chat4 mr-1"></i><span class="d-inline-block align-middle">';
            $obj->commentsNum('暂无评论', '评论 1 条', '评论<small class="text-font text-sm"> ( %d ) </small>');
            echo '</span></div>';
            $comments->listComments();//列举评论
            echo '<nav class="text-center m-t-lg m-b-lg" role="navigation">';
            $comments->pageNav('<i class="fontello fontello-chevron-left"></i>', '<i class="fontello fontello-chevron-right"></i>');
            echo '</nav>';
        }
    }


}
