<!DOCTYPE html>
<html lang="en">
    <head>
       <?php require_once("../../includes/head2.php");?>
    </head>
    <body>
		<?php require_once("../../includes/dbconnect.php");
		 require_once("../../includes/header2.php");
		?>
		<?php
	
			if(!isset($_SESSION['email']) && !isset($_SESSION['password'])){
		 echo '<h3>Ты не залогинился</h3>';
			}else{
		?>
		<?php $idu=$_SESSION['id'];
		
		//require_once("../../includes/header.php");
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

      
<h3 class="home-label">Запросы</h3>

<ol class="breadcrumb">
  <li><a href="http://localhost">Домой</a></li>
  <li class="active">Ваши запросы</li>
</ol>



<div class="panel panel-default">
<div class="panel-body">

  <div class="db-header clearfix">
    <div class="page-header-title"> Ваши запросы</div>
    <div class="db-header-extra form-inline"> 

 <div class="form-group has-feedback no-margin">
<div class="input-group">
<input type="text" class="form-control input-sm" placeholder="Поиск" id="search-text" onkeyup="tableSearch()" />

</div>
</div>
</div>
</div>



<div class="table-responsive">
<table class="table table-hover table-sm " id="info-table">
  <thead>
    <tr>
      <th>#</th>
      <th>Тема</th>
      <th>Категория</th>
	<th>Автор</th>	
      <th>Исполнитель</th>
		<th>Создан</th>
		<th>Статус</th>
		<th>Приоритет</th>
		<th>Действие</th>
		<th>Удалить</th>
		
    </tr>
  </thead>
	<tbody>
	
		
<?php	
	$idadm=0;
	$admin="SELECT * FROM user1 WHERE (user_group=1) AND (id=$idu)";
	if ($adresult=$mysqli->query($admin))
	{
		while ($row = $adresult->fetch_assoc()){
			?>
			<?php $idadm = $row["id"];
			
		}
	if ($idadm==$idu){
		
			$test = " SELECT ticket.id,ticket.date,ticket.status,ticket.subject,user1.firstname, user1_1.firstname,problem.name,status.name, ticket.message,priority.name
FROM `user1` AS user1_1, user1, ticket,problem,status,priority WHERE (user1.id = ticket.autor) AND (user1_1.id = ticket.executor) AND (problem.id = ticket.problem)
AND (ticket.status=status.id) AND (ticket.priority=priority.id)   ORDER BY `ticket`.`id` ASC  ";
	}
		else
			
		
		$test = " SELECT ticket.id,ticket.date,ticket.status,ticket.subject,user1.firstname, user1_1.firstname,problem.name,status.name, ticket.message,priority.name
FROM `user1` AS user1_1, user1, ticket,problem,status,priority WHERE (user1.id = ticket.autor) AND (user1_1.id = ticket.executor) AND (problem.id = ticket.problem)
AND (ticket.status=status.id) AND (ticket.priority=priority.id) AND (user1.id=$idu)   ORDER BY `ticket`.`id` ASC  ";
	if ($tabl = $mysqli->query($test));		
while ($row = $tabl->fetch_row()){
	$test = $row['0'];
echo '

      <th scope="row" >'.$row['0'].'</th>
      <td >'.$row['3'].'</td>
	  <td>'.$row['6'].'</td>
	  <td>'.$row['4'].'</td>
      <td>'.$row['5'].'</td>
	   <td>'.$row['1'].'</td>
	   <td>'.$row['7'].'</td>
      <td class="">'.$row['9'].'</td>
	  <td><a class="btn btn-primary" href="/client/view_ticket/index.php?st='.$row['0'].'">Перейти</a>
	  <td><a href="/../delete.php?act=deletemess&id='.$row['0'] .'">X</a>
	  </td>
    </tr>
';

};}
	?>
 </tbody>
</table>	
	
	<script> 
	function tableSearch() {
    var phrase = document.getElementById('search-text');
    var table = document.getElementById('info-table');
    var regPhrase = new RegExp(phrase.value, 'i');
    var flag = false;
    for (var i = 1; i < table.rows.length; i++) {
        flag = false;
        for (var j = table.rows[i].cells.length - 1; j >= 0; j--) {
            flag = regPhrase.test(table.rows[i].cells[j].innerHTML);
            if (flag) break;
        }
        if (flag) {
            table.rows[i].style.display = "";
        } else {
            table.rows[i].style.display = "none";
        }

    }
}
	</script>
	
	
	
	
	

</div>

</div>
</div>

</div>
</div>
</div>
<?php }?>

   
<?php require_once("../../includes/footer.php"); ?>
   </body>
</html>