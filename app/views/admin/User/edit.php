<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Реактирование профиля
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>/"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/user/"><i class="fa fa-check-square-o"></i>Список пользователей</a></li>
        <li class="active"></i>Реактирование профиля</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <form action="<?=ADMIN;?>/user/edit" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="login">Логин</label>
                            <input type="text" class="form-control" name="login" id="login" value="<?=h($user->login)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Введите новый пароль" >
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="name">Имя</label>
                            <input type="name" class="form-control" name="name" id="name" value="<?=h($user->name)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?=h($user->email)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <label for="tel">Телефон</label>
                            <input type="tel" class="form-control" name="tel" id="tel" value="<?=h($user->tel)?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label>Роль</label>
                            <select name="role" id="role" class="form-control">
                                <option value="user" <?php if ($user->role == 'user')echo ' selected';?>>Пользователь</option>
                                <option value="admin" <?php if ($user->role == 'admin')echo ' selected';?>>Администратор</option>
                            </select>
                        </div>
                     </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$user->id;?>">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                </form>
            </div>

            <h3>Мероприятия пользователя</h3>
            <div class="box">
                <div class="box-body">
                    <?php if($orders): ?>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Статус</th>
                                    <th>Дата создания</th>
                                    <th>Дата изменения</th>
                                    <th>Title</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($orders as $order):?>
                                    <?php $class= $order['status'] ? 'success' : '';?>
                                    <tr class="<?=$class;?>">
                                        <td><?=$order['id'];?></td>
                                        <td><?=$order['status'] ? 'Завершен': 'Новый';?></td>
                                        <td><?=$order['date'];?></td>
                                        <td><?=$order['update'];?></td>
                                        <td><?=$order['title'];?></td>
                                        <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="fa fa-fw fa-eye"></i></a> </td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        </div>
                    <?php else:?>
                    <p>Нет заявок на мероприятия</p>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

</section>
<!-- /.content -->