<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!doctype html>
<html lang="zh-CN">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php $this->options->icoUrl() ?>"type="image/x-icon" />
    <!-- Bootstrap CSS -->  
<link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>assets/css/bootstrap.min.css" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>assets/css/swiper-bundle.min.css">  
<link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>assets/css/stas.css" crossorigin="anonymous">

<title>
    <?php $this->archiveTitle(array(
    'category'  =>  _t('分类 %s 下的文章'),
    'search'    =>  _t('包含关键字 %s 的文章'),
    'tag'       =>  _t('标签 %s 下的文章'),
    'author'    =>  _t('%s 发布的文章')
    ), '', ' - '); ?><?php $this->options->title(); ?><?php if($this->_currentPage>1) echo ' - 第 '.$this->_currentPage.' 页 '; ?>
</title>
<style type="text/css" >.header-bimg {height: 250px;width: 100%;padding-top: 80px;text-align: center;color: #fff;position: relative;}.header-bimg {background-repeat: no-repeat;background-position: center center;background-color: #ffffff;background-image: url("<?php $this->options->hebimg() ?>");background-attachment: fixed;background-size: cover;}

.post-br *, ::after, ::before {box-sizing: border-box; line-height: 30px!important;
}

body {background-color: #fff;background-repeat: repeat;background-size: inherit;background-attachment: fixed;background-position: center center;background-image: url(<?php if ($this->options->bodybimg):  $this->options->bodybimg(); else:?> <?php $this->options->themeUrl(); ?>assets/image/bbs.svg <?php endif; ?>);
}

</style>

<?php $this->header(); ?>
</head>

<body>


<header>
    <div class="header-bimg">
        <hgroup>
            <h1><a href="https://sixianqiu.com" title="<?php $this->options->description() ?>"><?php $this->options->title() ?></a></h1>
            <span class="mt-2"><?php $this->options->description() ?></span>
        </hgroup>
        <div class="header_rgba"></div>
    </div>

<ul id="nav" class="nav justify-content-center">
    
    <li><a href="<?php $this->options ->siteUrl(); ?>"><svg t="1596828263383" class="icon" viewBox="0 0 1027 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1140" width="16" height="16"><path d="M1002.496 444.928l-38.912-41.472c-22.528-60.416-56.32-130.56-113.664-186.88 18.432-74.752 29.696-154.624-1.536-215.04 0 0-23.552 60.416-41.984 69.12 12.288 0 33.28 1.536 36.864 15.872-12.8-5.632-31.232-9.728-45.056-5.632-9.728 7.168-19.456 16.896-19.456 16.896s39.424 14.336 50.688 47.104c-14.848-11.264-52.736-38.912-77.824-32.768-23.04 6.144-41.984 13.312-49.152 12.8-1.024-0.512-1.536-0.512-2.56-1.024L629.76 49.664c-3.072-1.536-4.608-3.072-6.144-6.144C558.08-16.896 457.216-13.824 396.8 50.176L327.168 123.904c-9.216-2.048-24.576-7.168-42.496-11.776-25.088-6.144-62.464 21.504-77.824 32.768 11.264-32.768 50.688-47.104 50.688-47.104s-9.216-9.728-19.456-16.896c-13.312-4.096-32.256 0-45.056 5.632 3.584-14.336 25.088-15.872 36.864-15.872C212.992 61.952 189.44 1.536 189.44 1.536c-30.72 59.904-20.48 138.752-2.048 212.992-62.464 56.32-100.352 127.488-123.392 187.904l-39.936 42.496C8.192 461.312 0 481.792 0 504.32c0 48.128 38.4 86.528 86.016 86.016h20.992v323.072c0 60.928 49.664 110.592 110.592 110.592h195.072c20.992 0 36.864-15.872 36.864-36.864V670.72H563.2v316.416c0 20.992 15.872 36.864 36.864 36.864h198.144c60.416 0 110.08-49.664 110.08-110.592v-323.072h31.744c22.528 0 45.056-8.192 60.928-24.064 33.28-33.28 35.328-87.552 1.536-121.344zM315.904 133.632c1.536-0.512 2.56-1.536 4.096-2.048l-0.512 0.512c-1.536 0.512-2.56 1.024-3.584 1.536z" p-id="1141" fill="#447110"></path></svg>&nbsp;首页</a></li>
    
<?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
    <li>
        <a class="hsubs"><svg t="1596828409623" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2402" width="16" height="16"><path d="M320 64 192 64C121.6 64 64 121.6 64 192l0 128c0 70.4 57.6 128 128 128l128 0c70.4 0 128-57.6 128-128L448 192C448 121.6 390.4 64 320 64zM768 64l-128 0C569.6 64 512 121.6 512 192l0 128c0 70.4 57.6 128 128 128l128 0c70.4 0 128-57.6 128-128L896 192C896 121.6 838.4 64 768 64zM320 512 192 512c-70.4 0-128 57.6-128 128l0 128c0 70.4 57.6 128 128 128l128 0c70.4 0 128-57.6 128-128l0-128C448 569.6 390.4 512 320 512zM768 512l-128 0c-70.4 0-128 57.6-128 128l0 128c0 70.4 57.6 128 128 128l128 0c70.4 0 128-57.6 128-128l0-128C896 569.6 838.4 512 768 512z" fill="#447110" p-id="2403"></path></svg>&nbsp;全部分类</a>
        <ul class="subs">
            <?php while($categories->next()): ?>
                <li>
                    <a href="<?php $categories->permalink(); ?>" rel="section"><?php $categories->name(); ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    </li>
  
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
    <li>
        <a class="hsubs"><svg t="1596828506532" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5084" width="16" height="16"><path d="M985.856 581.12l-457.9328 186.5216c-6.4 0-12.7488 6.1952-19.0976 6.1952s-12.7488 0-19.0976-6.1952L31.7952 581.12A46.848 46.848 0 0 1 0 537.6c0-24.8832 19.0976-49.7152 44.544-49.7152 6.3488 0 12.6976 0 19.0464 6.1952l445.2352 180.2752 445.2352-180.2752c6.3488 0 12.6976-6.1952 19.0464-6.1952 25.4464 0 50.8928 18.6368 50.8928 49.7152-6.3488 18.6368-19.0976 37.3248-38.144 43.52zM44.544 693.0432c6.3488 0 12.6976 0 19.0464 6.1952l445.2352 180.3264 445.2352-180.3264c6.3488 0 12.6976-6.1952 19.0464-6.1952 25.4464 0 50.8928 18.6368 50.8928 49.7152a46.848 46.848 0 0 1-31.7952 43.52L534.272 972.8h-25.4464c-6.3488 0-12.7488 0-19.0976-6.1952L31.7952 780.0832C12.6976 773.8368 0 761.344 0 736.5632c0-24.8832 19.0976-43.52 44.544-43.52z m941.312-317.0816l-457.9328 186.5216c-6.4 0-12.7488 6.1952-19.0976 6.1952s-12.7488 0-19.0976-6.1952L31.7952 375.9616C12.6976 369.664 0 357.3248 0 338.6368c0-18.6368 12.6976-37.2736 31.7952-43.52l457.9328-186.5216C496.128 102.4 502.4768 102.4 508.8256 102.4s12.6976 0 19.0976 6.1952l457.9328 186.5216c19.0464 6.2464 31.744 18.688 31.744 43.52 0 18.688-12.6976 31.0784-31.744 37.3248z" p-id="5085" fill="#447110"></path></svg>&nbsp;全部页面</a>
        <ul class="subs">
            <?php while($pages->next()):?>
                <li>
                    <a href="<?php $pages->permalink(); ?>" rel="section"><?php $pages->title(); ?></a>
                </li>
            <?php endwhile; ?>
        </ul>
    </li>

   
</ul>

</header>
<div class="container">





