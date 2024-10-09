

<?php
        session_start();
        $_SESSION['logged']  = False;

       $login_db = "jansley";
       $senha_db  = "123";
        
       
        
        if (isset($_POST['f_login']) && isset($_POST['f_senha'])) {
            
                if ($_POST['f_login'] == $login_db && $_POST['f_senha'] == $senha_db){    
                
                
                $_SESSION['login'] = $login_db;
                $_SESSION['senha'] = $senha_db;
                $_SESSION['logged']  = True;
                header("Location: index.php");

                } else {

                echo "<script> alert('Usuario ou senha invalidos!');</script>";
                
                }
            }

        if(!$_SESSION['logged']){
            include_once('login.php');

        }else{
            include_once('index.php');
        }
        

    ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>  Login </title>
    <link rel="stylesheet" href="style.css">
</head>


    <div class="telaLogin">
        <fieldset>
            <legend> Login </legend>
                <form name="f_acad" action="" method="post">
                    <label for="usuario">Login:<label>
                    <input type="text" name="f_login" id="login" required>
                    <br><br>

                    <label for="senha">Senha:<label>
                    <input type="password" name="f_senha" id="senha" required>
                    <br><br>

                    <button type="submit" class="bt_login">Login</button>

                </form>
        </fieldset>
    </div>

    
    
</body>
</html>



