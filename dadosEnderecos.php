<?php 
      include_once('conexao.php');

      $sql_estados = "SELECT id_estado, nome_estado, sigla FROM estado";
      $result_estados = $conexao->query($sql_estados);

      $sql_pessoas = "SELECT id_pessoa, nome_pessoa FROM pessoa";
      $result_pessoas = $conexao->query($sql_pessoas);


      if(isset($_POST['submit'])){
        $id_pessoa = $_POST['id_pessoa'];
        $id_estado = $_POST['id_estado'];
        $cep = $_POST['cep'];
        $cidade = $_POST['cidade'];
        $bairro = $_POST['bairro'];
        $rua = $_POST['rua'];
        $numero = $_POST['numero'];

        $resultEndereco = mysqli_query($conexao, "INSERT INTO endereco(id_pessoa, cep, cidade, bairro, rua, numero) VALUES('$id_pessoa''$cep','$cidade','$bairro', '$rua', '$numero')");
}


?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dados de Endereço</title>
</head>
<body>
<div class="tudo">
      <article class="article">
        <h1 class="titulo">AGENDA DE CONTATOS</h1>
        <img class="imagem" src="https://img.freepik.com/vetores-premium/livro-de-contatos-da-agenda-telefonica-ou-notebook-estilo-minimalista-dos-desenhos-animados_645574-97.jpg" alt="">
      </article>
      
      <aside class="aside3">
        <header class="header3">
          <h2 class="titulo3">Dados de Endereço</h2>
          <div class="pesquisar">
            <select class="seletorEstado" name="estado" id="estado">
              <option value="">Selecione o Contato</option>
            <?php
                  if ($result_pessoas->num_rows > 0) {
                      while($row = $result_pessoas->fetch_assoc()) {
                        echo "<option value='" . $row["id_pessoa"] . "'>" . $row["nome_pessoa"] . "</option>";
                      }
                  }
                  ?>
            </select>
          </div>
          
        </header>
        <main class="main3">

            <form method="POST"> 
                <input class="formCep" type="text" name="cep" id="formNome" placeholder="CEP:" required>
                <select class="seletorEstado" name="estado" id="estado">
                  <option value="">Selecione o Estado</option>
                  <?php
                  if ($result_estados->num_rows > 0) {
                      while($row = $result_estados->fetch_assoc()) {
                          echo "<option value='" . $row["id_estado"] . "'>" . $row["nome_estado"] . " (" . $row["sigla"] . ")</option>";
                      }
                  }
                  ?>
                </select>


                <input class="formCidade" type="text" name="cidade" id="formCpf" placeholder="Cidade:" required>
                <input class="formBairro" type="text" name="bairro" id="formEmail" placeholder="Bairro:" required>
                <input class="formRua" type="text" name="rua" id="formEmail" placeholder="Rua:" required>
                <input class="formRua" type="text" name="numero" id="formEmail" placeholder="Número" required>
                <button input="submit"  class="botao"type="submit" name="submit" id="submit">Salvar</button>
            </form>
        </main>
      </aside>
    </div>
</body>
</html>