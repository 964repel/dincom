<!--banner-starts-->
<div class="row" style="margin-right: 0; margin-right: 0">

<?php if ($news): ?>

<div class="bnr" id="home" style="background-color: #e0ad7d33; border: 1px solid #6d6968eb; border-radius: 5px; margin: 20px; margin-left: 5%; margin-right: 5%;">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
             <?php foreach ($news as $new):?>
            <li>

                <img src="public/images/photo/<?=$new->img1;?>" alt="" style="max-width: 500px; margin: 30px; border:2px solid #D2D6D9;box-shadow:3px 2px 5px rgba(219,87,74,0.83),-6px 7px 7px rgba(199,219,134,0.89)"/>

    <div class="col-md-6">
                 <h3><?=$new->title;?></h3>
        <p style="font-size: 20px"><?=$new->text;?></p>
    </div>
            </li>
             <?php endforeach; ?>
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>

<?php endif; ?>
</div>
<!--banner-ends-->

<!--about-starts-->
<?php /*if ($category): */?><!--
<div class="about">
    <div class="container">
        <div class="about-top grid-1">
            <?php /*foreach ($category as $curse):*/?>
            <?php /*if ($curse->parent_id == 20): */?>
                <div class="col-md-4 about-left">
                <figure class="effect-bubba">
                    <img class="img-responsive" src="public/images/<?/*=$curse->img;*/?>" alt=""/>
                    <figcaption>
                        <h2><?/*=$curse->title;*/?></h2>
                        <p><?/*=$curse->description;*/?> lol</p>
                    </figcaption>
                </figure>
            </div>
                <?php /*endif; */?>
            <?php /*endforeach; */?>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
--><?php /*endif; */?>
<!--about-end-->
<!--product-starts-->
<?php if ($hitEvents): ?>
<?php $studlvl = \dinkom\App::$app->getProperty('studyLevel');?>
<div class="product">
    <div class="container">
        <h2 style="text-align: center">Скоро в нашем центре</h2>
        <div class="product-top">
            <div class="product-one">
                <?php foreach ($hitEvents as $hitEvent):?>
                <div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="events/<?=$hitEvent->alias;?>" class="mask"><div class="responsive annonce"><hr style:"height: 2px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                                <span class="title-annonce"><?=$hitEvent->title;?></span>
                                <span class="date-annonce"><?=$hitEvent->date;?></span><hr style:"height: 2px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                            </div></a>
                        <div class="product-bottom">
                            <h5><a href="events/<?=$hitEvent->alias;?>"><?=$hitEvent->date;?></a></h5>
                            <p>Подробнее</p>
                            <h4><a data-id="<?=$hitEvent->id;?>" class="add-to-cart-link" href="cart/add?id=<?=$hitEvent->id;?>"><i>

                                     </i></a> <span class=" item_price">
                                <?php if($hitEvent->price == 0):?>Бесплатно
                                <?php else: ?>
                                    <?=$hitEvent->price?>
                                <?php endif; ?>
                                    </span>
                        </div>
                        <div class="srch">
                            <span>
                                <?=$hitEvent->date;?>
                            </span>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
                <div class="clearfix"></div>

            </div>

        </div>
    </div>
</div>
<?php endif; ?>
<!--product-end-->
