<?php


namespace app\controllers;


class StudylevelController extends AppController
{
    public function changeAction(){
        $studyLevel = !empty($_GET['studlvl']) ?  $_GET['studlvl'] : null;
        if($studyLevel){
            $studlvl = \R::findOne('study_levels', 'code = ?', [$studyLevel]);
            if (!empty($studlvl)){
                setcookie('study_levels', $studyLevel, time() + 3600*24*7, '/');
            }
        }
        redirect();
    }
}