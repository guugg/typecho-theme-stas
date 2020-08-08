
    <?php if (strlen($this->options->commentBackground) > 0): ?>
        <style>
            textarea#comment{
                background-image: url('<?php echo $this->options->commentBackground; ?>');
                background-color: #fafdff;
                transition: 0.5s;
            }
            textarea#comment:focus {
                background-position-y: 115px;
                transition: 0.4s;
			}
.comment-author-at {
    float: left!important;
    margin-right: 5px!important;
}
.comment-content-true {
    display: block;
}
        </style>
    <?php endif; ?>

    <?php
    $GLOBALS['isLogin'] = $this->user->hasLogin();
    $GLOBALS['rememberEmail'] = $this->remember('mail',true);


    function threadedComments($comments, $options) {
        $commentClass = '';
        $Identity = '';
        if ($comments->authorId) {
            if ($comments->authorId == $comments->ownerId) {
                $commentClass .= ' comment-by-author';  //如果是文章作者的评论添加 .comment-by-author 样式
                $Identity = '<svg t="1596770135025" class="icon" viewBox="0 0 2267 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="6792" width="32" height="32"><path d="M2121.142857 0a146.285714 146.285714 0 0 1 146.285714 146.285714v731.428572a146.285714 146.285714 0 0 1-146.285714 146.285714H146.285714a146.285714 146.285714 0 0 1-146.285714-146.285714V146.285714a146.285714 146.285714 0 0 1 146.285714-146.285714h1974.857143z m0 36.571429H146.285714a109.714286 109.714286 0 0 0-109.714285 109.714285v731.428572a109.714286 109.714286 0 0 0 109.714285 109.714285h1974.857143a109.714286 109.714286 0 0 0 109.714286-109.714285V146.285714a109.714286 109.714286 0 0 0-109.714286-109.714285z" fill="#FF6C18" p-id="6793"></path><path d="M680.813714 273.554286h47.396572v619.666285h64.073143v-204.507428h261.558857v-60.562286h-261.558857V479.817143h256.292571v-61.44h-256.292571V273.554286h294.912V211.236571H708.022857c14.043429-35.986286 28.086857-74.605714 42.130286-114.980571l-63.195429-14.043429c-49.152 148.333714-113.225143 268.580571-190.464 359.862858l44.763429 53.540571c52.662857-63.195429 99.181714-136.923429 139.556571-222.061714z m-280.868571 126.390857v493.275428h64.950857V305.152a1066.496 1066.496 0 0 0 88.649143-192.219429l-59.684572-28.086857c-43.008 133.412571-112.347429 251.026286-207.140571 353.718857l21.065143 66.706286a1041.590857 1041.590857 0 0 0 92.16-105.325714z m861.915428-221.184v58.806857h240.493715v104.448h-318.610286v59.684571h399.36c-124.635429 71.972571-261.558857 126.390857-411.648 161.499429l26.331429 58.806857a4105.874286 4105.874286 0 0 0 147.456-50.907428v322.998857h64.073142v-39.497143h380.050286v39.497143h63.195429v-394.971429h-331.776c50.907429-23.698286 97.426286-47.396571 137.801143-71.972571l39.497142-25.453715h267.702858V342.016h-187.830858c58.806857-47.396571 114.102857-102.692571 165.888-164.132571l-48.274285-35.108572a1182.610286 1182.610286 0 0 1-217.673143 199.241143h-110.592V237.568h207.140571V178.761143h-207.140571V85.723429H1502.354286v93.037714h-240.493715z m147.456 523.995428h380.050286v95.670858H1409.316571v-95.670858z m380.050286-56.173714H1409.316571v-92.16h380.050286v92.16z" fill="#FF6C18" p-id="6794"></path></svg>';
            } else {
                $commentClass .= ' comment-by-user';  //如果是评论作者的添加 .comment-by-user 样式
                //$Identity = '<label class="label bg-dark m-l-xs">'._mt("用户").'</label>';
            }
        }else{
            $Identity = '<svg t="1596770078950" class="icon" viewBox="0 0 1920 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="5766" width="32" height="32"><path d="M1792 1024H128c-70.4 0-128-57.6-128-128V128c0-70.4 57.6-128 128-128h1664c70.4 0 128 57.6 128 128v768c0 70.4-57.6 128-128 128z" fill="#C4D3E1" p-id="5767"></path><path d="M352 588.8c-32 99.2-64 185.6-96 265.6L204.8 832c38.4-83.2 70.4-172.8 99.2-262.4l48 19.2z m-105.6-220.8c44.8 38.4 83.2 73.6 115.2 105.6L320 512c-28.8-35.2-67.2-73.6-112-108.8l38.4-35.2z m3.2-195.2c41.6 35.2 80 67.2 108.8 102.4L320 313.6c-25.6-32-60.8-67.2-108.8-105.6l38.4-35.2z m176 163.2h-60.8V281.6h108.8c-9.6-38.4-19.2-76.8-32-115.2l54.4-9.6c12.8 38.4 22.4 80 32 124.8h89.6v54.4H480V448h124.8c0 176-3.2 288-9.6 332.8-3.2 48-28.8 73.6-70.4 73.6l-57.6-3.2-12.8-48h60.8c16 0 25.6-16 28.8-44.8 6.4-28.8 9.6-115.2 9.6-259.2h-76.8c-12.8 160-48 281.6-102.4 361.6l-41.6-35.2c60.8-92.8 92.8-236.8 96-441.6v-48z m275.2-12.8c-19.2 48-44.8 89.6-73.6 124.8l-35.2-41.6c48-60.8 80-144 96-249.6l54.4 9.6c-6.4 35.2-12.8 67.2-25.6 102.4h192v57.6h-208z m-22.4 83.2h208v51.2c-22.4 32-51.2 60.8-80 92.8v48h105.6v51.2h-105.6v137.6c0 48-19.2 73.6-57.6 73.6h-67.2l-12.8-51.2h60.8c16 0 22.4-12.8 22.4-41.6v-118.4h-118.4v-51.2h118.4V544c32-35.2 54.4-64 70.4-83.2h-147.2v-54.4zM1321.6 297.6c-12.8 19.2-25.6 38.4-35.2 51.2h284.8v44.8c-32 44.8-76.8 83.2-134.4 115.2 83.2 32 176 54.4 281.6 60.8l-12.8 51.2C1580.8 608 1472 582.4 1376 537.6c-89.6 41.6-204.8 73.6-342.4 96l-19.2-48c128-19.2 230.4-44.8 307.2-76.8-38.4-22.4-73.6-48-108.8-76.8-28.8 25.6-60.8 51.2-96 73.6l-35.2-41.6c76.8-44.8 137.6-102.4 188.8-172.8l51.2 6.4z m355.2-80v144h-57.6v-96h-512v96h-57.6V217.6h281.6c-9.6-19.2-19.2-38.4-28.8-54.4l60.8-9.6c6.4 12.8 16 32 25.6 64h288z m-86.4 409.6v240H1536v-32H1206.4v32H1152v-240h438.4z m-384 156.8H1536v-108.8H1206.4v108.8zM1504 393.6h-256l-3.2 3.2c38.4 32 83.2 60.8 134.4 86.4 51.2-25.6 92.8-54.4 124.8-89.6z" fill="#FFFFFF" p-id="5768"></path></svg>';
        }
        $commentLevelClass = $comments->_levels > 0 ? ' comment-child' : ' comment-parent';  //评论层数大于0为子级，否则是父级

        $depth = $comments->levels +1; //添加的一句
        if ($comments->url) {
            $author = '<a href="' . $comments->url . '"target="_blank"' . ' rel="external nofollow">' . $comments->author . '</a>';
        } else {
            $author = $comments->author;
        }

        ?>

        <!--自定义评论代码结构 -->

		<li id="<?php $comments->theId(); ?>" class="comment
		<?php if ($depth > 1 && $depth < 3) {
            echo ' comment-child ';
            $comments->levelsAlt('comment-level-odd', ' comment-level-even');
        } else if ($depth > 2){
            echo ' comment-child2';
            $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
        } else {
            echo ' fu';
        }
        $comments->alt(' even', ' odd');
        echo $commentClass;
        ?>">
            <article id="div-<?php $comments->theId(); ?>" class="d-flex flex-fill comment-body mt-4">
				<div class="comment-avatar-author flex-avatar w-48 mr-2 ">
						<?php echo Utils::avatarHtml($comments); ?>
				</div>

                <div class="flex-fill flex-column comment-text mt-1">
						<!-- 名字 -->
                                        <div class="d-flex align-items-center comment-info mb-1">
                                            <div class="comment-author text-sm"><?php echo $author; ?></div>&nbsp;<?php echo $Identity; ?>
										</div>
										<!-- 内容 -->
                                        <div class="comment-content text-sm">
                                            <span class="comment-author-at" style="float: left!important;"><em><?php $parentMail = get_comment_at($comments->coid)?></em> </span>
											<span class="comment-content-true"> 
												<?php $comments->content() ?>
											</span>
                                        </div>
                                                <div class="comment-footer">
                                                    <div class="d-flex flex-fill align-items-center ">
                                                        <div class="text-xs text-muted">
															<time class="comment-date mr-2" datetime="<?php $comments->date('c'); ?>"><?php $comments->dateword(); ?></time>
															<span class="mr-2 author-ip">预留评论地址</span>
                                                        </div>
														<div class="flex-fill"></div>
														<?php $comments->reply('<svg t="1596770300005" class="icon" viewBox="0 0 3737 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="3049" width="64" height="64"><path d="M3225.6 0H512C230.4 0 0 230.4 0 512s230.4 512 512 512h2713.6c281.6 0 512-230.4 512-512s-230.4-512-512-512z m0 998.4H512C243.2 998.4 25.6 780.8 25.6 512S243.2 25.6 512 25.6h2713.6c268.8 0 486.4 217.6 486.4 486.4s-217.6 486.4-486.4 486.4z" fill="#929292" p-id="3050"></path><path d="M2083.84 632.32h232.96v-220.16h-232.96v220.16z m43.52-181.76h148.48v140.8h-148.48v-140.8z" fill="#929292" p-id="3051"></path><path d="M1955.84 791.04h43.52V768h404.48v23.04h43.52V276.48H1955.84v514.56z m43.52-473.6h404.48v412.16H1999.36V317.44zM3013.12 634.88v-30.72h-276.48c12.8-15.36 23.04-30.72 30.72-40.96h243.2v-194.56h-360.96c10.24-12.8 20.48-28.16 30.72-43.52h378.88v-38.4h-358.4c5.12-12.8 10.24-28.16 15.36-43.52l-43.52-7.68c-23.04 69.12-66.56 125.44-128 174.08l25.6 33.28c25.6-20.48 48.64-40.96 71.68-66.56v184.32h79.36c-33.28 43.52-84.48 79.36-156.16 107.52l23.04 38.4c30.72-15.36 58.88-30.72 87.04-48.64 33.28 28.16 71.68 53.76 112.64 74.24-64 17.92-138.24 30.72-227.84 33.28l17.92 38.4c104.96-5.12 192-23.04 263.68-48.64 69.12 25.6 148.48 40.96 240.64 46.08l10.24-40.96c-71.68-2.56-138.24-12.8-197.12-30.72 46.08-23.04 87.04-56.32 117.76-94.72z m-327.68-232.96H2969.6v46.08h-284.16v-46.08z m0 122.88v-46.08H2969.6v46.08h-284.16z m20.48 115.2h253.44c-30.72 30.72-69.12 56.32-120.32 76.8-48.64-20.48-94.72-46.08-133.12-76.8zM1075.2 153.6c-212.48 0-384 143.36-384 320 0 79.36 33.28 151.04 89.6 207.36L716.8 896l238.08-117.76c38.4 10.24 79.36 15.36 120.32 15.36 212.48 0 384-143.36 384-320S1287.68 153.6 1075.2 153.6z m-204.8 384c-28.16 0-51.2-23.04-51.2-51.2s23.04-51.2 51.2-51.2 51.2 23.04 51.2 51.2-23.04 51.2-51.2 51.2z m204.8 0c-28.16 0-51.2-23.04-51.2-51.2s23.04-51.2 51.2-51.2 51.2 23.04 51.2 51.2-23.04 51.2-51.2 51.2z m204.8 0c-28.16 0-51.2-23.04-51.2-51.2s23.04-51.2 51.2-51.2 51.2 23.04 51.2 51.2-23.04 51.2-51.2 51.2z" fill="#929292" p-id="3052"></path></svg>'); ?>
                                                    </div>
                                                </div>
                   
                </div>

            </article>
            <!-- 单条评论者信息及内容 -->
            <?php if ($comments->children) { ?> <!-- 是否嵌套评论判断开始 -->
                <div class="children m-l-xxl">
                    <?php $comments->threadedComments($options); ?> <!-- 嵌套评论所有内容-->
                </div>
            <?php } ?> <!-- 是否嵌套评论判断结束 -->
        </li><!--匹配`自定义评论的代码结构`下面的li标签-->
    <?php } ?>

    <div id="comments" class="comments mt-5">
        <?php $this->comments()->to($comments); ?>

        <?php if ($this->options->commentPosition == 'bottom' || $this->options->commentPosition ==  ""): ?>
            <!--评论列表-->
            <?php Content::returnCommentList($this,$comments) ?>
        <?php endif; ?>

        <!--如果允许评论，会出现评论框和个人信息的填写-->
        <?php if($this->allow('comment')): ?>
            <div id="<?php $this->respondId(); ?>" class="comment-respond">
               
				<form id="comment_form" method="post" action="<?php $this->commentUrl() ?>"  class="comment-form" role="form">
				<div class="d-flex w-100">

               
