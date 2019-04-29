<?php
namespace app\model;
use core\Model;
use core\Mailer;
use core\traits\Product;
use core\traits\Country;
use core\traits\Review;
use core\traits\Defense;
use PDO;

class Home extends Model
{
    use Product, Country, Review;

    private $mailer;

	public function __construct()
    {
		parent::__construct();
		$this->mailer = new Mailer();
	}

    public function getCountryAndRegions($id = null)
    {
        $data = [];
        $country = $this->getCountry($id);
        foreach($country as $key => $val) {
            $data[$key] = [
                'name' => $val,
                'ragions' => $this->getRegions($key)
            ];
        }
        return $data;
    }

    public function send() {
        if(!empty($_POST)) {
            $fio = $this->defenseStr($_POST['fio']);
            $email = $this->defenseStr($_POST['email']);
            $comment = $this->defenseStr($_POST['comment']);
            $this->mailer->sendMessage($fio,$email, $comment);
        }
    }

    public function pay() {
        if(!empty($_POST)) {
            print_r($_POST);
            /*$fio = $_POST['fio'];
            $email = $_POST['email'];
            $comment = $_POST['comment'];
            $this->mailer->sendMessage($fio,$email, $comment);*/
        }
    }

    public function response($data) {
        $headers =  apache_request_headers();
        if($this->isAjax() || isset($headers['ajaxResponse'])) {
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        } else {
            return $data;
        }
    }
}
?>