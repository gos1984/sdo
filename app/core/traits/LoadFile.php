<?php
namespace core\traits;

trait LoadFile {
	public function setImageFile($id) {
		if(!empty($_FILES['image']['size'])) {
			if ($_FILES['image']['error'] === 0) {
				if($_FILES['image']['type'] == 'image/jpeg') {

					$name_file = "category_$id.jpg";
                    var_dump($name_file);
					$uploadfile = ROOT.'/app/template/img/';
					move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile.$name_file);
					$files = '/app/template/img/'.$name_file;
					clearstatcache(true,$files);
					sleep(1);
					return $files;
				}
			}
		}
	}
}
?>