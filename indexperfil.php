<?php
include("config.php");
include("validacao.php");
$codigo = $_SESSION['codigo'];
	$erro=0;
// se estiver enviando formulário, executar query
if(isset($_POST['nome'])){
  extract($_POST);
  if($consulta = $conexao->query("update tb_artistas set art_nome = '$nome', art_idade = '$idade', art_formacao = '$formacao', art_peqbio = '$biografia', art_tec_codigo = '$tecnica' where art_codigo = $codigo;")) {
    header("Location:editarperfil.php");
  }
  else {
// define a necessidade de mostrar o erro
    $erro=1;
  }
}


	$arquivo = $_FILES['fotoperfil'];
	$arquivocapa = $_FILES['fotocapa'];



	if($arquivo !== null){
		preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivo["name"], $ext);

		if($ext == true){
			$nome_arquivo = md5(uniqid(time())) . "." . $ext[1];

			$caminho_arquivo = "documentos/" . $nome_arquivo;

			move_uploaded_file($arquivo["tmp_name"], $caminho_arquivo);

			$sql = "UPDATE tb_artistas set art_fotodeperfilimg = '$nome_arquivo' where art_codigo = $codigo";
			$inserir = mysqli_query($conexao, $sql);

		}
	}

	if($arquivocapa !== null){
		preg_match("/\.(png|jpg|jpeg){1}$/i", $arquivocapa["name"], $ext2);

		if($ext2 == true){
			$nome_arquivo2 = md5(uniqid(time())) . "." . $ext2[1];

			$caminho_arquivo2 = "documentos/" . $nome_arquivo2;

			move_uploaded_file($arquivocapa["tmp_name"], $caminho_arquivo2);

			$sql2 = "UPDATE tb_artistas set art_capaimg = '$nome_arquivo2' where art_codigo = $codigo";
			$inserir2 = mysqli_query($conexao, $sql2);

		}
	}

?>