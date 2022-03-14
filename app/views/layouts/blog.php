<!DOCTYPE HTML>
<html>
<head>
  <?php \fw\core\base\View::getMeta();?>
  <link href="/blog/css/bootstrap.css" rel='stylesheet' type='text/css' />
  <link href="/bootstrap/bootstrap.min.css" rel='stylesheet' type='text/css' />
  <link href="/blog/css/style.css" rel='stylesheet' type='text/css' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <!----webfonts---->
  <link href='http://fonts.googleapis.com/css?family=Oswald:100,400,300,700' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,300italic' rel='stylesheet' type='text/css'>
  <!----//webfonts---->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <!--end slider -->
  <!--script-->
  <script type="text/javascript" src="/blog/js/move-top.js"></script>
  <script type="text/javascript" src="/blog/js/easing.js"></script>
  <script type="text/javascript" src="/blog/js/main.js"></script>
  <!--/script-->
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $(".scroll").click(function(event){
        event.preventDefault();
        $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
      });
    });
  </script>
  <!---->

</head>
<body>
<!---header---->
<div class="header">
  <div class="container">
    <div class="logo">
      <a href="/"><img src="/blog/images/logo.jpg" title="" /></a>
    </div>
    <!---start-top-nav---->
    <div class="top-menu">
      <div class="search">
        <form>
          <input type="text" placeholder="" required="">
          <input type="submit" value=""/>
        </form>
      </div>
      <span class="menu"> </span>
      <ul>
        <li class="active"><a href="/">HOME</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">CONTACT</a></li>
        <div class="clearfix"> </div>
      </ul>
    </div>
    <div class="clearfix"></div>
    <script>
      $("span.menu").click(function(){
        $(".top-menu ul").slideToggle("slow" , function(){
        });
      });
    </script>
    <!---//End-top-nav---->
  </div>
</div>
<!--/header-->
<div class="content">
  <div class="container">
    <div class="content-grids">
      <div class="col-md-8 content-main">
        <div class="content-grid">
          <?php echo $content; ?>
          <!--<div class="content-grid-info">
            <img src="/blog/images/post1.jpg" alt=""/>
            <div class="post-info">
              <h4><a href="single.html">Lorem ipsum dolor sit amet</a>  July 30, 2014 / 27 Comments</h4>
              <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis.</p>
              <a href="single.html"><span></span>READ MORE</a>
            </div>
          </div>-->
        </div>
      </div>
      <div class="col-md-4 content-right">
        <?php $this->getPart('inc/sidebar');?>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!---->
<div class="footer">
  <div class="container">
    <p>Copyrights © 2015 Blog All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
  </div>
</div>
</body>
</html>


