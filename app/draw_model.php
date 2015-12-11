<?

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Draw_Model {
	
	private $db;
	private $upload_dir;

	public function __construct() {
		require_once BASEPATH.'/app/core/db.php';
		$this->db = Db::getInstance();
		$this->upload_dir = BASEPATH . '/storage' . '/';
	} 

	public function insert() 
	{		
		if ($_POST['password'] === '') {
			$hash = '';
		} 
		else {
			$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
		}

		$this->saveImgFile($name =  'img_' . time());

		$q = "INSERT INTO img(name, password) values(:name, :password)";
		$param = array(
			':name' => $name,
			':password' => $hash
		);

		$query = $this->db->prepare($q);
		$query->execute($param);
		$affected_rows = $query->rowCount();

		if ($affected_rows)
			return true;
		else
			return false;
	}

	public function saveImgFile($name = null)
	{
		if (isset($_POST['name'])) {
			$name =  $_POST['name'];
		}
		$img = $_POST['image'];
		$img = str_replace('data:image/png;base64,', '', $img);
		$img = str_replace(' ', '+', $img);
		$data = base64_decode($img);
		$file = $this->upload_dir . $name . ".png";
		file_put_contents($file, $data);
	}


	public function getAll()
	{
		$request = $this->db->query('SELECT * FROM img');

		if ($img = $request->fetchAll())
			return $img;
		else
			return false;
	}

	public function getOne($id) 
	{
		$q = $this->db->prepare('SELECT id, name FROM img WHERE id = ?');
		$q->execute([$id]);
		$data = $q->fetch();

		if ($data) 
			return $data;
		else
			return false;
	}
	
	public function checkPassword($id)
	{
		$request = $this->db->prepare('SELECT password FROM img WHERE id = ?');
		$request->execute([$id]);
		$password = $request->fetchColumn();
		
		if (!empty($password))
		{
			return password_verify($_POST['password'], $password);
		}
		
		return true;
	}
	
}

?>