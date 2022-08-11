<?php
include("config.php");
$consulta = $conexao->query("select * from tb_obras order by obr_codigo desc");


?>
<html>
<head>
  <meta charset="utf-8">
  <title>Artfólio</title>
  <link rel="stylesheet" href="FolhaDeEstilo.css">

</head>

<body>

  <div class="parte1"> 
    <div class = "ParteSuperiorDireita" >
      <ul>
        <li class = "Listas">
          <a href = "index.php" id = "TextoSuperiorDireito"> Início </a>
        </li>
        <li class = "Listas">
          <a href = "artistas.php" id = "TextoSuperiorDireito"> Artistas </a>
        </li>
        <li class = "Listas">
          <a href = "login.php" id = "TextoSuperiorDireito"> Login </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="linha1"></div>

  <div class="parte2Inicio"></div>

  <div class="linha1"></div>

  <div class="parte3Inicio">
    <h1> Novas Obras <h1>
  </div>

  <div class="parte4">
    <?php while($resultado = $consulta->fetch_assoc()){
        $codigo = $resultado['obr_codigo'];
        $sql = "select * from tb_obras where obr_codigo = $codigo order by obr_codigo";
        $buscar = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($buscar);
        $arquivo = $dados['obr_arquivo'];
      ?>
    <img src="documentos/<?php echo $arquivo?>" class="NovasObras" />

    <?php } ?>
  </div>

  <footer class="rodape">
    <p class = "Copyright" >© Copyright 2021</p>
    <h1 class = "Textorodape" >"A arte não reproduz o que vemos. Ela nos faz ver."</h1>
    <h4 class ="PaulKlee"> Paul Klee </h4>
  </footer>

  <div class="linha2"></div>

</body>
</html>