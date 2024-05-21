<?php
    include_once('conexao.php');
    if(isset($_POST['update']))
    {
        $nome = $_POST['nome_pessoa'];
        $cpf = $_POST['cpf'];
        $email = $_POST['email'];
        $data= $_POST['data_nasc'];
        
        $sqlInsert = "UPDATE pessoa 
        SET nome_pessoa='$nome',cpf=$cpf', email='$email', data_nasc='$data'
        WHERE id_pessoa=$id";
        $result = $conexao->query($sqlInsert);
        print_r($result);
    }
    header('Location: dadosPessoais.php');

?>