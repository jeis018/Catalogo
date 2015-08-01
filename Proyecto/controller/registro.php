<?php

	$docu=$_POST['docu'];
	$name=$_POST['name'];
	$cel=$_POST['cel'];
	$tel=$_POST['tel'];
	$dir=$_POST['dir'];
	$mail=$_POST['mail'];
	$pass= $_POST['pass'];
	$rpass=$_POST['rpass'];

	require("DBOperator.php");
	$checkemail=mysql_query("call validateUser('$mail')");
	$check_mail=mysql_num_rows($checkemail);
		if($pass==$rpass){
			if($check_mail>0){
				echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script> ';
			}else{
				
				//require("connect_db.php");
				mysql_query("call insertUser('$docu','$mail','$pass','$name','$tel','$cel','$dir','0')");
				//echo 'Se ha registrado con exito';
				echo ' <script language="javascript">alert("Usuario registrado con éxito");</script> ';
				mysql_close($link);
			}
			
		}else{
			echo 'Las contraseñas son incorrectas';
		}

	
?>