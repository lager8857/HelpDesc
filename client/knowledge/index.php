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
		
		
		?>
   
<div class="container">
  <div class="row">
    <div class="col-md-12 content-area">

    	
<h3 class="home-label">База знаний</h3>

<ol class="breadcrumb">
  <li><a href="http://support.patchesoft.com/">Home</a></li>
  <li class="active">Knowledge Base</li>
</ol>


<div class="category-page">
<a href="http://support.patchesoft.com/client/view_knowledge_cat/1"><img src="http://support.patchesoft.com/uploads/default_cat.png" class="category-image"></a>
<p class="category-title"><a href="http://support.patchesoft.com/client/view_knowledge_cat/1">Default</a></p>
The default category</div>
<div class="category-page">
<a href="http://support.patchesoft.com/client/view_knowledge_cat/2"><img src="http://support.patchesoft.com/uploads/default_cat.png" class="category-image"></a>
<p class="category-title"><a href="http://support.patchesoft.com/client/view_knowledge_cat/2">Tutorials</a></p>
<p><br />
Here are some tutorials</p>
</div>


<hr>

<h3 class="home-label">Recent Articles</h3>

<div class="list-group">
	  <a href="http://support.patchesoft.com/client/view_knowledge/4" class="list-group-item">
    <h4 class="list-group-item-heading">Media Test</h4>
    <p class="list-group-item-text">Lorem ipsum dolor sit amet, vis in meis modus sapientem, expetendis dissentiunt eum ea. Doctus ... </p>
  </a>
	  <a href="http://support.patchesoft.com/client/view_knowledge/3" class="list-group-item">
    <h4 class="list-group-item-heading">How to crop images</h4>
    <p class="list-group-item-text">Lorem ipsum dolor sit amet, vis in meis modus sapientem, expetendis dissentiunt eum ea. Doctus ... </p>
  </a>
	  <a href="http://support.patchesoft.com/client/view_knowledge/2" class="list-group-item">
    <h4 class="list-group-item-heading">Commonly Asked Help Questions</h4>
    <p class="list-group-item-text">Lorem ipsum dolor sit amet, vis in meis modus sapientem, expetendis dissentiunt eum ea. Doctus ... </p>
  </a>
	  <a href="http://support.patchesoft.com/client/view_knowledge/1" class="list-group-item">
    <h4 class="list-group-item-heading">PHP Tutorial Is Here</h4>
    <p class="list-group-item-text">Learn php with this tutorial.

&nbsp;

This always works for ... </p>
  </a>
</div>

</div>
</div>
</div>
		
		<?php }?>

   
<?php require_once("../../includes/footer.php"); ?>
   </body>
</html>