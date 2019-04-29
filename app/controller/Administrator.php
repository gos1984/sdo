<?php
namespace app\controller;
use core\Controller;
use app\model\Administrator as Model;
use app\view\Administrator as View;

class Administrator extends Controller{
	public function __construct() {
		$this->model = new Model();
		$this->view = new View();
	}

	public function index() {
        if (!empty($_SESSION['admin'])) {
            $data = [
                'category' => $this->model->getCategory(),
                'direction' => $this->model->getDirection(),
                'product' => $this->model->getProduct(),
            ];
            $this->view->output("product", $data);
        } else {
            $this->view->output("form");
        }
	}
    public function entry() {
        $this->model->getAdmin();
    }

    public function exit() {
        $this->model->exit();
    }

    public function category() {
        $this->isAdmin();
        $data = $this->model->getCategory();
        $this->view->output("category", $data);
    }

    public function direction() {
        $this->isAdmin();
        $data = $this->model->getDirection();
        $this->view->output("direction", $data);
    }

    public function edit() {
	    switch ($_GET['type']) {
            case 'direction':
                $this->model->setDirection();
            break;
            case 'category':
                $this->model->setCategory();
            break;
            case 'product':
                $this->model->setProduct();
            break;
        }
    }

    public function isAdmin() {
        if(empty($_SESSION['admin'])) {
            header("Location: /admin", true, 301);
            $this->view->output("form");
        }
    }
}

?>