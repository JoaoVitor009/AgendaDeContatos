<?php 
  
    include_once('conexao.php');

    if (isset($_POST['submit'])) {
      $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
      $cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';
      $email = isset($_POST['email']) ? $_POST['email'] : '';
      $data = isset($_POST['data']) ? $_POST['data'] : '';
  

    $sql_check = "SELECT id_pessoa FROM pessoa WHERE cpf = ?";
    $stmt_check = $conexao->prepare($sql_check);
    $stmt_check->bind_param("s", $cpf);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
      echo "Erro: CPF já cadastrado.";//adicionar um alerta depois:
  } else {
    $result = mysqli_query($conexao, "INSERT INTO pessoa(nome_pessoa, cpf, email, data_nasc) VALUES('$nome', '$cpf', '$email', '$data')");
  }
}
?>




<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dados Pessoais</title>
</head>
<body>
<div class="tudo">
      <article class="article">
        <h1 class="titulo">AGENDA DE CONTATOS</h1>
        <img class="imagem" src="https://img.freepik.com/vetores-premium/livro-de-contatos-da-agenda-telefonica-ou-notebook-estilo-minimalista-dos-desenhos-animados_645574-97.jpg" alt="">
      </article>
      
      <aside class="aside2">
        <header class="header">
          
        </header>
        <main class="main2">
            <a href="index.php">Voltar</a>
            <h2 class="titulo2">Dados Pessoais</h2>

            <form action="dadosPessoais.php" method="POST">
                <input class="formNome1" type="text" name="nome" id="formNome" placeholder="Seu Nome:" required>
                <input class="formCpf1" type="text" name="cpf" id="formCpf" placeholder="Seu CPF:" required>
                <input class="formEmail1" type="email" name="email" id="formEmail" placeholder="Seu Email:" required>
                <input class="formData1" type="date" name="data" id="formData" placeholder="Sua data de nascimento:">
                <button input="submit"  class="botao"type="submit" name="submit" id="submit">Salvar</button>
            </form>
        </main>
      </aside>
    </div>
</body>
</html>