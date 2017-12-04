<?php  
	require "conex.php";
	// gera automaticamente todas tabelas do banco de dados do site...
	mysqli_query($conex, "CREATE TABLE if not exists info(
		id bigint not null auto_increment primary key,
		uri varchar(2048),
		ip varchar(128),
		data datetime
		);")or die("ñ foi possivel gerar tabela info... ".mysqli_error($conex));
	/*
	mysqli_query($conex, "CREATE TABLE if not exists imagens(
		cod bigint not null primary key auto_increment,
		url varchar(1024),
		id_prod bigint,
		foreign key(id_prod) references produto(id)
		);")or die("ñ foi possivel gerar tabela imagens... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists videos(
		cod bigint not null primary key auto_increment,
		url varchar(1024),
		id_prod bigint,
		foreign key(id_prod) references produto(id)
		);")or die("ñ foi possivel gerar tabela videos... ".mysqli_error($conex));


	mysqli_query($conex, "CREATE TABLE if not exists usuario(
		cod bigint not null auto_increment primary key,
		nome varchar(45),
		email varchar(45) not null UNIQUE,
		senha varchar(16),
		acesso_nivel int(1),
		apelido varchar(32),
		entrada datetime,
		limite datetime,
		ativo varchar(16)
		);")or die("ñ foi possivel gerar tabela usuario... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists msg_prod(
		cod bigint not null primary key auto_increment,
		msg varchar(1024),
		id_usu bigint,
		data datetime,
		foreign key(id_usu) references usuario(cod),
		id_prod bigint,
		foreign key(id_prod) references produto(id),
		visto varchar(128)
		);")or die("ñ foi possivel gerar tabela msg_prod... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists msg_comercio(
		id bigint not null auto_increment primary key,
		nome varchar(64),
		email varchar(64),
		assunto varchar(64),
		titulo varchar(128),
		data datetime,
		msg varchar(512),
		pasta varchar(32),
		flag varchar(1),
		marcar varchar(1),
		id_origem bigint,
		id_destino bigint
		);")or die("ñ foi possivel gerar tabela msg_comercio... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists tipo(
		id int not null auto_increment primary key,
		descricao varchar(128) UNIQUE
		);")or die("ñ foi possivel gerar tabela tipo... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists caixa(
		id int not null primary key auto_increment,
		usu_cod int,
		valor float,
		id_tip int,
		foreign key(id_tip) references tipo(id),
		data datetime,
		obs varchar(128)
		);")or die("ñ foi possivel gerar tabela caixa... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists fotos_usu(
		id bigint not null auto_increment primary key,
		url varchar(512),
		usu_id bigint,
		foreign key(usu_id) references usuario(cod),
		album varchar(32)
		);")or die("ñ foi possivel gerar tabela fotos_usu... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists chat_usuarios(
		id bigint not null auto_increment primary key,
		foto varchar(256),
		nome varchar(256),
		email varchar(256),
		horario datetime,
		limite datetime,
		blocks varchar(1024)
		);")or die("ñ foi possivel gerar tabela chat_usuarios... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists chat_mensagens(
		id bigint not null auto_increment primary key,
		id_de bigint,
		id_para bigint,
		mensagem varchar(256),
		tempo bigint,
		lido int(1),
		data datetime,
		id_usu bigint
		);")or die("ñ foi possivel gerar tabela chat_mensagens... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists sugestoes(
		id bigint not null auto_increment primary key,
		id_usu bigint not null,
		sugestao varchar(256),
		data datetime
		);")or die("ñ foi possivel gerar tabela sugestoes");

	mysqli_query($conex, "CREATE TABLE if not exists favoritos(
		id bigint not null auto_increment primary key,
		id_usu bigint not null,
		id_prod bigint not null
		);")or die("ñ foi possivel gerar tabela favoritos... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists comercio(
		id bigint not null auto_increment primary key,
		id_usu bigint not null,
		titulo varchar(256),
		foto varchar(256),
		categoria VARCHAR(64),
		ativo varchar(16),
		texto text,
		url text
		);")or die("ñ foi possivel gerar tabela comercio... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists noticias(
		id bigint not null auto_increment primary key,
		titulo varchar(256),
		descricao varchar(512),
		fotos varchar(1024),
		data date,
		texto text,
		pasta varchar(256)
		);")or die("ñ foi possivel gerar tabela noticias... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists festas(
		id bigint not null auto_increment primary key,
		titulo varchar(256),
		descricao varchar(512),
		fotos varchar(1024),
		data date,
		texto text,
		pasta varchar(256)
		);")or die("ñ foi possivel gerar tabela festas... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists utilidade(
		id bigint not null auto_increment primary key,
		titulo varchar(256),
		descricao varchar(512),
		fotos varchar(1024),
		data date,
		texto text,
		pasta varchar(256)
		);")or die("ñ foi possivel gerar tabela utilidade...".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists prod_visto(
		id bigint not null auto_increment primary key,
		id_prod bigint,
		data datetime,
		obs varchar(1024)
		);")or die("ñ foi possivel gerar tabela prod_visto... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists reg_usu(
		id bigint not null auto_increment primary key,
		id_usu bigint,
		data datetime,
		registro text,
		obs varchar(1024)
		);")or die("ñ foi possivel gerar tabela reg_usu... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists ranking_estrelas(
		id bigint not null auto_increment primary key,
		id_usu bigint,
		id_prod bigint,
		data datetime,
		registro text,
		obs varchar(1024)
		);")or die("ñ foi possivel gerar tabela ranking estrelas... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE if not exists categorias(
		id bigint not null auto_increment primary key,
		categoria varchar(32),
		icone varchar(1024)
		);")or die("ñ foi possivel gerar tabela categorias... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS postagens(
		id bigint not null primary key auto_increment,
		id_usu bigint,
		titulo varchar(128),
		postagem text,
		obs varchar(64),
		data datetime,
		ativo varchar(16)
		);")or die("ñ foi possivel gerar tabela postagens... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS postagens_img(
		id bigint not null primary key auto_increment,
		id_post bigint,
		foto varchar(1024),
		data datetime
		);")or die("ñ foi possivel gerar tabela postagens IMG... ".mysqli_error($conex)); // msg_chat

	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS msg_chat(
		id bigint not null primary key auto_increment,
		id_de bigint,
		id_para bigint,
		msg text,
		lido datetime,
		data datetime
		);")or die("ñ foi possivel gerar tabela msg_chat... ".mysqli_error($conex));

	mysqli_query($conex, "CREATE TABLE IF NOT EXISTS campainha(
		id bigint not null primary key,
		tocou int(1)
		);")or die("ñ foi possivel gerar tabela campainha... ".mysqli_error($conex));



	session_start();
	$_SESSION['msg'] = "tabelas geradas com sucesso...";
	header("location:index.php");

	//caixa
	//tipo
	*/
?>