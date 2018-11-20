

<?php

	class Admin {

	public $handle;
	public $stmt;
	public $db_name = "auto_mechanic";


	public function __construct(){
		$this->handle = $this->dbEngine();
	}

	public function dbEngine(){
		try{
			$this->handle = new PDO("mysql:host=localhost;dbname=$this->db_name","root","");
				$this->handle->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
		return $this->handle;
	}

	public function login($email, $password){
		try{
			$this->stmt = $this->handle->prepare("SELECT id, email, password FROM admin WHERE email = :email AND password = :password");
			$this->stmt->execute(array(':email' =>$email, ':password' => $password));
			$row = $this->stmt->rowCount();
			$admin = $this->stmt->fetch();
			if( (!empty($email)) && (!empty($password)) )
			{
				if($row > 0){
					session_start();
					$_SESSION['id'] = $admin['id'];

					?>
					<center>
						<b style='color:darkgreen; font-size:18px'>Login successful</b>
					</center>

					<?php

					$url = "category.php";
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


	public function addCategory($category_name){
		try{
				if(!empty($category_name))
				{
					$this->stmt = $this->handle->prepare("INSERT INTO category (name) VALUES (:category_name) ");
					$this->stmt->execute(array(':category_name' =>$category_name));
					?>
					<center>
						<b style='color:darkgreen; font-size:18px'>Category name successfully added</b>
					</center>

					<?php

				}
				else{
					?>
					<center>
						<b style='color:red; font-size:18px'>Enter Category name</b>
					</center>

					<?php
				}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function addCar($category_name, $car_name){
		try{
				if(!empty($car_name))
				{
					if(!empty($category_name))
					{
						$this->stmt = $this->handle->prepare("INSERT INTO car (cat_id, name) VALUES (:category_name, :car_name) ");
						$this->stmt->execute(array(':category_name' =>$category_name, ':car_name' =>$car_name));
						?>
						<center>
							<b style='color:darkgreen; font-size:18px'>Car successfully added</b>
						</center>

					<?php
					}
					else{
						?>
						<center>
							<b style='color:red; font-size:18px'>Please choose a category name</b>
						</center>

						<?php
					}
				}
				else{
					?>
					<center>
						<b style='color:red; font-size:18px'>Enter a car name</b>
					</center>

					<?php
				}
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function selectAllCarCategories(){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM category ORDER BY name ASC ");
			$this->stmt->execute();
			$category = $this->stmt->fetchAll();

			return $category;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}



}




?>