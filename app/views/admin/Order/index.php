<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список заявок
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>/"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"><i class="fa fa-check-square-o"></i>Список заявок</li>
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
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Заказчик</th>
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
                                    <td><?=$order['name'];?></td>
                                    <td><?=$order['status'] ? 'Завершен': 'Новый';?></td>
                                    <td><?=$order['date'];?></td>
                                    <td><?=$order['update'];?></td>
                                    <td><?=$order['title'];?></td>
                                    <td><a href="<?=ADMIN;?>/order/view?id=<?=$order['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="text-danger delete"><i class="fa fa-fw fa-close"></i></a></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p><?=count($orders);?> из <?=$count;?></p>
                        <?php if($pagination->countPages > 1):?>
                            <?=$pagination;?>
                        <?php endif;?>
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