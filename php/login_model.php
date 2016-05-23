<?php
$cn= new PDO('mysql:host=127.0.0.1;port=3306;dbname=auction;charset=utf8', 'root', 'qwerty');
/*$ee = $_GET['username'];
echo $ee;
$rr = json_decode($_GET['password']);
echo $rr;*/

$sth=$cn->prepare("SELECT UserID, UserRole FROM users WHERE UserMail = :login AND UserPass = MD5(:password)");
		$sth->execute(array(
				':login'   => 'bpa@m.ru',
				':password'=> '12345'	
			));
		$data = $sth->fetch(PDO::FETCH_ASSOC);
		$count= $sth->rowCount();
		if($count > 0)
		{
			/*Session::init();
			Session::set('loggedIn', true);
			Session::set('User', $data[0]);
			Session::set('Role',  $data[1]);*/
			echo json_encode(array('status' => 'OK','username'=> $data['UserID'], 'userrole'=> $data['UserRole'] ));			
			//header('Location: ../dashboard');
		}
/*class Login_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function run()
	{
		$sth=$this->db->prepare("SELECT UserID FROM sers WHERE UserMail = :login AND UserPass = MD5(:password)");
		$sth->execute(array(
				':login'   => $_POST['login'],
				':password'=> $_POST['password']
			));

		$data = $sth->fetchAll();
		$count= $sth->rowCount();
		if($count > 0)
		{
			Session::init();
			Session::set('loggedIn', true);
			header('Location: ../dashboard');
		}
		else
		{
			header('Location: ../login');
		}
	}
}*/
?>