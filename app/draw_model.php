<?

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Draw_Model {
	
	private $db;

	public function __construct() {
		require_once BASEPATH.'/app/core/db.php';
		$this->db = Db::getInstance();
	} 

	public function insert() 
	{		
		if ($_POST['password'] === '') {
			$hash = '';
		} 
		else {
			$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
		}

		$q = "INSERT INTO img(data_uri, password) values(:image, :password)";

		$param = array(
			':image' => $_POST["image"],
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

	public function update() 
	{
		$q = "UPDATE `img` SET `data_uri` = :image WHERE `id` = :id";
		$param = array(
			':image' => $_POST["image"],
			':id' => $_POST["id"]
		);

		$query = $this->db->prepare($q);
		$query->execute($param);
		$affected_rows = $query->rowCount();

		if ($affected_rows)
			return true;
		else
			return false;
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
		$q = $this->db->prepare('SELECT id, data_uri FROM img WHERE id = ?');
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