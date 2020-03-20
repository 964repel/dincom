<div class="nav-tabs-custom" id="filter">
    <ul class="nav nav-tabs">
        <?php $i = 1; foreach($this->contType as $type_id => $type_item): ?>
            <li<?php if($i == 1) echo ' class="active"' ?>><a href="#tab_<?= $type_id ?>" data-toggle="tab" aria-expanded="true"><?= $type_item ?></a></li>
            <?php $i++; endforeach; ?>
        <li class="pull-right">
            <a href="*" id="reset-filter" >Сброс фильтров</a>
        </li>
    </ul>
    <div class="tab-content">
        <?php if(!empty($this->groups[$type_id])): ?>
            <?php $i = 1; foreach($this->contType as $type_id => $type_item): ?>
                <div class="tab-pane<?php if($i == 1) echo ' active' ?>" id="tab_<?= $type_id ?>">
                    <?php foreach($this->groups[$type_id] as $group_id => $value): ?>
                        <?php
                        if(!empty($this->filter) && in_array($group_id, $this->filter)){
                            $checked = ' checked';
                        }else{
                            $checked = null;
                        }
                        ?>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="attrs[<?= $type_id ?>]" value="<?= $group_id ?>"<?= $checked ?>> <?= $value ?>
                            </label>
                        </div>
                        <?php $i++; endforeach; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>