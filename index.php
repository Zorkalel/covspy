<?php
require("db/konekte.php");

if(isset($_POST['soumet'])){
	extract($_POST);
	if(!empty($nonkonple) && !empty($laj)){
		$n=htmlspecialchars($nonkonple);
		$l=htmlspecialchars($laj);
		$ua=$_SERVER['HTTP_USER_AGENT'];
		//reket etudiant
		$reket=$db->prepare("INSERT INTO user(non,laj,userAgent) VALUES(:non,:laj,:userAgent)");
		$reket->execute(["non"=>$n,"laj"=>$l,"userAgent"=>$ua]);
		if($reket){
			$re=$db->prepare("SELECT * FROM user WHERE non=:non");
			$re->execute(['non'=>$n]);
			$x=$re->fetch();
			var_dump($x);
			$_SESSION['user']=$x['non'];
			header("Location: home.php?".$_SESSION['user']);
		}else{
			echo "oupa egzsite";
		}
	}else{
		echo "ranpli tout espas vid yo";
	}
}else{}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Auth</title>
</head>
<body>
	<div align="center" style="border:solid; margin: 100px; padding: 15px;">
		<div>
			<h1>Sistem idantifikasyon pou covid19</h1>
		<form method="post">
			<label>non konple</label></br>
			<input type="name" name="nonkonple"></br>
			<label>laj</label></br>
			<input type="name" name="laj"></br>
			<input type="submit" value="idantifyem" name="soumet">
		</form>
		</div>
		
	</div>

</body>
</html>