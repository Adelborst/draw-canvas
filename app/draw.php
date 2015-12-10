<?

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Draw 
{
	private $model;
	private $data;

	public function __construct()
	{
		require_once BASEPATH.'/app/draw_model.php';
		$this->model = new Draw_Model();
	}

	public function imgList()
	{
		$this->data['images'] = $this->model->getAll();
		$this->render('list');
	}

	public function imgEdit() 
	{
		$id = $_GET['id'];
		
		// Если не проходим проверку пароля
		if ($id && !$this->model->checkPassword($id))
		{
			if (isset($_POST['password'])) $this->data['warning'][] = 'Неправильный пароль! Попробуйте еще раз, пожалуйста. ';
			$this->render('check_password');
			exit;
		}
		
		$this->data['img'] = $this->model->getOne($id);
		$this->render('edit');
	}
	
	public function ajaxInsert()
	{
		if (isset($_POST["image"]))
			$this->model->insert();
 	}
	
	public function ajaxUpdate()
	{
		if (isset($_POST["image"]))
			$this->model->update();
	}
	
	private function render($view)
	{
		$data = $this->data;
		require BASEPATH.'/app/views/'.$view.'.php';
	}
}

?>