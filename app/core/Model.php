<?php
namespace core;
use PDO;
abstract class Model {
	protected $db;
	protected $user;
	public function __construct() {
		$this->db = DB::getInstance();
		if(!empty($_SESSION['login'])) {
			$this->user = array(
				'login' => 	$_SESSION['login']
			);
		}
	}

	protected function isAjax() {
	    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }
	    return false;
    }
}

?>