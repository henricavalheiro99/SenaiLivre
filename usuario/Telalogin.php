<?php
    include("../config/cabecalho.php");
?>

<form action="" method="POST">
    <label for="login">Login</label>
    <input type="text" name="login" id="login" placeholder="Informe seu login" required>

    <label for="senha">Senha</label>
    <input type="password" name="senha" id="senha" placeholder="Informe sua senha" required>

    <button type="submit">Enviar</button>
    <button type="reset">Limpar</button>
</form>

<?php
    include("../conexao.php");

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $login = $_POST["login"];
        $senha = $_POST["senha"];

        $sql = "SELECT * FROM usuario WHERE login = :login AND senha = :senha";
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":senha", $senha);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            echo "Pode logar";
        }else {
            echo "Não pode logar";
        }
    }

include("../config/rodape.php");
?>