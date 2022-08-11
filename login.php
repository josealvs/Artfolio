<?php
  include("config.php");
  $erro = 0;
  if(isset($_POST['email'])){
    extract($_POST);
    $consulta = $conexao->query("select * from tb_artistas where art_email = '$email' and art_senha = '$senha'");
    if($resultado = $consulta->fetch_assoc()){
        $_SESSION['email'] = $resultado['art_email'];
        $_SESSION['senha'] = $resultado['art_senha'];
        $_SESSION['codigo'] = $resultado['art_codigo'];
        header("Location: editarperfil.php");
    }
    else{
        $erro = 1;
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
    <div class = "inserirLogin">
      <ul align = "right">
        <center><li class = "LoginMeioTela" >Login</li></center>
        <br>
        <?php if($erro == 1) echo "Email ou senha inválido" ?>
        <form method="POST" action="?">
          <li class = "Listas">E-mail:</li><input class="inputtexto" type="text" name="email" required>></li>
          <br>
          <li class = "Listas">Senha:</li><input class="inputtexto" type="password" name="senha" required>></li>
          <br>  
      </ul>
      <a><button type = "submit" class="botaoLogin">Entrar</button></a>
    </form>
      <h3 class="textoabaixo"> Não é Cadastrado?<a class = "cadastre-se" href = "cadastro.php"> Cadastre-se.</a></h3>
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