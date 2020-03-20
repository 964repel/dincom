<?php if (!empty($_SESSION['cart'])):?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr>
            <th>Превью</th>
            <th>Название</th>
            <th>Дата</th>
            <th>Цена</th>
            <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($_SESSION['cart'] as $id => $item):?>
        <tr>
            <td>
                <a href="events/<?=$item['alias'];?>"><img src="public/images/<?=$item['img'];?>" alt="<?=$item['title'];?>" style="max-height: 100px"></a>
            </td>
            <td>
                <a href="events/<?=$item['alias'];?>"><?=$item['title'];?></a>
            </td>
            <td>
               <?=$item['date'];?>
            </td>
            <td>
                <?php if($item['price'] == 0):?>
                    Бесплатно
                <?php else: ?>
                    <?=$item['price'];?><span>₽</span>
                <?php endif; ?>
            </td>
            <td>
                <span data-id="<?=$id;?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span>
            </td>
        </tr>
        <?php endforeach;?>
        <tr>
            <td>
                Итого:
            </td>
            <td colspan="4" class="text-right cart-sum">
                <?=$_SESSION['cart.sum'];?>
            </td>
        </tr>
        </tbody>
    </table>
</div>
<?php else:?>
    <h3>Нет добавленных мероприятий</h3>
<?php endif;?>
