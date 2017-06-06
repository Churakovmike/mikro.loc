<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<!--/start-banner-->
<div class="banner two">
    <div class="container">
        <h2 class="inner-tittle"><?= $news->title ?></h2>
    </div>
</div>
<!--//end-banner-->
<div class="main-content">
    <div class="container">
        <div class="mag-inner">
            <div class="col-md-12 mag-innert-left">
                <div class="banner-bottom-left-grids">
                    <div class="single-left-grid">
                        <?= $news->content ?>
                    </div>
                </div>
                <div class="post">
                    <a href="#"><h3>Другие новости</h3></a>
                    <?php foreach ($otherNews as $otherNew) : ?>
                        <?php $newsImage = $otherNew->getImage(); ?>
                        <div class="post-grids">
                        <div class="col-md-3 post-left">
                            <a href="<?= Url::to(["/news/" . $otherNew->id]) ?>"><?= Html::img($newsImage->getUrl(), ['class' => 'img-responsive']) ?></a>
                        </div>
                        <div class="col-md-9 post-right">
                            <h4><a href="<?= Url::to(["/news/" . $otherNew->id]) ?>"><?= $otherNew->title ?></a></h4>
                            <p class="text"><?= $otherNew->description ?></p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>