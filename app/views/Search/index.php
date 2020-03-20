<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="<?=PATH;?>">Главная</a></li>
                <li>Поиск по запросу "<?=h($query);?>"</li>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--prdt-starts-->
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-9 prdt-left">
                <?php if(!empty($events)): ?>
                    <div class="product-one">
                        <?php foreach($events as $event): ?>
                            <div class="col-md-4 product-left p-left">
                                <div class="product-main simpleCart_shelfItem">
                                    <a href="events/<?=$event->alias;?>" class="mask"><div class="responsive annonce"><hr style:"height: 2px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                                            <span class="title-annonce"><?=$event->title;?></span>
                                            <span class="date-annonce"><?=$event->date;?></span><hr style:"height: 2px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                                        </div></a>
                                    <div class="product-bottom">

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
                <?php endif; ?>
            </div>
            <div class="col-md-3 prdt-right">
                <div class="w_sidebar">
                    <section  class="sky-form">
                        <h4>Категории</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>По всем страницам</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Мероприятия\Курсы</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Статьи\Учебные материалы</label>
                            </div>
                        </div>
                    </section>
                    <section  class="sky-form">
                        <h4>Стоимость</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Бесплатно</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Платно</label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>