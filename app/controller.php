<?

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Controller 
{
	private $model; // Переменная для объекта модели
	private $data;  // Переменная для массива данных

	public function __construct()
	{
		require 'model.php';
		$this->model = new Model();
	}

	public function img_list()
	{
		$this->data['images'] = $this->model->get_all();
		$this->render('list');
	}

	public function img_edit($id = false) 
	{
		// Пробуем пройти проверку пароля
		if ($id && !$this->check_password($id))
		{
			$this->render('check_password');
			exit;
		}
		
		$this->render('edit');
	}
	
	public function ajax_insert()
	{
		if (isset($_POST["image"]))
			$this->model->insert();
 	}
	
	public function ajax_update()
	{
		if (isset($_POST["image"]))
			$this->model->update();
	}

	private function check_password($id)
	{
		if ($img = $this->model->get_one($id))
		{
			$this->data['img'] = $img;
			
			if (!empty($img['password']))
			{
				$result = password_verify($_POST['password'], $img['password']);
				
				if (!$result && isset($_POST['password']))
				{
					$this->data['warning'][] = 'Неправильный пароль! Попробуйте еще раз, пожалуйста. ';
				}
				
				return $result;
			}
			
			return true;
		}
	}
	
	private function render($view)
	{
		$data = $this->data;
		require 'views/'.$view.'.php';
	}
}

?>