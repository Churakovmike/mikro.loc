<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<!--/start-banner-->
<div class="banner two">
    <div class="container">
        <h2 class="inner-tittle">Новости</h2>
    </div>
</div>
<!--/start-banner-->
<!--/start-main-->
<div class="main-content">
    <div class="container">
        <div class="mag-inner">
            <div class="col-md-12 mag-innert-left">
                <!--/business-->
                <?php foreach ($news as $new) : ?>
                    <?php $newsImage = $new->getImage(); ?>
                    <div class="live-market">
                    <h3 class="tittle"><?= $new->title ?></h3>
                    <div class="bull">
                        <a href="<?= Url::to(["/news/" . $new->id]) ?>"><?= Html::img($newsImage->getUrl(), ['class' => 'img-responsive']) ?></a>
                    </div>
                    <div class="bull-text">
<!--                        <a class="bull1" href="--><?//= Url::to(["/news/" . $new->id]) ?><!--">Bulls return after eight days; Sensex up 517 points</a>-->
                        <a href="<?= Url::to(["/news/" . $new->id]) ?>"><p><?= $new->description ?>/p></a>
<!--                        <ul>-->
<!--                            <li><a href="single.html">Grandkids sue Vijaypat Singhania over inheritance</a></li>-->
<!--                            <li><a href="single.html">RBI relaxes norms for NPA provisioning</a></li>-->
<!--                            <li><a href="single.html">We expect RBI to cut rates by another 75 bps: UBS executive director</a></li>-->
<!--                            <li><a href="single.html">Grandkids sue Vijaypat Singhania over inheritance</a></li>-->
<!--                            <li><a href="single.html">RBI relaxes norms for NPA provisioning</a></li>-->
<!--                            <li><a href="single.html">Grandkids sue Vijaypat Singhania over inheritance</a></li>-->
<!--                            <li><a href="single.html">RBI relaxes norms for NPA provisioning</a></li>-->
<!--                        </ul>-->
                    </div>
                    <div class="clearfix"></div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

                <!--//business-->