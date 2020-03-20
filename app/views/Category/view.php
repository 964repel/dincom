<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?=$breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-9 prdt-left">
                <?php if(!empty($events)): ?>
                    <div class="product-one">
                        <?php foreach($events as $event): ?>
                            <div class="col-md-4 product-left p-left" style="min-width: 200px">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="events/<?=$event->alias;?>" class="mask"> <div class="annonce" ><hr style:"height: 2px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                                            <span class="title-annonce"><?=$event->title;?></span>
                                            <span class="date-annonce"><?=$event->date;?></span><hr style:"height: 2px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                                        </div></a>
                                    <div class="product-bottom">
                                      <!--  <h4><?/*=$event->title;*/?></h4>-->
                                        <p>Подробнее</p>
                                        <h4>
                                            <a data-id="<?=$event->id;?>" class="add-to-cart-link" href="cart/add?id=<?=$event->id;?>"><i></i></a> <span class=" item_price"><?=$event->price;?></span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="clearfix"></div>
                    </div>
                <div class="text-center">
                    <p>(<?=count($events);?> из <?=$total;?> найденных)</p>
                    <?php if($pagination->countPages > 1):?>
                    <?=$pagination;?>
                    <?php endif;?>
                </div>
                <?php else:?>
                <h3>Пока нет курсов по данному запросу</h3>
                <?php endif; ?>
            </div>
            <div class="col-md-3 prdt-right">
                <div class="w_sidebar">
                    <?php new \app\widgets\filter\Filter(); ?>

                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>