<?php


namespace app\controllers\admin;


use dinkom\libs\Pagination;

class OrderController extends AppController
{
    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 30;
        $count = \R::count('order');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $orders = \R::getAll("SELECT `order`. `id`, `order`. `user_id`, `order`. `status`, `order`.`date`, `order`.`update`, `user`.`name`, `order_event`.`title` FROM `order` 
JOIN `user` ON `order`.`user_id` = `user`.`id`
JOIN `order_event` ON `order`.`id` = `order_event`.`order_id`
GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT $start, $perpage");

        $this->setMeta('Список заказов');
        $this->set(compact('orders', 'pagination', 'count'));
    }

    public function viewAction(){
        $order_id = $this->gerRequestID();
        $order = \R::getRow("SELECT `order`. *, `user`.`name`, `order_event`.`title`, SUM(`order_event`.`price`) AS `sum` FROM `order` 
JOIN `user` ON `order`.`user_id` = `user`.`id`
JOIN `order_event` ON `order`.`id` = `order_event`.`order_id`
WHERE `order`.`id` = ?
GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id` LIMIT 1", [$order_id]);
        if (!$order){
            throw new \Exception('Зявка не найдена', 404);
        }
        $order_events = \R::findAll('order_event', "order_id=?", [$order_id]);

        $this->setMeta("Заявка № {$order_id}");
        $this->set(compact('order', 'order_events'));
    }

    public function changeAction(){
        $order_id = $this->gerRequestID();
        $status = !empty($_GET['status']) ? '1' : '0';
        $order = \R::load('order', $order_id);
        if (!$order){
            throw new \Exception('Зявка не найдена', 404);
        }
        $order->status = $status;
        $order->update = date("Y-m-d H:i:s");

        \R::store($order);
        $_SESSION['success']='Статус изменен';
        redirect();
    }

    public function deleteAction(){
        $order_id = $this->gerRequestID();
        $order = \R::load('order', $order_id);
        \R::trash($order);
        $_SESSION['success']='Заказ удален';
        redirect(ADMIN.'/order');
    }
}