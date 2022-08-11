<?php
  include("config.php");
  $codigo = $_SESSION['codigo'];
  $consulta = $conexao->query("select * from tb_artistas join tb_obras on obr_art_codigo = art_codigo join tb_tecnicasusadas on art_tec_codigo = tec_codigo where art_codigo = $codigo order by obr_codigo");
   $resultado = $consulta->fetch_assoc();
  $consulta2 = $conexao->query("select *,date_format(obr_anodaproducao,'%d/%m/%Y') as obr_anodaproducao from tb_artistas join tb_obras on obr_art_codigo = art_codigo join tb_tecnicasusadas on art_tec_codigo = tec_codigo where art_codigo = $codigo order by obr_codigo");

  if(isset($_GET['excluir'])){
  $codigo2 = $_GET['excluir'];
  if($consulta = $conexao->query("delete from tb_obras where obr_codigo = $codigo2")) {
    header("Location: excluirarte.php");
  } else {
    echo "Erro na exclusão";
  }
}

?>

<html>
<head>
  <meta charset="utf-8">
  <title>Artfólio</title>
  <link rel="stylesheet" href="FolhaDeEstilo.css">
</head>

<body>

  <div class="parte1"> 
    <div class = "ParteSuperiorEditarPerfil">
      <ul>
        <li class = "ListasEdicao">
          <a href = "editarperfil.php" id = "TextoSuperiorDireito"> Editar Perfil </a>
        </li>
        <li class = "Sair">
          <a href = "loginsair.php" id = "TextoSuperiorDireito"> Sair </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="linha1"></div> 
  
  <?php 
      $codigo2 = $resultado['art_codigo'];
        $sql2 = "select art_capaimg from tb_artistas where art_codigo = $codigo";
        $buscar2 = mysqli_query($conexao, $sql2);
        $dados2 = mysqli_fetch_array($buscar2);
        $arquivo2 = $dados2['art_capaimg'];
  ?>

  <div style = "width:100%;
   height: 67%;
   display: inline-block; 
   background-image: url(documentos/<?php echo $arquivo2?>);
   background-position: center;
   background-repeat: no-repeat;
   background-size: cover;
   position: relative;"></div>

  <div class="linha2"></div>

  <div class="parte3Perfil">

    <?php 
        $codigo = $resultado['art_codigo'];
        $sql = "select art_fotodeperfilimg from tb_artistas where art_codigo = $codigo ";
        $buscar = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($buscar);
        $arquivo = $dados['art_fotodeperfilimg'];

    ?>

    <img src="documentos/<?php echo $arquivo?>" class = "FotoPerfil" style = "width: 300px; height: 300px;object-fit: cover;
  border-radius: 50%;">
    <div>
      <h1 class = "NomeAutor"> <?php echo $resultado['art_nome']?></h1>
      <p class = "BiografiaAutor"> <?php echo $resultado['art_peqbio']?></p>
    </div>
  </div>

  <div class="linha2"></div>

  <?php while($resultado2 = $consulta2->fetch_assoc()){ ?>

  <div class="parte4Perfil">
    <div><h5 class = "TituloObras">
      <?php echo $resultado2['obr_titulo'];?> , <?php echo $resultado2['obr_anodaproducao'];?> , <?php echo $resultado2['obr_dimensao'];?>
      </h5>
      <p class = "Legenda"><?php echo $resultado2['obr_legenda']?></p>
      <a href="?excluir=<?php echo $resultado2['obr_codigo']; ?>" onclick="return confirm('Deseja realmente apagar?');"><img src="imagens/excluir.png" width="30"; align="right"></a>
    </div>
    <img src="documentos/<?php echo $resultado2['obr_arquivo']?>" class = "ArquivoObras">
  </div>
  <?php } ?>

  <footer class="rodape">
    <p class = "Copyright" >© Copyright 2021</p>
    <h1 class = "Textorodape">"A arte não reproduz o que vemos. Ela nos faz ver."</h1>
    <h4 class ="PaulKlee"> Paul Klee </h4>
  </footer>
  
  <div class="linha2"></div>

  </body>
  </html>