<?php

namespace Murattcann\SendgridMailer;

use Exception;
/**
 * Laravel'in kendi yapısından bağımsız olarak mail gönderimi yapılmasını sağlar.
 * Mail gönderimlerinde karşılaşılan hatalardan dolayı bu yöntem kullanılmakta
 * @method self to(string $email)
 * @method self subject(string $subject)
 * @method void send(string $message)
 *
 * @author Murat CAN <muratcan.php@gmail.com>
 */

class SendgridSender
{
    private static $to;
    private static $subject;
    private static $_instance = null;

    public static function getInstance ()
    {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }

        return self::$_instance;
    }

    /**
     * Gönderi yapılacak email
     * @param string $email
     *
     * @return self
     */
    public function to(string $email){
        self::$to  = $email;
        return $this;
    }

    /**
     * Gönderinin konusunu set eder
     * @param string $subject
     *
     * @return self
     */
    public function subject(string $subject){
        self::$subject = $subject;
        return $this;
    }
    
    /**
     * Gönderi için konu ve mesaj
     * @param string $subject
     * @param string $message
     *
     * @return mixed
     */
    public function send(string $message){
      
        $email = new \SendGrid\Mail\Mail();
        $email->setFrom(config("sendgrid_credentials.from_email"), config("sendgrid_credentials.from_name"));
        $email->setSubject(self::$subject ?? config("sendgrid_credentials.default_subject"));
        $email->addTo(self::$to);
        $email->addContent("text/html", $message);
        $sendgrid = new \SendGrid(config("sendgrid_credentials.token"));
        $response = null;
        try {
            $response = $sendgrid->send($email);
        } catch (Exception $e) {
            $response = false;
        }

        return $response;
    }
}