<div class="flex-fill comment-from-author">
	<div class="comment-form-info">


        <!--判断是否登录-->
<?php if($this->user->hasLogin()): ?>
    <div class="col-12  py-2">
		<p id="welcomeInfo">欢迎&nbsp;<a data-no-intant target="blank" href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>&nbsp;归来！&nbsp;<a href="<?php $this->options->logoutUrl(); ?>" id="logoutIn" title="Logout"><svg t="1596771593597" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="29815" width="16" height="16"><path d="M509.89948693 512m-504.12307626 0a504.12307733 504.12307733 0 1 0 1008.2461536 0 504.12307733 504.12307733 0 1 0-1008.2461536 0Z" fill="#FF6E05" p-id="29816"></path><path d="M676.1682048 318.75282027c16.8041024 12.60307733 31.5076928 25.2061536 44.11076906 42.01025706 12.60307733 14.70358933 25.2061536 31.5076928 33.60820587 50.4123072 8.4020512 18.90461547 16.8041024 37.80923093 21.00512747 56.7138464 4.20102613 21.00512853 6.30153813 39.909744 6.3015392 60.91487147 0 35.70871787-6.30153813 69.31692267-21.00512854 100.82461547-12.60307733 31.5076928-31.5076928 58.81435947-54.61333333 81.92s-48.3117952 42.010256-79.81948693 54.61333333c-31.5076928 12.60307733-63.01538453 21.00512853-98.7241024 21.00512853-33.6082048 0-67.21641067-6.30153813-98.7241024-21.00512853-31.5076928-12.60307733-56.7138464-31.5076928-79.819488-54.61333333-23.10564053-23.10564053-39.909744-50.4123072-54.61333334-81.92-12.60307733-31.5076928-18.90461547-65.1158976-18.90461546-100.82461547 0-21.00512853 2.10051307-39.909744 6.3015392-58.8143584 4.20102613-18.90461547 10.50256427-37.80923093 21.00512746-54.61333333 8.4020512-16.8041024 18.90461547-33.6082048 31.5076928-48.3117952 12.60307733-14.70358933 27.30666667-29.40717973 42.010256-42.010256 8.4020512-6.30153813 16.8041024-8.4020512 27.30666667-6.3015392s16.8041024 6.30153813 23.1056416 14.7035904c6.30153813 8.4020512 8.4020512 16.8041024 6.30153813 27.30666666-2.10051307 10.50256427-6.30153813 18.90461547-14.70358933 23.10564054-23.10564053 16.8041024-42.010256 39.909744-54.61333333 65.1158976-12.60307733 25.2061536-18.90461547 52.51282027-18.90461547 81.92 0 25.2061536 4.20102613 48.3117952 14.70358933 71.41743573 8.4020512 23.10564053 23.10564053 42.010256 37.80923094 58.81435947 16.8041024 16.8041024 35.70871787 29.40717973 56.7138464 39.90974293 21.00512853 10.50256427 46.21128213 14.70358933 69.31692266 14.7035904 25.2061536 0 48.3117952-4.20102613 69.31692374-14.7035904 21.00512853-10.50256427 42.010256-23.10564053 56.71384533-39.90974293 16.8041024-16.8041024 29.40717973-35.70871787 37.80923093-58.81435947 10.50256427-23.10564053 14.70358933-46.21128213 14.7035904-71.41743573 0-29.40717973-6.30153813-58.81435947-21.00512853-84.02051307-12.60307733-27.30666667-31.5076928-48.3117952-56.7138464-65.1158976-8.4020512-6.30153813-12.60307733-12.60307733-14.70358933-23.10564053-2.10051307-10.50256427 0-18.90461547 6.30153813-27.30666667s12.60307733-12.60307733 23.10564053-14.7035904c18.90461547-6.30153813 29.40717973-4.20102613 37.80923094 2.10051307z m-144.93538454 210.05128213c-10.50256427 0-18.90461547-4.20102613-25.2061536-10.50256427-6.30153813-6.30153813-10.50256427-14.70358933-10.50256426-25.2061536V274.6420512c0-10.50256427 4.20102613-18.90461547 10.50256426-25.2061536 6.30153813-6.30153813 14.70358933-10.50256427 25.2061536-10.50256427s18.90461547 4.20102613 25.2061536 10.50256427c6.30153813 6.30153813 10.50256427 16.8041024 10.50256427 25.2061536v218.45333333c0 10.50256427-4.20102613 18.90461547-10.50256427 25.2061536-8.4020512 8.4020512-16.8041024 10.50256427-25.2061536 10.50256427z m0 0" fill="#FFFFFF" p-id="29817"></path></svg></a></p>
    </div>

        <?php else : ?>
        <div class="row row-sm mb-2 mb-lg-3">
            <?php if($this->remember('author',true) != "" && $this->remember('mail',true) != "") : ?>

            <div class="col-12  py-2">
                    <p>欢迎&nbsp;<a class="show_hide_div" style="color: #333!important;" data-toggle="tooltip" title="点击修改信息"><?php $this->remember('author'); ?></a>&nbsp;归来！</p>
            </div>
                
                    <?php else : ?>
                
            <?php endif; ?>
            <div class="col py-1 py-lg-0">
                <div class="form-group comment-form-author m-0">
                    <input id="author" class="form-control" name="author" type="text" value="<?php $this->remember('author'); ?>" maxlength="245" placeholder="姓名或昵称">
                </div>										
            </div>
            <div class="col-12 col-lg-4 py-1 py-lg-0">
                <div class="form-group comment-form-email m-0">
                    <input type="text" name="mail" id="mail" class="form-control" placeholder="邮箱 (必填,将保密" value="<?php $this->remember('mail'); ?>" />
                </div>
            </div>
            <div class="col-12 col-lg-4 py-1 py-lg-0">
                <div class="form-group comment-form-url m-0">
                    <input id="url" class="form-control" name="url" type="url" value="<?php $this->remember('url'); ?>" maxlength="200" placeholder="网站或博客"></div>
                </div>
            </div>
<?php endif; ?>

                <div class="comment-form-text">
                    <div class="form-group comment-textarea mb-3 comment-form-comment form-group">

                        <textarea id="comment" class="form-control form-control-sm" name="text" rows="5" placeholder="说点什么吧……" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"><?php $this->remember('text'); ?></textarea>

                    </div>

                  

                    <div class="form-submit text-right loci-cancelReply">
                        <?php $comments->cancelReply('<input class="btn btn-primary" value="再想想">'); ?>
                        <input name="submit" type="submit" id="submit" class="btn btn-primary " value="发布评论">

                        <input type="hidden"
                        name="comment_post_ID"
                        value="4625"
                        id="comment_post_ID">
                        <input type="hidden"
                        name="comment_parent"
                        id="comment_parent"
                        value="0">
                    </div>
                </div>
	</div>
</div>

					
						</div>
                </form>
            </div>
        <?php else: ?>
            <p class="commentClose panel">此处评论已关闭</p>
        <?php endif; ?>

        <?php if ($this->options->commentPosition == 'top'): ?>
            <!--评论列表-->
            
            <?php Content::returnCommentList($this,$comments) ?>

        <?php endif; ?>
    </div>




