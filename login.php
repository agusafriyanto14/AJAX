<br/><br/>
<?php 
	if(isset($_POST['name']) && !isset($display_case)){
 		$name=htmlspecialchars($_POST['name']);
 		$sql=$dbh->prepare("SELECT name FROM pengguna WHERE name=?");
 		$sql->execute(array($name));
 
 		if($sql->rowCount()!=0 || $_POST['name'] == ""){
  		   $ermsg="<div class='error'>Nama sudah terpakai. Coba gunakan nama yang lain.</div>";
 		}else{
  		   $sql=$dbh->prepare("INSERT INTO pengguna (name,seen) VALUES (?,NOW())");
   		   $sql->execute(array($name));
  			$_SESSION['user']=$name;
 		}
	} elseif(isset($display_case)){
 		if(!isset($ermsg)){
?>
		<form action="index.php" method="POST">
  			<input name="name" class="feedback-input" placeholder="Masukan nama user" required/>
  			<button id="button-blue">Masuk</button>
 		</form>
<?php 
 		}else{
?>
 		<form action="index.php" method="POST">
  			<input name="name" class="feedback-input" placeholder="Masukan nama user" required/>
  			<button id="button-blue">Masuk</button>
 		</form>
<?php 
 		 echo $ermsg;
 		}
	}
?>
<footer></footer>
