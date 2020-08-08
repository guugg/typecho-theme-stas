
</div>
<div style="height: 50px;"></div>

<footer class="footer">
          <div class="alert-light" role="alert">
            <div class="d-flex justify-content-center">
                <section class="mt-5">
                    Copyright © 2020 <a title="<?php $this->options->description() ?>" href="<?php $this->options ->siteUrl(); ?>"><?php $this->options->title() ?></a>.保留所有权利<br>
                </section>
            </div>

            <div class="d-flex justify-content-center">
                <section class="mt-2">
                    &nbsp;<a href="<?php $this->options->feedUrl(); ?>" target="_blank">RSS</a>
                    <!-- &nbsp;<a href="https://sixianqiu.com/sitemaps" target="_blank">网站地图</a> -->
                    &nbsp;技术支持：<a href="https://blog.803344.xyz/" title="为您提供一个现代、干净的WEB站点！" target="_blank">小宇宙</a>
                </section>
            </div>
            
          <div style="height: 50px;"></div>
          </div>
</footer>




<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="<?php $this->options->themeUrl(); ?>assets/js/jquery.slim.min.js"  crossorigin="anonymous"></script>

<script src="<?php $this->options->themeUrl(); ?>assets/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script src="<?php $this->options->themeUrl(); ?>assets/js/swiper-bundle.min.js"> </script>

<script type="text/javascript">
var mySwiper = new Swiper('.swiper-container', {
	autoplay: true,//可选选项，自动滑动
    grabCursor : true,
    loop : true,
})



</script>

<?php $this->footer(); ?>
  </body>
</html>