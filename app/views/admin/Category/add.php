<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Добавление категории
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/category/"><i class="fa fa-check-square-o"></i>Список категорий</a></li>
        <li class="active"><i class="fa fa-plus-circle"></i>Новая категория</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                    <form action="<?=ADMIN;?>/category/add/" method="post" data-toggle="validator">
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Название категории</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Название категории" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="parent_id">Родительская категория</label>
                                <?php new \app\widgets\menu\Menu([
                                    'tpl' => WWW . '/menu/select.php',
                                    'container' => 'select',
                                    'cache' => 0,
                                    'cacheKey' => 'admin_select',
                                    'class' => 'form-control',
                                    'attrs' => [
                                        'name' => 'parent_id',
                                        'id' => 'parent_id',
                                    ],
                                    'prepend' => '<option value="0">Самостоятельная категория</option>',
                                ]) ?>
                            </div>
                            <div class="form-group">
                                <label for="keywords">Ключевые слова</label>
                                <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Ключевые слова">

                            </div>
                            <div class="form-group">
                                <label for="description">Описание категории</label>
                                <input type="text" name="description" class="form-control" id="description" placeholder="Описание категории">

                            </div>
                        </div>
                        <div class="box-footer"></div>
                        <button type="submit" class="btn btn-success">Добавить</button>
                    </form>
            </div>
        </div>
    </div>
</section>
