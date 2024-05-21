<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Dados de Telefone</title>
</head>
<body>
<div class="tudo">
      <article class="article">
        <h1 class="titulo">AGENDA DE CONTATOS</h1>
        <img class="imagem" src="https://img.freepik.com/vetores-premium/livro-de-contatos-da-agenda-telefonica-ou-notebook-estilo-minimalista-dos-desenhos-animados_645574-97.jpg" alt="">
      </article>
      
      <aside class="aside4">
        <header class="header4">
            <h2 class="titulo4">Dados de Telefone</h2>
            <div class="pesquisar">
                <select class="seletorEstado" name="estado" id="estado">
                    <option value="">Selecione o Contato</option>
                </select>
          </div>
        </header>
        <main class="main4">

            <form method="POST">
                <input class="formTelefoneComer" type="text" name="nome" id="formNome" placeholder="Telefone Comercial:" >
                <input class="formTelefoneResi" type="text" name="cpf" id="formCpf" placeholder="Telefone Residêncial:" >
                <input class="formTelefoneCelular" type="text" name="cpf" id="formCpf" placeholder="Telefone Celular:" required>
                <button input="submit"  class="botao"type="submit" name="submit" id="submit">Salvar</button>
            </form>
        </main>
      </aside>
    </div>
</body>
</html>