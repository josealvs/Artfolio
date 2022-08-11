<?php
include("config.php");
include("validacao.php");
$codigo = $_SESSION['codigo'];
$tecnica2 = $_SESSION['tecnica'];
$consulta = $conexao->query("select * from tb_obras join tb_tecnicasusadas on obr_tec_codigo = tec_codigo join tb_artistas on art_tec_codigo = tec_codigo order by obr_codigo");

$arquivoarte = $_FILES['arte'];

if($arquivoarte !== null){
	preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivoarte["name"], $ext3);

	if($ext3 == true){
		$nome_arquivo3 = md5(uniqid(time())) . "." . $ext3[1];

		$caminho_arquivo3 = "documentos/" . $nome_arquivo3;

		move_uploaded_file($arquivoarte["tmp_name"], $caminho_arquivo3);

	}

	if(isset($_POST['titulo'])){
		extract($_POST);
		if($consulta = $conexao->query(
			"insert into tb_obras (obr_titulo, obr_anodaproducao, obr_legenda, obr_dimensao, obr_art_codigo, obr_tec_codigo, obr_arquivo) values ('$titulo','$anodeproducao','$legenda','$dimensao', '$codigo', '$tecnica2', '$nome_arquivo3');")) {
			header("Location: EditarPerfil.php");
		} else {
			echo "Erro no cadastro";
		}
	}
}