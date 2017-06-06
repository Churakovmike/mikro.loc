<?php
use yii\helpers\Html;
use yii\helpers\Url;
//?>
<!--<div class="site-index">-->
<!---->
<!--    <div class="jumbotron">-->
<!--        <h1>Congratulations!</h1>-->
<!---->
<!--        <p class="lead">You have successfully created your Yii-powered application.</p>-->
<!---->
<!--        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>-->
<!--    </div>-->
<!---->
<!--    <div class="body-content">-->
<!---->
<!--        <div class="row">-->
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>-->
<!--            </div>-->
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>-->
<!--            </div>-->
<!--            <div class="col-lg-4">-->
<!--                <h2>Heading</h2>-->
<!---->
<!--                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et-->
<!--                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip-->
<!--                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu-->
<!--                    fugiat nulla pariatur.</p>-->
<!---->
<!--                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>-->
<!--            </div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->
<!--/start-banner-->
<div class="banner">
    <div class="container">
        <div class="banner-inner">
            <div class="callbacks_container">
                <ul class="rslides callbacks callbacks1" id="slider4">
                    <li class="callbacks1_on" style="display: block; float: left; position: relative; opacity: 1; z-index: 2; transition: opacity 500ms ease-in-out;">
                        <div class="banner-info">
                            <h3>WHAT IS LIKE TO WORK AS A SUPERMODEL ON WOMEN’S FASHION</h3>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>
                    <li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
                        <div class="banner-info">
                            <h3>FANTASTIC MAN MAGAZINE AND ITS INFLUENCE ON MEN’S FASHION</h3>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>
                    <li class="" style="display: block; float: none; position: absolute; opacity: 0; z-index: 1; transition: opacity 500ms ease-in-out;">
                        <div class="banner-info">
                            <h3>WHAT IS LIKE TO WORK AS A SUPERMODEL ON WOMEN’S FASHION</h3>
                            <p>Lorem ipsum dolor sit amet</p>
                        </div>
                    </li>
                </ul>
            </div>
            <!--banner-Slider-->

        </div>
    </div>
</div>
<!--//end-banner-->
<!--/start-main-->
<div class="main-content">
    <div class="container">
        <?php Yii::$app->session; ?>
        <?php if( Yii::$app->session->has('response') ): ?>
        <div class="alert alert-success text-center" role="alert"> <?=  Yii::$app->session->getFlash('response'); ?></div>
        <?php endif; ?>
        <div class="mag-inner">
            <div class="col-md-12 mag-innert-left">
                <!--/start-Technology-->
                <div class="latest-articles">
                    <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Наши тарифы</h3>
                    <div class="world-news-grids">
                        <div class="world-news-grid-price">
                            <ul class="price">
                                <li class="header" style="background-color: #5cb85c">Минимум</li>
                                <li class="grey">500 р. / месяц</li>
                                <li>4 Мбит/c</li>
                                <li>Месяц бесплатно</li>
                                <li>Бесплатная смена тарифа</li>
                                <li>Подключение 7000 р.</li>
                            </ul>
                        </div>
                        <div class="world-news-grid-price">
                            <ul class="price">
                                <li class="header" style="background-color: #5cb85c">Мунимум +</li>
                                <li class="grey">700 р. / месяц</li>
                                <li>5 Мбит/c</li>
                                <li>Месяц бесплатно</li>
                                <li>Бесплатная смена тарифа</li>
                                <li>Подключение 7000 р.</li>
                            </ul>
                        </div>
                        <div class="world-news-grid-price">
                            <ul class="price">
                                <li class="header" style="background-color: #5cb85c">Семейный</li>
                                <li class="grey">800 р. / месяц</li>
                                <li>6 Мбит/c</li>
                                <li>Месяц бесплатно</li>
                                <li>Бесплатная смена тарифа</li>
                                <li>Подключение 7000 р.</li>
                            </ul>
                        </div>
                        <div class="world-news-grid-price">
                            <ul class="price">
                                <li class="header" style="background-color: #5cb85c">Семейный +</li>
                                <li class="grey">1000 р. / месяц</li>
                                <li>8 Мбит/c</li>
                                <li>Месяц бесплатно</li>
                                <li>Бесплатная смена тарифа</li>
                                <li>Подключение 7000 р.</li>
                            </ul>
                        </div>
                        <div class="world-news-grid-price">
                            <ul class="price">
                                <li class="header" style="background-color: #5cb85c">Максимум</li>
                                <li class="grey">1200 р. / месяц</li>
                                <li>10 Мбит/c</li>
                                <li>Месяц бесплатно</li>
                                <li>Бесплатная смена тарифа</li>
                                <li>Подключение 7000 р.</li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div><br>
                </div>

                <!--//latest-articles-->
                <div class="latest-articles">
                    <h3 class="tittle"><i class="glyphicon glyphicon-file"></i>Новости</h3>
                    <div class="world-news-grids">
                        <?php foreach ($news as$new) : ?>
                            <?php $newsImage = $new->getImage(); ?>
                        <div class="col-md-4">
                            <?= Html::img($newsImage->getUrl(), ['class' => 'img-responsive']) ?>
                            <a href="<?= Url::to(["/news/" . $new->id]) ?>" class="wd"><?= $new->title ?></a>
                            <p><?= mb_strimwidth($new->description, 0, 100, '...') ?></p>
                            <a class="read" href="<?= Url::to(["/news/" . $new->id]) ?>">Читать</a>
                        </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <!--//articles-->
            </div>
            <div class="clearfix"></div>


        </div>
        <!--//end-mag-inner-->
        <!--/mag-bottom-->

        <div class="mag-bottom">
            <h3 class="tittle bottom"><i class="glyphicon glyphicon-globe"></i>From around the World</h3>
            <div class="grid">
                <div class="col-md-4 m-b">
                    <a href="single.html"> <figure class="effect-layla"></a>
                    <img src="images/pic.jpg" alt="img25"/>
                    <figcaption>
                        <h4>News <span>Mag</span></h4>
                        <a href="#">View more</a>
                    </figcaption>
                    </figure>
                    <div class="m-b-text">
                        <a href="single.html" class="wd">Lorem ipsum dolor sit amet,interdum ullamcorper consectetur </a>
                        <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.</p>
                        <a class="read" href="single.html">Read More</a>
                    </div>
                </div>
                <div class="col-md-4 m-b">
                    <figure class="effect-layla">
                        <a href="single.html">	<img src="images/pic2.jpg" alt="img25"/></a>
                        <figcaption>
                            <h4>News <span>Mag</span></h4>
                        </figcaption>
                    </figure>
                    <div class="m-b-text">
                        <a href="single.html" class="wd">Lorem ipsum dolor sit amet,interdum ullamcorper consectetur </a>
                        <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.</p>
                        <a class="read" href="single.html">Read More</a>
                    </div>
                </div>
                <div class="col-md-4 m-b">
                    <figure class="effect-layla">
                        <a href="single.html"><img src="images/pic3.jpg" alt="img25"/></a>
                        <figcaption>
                            <h4>News <span>Mag</span></h4>
                        </figcaption>
                    </figure>
                    <div class="m-b-text">
                        <a href="single.html" class="wd">Lorem ipsum dolor sit amet,interdum ullamcorper consectetur </a>
                        <p>Nulla quis lorem neque, mattis venenatis lectus. In interdum ullamcorper dolor eu mattis.</p>
                        <a class="read" href="single.html">Read More</a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!--//mag-bottom-->
    </div>
</div>
<!--//end-main-->