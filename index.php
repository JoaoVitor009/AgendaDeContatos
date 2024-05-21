<?php 
  include_once('conexao.php');

  $sql = "SELECT * FROM pessoa ORDER BY id_pessoa ASC";

  
  if (!empty($_GET['search'])){
    $data = $_GET['search'];
    $sql = "SELECT * FROM pessoa WHERE id_pessoa LIKE '%$data%' or nome_pessoa LIKE '%$data%' or cpf LIKE '%$data%' or email LIKE '%$data%' or data_nasc LIKE '%$data%'  ORDER BY id_pessoa ASC";
  }else{
    $sql = "SELECT * FROM pessoa ORDER BY id_pessoa ASC";
  }
  
  $resultado = $conexao->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Agenda de Contatos</title>
</head>
<body>
    <div class="tudo">
      <article class="article">
        <h1 class="titulo">AGENDA DE CONTATOS</h1>
        <img class="imagem" src="https://img.freepik.com/vetores-premium/livro-de-contatos-da-agenda-telefonica-ou-notebook-estilo-minimalista-dos-desenhos-animados_645574-97.jpg" alt="">
      </article>
      
      <aside class="aside">
        <header class="header">
          <div class="pesquisar">
            <label for="searchInput"></label>
            <input type="text" id="searchInput" placeholder="Pesquisar">
            <button onclick='searchData()' class="btn btn-primary">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
              </svg>
            </button>
          </div>  

        </header>
        <main class="main">
          <h2 class="titulo2">Meus Contatos</h2>
          <div class="table">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Id</th>
                  <th scope="col">Nome</th>
                  <th scope="col">CPF</th>
                  <th scope="col">E-mail</th>
                  <th scope="col">Data de Nascimento</th>
                  <th scope="col">...</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  while($user_data = mysqli_fetch_assoc($resultado)){
                    echo "<tr>";
                    echo "<td>".$user_data['id_pessoa']."</td>";
                    echo "<td>".$user_data['nome_pessoa']."</td>";
                    echo "<td>".$user_data['cpf']."</td>";
                    echo "<td>".$user_data['email']."</td>";
                    echo "<td>".$user_data['data_nasc']."</td>";
                    echo "<td>
                      <a class='btn btn-sm btn-primary' href='edit.php?id_pessoa=$user_data[id_pessoa]'>
                      <svg xmlns='http://www.w3.org/2000/svg' width='16' height=''16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                      <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/>
                      </svg>
                      </a>
                      <a class='btn btn-sm btn-danger' href='delete.php?id_pessoa=$user_data[id_pessoa]'>
                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                          <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0'/>
                        </svg>
                      </a>
                    </td>";
                    echo "</tr>";
                  }
                ?>
              </tbody>
            </table>
          </div>
          
        </main>
        <footer class="footer">
        <button class="btn btn-success" onclick="window.location.href='dadosPessoais.php'">Adicionar</button>
        </footer>
      </aside>
    </div>
 







    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

<script>
  var search=document.getElementById('searchInput');

  search.addEventListener("keydown", function(event){
    if (event.key === "Enter"){
      searchData();
    }
  });             

  function searchData(){
    window.location = 'index.php?search='+search.value;
  }
</script>

</html>