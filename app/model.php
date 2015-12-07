<?

if(!defined('BASEPATH')) exit('No direct script access allowed');

class Model 
{
	private $pdo;

	public function __construct()
	{
		require 'config/database.php';
		$this->pdo = new PDO($db['dsn'], $db['user'], $db['password'], $db['opt']);
	}

	public function insert() 
	{		
		if ($_POST['password'] === '') {
			$hash = '';
		} 
		else {
			$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
		}
		
		$q="INSERT INTO img(data_uri, password) values(:image, :password)";
		
		$param = array(
			':image' => $_POST["image"],
			':password' => $hash
		);

		$query = $this->pdo->prepare($q);
		$query->execute($param);
		$affected_rows = $query->rowCount();

		if ($affected_rows)
			return true;
		else
			return false;
	}

	public function update() 
	{
		if ($_POST['password'] === '') {
			$q="UPDATE `img` SET `data_uri` = :image WHERE `id` = :id";
			$param = array(
				':image' => $_POST["image"],
				':id' => $_POST["id"]
			);
		} else {
			$q="UPDATE `img` SET `data_uri` = :image, `password` = :password WHERE `id` = :id";
			$hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
			$param = array(
				':image' => $_POST["image"],
				':id' => $_POST["id"],
				':password' => $hash
			);
		}

		$query = $this->pdo->prepare($q);
		$query->execute($param);
		$affected_rows = $query->rowCount();

		if ($affected_rows)
			return true;
		else
			return false;
	}

	public function get_all()
	{
		$q = $this->pdo->query('SELECT * FROM img');

		if ($img = $q->fetchAll())
			return $img;
		else
			return false;
	}

	public function get_one($id) 
	{
		$q = $this->pdo->prepare('SELECT * FROM img WHERE id = ?');
		$q->execute([$id]);
		$data = $q->fetch();

		if ($data) 
			return $data;
		else
			return false;
	}
}

?>