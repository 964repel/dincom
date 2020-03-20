<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Новое мероприятие
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?=ADMIN;?>/"><i class="fa fa-dashboard"></i> Главная</a></li>
        <li><a href="<?=ADMIN;?>/event/"> Список мероприятий</a></li>
        <li class="active"><i class="fa fa-check-square-o"></i> Новое мероприятие</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">

                <form action="<?=ADMIN;?>/event/add/" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Название мероприятия</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Название мероприятия" value="<?php isset($_SESSION['form_data']['title']) ? h(isset($_SESSION['form_data']['title'])) : null;?>" required>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Родительская категория</label>
                            <?php new \app\widgets\menu\Menu([
                                'tpl' => WWW . '/menu/select.php',
                                'container' => 'select',
                                'cache' => 0,
                                'cacheKey' => 'admin_select',
                                'class' => 'form-control',
                                'attrs' => [
                                    'name' => 'category_id',
                                    'id' => 'category_id',
                                ],
                                'prepend' => '<option >Выберите категорию</option>',
                            ]) ?>
                        </div>

                        <div class="form-group">
                            <label for="keywords">Ключевые слова</label>
                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Ключевые слова" value="<?php isset($_SESSION['form_data']['keywords']) ? h(isset($_SESSION['form_data']['keywords'])) : null;?>">

                        </div>

                        <div class="form-group">
                            <label for="description">Описание мероприятия</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Описание мероприятия" value="<?php isset($_SESSION['form_data']['description']) ? h(isset($_SESSION['form_data']['description'])) : null;?>">

                        </div>

                        <div class="form-group has-feedback">
                            <label for="date">Дата мероприятия</label>
                            <input type="date" name="date" class="form-control" id="date" placeholder="Дата мероприятия" value="<?php isset($_SESSION['form_data']['date']) ? h(isset($_SESSION['form_data']['date'])) : null;?>" required min="2014-01-01" max="2050-12-31">>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="price">Стоимость участия</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Стоимость участия" pattern="^[0-9.]{1,}$" value="<?php isset($_SESSION['form_data']['price']) ? h(isset($_SESSION['form_data']['price'])) : null;?>" required data-error="Допускаются цифры и десятична точка">
                            <div class="help-block with-errors"></div>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="content">Контент</label>
                            <textarea name="content" id="editor1" cols="80" rows="10" ><?php isset($_SESSION['form_data']['content']) ? isset($_SESSION['form_data']['content']) : null;?></textarea>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status" checked> Статус
                            </label>

                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="hit" > Хит
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="related">Связанные страницы</label>
                            <select name="related[]" class="form-control select2" id="related" multiple></select>
                        </div>

                        <hr>

                        <h3>Фильтры</h3>

                        <?php new \app\widgets\filter\Filter(null, WWW.'/filter/admin_filter_tpl.php');?>
                    </div>
                    <div class="box-footer">
                    <button type="submit" class="btn btn-success">Добавить</button>
                    </div>
                </form>

                <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
            </div>
        </div>
    </div>
</section>
