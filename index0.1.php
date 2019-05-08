<?php
require_once("includes/head.php");
?>
<body>
	
	
	<?php
		require_once("includes/header.php");
	require_once("includes/dbconnect.php");
	?>
	
	<?php
	
			if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		 echo '<h3>Ты не залогинился</h3>';
			}else{
		?>
	<div class="container">
	 			<div class=container_form>
				<form action="send_mess.php" method="post" enctype="multipart/form-data">
					<div class = "form-group">
             <label for="exampleFormControlSelect1">Кому:</label>
			 
             <select class="custom-select" id="exampleFormControlSelect1" name="to">
				 <?php 
				$zapr_result = $mysqli->query("SELECT * FROM `user1`", MYSQLI_USE_RESULT);
				
				while($row = mysqli_fetch_assoc($zapr_result))
				{
					$id = $row['id'];				
    				$name = $row['firstname']; //имя

    
					echo "<option value=\"$id\">$name</option>"; // выводим
				}
					?>
			
             </select>
					</div>
					</hr>
					<div class = "form-group">	
			  <label for="exampleFormControlSelect2">От кого:</label> <?php echo $_SESSION['firstname']; ?> <br />
					<?php $name = $_SESSION['firstname'];?>
					
					
					<select class="custom-select" id="exampleFormControlSelect2" name="from">
					<?php 
						$zapr_result = $mysqli->query("SELECT * FROM `user1` WHERE `firstname`= '$name' ", MYSQLI_USE_RESULT);
				
						while($row = mysqli_fetch_assoc($zapr_result))
					{
							$id = $row['id'];	
							$_SESSION['id'] = $row['id'];
    						//$name = $row['first_name']; //имя
     
    					echo "<option value=\"$id\">$name</option>"; // выводим
					}
					?>

             </select>
					</div>
					<div class = "form-group">	
						<label for="exampleFormControlSelect3">Укажите вашу проблему:</label>
						<select class="custom-select" id="exampleFormControlSelect3" name="problm">
					<?php 
						$probl_result = $mysqli->query("SELECT * FROM `problem`", MYSQLI_USE_RESULT); //Берёт выборку из базы
				
						while($rowp = mysqli_fetch_assoc($probl_result))
					{
							$idp = $rowp['id'];				
    						$namep = $rowp['name']; //имя
     
    					echo "<option value=\"$idp\">$namep</option>"; // выводим
					}
					?>

             </select>
					</div>	
					
										
					
					<div class="form-group">
           <label for="exampleFormControlTextarea1">Введите сообщение:</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="mess" required></textarea>
					</div>
						<input type="submit" name="send" class="btn btn-primary" value="Отправить">
        </form>
					</div>
</div>
		<?php
			}
		?>
	

	<?php
		//require_once("includes/footer.php");
	$mysqli->close();
	?>

</body>
</html>