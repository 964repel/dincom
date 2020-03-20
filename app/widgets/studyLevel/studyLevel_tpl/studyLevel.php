<option value="" class="label"><?=$this->studyLevel['code'];?></option>
<?php foreach ($this->studyLevels as $k => $v):?>
<?php if($k != $this->studyLevel['code']):?>
    <option value="<?=$k;?>"><?=$k;?></option>
<?php endif;?>
<?php endforeach;?>
