<?php
    require_once 'usuario.php';
    $usuario = new Usuario();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    <h2>CADASTRO DE USUÁRIO</h2>
    <form action="">
        <label>Nome:</label>
        <input type="text" name="nome" id="" placeholer="Digite seu Nome.">
        <label>Telefone:</label>
        <input type="text" name="tel" id="" placeholer="Digite seu Telefone.">
        <label>Email:</label>
        <input type="email" name="email" id="" placeholer="Digite seu Email.">
        <label>Senha:</label>
        <input type="password" name="senha" id="" placeholer="Digite sua Senha.">
        <label>Confirmar Senha:</label>
        <input type="password" name="confSenha" id="" placeholer="Confeirme sua Senha.">
        <input type="submit" value="CADASTRAR">
        <a href="index.php">VOLTAR</a>
    </form>    

</body>
</html>

    <?php
        if(isset($_POST['nome']))
        {
            $nome = $_POST['nome'];
            $telefone = $_POST['tel'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $confSenha = addcslashes($_POST['confSenha']);

            //verificar se todos os campos estão preenchidos
            if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confSenha))
            {
                $usuario->conectar("cadastroturma32", "localhost", "root", "");
                if($usuario->msgErro == "")
                {
                    if($senha == $confSenha)
                    {
                        if($usuario->cadastrar($nome, $telefone, $email, $senha))
                        {
                            ?>

                            <!-- essa parte pertence ao HTML  -->
                            <div id="msn-sucesso">
                                Cadastro com Sucesso. Clique <a href="index.php">aqui</a> para logar.
                            </div>
                            <!-- fim da área do HTML  -->

                            <?php
                        }
                        else
                        {
                            ?>
       
                                   <!-- essa parte pertence ao HTML  -->
                                   <div id="msn-sucesso">
                                       Email já cadastrado.
                                   </div>
                                   <!-- fim da área do HTML  -->
                                   
                                   <?php
                        }
                    }
                    else 
                    {
                        ?>

                        <!-- essa parte pertence ao HTML  -->
                        <div id="msn-sucesso">
                            Senha e Confirma senha não conferem .
                        </div>
                        <!-- fim da área do HTML  -->
                        
                        <?php
                    }
                }
                else 
                {
                    ?>

                    <!-- essa parte pertence ao HTML  -->
                    <div id="msn-sucesso">
                            <?php echo "ERRO:" .usuario->msgErro;?>
                    </div>
                    <!-- fim da área do HTML  -->
                    
                    <?php
                }
                
            }
            else 
            {
                ?>

                <!-- essa parte pertence ao HTML  -->
                <div id="msn-sucesso">
                    Preencha todos os campos.
                </div>
                <!-- fim da área do HTML  -->
                
                <?php
            }
        }
        
    ?>