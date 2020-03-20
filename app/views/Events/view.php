<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
               <!-- <li><a href="index.html">Home</a></li>
                <li class="active">Single</li>-->
                <?=$breadcrumbs;?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-12 single-top-left">
                       <img src="public/images/<?=$event->img?>" style="max-width: 500px">

                      <!--  <div class="responsive annonce"><hr style:"height: 2px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                            <span class="title-annonce"><?/*=$event->title;*/?></span>
                            <span class="date-annonce"><?/*=$event->date;*/?></span><hr style:"height: 2px; border: 0; height: 1px; background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));">
                        </div>-->
                    </div>
                    <?php
                    $cats = \dinkom\App::$app->getProperty('cats');
                    ;?>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?=$event->title;?></h2>


                            <h5 class="item_price" id="base_price" style="color: darkred" data-base="<?=$event->price?>"><?php if($event->price == 0):?>
                                    Бесплатно
                                <?php else: ?>
                                    <?=$event->price?><span>₽</span>
                                <?php endif; ?></h5>
                            <?=$event->content;?>
                            <?php if (!empty($mods)):?>
                            <div class="available">
                                <ul>
                                    <li>Color
                                        <select>
                                            <option>Дополнения к обучению</option>
                                            <?php foreach ($mods as $mod):?>
                                            <option data-title="<?=$mod->title;?>" data-price="<?=$mod->price;?>" value="<?=$mod->id;?>"><?=$mod->title;?></option>
                                            <?php endforeach;?>
                                        </select></li>

                                    <div class="clearfix"> </div>
                                </ul>
                            </div>
                            <?php endif;?>

                            <ul class="tag-men" style="font-size: 18px">
                                <li><span>Уровень знаний:  </span>
                                    <span style="color: #911838"><?php if($event->studyLevel == 1):?>
                                        Знакомство с профессией
                                              <?php elseif($event->studyLevel == 2):?>
                                              Освоение профессии
                                        <?php else:?>
                                                Повышение квалификации
                                        <?php endif; ?></span></li>
                                <li><span>Направление:  </span>
                                    <span style="color: #911838"><a href="category/<?=$cats[$event->category_id]['alias'];?>"><?=$cats[$event->category_id]['title'];?></a></span></li>
                            </ul>
                            <a id="productAdd" data-id="<?=$event->id;?>" href="cart/add?id=<?=$event->id;?>" class="add-cart item_add add-to-cart-link">Записаться</a>
<hr/>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <?php if ($gallery):?>
              <div class="row">
                  <?php foreach ($gallery as $item) :?>
                  <div class="col-md-3" style="margin: 5px">
                  <div class="image"> <img src="public/images/photo/<?=$item->img;?>"  class="img-responsive" alt=""/> </div>
              </div>
                  <?php endforeach;?>
                        </div>
                <?php endif;?>
                <!-- FlexSlider -->
                <div class="tabs">
                    <ul class="menu_drop">

                        </li>
                        <li class="item2" style="background-color: #233563; margin-top: 2px"><a href="#"><img src="public/images/arrow.png" alt="">Программа обучения</a>
                            <ul>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item3"><a href="#" style="background-color: #233563; margin-top: 2px"><img src="public/images/arrow.png" alt="">Проподаватель</a>
                            <ul>
                                <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item4"><a href="#" style="background-color: #233563; margin-top: 2px""><img src="public/images/arrow.png" alt="">Детали</a>
                            <ul>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item5"><a href="#" style="background-color: #233563; margin-top: 2px""><img src="public/images/arrow.png" alt="">Отзывы</a>
                            <ul>
                                <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php if($related):?>
                <div class="latestproducts">
                    <div class="product-one">
                        <h3>Так же рекомендуем</h3>
                        <?php foreach ($related as $item) :?>
                        <div class="col-md-4 product-left p-left">
                            <div class="product-main simpleCart_shelfItem">
                                <a href="events/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="public/images/<?=$item['img'];?>" alt="" /></a>
                                <div class="product-bottom">
                                    <h3><a href="events/<?=$item['alias'];?>" ></a><?=$item['title'];?></a></h3>
                                    <!--<p>Explore Now</p>
                                    <h4><a class="item_add" href="#"><i></i></a>--> <span class=" item_price"><?=$item['price'];?></span></h4>
                                </div> <!--
                                <div class="srch">
                                    <span>-50%</span>
                                </div>-->
                            </div>
                        </div>
                        <?php endforeach;?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <?php endif;?>
                <?php if($resentlyViewed):?>
                    <div class="latestproducts">
                        <div class="product-one">
                            <h3>Недавно просмотренные</h3>
                            <?php foreach ($resentlyViewed as $item) :?>
                                <div class="col-md-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="events/<?=$item['alias'];?>" class="mask"><img class="img-responsive zoom-img" src="public/images/<?=$item['img'];?>" alt="" /></a>
                                        <div class="product-bottom">
                                            <h3><a href="events/<?=$item['alias'];?>" ></a><?=$item['title'];?></a></h3>
                                            <!--<p>Explore Now</p>
                                            <h4><a class="item_add" href="#"><i></i></a>--> <span class=" item_price"><?=$item['price'];?></span></h4>
                                        </div> <!--
                                <div class="srch">
                                    <span>-50%</span>
                                </div>-->
                                    </div>
                                </div>
                            <?php endforeach;?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endif;?>
            </div>
            <div class="col-md-3 single-right">
                <div class="w_sidebar">
                    <section  class="sky-form">
                        <h4>Дата и Время проведения</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <span type="date" name="calendar" value="<?=$event->date;?>"><?=$event->date;?></span>

                        </div>
                    </section>
                    <section  class="sky-form">
                        <h4>В стоимость включены</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Раздаточный материал</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Кофе-брейк</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Обед</label>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--end-single-->