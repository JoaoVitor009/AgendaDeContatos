<?php
    include_once('conexao.php');

    if(!empty($_GET['id_pessoa']))
    {
        $id = $_GET['id_pessoa'];
        $sqlSelect = "SELECT * FROM pessoa WHERE id_pessoa=$id";
        $result = $conexao->query($sqlSelect);
        if($result->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result))
            {
                $nome = $user_data['nome_pessoa'];
                $cpf = $user_data['cpf'];
                $email = $user_data['email'];
                $data= $user_data['data_nasc'];
                
            }
        }
        else
        {
            header('Location: dadosPessoais.php');
        }
    }
    else
    {
        header('Location: index.php');
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
                <input class="formNome1" type="text" name="nome" id="formNome" value=<?php echo $nome;?> placeholder="Seu Nome:" required>
                <input class="formCpf1" type="text" name="cpf" id="formCpf" value=<?php echo $cpf;?> placeholder="Seu CPF:" required>
                <input class="formEmail1" type="email" name="email" id="formEmail" value=<?php echo $email;?> placeholder="Seu Email:" required>
                <input class="formData1" type="date" name="data" id="formData" value=<?php echo $data;?> placeholder="Sua data de nascimento:">
                <input type="hidden" name="id" value=<?php echo $id;?>>
                <button input="submit"  class="botao"type="submit" name="update" id="update">Salvar</button>
            </form>
        </main>
      </aside>
    </div>
</body>
</html>