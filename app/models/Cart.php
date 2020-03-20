<?php


namespace app\models;


class Cart extends AppModel
{
    public function addToCart($event, $mod = null){
        if ($mod){
            $ID = "{$event->id}-{$mod->id}";
            $title = "{$event->title} ({$mod->title})";
            $price = $mod->price;
        }else{
            $ID = $event->id;
            $title = $event->title;
            $price = $event->price;
        }
       /* if (isset($_SESSION['cart'][$ID])){
            $_SESSION['cart'][$ID];
        }else{*/
            $_SESSION['cart'][$ID] = [
                'title' => $title,
                'alias' => $event->alias,
                'date' => $event->date,
                'price' => $price,
                'img' => $event->img,
            ];

        $_SESSION['cart.sum'] = isset( $_SESSION['cart.sum']) ?  $_SESSION['cart.sum'] + $price: $price;
    }

    public  function deleteItem($id){
       $_SESSION['cart.sum'] -= $_SESSION['cart'][$id]['price'];
       unset($_SESSION['cart'][$id]);
    }
}