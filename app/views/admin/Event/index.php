<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Список мероприятий
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>/"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li class="active"><i class="fa fa-check-square-o"></i> Список мероприятий</li>
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
                                <th>Категория</th>
                                <th>Название</th>
                                <th>Цена</th>
                                <th>Дата проведения</th>
                                <th>Статус</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($events as $event):?>
                                    <td><?=$event['id'];?></td>
                                    <td><?=$event['cat'];?></td>
                                    <td><?=$event['title'];?></td>
                                    <td><?=$event['price'];?></td>
                                    <td><?=$event['date'];?></td>
                                    <td><?=$event['status'] ? 'On' : 'Off';?></td>
                                    <td><a href="<?=ADMIN;?>/event/edit?id=<?=$event['id'];?>"><i class="fa fa-fw fa-eye"></i></a> <a href="<?=ADMIN;?>/event/delete?id=<?=$event['id'];?>" class="text-danger delete"><i class="fa fa-fw fa-close"></i></a></td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">
                        <p><?=count($events);?> из <?=$count;?></p>
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