<?php


namespace app\models;


class Event extends AppModel
{
    public function setRecentlyViewed($id){
    $recentlyViewed = $this->getAllRecentlyViewed();
    if(!$recentlyViewed){
            setcookie('recentlyViewed', $id, time()+3600*24,'/');
    }else {
        $recentlyViewed = explode('.', $recentlyViewed);
        if(!in_array($id, $recentlyViewed)){
            $recentlyViewed[] = $id;
            $recentlyViewed = implode('.', $recentlyViewed);
            setcookie('recentlyViewed', $recentlyViewed, time()+3600*24,'/');
        }

    }
    }

    public function getRecentlyViewed(){
    if(!empty($_COOKIE['recentlyViewed'])){
    $resentlyViewed = $_COOKIE['recentlyViewed'];
    $resentlyViewed = explode('.', $resentlyViewed);
    return array_slice($resentlyViewed, -3);
    }else{
        return false;
    }
    }

    public function getAllRecentlyViewed(){
     if(!empty($_COOKIE['recentlyViewed'])){
        return $_COOKIE['recentlyViewed'];
     }
     return false;
    }
}