<?php
 define("HOST","localhost");
 define("DB_NAME","covspy");
 define("USER", "root");
 define("PASS","qwerty");

 try{
 	$db=new PDO("mysql:host=".HOST.";dbname=".DB_NAME.";charset=utf8",USER,PASS);
 	$db->setattribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 	echo "YES";
 }catch(PDOException $e){
 	echo "<h1>Erreur de connexion a la DB</h1></br>".$e->getMessage();
 }