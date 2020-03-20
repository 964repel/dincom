 <?php foreach ($this->contType as $type_id => $type_item):?>
<section  class="sky-form">
                       <h4><?=$type_item;?></h4>
                       <div class="row1 scroll-pane">
                           <div class="col col-4">
                               <?php foreach ($this->groups[$type_id] as $group_id => $value):?>
                                    <?php
                                   if (!empty($filter) && in_array($group_id, $filter)) {
                                       $checked = ' checked';
                                   }else{
                                       $checked = null;
                                   };?>
                               <label class="checkbox">
                                   <input type="checkbox" name="checkbox" value="<?=$group_id;?>" <?=$checked;?>><i></i><?=$value;?>
                               </label>
                               <?php endforeach;?>
                           </div>
                       </div>
                   </section>
 <?php endforeach;?>