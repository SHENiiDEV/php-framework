<?php


namespace app\models;

use fw\core\App;
use fw\core\base\Model;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Main extends Model
{
    public static function mailKontakt($user_email){
        try {
            $transport = (new Swift_SmtpTransport('smtp.gmail.com', '465', 'ssl'))
                ->setUsername('chariusinfo@gmail.com')
                ->setPassword('x2skaita')
            ;
            // Create the Mailer using your created Transport
            $mailer = new Swift_Mailer($transport);

            // Create a message
            ob_start();
            require APP . '/views/mail/mail_kontakt_user.php';
            $body = ob_get_clean();

            $message_client = (new Swift_Message('Vip-Transfer' . "Kontaktanfrage"))
                ->setFrom(['chariusinfo@gmail.com' => 'Vip-Transfer'])
                ->setTo($user_email)
                ->setBody($body, 'text/html')
            ;

            $result = $mailer->send($message_client);

            ob_start();
            require APP . '/views/mail/mail_kontakt_admin.php';
            $body = ob_get_clean();

            $message_admin = (new Swift_Message("Kontaktanfrage"))
                ->setFrom(['chariusinfo@gmail.com' => 'Vip-Transfer'])
                ->setTo('shencshigh@gmail.com')
                ->setBody($body, 'text/html');

            $result = $mailer->send($message_admin);

        }catch (\Exception $e){

        }
    }

}