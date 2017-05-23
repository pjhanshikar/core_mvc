<?php
include_once("model/Model.php");

class Controller {
	public $model;
	
	public function __construct()  
    {  
        $this->model = new Model();

        session_start();

    } 
	
	public function login()
	{	
		//After login action
		if(isset($_POST['login']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];

			//call a model function to check entry in the database
			$result = $this->model->check_login($username, $password);

			if($result)
			{
				$_SESSION['admin_id']=$result['id'];
				$_SESSION['admin_name']=$result['fname']." ".$result['lname'];
				$_SESSION['msg']="";
				//$_SESSION['msg']="Welcome Member";
				header("location:views/dashboard.php");
			}
			else
			{
				$_SESSION['msg']="User Name and Password Not Valid";
				header("location:index.php");
			}
		}
		//index page action
		else
		{
			include 'views/login.php';
		}
	}

	// admin check login
	private function check_admin_login(){
		$admin_login = $_SESSION['admin_id'];
		if($admin_login){
			return true;
		} else {
			header("location:view/dashboard.php");
		}
	}


	/*public function logout()
	{
		session_destroy();
		header("location:index.php");
	}*/
}

?>