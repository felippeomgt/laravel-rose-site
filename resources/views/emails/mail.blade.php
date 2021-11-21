<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>LS Rose Online - Verificação de Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
<table align="center"  cellpadding="0" cellspacing="0" width="600">
    <tr>
        <td align="center" bgcolor="#FF8C1F">
            <img src="https://lsrose.com.br/images/logo_website.png" alt="LS ROSE Logo" width="200" style="display: block;" />
        </td>
    </tr>
    <tr>
        <td style="padding: 20px; font-family: Arial" bgcolor="#ffffff">
            Prezado {{$user->Account}},<br>
            <br>
            Seja muito bem vindo ao Link Spawn ROSE Online!
            Antes de começar a sua aventura, precisamos verificar sua conta.
            Para verificar sua conta clique no link abaixo.
            <br>
            <br>
            <a href="https://lsrose.com.br/account/verify/{{$user->Account}}/{{$user->token}}">https://lsrose.com.br/account/verify/{{$user->Account}}/{{$user->token}}</a><br>
            <br>
            Se clicar no link não funcionar, copie e cole a URL no seu navegador.<br>
            <br>
            Te desejamos sorte no LS Rose, esperamos que se divirta muito conosco!<br>
            <br>
            Agradecimentos,<br>
            Staff Link Spawn<br>
            <br>
            <a href="https://lsrose.com.br">Link Spawn Rose Online</a><br>
            support@lsrose.com.br

        </td>
    </tr>
    <tr>
        <td style="color: gainsboro; padding: 10px;" height="50px" align="center" bgcolor="#1C1D1F">
            <h1 style="font-size: 12px;">&copy; 2021 - LS Rose Online</h1>
        </td>
    </tr>
</table>
</body>
</html>