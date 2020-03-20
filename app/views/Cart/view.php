<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
               <li><a href="<?= PATH;?>">Главная</a></li>
                 <li>Выбранные мероприятия</li>
            </ol>
        </div>
    </div>
</div>
<div class="prdt">
    <div class="container">
        <div class="prdt-top">
            <div class="col-md-12">
                <div class="product-one cart">
                    <div class="register-top headding">
                        <h2>Оформление заявки</h2>
                    </div>
                    <br><br>
                    <?php if(!empty($_SESSION['cart'])):?>
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>Превью</th>
                                <th>Название</th>
                                <th>Дата</th>
                                <th>Цена</th>
                                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($_SESSION['cart'] as $id => $item):?>
                                <tr>
                                    <td>
                                        <a href="event/<?=$item['alias'];?>"><img src="public/images/<?=$item['img'];?>" alt="<?=$item['title'];?>" style="max-height: 200px"></a>
                                    </td>
                                    <td>
                                        <a href="event/<?=$item['alias'];?>"><?=$item['title'];?></a>
                                    </td>
                                    <td>
                                        <?=$item['date'];?>
                                    </td>
                                    <td>
                                        <?=$item['price'];?><span>₽</span>
                                    </td>
                                    <td>
                                        <a href="/cart/delete/?id=<?=$id;?>">
                                            <span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach;?>
                            <tr>
                                <td>Итого: </td>
                                <td colspan="4" class="text-right cart-sum">
                                    <?=$_SESSION['cart.sum'];?>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6 account-left">
                        <form method="post" action="cart/checkout" role="form" data-toggle="validator">
                            <?php if(!isset($_SESSION['user'])): ?>
                                <div class="form-group has-feedback">
                                    <label for="login">Login</label>
                                    <input type="text" name="login" class="form-control" id="login" placeholder="Login" value="<?= isset($_SESSION['form_data']['login']) ? $_SESSION['form_data']['login'] : '' ?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="pasword">Password</label>
                                    <input type="password" name="password" class="form-control" id="pasword" placeholder="Password" value="<?= isset($_SESSION['form_data']['password']) ? $_SESSION['form_data']['password'] : '' ?>" data-minlength="6" data-error="Пароль должен включать не менее 6 символов" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="name">Имя</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Имя" value="<?= isset($_SESSION['form_data']['name']) ? $_SESSION['form_data']['name'] : '' ?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= isset($_SESSION['form_data']['email']) ? $_SESSION['form_data']['email'] : '' ?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <label for="address">Телефон</label>
                                    <input type="text" name="tel" class="form-control" id="tel" placeholder="Телефон" value="<?=isset($_SESSION['form_data']['tel']) ? h($_SESSION['form_data']['tel']) : '';?>" required>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                </div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-9">
                            <div class="form-group">
                                <label for="address">Комментарий</label>
                                <textarea name="note" class="form-control"></textarea>
                            </div>
                                </div>
                                <div class="col-md-3">
                            <button type="submit" class="btn btn-default">Зарегистрироваться</button>
                                </div>
                            </div>
                        </form>

                        <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                    </div>
                    <?php else:?>
                    <h3>Ваш календарь пуст</h3>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>