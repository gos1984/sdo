<?php
namespace app\model;
use core\Model;
use PDO;
use Mpdf\Mpdf;
use core\traits\Defense;
use core\traits\Product;
use core\traits\LoadFile;
class Administrator extends Model{
    use Defense, Product, LoadFile;
	public function __construct() {
		parent::__construct();
	}

	public function getAdmin() {
	    $login = $this->defenseStr($_POST['login']);
        $password = $this->defenseStr($_POST['password']);
        header('Location: /admin', true, 301);
        if(password_verify($password, $this->db->query("SELECT password FROM administrator WHERE login = '$login'")->fetchColumn())) {
            $_SESSION = [
                'admin' => true,
                'login' => $login
            ];
        }
        exit();
    }

    public function exit() {
	    session_destroy();
        header('Location: /admin', true, 301);
        exit();
    }

    public function setDirection() {
        header('Location: /admin/direction', true, 301);
	    switch($_GET['action']) {
            case 'update':
                $id = (int) $_POST['id'];
                $name = $this->defenseSQL($_POST['name']);
                $this->db->exec("UPDATE direction SET name = $name WHERE id = $id");
                break;
            case 'add':
                $name = $this->defenseSQL($_POST['name']);
                $this->db->exec("INSERT INTO direction (name) VALUE ($name)");
                break;
            case 'del':
                $id = (int) $_GET['id'];
                $this->db->exec("DELETE FROM direction WHERE id = $id");
                break;
        }
        exit();
    }

    public function setCategory() {
       header('Location: /admin/category', true, 301);
        switch($_GET['action']) {
            case 'update':
                $id = (int) $_POST['id'];
                $name = $this->defenseSQL($_POST['name']);
                $image = $this->setImageFile($id);
                $this->db->exec("UPDATE category SET name = $name, image = '$image' WHERE id = $id");
                break;
            case 'add':
                $name = $this->defenseSQL($_POST['name']);
                $image = $this->setImageFile($this->db->query("SELECT (COUNT(id) + 1) FROM category")->fetchColumn());
                $this->db->exec("INSERT INTO category (name, image) VALUE ($name, '$image')");
                break;
            case 'del':
                $id = (int) $_GET['id'];
                $this->db->exec("DELETE FROM category WHERE id = $id");
                break;
        }
       exit();
    }

    public function setProduct() {

        switch($_GET['action']) {
            case 'update':
                $id = (int) $_POST['id'];
                $name = $this->defenseSQL($_POST['name']);
                $category = (int) $_POST['category'];
                $direction = (int) $_POST['direction'];
                $date = $this->defenseSQL($_POST['date'],'NULL');
                $price = $this->defenseSQL($_POST['price'],'NULL');
                $format = isset($_POST['format']) ? 1 : 0;
                $quantity = (int) $_POST['quantity'];
                $link = $this->defenseSQL($_POST['link'], 'NULL');
                $this->db->exec("UPDATE product SET name = $name, category_id = $category, direction_id = $direction, date = $date, price = $price, format = $format, quantity = $quantity, link = $link WHERE id = $id");
                break;
            case 'add':
                header('Location: /admin/', true, 301);
                $name = $this->defenseSQL($_POST['name']);
                $category = (int) $_POST['category'];
                $direction = (int) $_POST['direction'];
                $date = $this->defenseSQL($_POST['date'],'NULL');
                $price = $this->defenseSQL($_POST['price'],'NULL');
                $format = isset($_POST['format']) ? 1 : 0;
                $quantity = (int) $_POST['quantity'];
                $link = $this->defenseSQL($_POST['link'], 'NULL');
                $this->db->exec("INSERT INTO product (name, category_id, direction_id, date, price, format, quantity, link) VALUE ($name, $category, $direction, $date, $price, $format, $quantity, $link)");
                exit();
                break;
            case 'del':
                $id = (int) $_GET['id'];
                var_dump("DELETE FROM product WHERE id = $id");
                $this->db->exec("DELETE FROM product WHERE id = $id");
                break;
        }
    }
}
?>