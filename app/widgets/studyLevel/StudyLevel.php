<?php


namespace app\widgets\studyLevel;


use dinkom\App;

class StudyLevel{

    protected $tpl;
    protected $studyLevels;
    protected $studyLevel;

    public function __construct(){

        $this->tpl = __DIR__ . '/studyLevel_tpl/studyLevel.php';
        $this->run();

    }

    protected function run(){
        
        $this->studyLevels = App::$app->getProperty('studyLevels');
        $this->studyLevel = App::$app->getProperty('studyLevel');
        echo $this->getHtml();
    }

    public static function getStudyLevels(){

        return \R::getAssoc('SELECT code, title, value, base FROM study_levels ORDER BY base ');
    }

    public static function getStudyLevel($studyLevels)
    {

        if (isset($_COOKIE['study_levels']) && array_key_exists($_COOKIE['study_levels'], $studyLevels)) {
            $key = $_COOKIE['study_levels'];
        }else{
        $key = key($studyLevels);
    }
    $studyLevel = $studyLevels[$key];
    $studyLevel['code'] = $key;
    return $studyLevel;
    }
    protected function getHtml(){
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();



    }
}