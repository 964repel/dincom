<!DOCTYPE html>
<html>
<head>
    <base href="/">
    <?=$this->getMeta();?>
    <link href="public/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="public/megamenu/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="public/megamenu/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="public/css/flexslider.css" type="text/css" media="screen" />
    <!--theme-style-->
    <link href="public/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!--//theme-style-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<!--top-header-->
<div class="top-header">
    <div class="container">
        <div class="top-header-main">

            <div class="col-md-6 top-header-left">
                <div class="logo">
                    <a href="<?=PATH?>"><h1 style="color: whitesmoke; font-size: 18px; text-align: left; text-shadow: 2px 2px 0px rgba(0,0,0,0.98);"><img src="/public/images/logod.png" width="30px"> УДЦ ДИНКОМ</h1></a>
                </div>
               <!-- <div class="drop">
                    <div class="box">
                        <select id="studyLevel" tabindex="4" class="dropdown drop" >
                            <?php /*new \app\widgets\studyLevel\StudyLevel(); */?>
                        </select>
                    </div>
                    <div class="clearfix"></div>
                </div>-->


            </div>
            <div class="col-md-6 top-header-left">
                <div class="cart box_1">
                    <a href="cart/show" onclick="getCart(); return false;">
                        <div class="total" >
                            <img class="img-responsive" src="public/images/cart-1.png" alt="" />
                            <?php if (!empty($_SESSION['cart'])): ?>
                                <span class="simpleCart_total">Ваши мероприятия: <?=count($_SESSION['cart']);?></span>
                            <?php else:?>
                                <span class="simpleCart_total">Ваш календарь пуст</span>
                            <?php endif;?>
                        </div>
                    </a>

                    <div class="clearfix"> </div>
                    <div class="btn-group">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <span style="color: whitesmoke; text-shadow: 1px 1px 0px rgba(0,0,0,0.98); cursor: pointer">Аккаунт</span>
                            <span class="cart">
                            <ul class="dropdown-menu">
                                <?php if (!empty($_SESSION['user'])): ?>
                                    <li><a href="#">Добро пожаловать, <?=h($_SESSION['user']['name']);?></a></li>
                                    <li><a href="user/logout">Выход</a></li>
                                <?php else: ?>
                                    <li><a href="user/login">Вход</a></li>
                                    <li><a href="user/signup">Регистрация</a></li>
                                <?php endif;?>
                            </ul>
                        </span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--top-header-->
<!--start-logo-->

<!--start-logo-->
<!--bottom-header-->
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="menu-container">
                    <div class="menu">
                    <?php new \app\widgets\menu\Menu([
                        'tpl' => WWW . '/menu/menu.php',
                    ]); ?>
                     </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <form action="search" method="get"autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s">
                        <input type="submit" value="">
                    </form>
                   <!-- <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}">
                    <input type="submit" value="">-->

                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--bottom-header-->

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if(isset($_SESSION['error'])) :?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION['error']; unset($_SESSION['error']);?>
                    </div>
                <?php endif;?>
                <?php if(isset($_SESSION['success'])) :?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success']; unset($_SESSION['success']);?>
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
<?=$content;?>
</div>
<!--<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="container" style="margin-right: 10%; margin-left: 10%;">
<div class="elfsight-app-fa43a3b2-7b06-4865-8958-1e8a50ffd894" </div>
</div>-->
<!--information-starts-->
<hr style="width: 80%"/>
<div class="information">
    <div class="container">
        <div class="infor-top">
            <div class="col-md-3 infor-left">
                <h3>Соц.сети</h3>
                <ul>
                    <li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
                    <li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
                    <li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Информация о центре</h3>
                <ul>
                    <li><a href="#"><p>Наши преподаватели</p></a></li>
                    <li><a href="#"><p>Сотрудники центра</p></a></li>
                    <li><a href="#"><p>Реквизиты</p></a></li>
                    <li><a href="#"><p>Регламентирующие документы</p></a></li>
                    <li><a href="#"><p>Отзывы</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Для учащихся</h3>
                <ul>
                    <li><a href="#"><p>Учебные материалы</p></a></li>
                    <li><a href="#"><p>Новости</p></a></li>
                    <li><a href="#"><p>Акции</p></a></li>
                    <li><a href="#"><p>Архив мероприятий</p></a></li>
                    <li><a href="#"><p>Вакансии</p></a></li>
                </ul>
            </div>
            <div class="col-md-3 infor-left">
                <h3>Контакты</h3>
                <h4>УДЦ ДИНКОМ
                    <span>город Кемерово,</span>
                    ул.Николая Островского 3/2</h4>
                <h5><a href="tel:+79230300363">+7 (923) 030-03-63</a></h5>
                <p><a href="mailto:office@dinkon.ru">office@dinkon.ru</a></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--information-end-->
<!--footer-starts-->
<div class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="col-md-6 footer-left">
                <form>
                    <input type="text" value="Подпишись на рассылку" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Подпишись на рассылку';}">
                    <input type="submit" value="Subscribe">
                </form>
            </div>
            <div class="col-md-6 footer-right">
                <p>© 2020 УДЦ ДИНКОМ </p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--footer-end-->
<div class="modal fade" id="cart" tabindex="1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Добавленные мероприятия</h4>
            </div>

            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Смотреть ещё</button>
                <a href="cart/view" type="button" class="btn btn-primary">Записаться на обучение</a>
                <button type="button" class="btn bg-danger" onclick="clearCart()">Очистить</button>
            </div>
        </div>
    </div>
</div>
<script>
   const path = '<?=PATH;?>'
</script>
<div class="preloader"><img src="public/images/ring.svg"></div>
<script src="public/js/jquery-1.11.0.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script src="public/js/validator.min.js"></script>
<script src="public/js/typeahead.bundle.js"></script>
<!--dropdown-->
<script src="public/js/jquery.easydropdown.js"></script>
<!--Slider-Starts-Here-->
<script src="public/js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider4").responsiveSlides({
            auto: true,
            pager: true,
            nav: true,
            speed: 800,
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
<script src="public/megamenu/js/megamenu.js"></script>
<script src="public/js/imagezoom.js"></script>
<script defer src="public/js/jquery.flexslider.js"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<script src="public/js/jquery.easydropdown.js"></script>
<script type="text/javascript">
    $(function() {

        var menu_ul = $('.menu_drop > li > ul'),
            menu_a  = $('.menu_drop > li > a');

        menu_ul.hide();

        menu_a.click(function(e) {
            e.preventDefault();
            if(!$(this).hasClass('active')) {
                menu_a.removeClass('active');
                menu_ul.filter(':visible').slideUp('normal');
                $(this).addClass('active').next().stop(true,true).slideDown('normal');
            } else {
                $(this).removeClass('active');
                $(this).next().stop(true,true).slideUp('normal');
            }
        });

    });
</script>
<script src="public/js/main.js"></script>
<?php
$logs = \R::getDatabaseAdapter()
    ->getDatabase()
    ->getLogger();
?>
</body>
</html>