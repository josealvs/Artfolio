<?php
include("config.php"); 
$consulta = $conexao->query("select * from tb_artistas join tb_tecnicasusadas on art_tec_codigo = tec_codigo order by art_nome");
?>
<html>
<head>
   <meta charset="utf-8">
   <title>Artfólio</title>
   <link rel="stylesheet"href="FolhaDeEstilo.css">
</head>

<body>

   <div class="parte1">
      <div class = "ParteSuperiorDireita">
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

<div class="parte2"></div>

<div class="linha1"></div>

<div class="parte3">
  <div class="grid">

   <?php while($resultado = $consulta->fetch_assoc()){

        $codigo = $resultado['art_codigo'];
        $sql = "select art_fotodeperfilimg from tb_artistas where art_codigo = $codigo";
        $buscar = mysqli_query($conexao, $sql);
        $dados = mysqli_fetch_array($buscar);
        $arquivo = $dados['art_fotodeperfilimg'];

   ?>
   <div class="artista">
         <img src= "documentos/<?php echo $arquivo?>" class = "PerfilArtistas" style = "border-radius: 50%; width: 250px; height: 250px;object-fit: cover;">
         <div class = "AgrupamentoArtistas">
           <h2><a href="perfilpessoal.php?codigo=<?php echo $resultado['art_codigo']; ?>" class = "NomeArtista"><?php echo $resultado['art_nome']; ?></a></h2> <br>
           <h3><?php echo $resultado['art_idade']; ?> anos</h3> <br>
           <h3><?php echo $resultado['tec_tecnica']; ?></h3> <br>
           <h3><?php echo $resultado['art_formacao']; ?></h3>
      </div>
   </div>

   <?php } ?> 

  </div>
</div>

<footer class="rodape">
  <p class = "Copyright" >© Copyright 2021</p>
  <h1 class = "Textorodape">"A arte não reproduz o que vemos. Ela nos faz ver."</h1>
  <h4 class ="PaulKlee"> Paul Klee </h4>
</footer>

<div class="linha2"></div>

</body>
</html>