<?php


namespace app\widgets\filter;


use dinkom\Cache;

class Filter
{
    public $contType;
    public $groups;
    public $tpl;
    public $filter;

    public function __construct($filter = null, $tpl = '')
    {
        $this->filter = $filter;
        $this->tpl = $tpl ?: __DIR__ . '/filter_tpl.php';
        $this->run();
    }

    protected function run(){
        $cache = Cache::instance();
        $this->contType = $cache->get('filter_contType');
        if (!$this->contType){
            $this->contType = $this->getContType();
            $cache->set('filter_contType', $this->contType, 30);
        }
        $this->groups = $cache->get('filter_groups');
        if (!$this->groups){
            $this->groups = self::getGroups();
            $cache->set('filter_groups', $this->groups, 30);
        }
        $filters = $this->getHtml();
        echo $filters;
    }

    protected function getHtml(){
        ob_start();
        $filter = self::getFilter();
        if(!empty($filter)){
            $filter = explode(',', $filter);
        }
        require $this->tpl;
        return ob_get_clean();
    }

    protected function getContType(){
       return \R::getAssoc('SELECT id, title FROM attribute_content');
    }

    protected static function getGroups(){
        $data =  \R::getAssoc('SELECT * FROM attribute_groups');
        $attrs = [];
        foreach ($data as $k => $v){
            $attrs[$v['attr_cont_id']][$k] = $v['value'];
        }
        return $attrs;
    }

    public static function getFilter(){
        $filter = null;
        if(!empty($_GET['filter'])){
            $filter = preg_replace("#[^\d,]+#", '', $_GET['filter']);
            $filter = trim($filter, ',');
        }
        return $filter;
    }

    public static function getCountGroups($filter){
        $filters = explode(',', $filter);
        $cache = Cache::instance();
        $attrs = $cache->get('filter_groups');
        if (!$attrs){
            $attrs = self::getGroups();
        }
        $data = [];
        foreach ($attrs as $key => $item){
            foreach ($item as $k => $v){
                if(in_array($k, $filters)){
                    $data[] = $key;
                    break;
                }
            }
        }
        return count($data);
    }
}