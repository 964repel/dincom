<?php


namespace app\controllers\admin;


use dinkom\Cache;

class CacheController extends AppController
{
    public function indexAction(){
        $this->setMeta('Очистка кэша');
    }

    public function deleteAction(){
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch($key){
            case 'category' :
                $cache->delete('cats');
                $cache->delete('dinkom_menu');
                break;
            case 'filter' :
                $cache->delete('filter_groups');
                $cache->delete('filter_contType');
                break;
        }
        $_SESSION['syccess'] = 'Выбранный кэш удален';
        redirect();
    }
}