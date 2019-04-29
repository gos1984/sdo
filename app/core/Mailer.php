<?php
namespace core;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
	private $mail;
	public function __construct() {
		$this->mail = new PHPMailer();
		$this->mail->isSMTP(true);
		$this->mail->Host = 'smtp.yandex.ru';
		$this->mail->SMTPAuth = true;
        $this->mail->Username = 'npcmr-webinar@yandex.ru';
        $this->mail->Password = 'hflbjkjubzvjcrds';
		$this->mail->SMTPSecure = 'ssl';                           
		$this->mail->Port = 465;
	}

	public function __destruct() {
		$this->mail->send();
		
	}
	

	public function sendMessage($fio,$email, $comment) {
		$this->mail->setFrom('npcmr-webinar@yandex.ru', 'SDO');
		$this->mail->CharSet = "utf-8";
		$this->mail->addAddress('npcmr-webinar@yandex.ru');
		$this->mail->isHTML(true);
		$this->mail->Subject = "Сообщение";
		$this->mail->Body = "<table><tr><td>ФИО</td><td>$fio</td></tr><tr><td>E-mail</td><td>$email</td></tr><tr><td colspan=\"2\">Сообщение</td></tr><tr><td colspan=\"2\">$comment</td></tr></table>";
	}

	public function sendPayClient($fio,$email, $comment) {
		$this->mail->setFrom('npcmr-webinar@yandex.ru', 'SDO');
		$this->mail->CharSet = "utf-8";
		$this->mail->addAddress('npcmr-webinar@yandex.ru');
		$this->mail->isHTML(true);
		$this->mail->Subject = "Заказ";
		$this->mail->Body = "<table><tr><td>ФИО</td><td>$fio</td></tr><tr><td>E-mail</td><td>$email</td></tr><tr><td colspan=\"2\">Сообщение</td></tr><tr><td colspan=\"2\">$comment</td></tr></table>";
	}
}
?>
