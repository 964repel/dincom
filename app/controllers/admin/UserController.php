<?php


namespace app\controllers\admin;


use app\models\User;
use dinkom\libs\Pagination;

class UserController extends AppController
{
    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perpage = 20;
        $count = \R::count('user');
        $pagination = new Pagination($page, $perpage, $count);
        $start = $pagination->getStart();

        $users = \R::findAll('user', "LIMIT $start, $perpage");
        $this->setMeta('Список пользователей');
        $this->set(compact('users', 'pagination', 'count'));
    }

    public function addAction(){
        $this->setMeta('Новый пользователь');
    }

    public function editAction(){

        if (!empty($_POST)){
            $id = $this->gerRequestID(false);
            $user = new \app\models\admin\User();
            $data = $_POST;
            $user->load($data);
            if (!$user->attributes['password']){
                unset($user->attributes['password']);
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if (!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                redirect();
            }
            if ($user->update('user', $id)){
                $_SESSION['success'] = 'Изменения сохранены';
            }
            redirect();
        }

        $user_id = $this->gerRequestID();
        $user = \R::load('user', $user_id);

        $orders = \R::getAll("SELECT `order`. `id`, `order`. `user_id`, `order`. `status`, `order`.`date`, `order`.`update`, `order_event`.`title` FROM `order` 
JOIN `order_event` ON `order`.`id` = `order_event`.`order_id`
WHERE user_id = {$user_id} GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`id`");

        $this->setMeta('Изменение профиля');
        $this->set(compact('user', 'orders'));
    }

    public function loginAdminAction(){
        if (!empty($_POST)){
            $user = new User();
            if (!$user->login(true)){
                $_SESSION['error'] = 'Неверный Login/Password';
            }
            if (User::isAdmin()){
                redirect(ADMIN);
            }else{
                redirect();
            }
        }
        $this->layout = 'login';
    }
}