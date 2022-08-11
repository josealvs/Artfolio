<?php
include("validacao.php"); 

$codigo = $_SESSION['codigo'];

$consulta2 = $conexao->query("select * from tb_artistas where art_codigo = $codigo");
$resultado2 = $consulta2->fetch_assoc();

$_SESSION['tecnica'] = $resultado2['art_tec_codigo'];
$tecnica2 = $_SESSION['tecnica'];

$consulta3 = $conexao->query("select * from tb_tecnicasusadas");
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
          <a href = "excluirarte.php" id = "TextoSuperiorDireito"> Perfil Pessoal </a>
        </li>
        <li class = "Sair">
          <a href = "loginsair.php" id = "TextoSuperiorDireito"> Sair </a>
        </li>
      </ul>
    </div>
  </div>

  <div class="linha1"></div>

  <div class="parte3Dados">
    <div class = "inserirperfil">

      <ul align = "right">
        <center><li class = "ListasEdicao">Editar Perfil</li></center> 
        <br>

        <form method="POST" action="indexperfil.php" enctype = "multipart/form-data">

          <li class = "ListasEdicao">Nome:<input class = "inputtextoEditar" name = "nome" required value="<?php echo $resultado2['art_nome']; ?>"></li>
          <br>

          <li class = "ListasEdicao">Idade:</li><input class = "inputtextoEditar" name = "idade" required value="<?php echo $resultado2['art_idade']; ?>">
          <br>

          <li class = "ListasEdicao">Técnica:</li><select name = "tecnica" class = "inputtextoEditar" required value="<?php echo $resultado2['art_tec_codigo']; ?>">>
            <?php while($resultado3 = $consulta3->fetch_assoc()){ ?>
                <option value="<?php echo $resultado3['tec_codigo']?>"><?php echo $resultado3['tec_tecnica']?></option>
            <?php  } ?>
            </select>

          <li class = "ListasEdicao">Formação:</li><input class = "inputtextoEditar" name = "formacao" required value="<?php echo $resultado2['art_formacao']; ?>">
          <br>

          <li class = "ListasEdicao">Biografia:</li><input class = "inputtextoEditar" name = "biografia" required value="<?php echo $resultado2['art_peqbio']; ?>">
          <br>
          <br>
          
          <li class = "ListasEdicao">Foto do perfil:</li>
          <input type="file" class = "FotoPerfilEditar" style ="color:#DFDFC9;" name = "fotoperfil" required> 
          <br>

          <li class = "ListasEdicao">Foto da capa:</li>
          <input type="file" class = "FotoCapa" style = "color:#DFDFC9;" name = "fotocapa" required>
          <br>
          <br>
          <br>


          <center><li class = "ListasEdicao"><button class="botaoEdicao" type = "submit" value = "atualizar">Atualizar</button></li></center>
        </form>
        
      </ul>
    </div>

    <div class = "linhacentral"></div>

    <div class = "inserirarte">
      <ul align = "right">

        <center><li class = "ListasEdicao">Adicionar Arte</li></center> 
        <br>

        <form method="POST" action="indexobra.php" enctype="multipart/form-data">
          <li class = "ListasEdicao">Inserir imagem:</li class = "Listas"> <input type="file" name="arte" class = "FotoArte" style = "color:#DFDFC9;" required>
            <br>
            <li class = "ListasEdicao">Título:</li> <input class = "inputtextoEditar" name = "titulo" required >
            <br>
            <li class = "ListasEdicao">Dimensões:</li> <input class = "inputtextoEditar" name = "dimensao" required>
            <br>
            <li class = "ListasEdicao">Legenda:</li> <input class = "inputtextoEditar" name = "legenda" required>
            <br>
            <li class = "ListasEdicao">Ano de produção:</li> <input type="date" class="inputdata" name = "anodeproducao" required>
            <br>
            <br>
            <br>


            <center><li class = "ListasEdicao"><button class="botaoEdicao" type = "submit" value = "cadastrar">Adicionar</button></li></center>

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