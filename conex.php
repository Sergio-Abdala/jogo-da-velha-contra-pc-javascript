<?php  
	$conex = mysqli_connect("tem_provisorio.mysql.dbaas.com.br","tem_provisorio","r2d2c3po");// 186.202.152.238  charqueadastem
	mysqli_select_db($conex,"tem_provisorio");// charqueadastem

	// Checkar conexão
	if (mysqli_connect_errno())
	  {
	  echo "falha ao conectar-se com MySQL: " . mysqli_connect_error();
	  }

	// Setar utf8
	mysqli_set_charset($conex,"utf8");
?>