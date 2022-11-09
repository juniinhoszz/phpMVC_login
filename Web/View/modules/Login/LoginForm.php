<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        label, input { display: block;}
        body{
        font-family: Arial, Helvetica, sans-serif;
    }
    </style>
</head>
<body>
    <form action="/login/auth" method="post">
        <fieldset>
            <legend style=" color:white">Login</legend>

            
            <label for="usuario" style="color: white;">Usuário:</label>
            <input name="usuario" id="usuario" type="text" style="background:#484d50; color:white; height:20px;" />

            <label for="senha" style="color: white;">Senha:</label>
            <input name="senha" id="senha" type="password" style="background:#484d50; color:white; height:20px;" />
            <br>
            <button type="submit" style="background-color:#484d50 ; height:35px; width:65px; font-size:17px;color:white">Entrar</button>


            <div style="display: flex;">
            <a href="/signin"><p style="color: white;font-size: 8; margin-right: 10px;">Cadastro de Usuários</p></a>
            <a href="/"><p style="color: white;font-size: 8; margin-left: 10px;">Esqueci a senha</p></a>
            </div>
        </fieldset>
    </form>    

<style>
        body{
            background-color: #2e2e2e;
        }
        


    </style>

</body>
</html>