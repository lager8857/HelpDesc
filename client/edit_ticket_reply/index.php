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
       
         
    </head>
    <body onload="ajax();">
		<?php require_once("../../includes/dbconnect.php");
		require_once("../../includes/header2.php");
		?>
		<?php
	
			if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		 echo '<h3>Ты не залогинился</h3>';
			}else{
		?>
		
		<?php	$label = 'st';
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
	$action = $_REQUEST['act'];
$idm = $_REQUEST['id'];
$mess = $_REQUEST['mess'];
//$st = $_SESSION['12st'];

			 
		 
		
		?>
		
   


  


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">

        
                                                            


                     
    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
  <div class="row">
    <div class="col-md-12 content-area">


 

<ol class="breadcrumb">
  <li><a href="http://support.patchesoft.com/">Главная страница</a></li>
  <li><a href="/client/tickets/">Ваши сообщения</a></li>
  <li><a href="/client/view_ticket/index.php?st=<?php echo $_SESSION['12st']?>">Просмотр сообщения #<?php echo $_SESSION['12st']?></a></li>
	<li class="active">Редактирование сообщения</li>
</ol>

 


	 <div id="container">
	 <div id="chat_box">
		 <div id="chat">
	  </div>
		 </div>
	
  <div class="panel panel-default">
<div class="panel-body">
<h4>Редактирование сообщения</h4>
<form action="index.php?act=change&id=<?php echo $idm ?>" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
 <div class="form-group">
                <div class="col-md-12 ui-front">
                    <textarea name="text" class="form-control" required style="height: 150px" 
							  placeholder="<?php echo $mess; ?>" id="ticket-body"></textarea>
					
                </div>
        </div>
            <p><input type="submit" name="submit" class="btn btn-primary btn-sm form-control" value="Reply"></p>
</form>
	  </div>
		 </div>
</div>
<?php
	
	
	
if(isset($_POST['submit'])){
	$text=$_POST['text'];
	//$mess = $mysqli->query("UPDATE `user1` SET $field = '".$value."' WHERE `id`='".$id."'");
$query="UPDATE `chat_mess` SET `mess` = '".$text."' WHERE `id` = '".$idm."'";
$asdasd=$_SESSION['12st'];
	echo $asdasd;
$run=$mysqli->query($query);
if($run){
	$messages=' <div class="alert alert-success">Сообщение успешно изменено!</div>';
	message_send($messages);
	exit('<meta http-equiv="refresh" content="0; url=/client/view_ticket/index.php?st='.$asdasd.'" />');
     
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