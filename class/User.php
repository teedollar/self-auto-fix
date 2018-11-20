<?php

require_once 'Admin.php';

class User extends Admin{

	public $handle; 
	public $admin;

	public function __construct()
	{
		$this->admin = new Admin();
		$this->handle = $this->admin->handle;
	}


	public function checkUsername($username){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM user WHERE username = :username ");
			$this->stmt->execute(array(':username' => $username));
			$row = $this->stmt->rowCount();

			return $row;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function selectUser($username){
		try{
			$this->stmt = $this->handle->prepare("SELECT *, COUNT(id) AS num FROM user WHERE username = :username ");
			$this->stmt->execute(array(':username' => $username));
			$row = $this->stmt->fetch();

			return $row;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function register($f_name, $l_name, $username, $email, $password, $c_password, $gender, $about_u)
	{
		try
		{
			if( (!empty($f_name)) && (!empty($l_name)) && (!empty($username)) && (!empty($email)) && (!empty($password)) && (!empty($c_password)) && (!empty($gender)) )
			{
				$email = strtolower($email);
				$username = strtolower($username);
				$password = strtolower($password);
				$c_password = strtolower($c_password);

				if($this->checkUsername($username) == 0)
				{
					if(strlen($password )> 5  )
					{
						if($password == $c_password)
						{

							//getting the profile picture
							if($_POST['gender'] == 'Female')
								$pic = 'picture/femaleuser.png';
							if($_POST['gender'] == 'Male')
								$pic = 'picture/maleuser.png';  

							$this->stmt = $this->handle->prepare( "INSERT INTO user (first_name, last_name, username, email, password, c_password, gender, about_you, picture) VALUES (:first_name, :last_name, :username, :email, :password, :c_password, :gender, :about_you, :pic) ");
					
							$this->stmt->execute(array(':first_name' => $f_name, ':last_name' => $l_name, ':username' => $username, ':email' => $email, ':password' => $password, ':c_password' => $c_password, ':gender' => $gender, ':about_you' => $about_u, ':pic' => $pic));

							$user = $this->selectUser($username);

							@session_start();
							$_SESSION['id'] = $user['id'];
							$_SESSION['username'] = $user['username'];
						
							?>
							<center>
								<b style='color:darkgreen; font-size:18px'>Registration successfully. You will be logged in </b>
							</center>

							<?php
							$url = 'forum.php';
							header("Refresh: 2; URL = '$url' ");
						
						}else
						{
							?>
							<center>
								<b style='color:red; font-size:18px'>Password does not match </b>
							</center>

							<?php

						}
					}else
					{
						?>
						<center>
							<b style='color:red; font-size:18px'>Password should not be less than 6 characters </b>
						</center>

						<?php
					}
				}else
				{
					?>
					<center>
						<b style='color:red; font-size:18px'>Username already taken </b>
					</center>

					<?php
				}
			}else
			{
				?>
				<center>
					<b style='color:red; font-size:18px'>Fill all compulsory fields </b>
				</center>

				<?php
			}

							
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
					

	public function login($u_name, $pass)
	{
		try{
			$username = strtolower($u_name);
			$password = strtolower($pass);

			$this->stmt = $this->handle->prepare("SELECT id, username, password FROM user WHERE username = :username AND password = :password");
			$this->stmt->execute(array(':username' =>$username, ':password' => $password));
			$row = $this->stmt->rowCount();
			$user = $this->stmt->fetch();

			if( (!empty($username)) && (!empty($password)) )
			{
				if($row > 0){
					@session_start();
					$_SESSION['id'] = $user['id'];
					$_SESSION['username'] = $user['username'];

					?>
					<center>
						<b style='color:darkgreen; font-size:18px'>Login successful</b>
					</center>

					<?php

					$url = "forum.php";
      				header("Refresh: 1; URL='$url'");
				}
				else{
					?>
					<center>
						<b style='color:red; font-size:18px'>Invalid username or password</b>
					</center>

					<?php
				}
			}
			else{
					?>
					<center>
						<b style='color:red; font-size:18px'>Enter both username and password</b>
					</center>
					
					<?php
				}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	/*public function selectAllCarCategories(){
		try{
			$this->stmt = $this->admin->selectAllCarCategories();
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}*/

	public function sendMessage($message, $sender, $receiver)
	{
		try{
			

			if(!empty($message))
			{
				$this->stmt = $this->handle->prepare("INSERT INTO message (message, sender, receiver, sender_read, receiver_read) VALUES (:message, :sender, :receiver, :sender_read, :receiver_read) ");
			$this->stmt->execute(array(':message' =>$message, ':sender' => $sender, ':receiver' => $receiver, ':sender_read' => 1, ':receiver_read' => 0));
			}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	

	public function getMessage($sender, $receiver){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM message WHERE (sender = :sender AND receiver = :receiver) OR (sender = :receiver AND receiver = :sender) ");
			$this->stmt->execute(array(':sender' => $sender, ':receiver' => $receiver));
			$row = $this->stmt->fetchAll();

			$this->markMessageAsRead($sender, $receiver);

			return $row;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function markMessageAsRead($user, $sender){
		try{
			$this->stmt = $this->handle->prepare("UPDATE message SET receiver_read = 1  WHERE receiver = :user AND sender = :sender");
			$this->stmt->execute(array(':user' => $user, ':sender' => $sender));
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}




	public function getUserMessage($user){
		try{

			

			$this->stmt = $this->handle->prepare("SELECT *, COUNT(id) AS cnt  FROM message WHERE receiver = :user AND receiver_read = 0 GROUP BY sender ORDER BY id ASC");
			$this->stmt->execute(array(':user' => $user));
			$row = $this->stmt->fetchAll();




			return $row;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function getInboxMessage($user){
		try{
			$this->stmt = $this->handle->prepare("SELECT COUNT(id) AS inbox_unread FROM message WHERE receiver = :user AND receiver_read = 0 ");
			$this->stmt->execute(array(':user' => $user));
			$row = $this->stmt->fetch();


			return $row;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	



}

?>