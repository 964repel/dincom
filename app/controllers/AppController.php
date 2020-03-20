<?php


namespace app\controllers;
use app\models\AppModel;
use app\widgets\studyLevel\StudyLevel;
use dinkom\App;
use dinkom\base\Controller;
use dinkom\Cache;

class AppController extends Controller
{
    public function __construct($route)
    {
        parent::__construct($route);
        new AppModel();
        App::$app->setProperties('studyLevels', StudyLevel::getStudyLevels());
        App::$app->setProperties('studyLevel' ,StudyLevel::getStudyLevel(App::$app->getProperty('studyLevels')));
        App::$app->setProperties('cats', self::cacheCategory());
    }
    public static function cacheCategory(){
        $cache = Cache::instance();
        $cats = $cache->get('cats');
        if(!$cats){
            $cats = \R::getAssoc("SELECT * FROM category");
            $cache->set('cats', $cats);
        }
        return $cats;
    }
}