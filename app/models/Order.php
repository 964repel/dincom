<?php


namespace app\models;


use dinkom\App;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Order extends AppModel
{
    public static function saveOrder($data){
        $order =    \R::dispense('order');
        $order->user_id = $data['user_id'];
        $order->note = $data['note'];
        $order_id = \R::store($order);
        self::saveOrderEvent($order_id);
        return $order_id;
    }

    public static function saveOrderEvent($order_id){
        $sql_part = '';

        foreach ($_SESSION['cart'] as $event_id => $event){
            $event_id = (int)$event_id;
            $sql_part .= "($order_id, $event_id, '{$event['title']}', {$event['price']}),";

        }
        $sql_part = rtrim($sql_part, ',');
        \R::exec("INSERT INTO order_event (order_id, event_id, title, price) VALUES $sql_part");
    }

    public static function mailOrder($order_id, $user_email){
        // Create the Transport
        $transport = (new Swift_SmtpTransport(App::$app->getProperty('smtp_host'), App::$app->getProperty('smtp_port'), App::$app->getProperty('smtp_protocol')))
            ->setUsername(App::$app->getProperty('smtp_login'))
            ->setPassword(App::$app->getProperty('smtp_password'))
        ;
        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        //create a message
        ob_start();
        require APP . '\views\mail\mail_order.php';
        $body = ob_get_clean();

        $message_client = (new Swift_Message("Заявка на обучение №{$order_id}"))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('center_name')])
            ->setTo($user_email)
            ->setBody($body, 'text/html')
        ;
        $message_admin = (new Swift_Message("Заявка на обучение №{$order_id}"))
            ->setFrom([App::$app->getProperty('smtp_login') => App::$app->getProperty('center_name')])
            ->setTo(App::$app->getProperty('admin_email'))
            ->setBody($body, 'text/html')
        ;

        //send mail
        $result = $mailer->send($message_admin);
        $result = $mailer->send($message_client);
        unset($_SESSION['cart']);
        unset($_SESSION['cart.sum']);
        $_SESSION['success'] = 'Спасибо, за заявку! В ближайшее время с вами свяжется наш менеджер';
    }
}