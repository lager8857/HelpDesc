<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once("../../includes/head2.php");?>
        <script>
function ajax(){
var req= new XMLHttpRequest();

req.onreadystatechange=function(){
if(req.readyState== 4 && req.status == 200){

document.getElementById('chat').innerHTML=req.responseText;
}	
}
req.open('GET','chat.php',true);
req.send();

}
setInterval(function(){ajax();},1000);
</script>
        <!-- CODE INCLUDES -->
         
    </head>
    <body onload="ajax();">
		<?php require_once("../../includes/dbconnect.php");
		require_once("../../includes/header2.php");?>
		<?php
	
			if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		 echo '<h3>Ты не залогинился</h3>';
			}else{
		?>
		<?php
			$label = 'st';
$st = false;
if (  !empty( $_GET[ $label ] )  )
{
  $st = $_GET[ $label ];
	/*if (!isset($_SESSION['12st'])) {
  $_SESSION['12st'] = 0;
} else {
  $_SESSION['12st']++;
}*/
	
$_SESSION['12st']=$st;	
}
		
		
		
		?>
		
    


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

        
                                                            


                      <div class="row">
    <div class="col">
     
    </div>
    
   
		<div class="block_for_messages col-5">
			<?php
				if(isset($_SESSION["serever_message"])){

					echo '<div class="alert alert-info">'.$_SESSION["serever_message"].'</div>';

					unset($_SESSION["serever_message"]);
				}
								?>
		</div>
			<div class="col">
     
    </div>
  </div>
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php	
		

		
		$test = " SELECT ticket.id,ticket.date,ticket.status,ticket.subject,user1.firstname, user1_1.firstname,problem.name,status.name, ticket.message,priority.name,user1.surname
FROM `user1` AS user1_1, user1, ticket,problem,status,priority WHERE (user1.id = ticket.autor) AND (user1_1.id = ticket.executor) AND (problem.id = ticket.problem)
AND (ticket.status=status.id) AND (ticket.priority=priority.id) AND (ticket.id=$st) ORDER BY `ticket`.`id` ASC  ";
	if ($tabl = $mysqli->query($test));		
while ($row = $tabl->fetch_row()){
	$id = $row['0'];
	$date = $row['1'];
	$nameticket = $row['3'];
	$name = $row['4'];
	$category = $row['6'];
	$status = $row['7'];
	$message = $row['8'];
	$priority = $row['9'];
	$surname = $row['10'];
	
	

};

?>
    <div class="container">
  <div class="row">
    <div class="col-md-12 content-area">


 <h3 class="home-label">#<?php echo $id?>-<?php echo $nameticket?> </h3> 

<ol class="breadcrumb">
  <li><a href="http://support.patchesoft.com/">Главная страница</a></li>
  <li><a href="/client/tickets/">Ваши сообщения</a></li>
  <li class="active">Просмотр сообщения #<?php echo $id?></li>
</ol>

 

<div class="row">
<div class="col-md-8">

<div class="panel panel-default">
<div class="panel-body">
<div class="col-md-12" style="word-wrap:break-word; overflow: visible !important;">
    <div class="pull-left">
      <div class="user-box-avatar">
                <div class="online-dot-user" data-toggle="tooltip" data-placement="bottom" title="Online"></div>
                <a href="http://support.patchesoft.com/profile/asdasd"><img src="http://support.patchesoft.com/uploads/default.png" title="asdasd" data-toggle="tooltip" data-placement="right" /></a>
                </div>  </div>
<h3 class="media-title"><?php echo $name?> <?php echo $surname ?></h3>
<p><p><?php echo $message?></p>
</p>
<div class="small-text">
                            <p><strong>Дата</strong><br /><?php echo $date ?></p>
                                          
                      </div>

  </div>

</div>
</div>

</div>
<div class="col-md-4">

<div class="panel panel-default">
<div class="panel-body">
  <h4 class="media-title">Ticket Details</h4>
<table class="table">
<tr><td class="ticket-label-info">#</td><td><?php echo $id?></td></tr>
<tr><td class="ticket-label-info">Автор</td><td><a href="http://support.patchesoft.com/profile/asdasd"><?php echo $name ?></a> </td></tr>
<tr><td class="ticket-label-info">Создано</td><td><?php echo $date?></td></tr>
<tr><td class="ticket-label-info">Приоритет</td><td><span class='label label-info'><?php echo $priority?></span></td></tr>
<tr><td class="ticket-label-info">Обновление</td><td>01/05/2019 08:59 </td></tr>
<tr><td class="ticket-label-info">Категория</td><td><?php echo $category ?></td></tr>
<tr><td class="ticket-label-info">Статус</td><td><?php echo $status ?></td></tr>
    
 
            
    </table>

     
</div>
</div>

</div>
</div>
<!--<div class="panel panel-primary">
<div class="panel-body">
      <div class="ticket-reply-options">
    <a href="http://support.patchesoft.com/client/edit_ticket_reply/9" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit"><span class="glyphicon glyphicon-cog"></span></a>
    <a href="http://support.patchesoft.com/client/delete_ticket_reply/9/eafde4ad435d8c13749a94bf4c8b4c17" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this?')" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
    </div>
    <div class="media">
  <div class="media-left">
    <div class="user-box-avatar">
                <div class="online-dot-user" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Online"></div>
                <a href="http://support.patchesoft.com/profile/lager8857"><img src="http://support.patchesoft.com/uploads/default.png" title="" data-toggle="tooltip" data-placement="right" data-original-title="lager8857"></a>
                </div>  </div>
  <div class="media-body">
    <h4 class="media-title"><a href="http://support.patchesoft.com/profile/lager8857">lager8857</a></h4>
<p></p><p>asdasdasd</p>
<p></p>
<p class="small-text">02/05/2019 04:24</p>
</div>
</div>
</div>
</div>-->
	  <!--  <div >
<div class="panel panel-primary">
<div class="panel-body">
      <div class="ticket-reply-options">
    <a href="http://support.patchesoft.com/client/edit_ticket_reply/8" class="btn btn-warning btn-xs" data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit"><span class="glyphicon glyphicon-cog"></span></a>
    <a href="http://support.patchesoft.com/client/delete_ticket_reply/8/eafde4ad435d8c13749a94bf4c8b4c17" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this?')" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete"><span class="glyphicon glyphicon-trash"></span></a>
    </div>
    <div class="media">
  <div class="media-left">
    <div class="user-box-avatar">
                <div class="online-dot-user" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Online"></div>
                <a href="http://support.patchesoft.com/profile/lager8857"><img src="http://support.patchesoft.com/uploads/default.png" title="" data-toggle="tooltip" data-placement="right" data-original-title="lager8857"></a>
                </div>  </div>
  <div class="media-body">
    <h4 class="media-title" id="test"><a href="http://support.patchesoft.com/profile/lager8857">lager8857</a></h4>
<p></p><p>dasdasdasdasd</p>
<p></p>
<p class="small-text">02/05/2019 04:24</p>
</div>
</div>
</div>
</div>
		</div>
<script>
	var parent = document.getElementById('test');
		  var div = document.createElement('div');
		  div.className = "alert alert-success";
		  div.innerHTML = "<strong>123</strong>";
		  parent.appendChild(div);
		  
		  
 // var div = document.createElement('div');
  //div.className = "alert alert-success";
  //div.innerHTML = "<strong>Ура!</strong> Вы прочитали это важное сообщение.";

  //document.getElementById("test").appendChild(div);
</script>-->
	 <div id="container">
	 <div id="chat_box">
		 <div id="chat">
	  </div>
		 </div>
	
  <div class="panel panel-default">
<div class="panel-body">
<h4>Reply To Ticket <?php echo $st?></h4>
<form action="index.php?st=<?php echo $st ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
 <div class="form-group">
                <div class="col-md-12 ui-front">
                    <textarea name="text" class="form-control" required style="height: 150px" id="ticket-body"></textarea>
					
                </div>
        </div>
            <p><input type="submit" name="submit" class="btn btn-primary btn-sm form-control" value="Reply"></p>
</form>
	  </div>
		 </div>
</div>
<?php
	
if(isset($_POST['submit'])){
	$newchat = "SELECT * FROM `chat` WHERE (`id_ticket`='".$st."')";
		if ($chatnew = $mysqli->query($newchat));		
while ($row = $chatnew->fetch_row()){
	$id = $row['0'];
	$id_ticket = $row['1'];
	$statusch = $row['2'];
};
		
	if ($st == $id_ticket){
		$id=$id;
	}
		else
		{
			$run1 = $mysqli->query("INSERT INTO `chat` (`id`,`id_ticket`,`id_autor`,`id_executor`) values(NULL,'".$st."','".$_SESSION['id']."','6')");
			if ($statusch!==$_SESSION['id'])
			{
				$upd = "UPDATE `ticket` SET `status` = 2 WHERE `id` = '".$st."'";
			$run2 = $mysqli->query($upd);}
				if($run2){
	$messages=' <div class="alert alert-success">Сообщение успешно изменено!</div>';
	message_send($messages);
	
		}
				else {
					$messages='<div class="alert alert-success">Ошибка</div>';
					message_send($messages);
				}
			}
	$checkchat = "SELECT * FROM `chat` WHERE (id_ticket ='".$st."') ";
		if ($chatid = $mysqli->query($checkchat));		
while ($row = $chatid->fetch_row()){
	$id_chat = $row['0'];
	 
};
	
	
	$nameus=$_SESSION['id'];
	$text=$_POST['text'];
	
$query="INSERT INTO `chat_mess` (`id_user`,`mess`,id_chat) values('$nameus','$text','$id_chat')";

$run=$mysqli->query($query);
if($run){
	echo "<embed loop='false' src='2.mp3' hidden='true' autoplay='true' />";
}
}

?>

</div>
</div>
</div>
<?php }?>

    <?php require_once("../../includes/footer.php"); ?>


    </body>
</html>