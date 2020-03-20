<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Заявка № <?=$order['id'];?>
        <?php if(!$order['status']):?>
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1" class="btn btn-success btn-xs">Одобрить</a>
            <?php else:?>
            <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=0" class="btn btn-info btn-xs">Вернуть на доработку</a>
        <?php endif;?>
        <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="btn btn-danger btn-xs delete">Удалить</a>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>/"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class=""><a href="<?=ADMIN;?>/order"><i class="fa fa-check-square-o"></i> Список заявок</a></li>
        <li class="active"><i class="fa fa-check-circle-o"></i> Заявка № <?=$order['id'];?></li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">

                            <tbody>
                                <tr>
                                    <td>Номер заявки</td>
                                    <td>№ <?=$order['id'];?></td>
                                </tr>
                                <tr>
                                    <td>Дата заявки</td>
                                    <td><?=$order['date'];?></td>
                                </tr>
                                <tr>
                                    <td>Дата изменения</td>
                                    <td><?=$order['update'];?></td>
                                </tr>
                                <tr>
                                    <td>Сумма</td>
                                    <td><?=$order['sum'];?> ₽</td>
                                </tr>
                                <tr>
                                    <td>Имя заказчика</td>
                                    <td><?=$order['name'];?> </td>
                                </tr>
                                <tr>
                                    <td>Статус</td>
                                    <td><?=$order['status'] ? 'Завершен':'Новый';?> </td>
                                </tr>
                                <tr>
                                    <td>Примечание</td>
                                    <td><?=$order['note'];?> </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <h4>Выбранные мероприятия</h4>
            <div class="box">
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Мероприятие</th>
                                <th>Цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($order_events as $event):?>
                            <tr>
                                    <td><?=$event->id;?></td>
                                    <td><?=$event->title;?></td>
                                    <td><?=$event->price;?></td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->



    <!-- /.row (main row) -->

</section>
<!-- /.content -->