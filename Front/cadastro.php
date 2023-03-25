<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Style/style.css">
    <title>Cadastro</title>
</head>
<body>
    <header class="topo2">
        <picture>
            <img src="../img/senai.png" alt="logo" class="logo2">
        </picture>

        <nav>
            <div class="button-borders">
                <button class="primary-button"><a href="index.html">Home</a>
                </button>
            </div>
        </nav>
    </header>

    <main id="background">
        <section id="registro">
            <div id="caixa">
                <div id="registre-se">
                    <h1>Cadastre-se</h1>
            </div>
                <div id="registro-registrar">
                    <form action="" method="POST">
                        <!--        Nome         -->
                        <div class="form-formulario-nome">
                            <label for="nome">Nome:</label>
                            <div class="input-wrapper">
                                <input type="text" placeholder="Insira o nome" name="nome" class="input">
                            </div>
                        </div>
                        <!--                     EMAIL                   -->
                        <div class="form-formulario-email">
                            <label for="email">Email:</label>
                            <div class="input-wrapper">
                                <input type="text" placeholder="insira o email" name="email" class="input">
                            </div>
                        </div>

                        <div class="form-formulario-usuario">
                            <label for="login">Login:</label>
                            <div class="input-wrapper">
                                <input type="text" placeholder="Insira o login" name="login" class="input">
                            </div>
                        </div>

                        <div class="form-formulario-senha">
                            <label for="senha">Senha:</label>
                            <div class="input-wrapper">
                                <input type="password" placeholder="Insira a senha" name="senha" class="input">
                            </div>
                        </div>

                        <div class="container">
                            <input type="checkbox" id="cbx" style="display: none;">
                            <label for="cbx" class="check">
                                <svg width="18px" height="18px" viewBox="0 0 18 18">
                                    <path d="M1,9 L1,3.5 C1,2 2,1 3.5,1 L14.5,1 C16,1 17,2 17,3.5 L17,14.5 C17,16 16,17 14.5,17 L3.5,17 C2,17 1,16 1,14.5 L1,9 Z"></path>
                                    <polyline points="1 9 7 14 15 4"></polyline>
                                </svg>
                            Não sou um robô</label>
                        </div>
                        <div class="button-borders">
                            <a href="login.php"><button class="primary-button" type="submit">Cadastrar-se</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>
</body>
</html>

<?php
    include("../conexao.php");

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $sql = "INSERT INTO usuario(nome, email, login, senha) VALUES (:nome, :email, :login, :senha)";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":email", $email);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $result = "Registrado com sucesso";
        }else {
            $result = "falha ao registrar o usuário";
        }
        echo "<script>alert('{$result}'); window.location.href = 'index.html'</script>";
    }


    include("../config/rodape.php");
?>