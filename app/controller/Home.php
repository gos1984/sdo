<?php 
namespace app\controller;
use core\Controller;
use app\model\Home as Model;
use app\view\Home as View;


class Home extends Controller
{
	public function __construct()
    {
		$this->model = new Model();
		$this->view = new View();
	}

	public function index()
    {
		$data['header'] = 'home';
		$data['category'] = $this->model->getCategory();
		$data['review'] = $this->model->getReview();
        $data['direction'] = $this->model->getDirection();
        $data['country'] = $this->model->getCountry();
		$this->view->output("index",$data);
	}

    public function show()
    {
        if($_GET['type'] == 'json') {
            if(isset($_GET['country'])) {
                $id = (int) $_GET['country'];
                $this->model->response($this->model->getCountryAndRegions($id));
            }

            if(isset($_GET['direction']) && !isset($_GET['product'])) {
                $id = strpos($_GET['direction'], '_') ? explode('_', $_GET['direction']) : (int) $_GET['direction'];
                $this->model->response($this->model->getDirection($id));
            }

            if(isset($_GET['review'])) {
                $id = (int) $_GET['review'];
                $this->model->response($this->model->getReview($id));
            }

            if(isset($_GET['category'])) {
                $id = (int) $_GET['category'];
                $this->model->response($this->model->getCategory($id));
            }

            if(isset($_GET['product']) && !isset($_GET['direction'])) {
                $id = (int) $_GET['product'];
                $this->model->response($this->model->getProduct($id));
            }

            if(isset($_GET['product']) && isset($_GET['direction'])) {
                $categoryId = (int) $_GET['product'];
                $directionId = strpos($_GET['direction'], '_') ? explode('_', $_GET['direction']) : (int) $_GET['direction'];
                $this->model->response($this->model->getProduct($categoryId,$directionId));
            }
        }
    }

    public function send()
    {
        $this->model->send();
    }

    public function pay()
    {
        $this->model->pay();
    }
}

?>