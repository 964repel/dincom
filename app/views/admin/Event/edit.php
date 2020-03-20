<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Редактирование <?=$event->title;?>
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

                <form action="<?=ADMIN;?>/event/edit/" method="post" data-toggle="validator">
                    <div class="box-body">
                        <div class="form-group has-feedback">
                            <label for="title">Название мероприятия</label>
                            <input type="text" name="title" class="form-control" id="title" placeholder="Название мероприятия" value="<?=h($event->title);?>" required>
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
                            ]) ?>
                        </div>

                        <div class="form-group">
                            <label for="keywords">Ключевые слова</label>
                            <input type="text" name="keywords" class="form-control" id="keywords" placeholder="Ключевые слова" value="<?=h($event->keywords);?>" >

                        </div>

                        <div class="form-group">
                            <label for="description">Описание мероприятия</label>
                            <input type="text" name="description" class="form-control" id="description" placeholder="Описание мероприятия" value="<?=h($event->description);?>" >

                        </div>

                        <div class="form-group has-feedback">
                            <label for="date">Дата мероприятия</label>
                            <input type="date" name="date" class="form-control" id="date" placeholder="Дата мероприятия" value="<?=$event->date;?>"  required min="2014-01-01" max="2050-12-31">>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="price">Стоимость участия</label>
                            <input type="text" name="price" class="form-control" id="price" placeholder="Стоимость участия" pattern="^[0-9.]{1,}$" value="<?=$event->price;?>"  required data-error="Допускаются цифры и десятична точка">
                            <div class="help-block with-errors"></div>
                            <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                        </div>

                        <div class="form-group has-feedback">
                            <label for="content">Контент</label>
                            <textarea name="content" id="editor1" cols="80" rows="10" >value="<?=$event->content;?>" </textarea>
                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="status" <?=$event->status ? ' checked' : null;?>> Статус
                            </label>

                        </div>

                        <div class="form-group">
                            <label>
                                <input type="checkbox" name="hit" <?=$event->hit ? ' checked' : null;?>> Хит
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="related">Связанные страницы</label>
                            <select name="related[]" class="form-control select2" id="related" multiple>
                                <?php if(!empty($related_event)): ?>
                                    <?php foreach($related_event as $item): ?>
                                        <option value="<?=$item['related_id'];?>" selected><?=$item['title'];?></option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <hr>

                        <h3>Фильтры</h3>

                        <?php new \app\widgets\filter\Filter(null, WWW.'/filter/admin_filter_tpl.php');?>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="id" value="<?=$event->id;?>">
                        <button type="submit" class="btn btn-success">Сохранить</button>
                    </div>
                </form>

                <?php if (isset($_SESSION['form_data'])) unset($_SESSION['form_data']);?>
            </div>
        </div>
    </div>
</section>
