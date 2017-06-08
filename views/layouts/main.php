<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <title>Motive Mag a Entertainment Category Flat Bootstrap Responsive Website Template | Home :: w3layouts</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Motive Mag Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <?php $this->head() ?>
<!--    <link href="css/bootstrap-3.1.1.min.css" rel="stylesheet" type="text/css">-->
    <!-- Custom Theme files -->
    <link href="/css/owl.carousel.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/css/style.css" rel='stylesheet' type='text/css' />
    <link href="/css/font-awesome.css" rel='stylesheet' type='text/css' />
    <link href="/css/font-awesome.min.css" rel='stylesheet' type='text/css' />
<!--    <script src="js/jquery.min.js"> </script>-->

    <!--/script-->
<!--    <script type="text/javascript">-->
<!--        jQuery(document).ready(function($) {-->
<!--            $(".scroll").click(function(event){-->
<!--                event.preventDefault();-->
<!--                $('html,body').animate({scrollTop:$(this.hash).offset().top},900);-->
<!--            });-->
<!--        });-->
<!--    </script>-->
</head>
<body>
<?php $this->beginBody() ?>
<div class="header" id="home">
    <div class="content white">
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/"><h1>АЙПИ-<span>ГРУПП</span></h1> </a>
                </div>
                <!--/.navbar-header-->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="/">Главная</a></li>
                        <li><a href="/site/allnews">Новости</a></li>
                        <li><a href="/request/index">Подключиться</a></li>
                        <li><a href="/cabinet">Личный кабинет</a></li>
                        <?php
                        if ( !Yii::$app->user->isGuest ) {
                            $data = \app\modules\admin\models\User::findOne(\Yii::$app->user->id);
                            if ( $data->role != 'abonent') {
                                //debug($data->role);
//                                return Yii::$app->response->redirect(['/site/login']);
                                echo "<li><a href='/admin'>Панедь администратора</a></li>";
                            }
                        }
                        ?>
                        <?php if(!Yii::$app->user->isGuest) : ?>
                            <li><a href="/site/logout">Выход</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <!--/.navbar-collapse-->
                <!--/.navbar-->
            </div>
        </nav>
    </div>
</div>

<?= $content ?>
<!--/start-footer-section-->
<div class="footer-section">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-4 footer-grid">
                <h4>EDITOR cPICKS</h4>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="images/f1.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In NYC...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="images/f2.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In NYC...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="images/f3.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In NYC...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 footer-grid">
                <h4>POPULAR POSTS</h4>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="images/f4.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In NYC...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="images/f3.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In NYC...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="editor-pics">
                    <div class="col-md-3 item-pic">
                        <img src="images/f2.jpg" class="img-responsive" alt=""/>

                    </div>
                    <div class="col-md-9 item-details">
                        <h5 class="inner"><a href="#">More Than 120 ER Visits Linked To Synthetic WordPress In NYC...</a></h5>
                        <div class="td-post-date">Feb 22, 2015</div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="col-md-4 footer-grid">
                <h4>POPULAR CATEGORY</h4>
                <ul class="td-pb-padding-side">
                    <li><a href="#">Architecture<span class="td-cat-no">15</span></a></li>
                    <li><a href="#">New look 2015<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">Gadgets<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">Mobile and Phones<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">Recipes<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">Decorating<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">Interiors<span class="td-cat-no">14</span></a></li>
                    <li><a href="#">Street fashion<span class="td-cat-no">13</span></a></li>
                    <li><a href="#">Vogue<span class="td-cat-no">13</span></a></li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//end-footer-section-->
<!--/start-copyright-section-->
<div class="copyright">
    <p>&copy; 2017 АЙПИ-ГРУПП  </p>
</div>

<a href="#home" id="toTop" class="scroll" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


<!--JS-->
<!--<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>-->

<!--//JS-->
<?php $this->endBody() ?>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav:false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });

    });
</script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
</body>
</html>
<?php $this->endPage() ?>