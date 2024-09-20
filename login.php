<?php
// Conexão com o banco de dados (substitua com seus dados)
include_once ('conexao.php');



// Verificando a conexão
if ($conexao->connect_error) {
    die("Conexão falhou: " . $conexao->connect_error); 

}

// Recebendo dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    


    // Preparando e executando a query SQL
    $sql = "INSERT INTO login (email, senha) VALUES (?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);

    if ($stmt->execute()) {
        echo "login com sucesso!";
    } else {
        echo "Erro ao fazer login: " . $stmt->error;
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
    
    <title>Login</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color:rgb(125, 190, 255);
        font-size: 25px;
        }
        h1{
            text-align: center;
        }
        header{
            background-color:#435dd1;
             padding: 10px 0;
            text-align: center;
            }
        form {
            max-width: 600px;
            margin: 0 auto;
        }input [submit]{
    font-size: 25px;
}
        label{
            font-size: 25px;
        }
        input{
            font-size: 25px;
        }




      </style>
      </head>
      <body>
        <header>
    <h1>Login</h1>
        </header>

    <form action="processar_cadastro.php" method="post">
        <label for="email">Nome:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">E-mail:</label>
        <input type="text" id="senha" name="senha" required><br><br><br><br>

        <input type="submit" value="login">
    </form>
</body>
</html>
