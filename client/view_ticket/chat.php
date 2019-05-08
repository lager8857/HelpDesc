<?php 
//include("includes/head.php");

require_once("../../includes/dbconnect.php");
?>
<body>
<?php

session_start();
/*$query="SELECT DISTINCT chat.id_ticket,chat.id_autor,chat.id_executor, ticket.id,ticket.message,user1.firstname,user1_1.firstname,user1.id,chat_mess.mess,chat_mess.id_user FROM chat,chat_mess,ticket,`user1` AS user1_1, user1 WHERE (chat.id_ticket=ticket.id) AND (user1.id = chat.id_autor) AND (user1_1.id = chat.id_executor)";

	$query="SELECT DISTINCT chat.id_ticket,chat.id_autor,chat.id_executor, ticket.id,ticket.message,user1.firstname,user1_1.firstname,user1_2.firstname,user1_3.firstname,user1.id,chat_mess.mess,chat_mess.id_user FROM chat,chat_mess,ticket,`user1` AS user1_1,`user1` AS user1_2,`user1` as user1_3, user1 WHERE (chat.id_ticket=ticket.id) AND (user1.id = chat.id_autor) AND (user1_1.id = chat.id_executor) AND (user1_2.id = chat_mess.id_user) AND (user1_3.id = chat_mess.id_user)";
	<div id="chat_data">
<span style="color:green;">'.$row['6'].' </span>:

<span style="color:brown;">'.$row['9'].'</span>
</div>
$query = "SELECT chat_mess.id_user,chat_mess.mess,chat.id_ticket,ticket.id,ticket.message,user1.firstname,chat_mess.date FROM chat_mess,chat,ticket,user1 WHERE (user1.id=chat_mess.id_user) AND (chat.id_ticket=ticket.id) AND (chat_mess.id_user=1 OR chat_mess.id_user=2) AND (ticket.id=$st) ";*/
	
	$st=$_SESSION['12st'];
	$query = "SELECT chat_mess.id_user,chat_mess.mess,chat.id_ticket,ticket.id,ticket.message,user1.firstname,chat_mess.date,chat_mess.id FROM chat_mess,chat,ticket,user1 WHERE (user1.id=chat_mess.id_user) AND (chat.id_ticket=ticket.id) AND (ticket.id=$st) AND (chat_mess.id_chat=chat.id) ";
if ($tabl = $mysqli->query($query));		
while ($row = $tabl->fetch_row()){
	$name = $row['5'];
	$message = $row['1'];
	$date = $row['6'];
	$id = $row['7'];
	?>

	


	<div id="chat"></div>
<div id="chat_data">
	<div class="panel panel-primary">
<div class="panel-body">
      <div class="ticket-reply-options">
    <a href="/client/edit_ticket_reply/index.php?act=change&id=<?php echo $row['7'] ?>&mess=<?php echo $message ?>" class="btn btn-warning " data-toggle="tooltip" data-placement="right" title="" data-original-title="Edit">Редактировать</a>
    <a href="/../delete.php?act=deletemessch&id=<?php echo $row['7'] ?>" class="btn btn-danger " onclick="return confirm" data-toggle="tooltip" data-placement="right" title="" data-original-title="Delete">Удалить</a>
    </div>
    <div class="media">
  <div class="media-left">
    <div class="user-box-avatar">
                <div class="online-dot-user" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Online"></div>
                <a href="http://support.patchesoft.com/profile/lager8857"><img src="http://support.patchesoft.com/uploads/default.png" title="" data-toggle="tooltip" data-placement="right" data-original-title="lager8857"></a>
                </div>  </div>
  <div class="media-body">
    <h4 class="media-title"><a href="http://support.patchesoft.com/profile/lager8857"><?php echo $name?></a></h4>
<p></p><p><?php echo $message?></p>
<p></p>
<p class="small-text"><?php echo $date?></p>
</div>
</div>
</div>
</div>
</div>	
<?};
	
?>	
	
	

