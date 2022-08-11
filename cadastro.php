<?php
include("config.php"); 
if(isset($_POST['nome'])){
    extract($_POST);
    if($consulta = $conexao->query("insert into tb_artistas (art_nome, art_email, art_senha) values ('$nome','$email','$senha')")) {
        header("Location: login.php");
    } else {
        echo "Erro no cadastro";
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

  <div class="parte3Dados">
    <div class = "inserir">
      <ul>
        <li class = "Cadastro">Cadastro</li>
        <form method="POST" action="?">
      </ul>
      <ul align = "right">
        <br>
        <li class = "Listas"> Nome:<input class = "inputtexto" type="text" name="nome" required></li>
        <br>
        <li class = "Listas">E-mail:</li><input class="inputtexto" type="text" name="email" required></li>
        <br>
        <li class = "Listas">Senha:</li><input class="inputtexto" type="password" name="senha" required></li>
      </ul>
      <a><button class="botao" type = "submit">Entrar</button></a>
      </form>
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