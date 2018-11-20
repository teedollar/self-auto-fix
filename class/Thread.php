<?php

require_once 'Admin.php';

class Thread extends Admin{

	public $handle; 
	public $admin;

	public function __construct()
	{
		$this->admin = new Admin();
		$this->handle = $this->admin->handle;
	}


	public function selectThread(){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM thread ORDER BY id DESC ");
			$this->stmt->execute();
			$row = $this->stmt->fetchAll();

			return $row;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function selectThreadByCategory($cat_id){
		try{
			$this->stmt = $this->handle->prepare("SELECT * FROM thread WHERE cat_id = :cat_id ORDER BY id DESC ");
			$this->stmt->execute(array(':cat_id'=>$cat_id));
			$row = $this->stmt->fetchAll();

			return $row;
			
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



	public function saveThread($topic, $cat_id, $body)
	{
		try
		{
			if( (!empty($topic)) && (!empty($cat_id)) && (!empty($body))  )
			{
				if(strlen($topic) <= 190)
				{

					
					$created_by = $_SESSION['username'];
					$date = date('D, d M, Y');
					$time = date('h:i a');


					$this->stmt = $this->handle->prepare( "INSERT INTO thread (topic, cat_id, body, created_by, dates, timess) VALUES (:topic, :cat_id, :body, :created_by, :dates, :timess) ");
			
					$this->stmt->execute(array(':topic' => $topic, ':cat_id' => $cat_id, ':body' => $body, ':created_by' => $created_by, ':dates' => $date, ':timess' => $time));
				
					?>
					<center>
						<b style='color:darkgreen; font-size:18px'>Thread successfully created</b>
					</center>

					<?php
					$url = 'forum.php';
					header("Refresh: 2; URL='$url'");

				}else
				{
					?>
					<center>
						<b style='color:red; font-size:18px'>Topic should not be more than 170 characters </b>
					</center>

					<?php
				}
						
				
			}else
			{
				?>
				<center>
					<b style='color:red; font-size:18px'>Fill all fields </b>
				</center>

				<?php
			}

							
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function selectThreadDescription($id){
		try{
			$this->stmt = $this->handle->prepare("SELECT thread.*, user.username, user.picture FROM thread, user WHERE thread.id = :id AND user.username = thread.created_by");
			$this->stmt->execute(array(':id' => $id));
			$row = $this->stmt->fetch();

			return $row;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function selectNumThreadComment($id){
		try{
			$this->stmt = $this->handle->prepare("SELECT COUNT(*) AS num_of_comment FROM comment WHERE thread_id = :id ");
			$this->stmt->execute(array(':id' => $id));
			$row = $this->stmt->fetch();

			return $row['num_of_comment'];
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}



	public function addComment($comment, $thread_id)
	{
		try
		{
			if( !empty($comment))
			{
				
					
				$posted_by = $_SESSION['username'];
				$date = date('D, d M, Y');
				$time = date('h:i a');


				$this->stmt = $this->handle->prepare( "INSERT INTO comment (thread_id, comment, posted_by, dates, timess) VALUES (:thread_id, :comment, :posted_by, :dates, :timess) ");
		
				$this->stmt->execute(array(':thread_id' => $thread_id, ':comment'=> $comment, ':posted_by' => $posted_by, ':dates' => $date, ':timess' => $time));
			
				return true;

				/*$url = 'description.php?id=$thread_id#comment';
				header("Location:'$url'");*/

			}else
			{
				return false;
				/*$url = 'description.php?id=$thread_id#comment';
				header("Location:'$url'");*/
			}

							
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	public function selectThreadComment($id){
		try{
			$this->stmt = $this->handle->prepare("SELECT comment.*, user.picture FROM comment, user, thread WHERE thread.id = comment.thread_id AND comment.thread_id = :id AND comment.posted_by = user.username");
			$this->stmt->execute(array(':id' => $id));
			$row = $this->stmt->fetchAll();

			return $row;
			
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	


}

?>