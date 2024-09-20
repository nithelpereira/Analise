<?php
// Conexão com o banco de dados (substitua com seus dados)
include_once ('conexao.php');



// Verificando a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error); 

}

// Recebendo dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
   

    // Preparando e executando a query SQL
    $sql = "INSERT INTO clientes (nome, email, telefone, endereco) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $nome, $email, $telefone, $endereco);

    if ($stmt->execute()) {
        echo "Cliente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar cliente: " . $stmt->error;
    }

    $stmt->close();
}

$conexao->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Cadastro de Cliente</title>
        </style>
</head>
<body>
           
       
       <h1>Cadastro de Cliente</h1>

    <form action="clientes.php" method="post">
        <label for="nome">Nome:</label>
               <input type="text" id="nome" name="nome" required><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="tel" id="telefone" name="telefone" required><br>
        <label for="endereco">endereco:</label> 
        <input type="text" id="endereco" name="endereco" required><br><br><br><br>

        
        </select>

        <input type="submit" value="Cadastrar">
    </form>
   
</body>
</html>