<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>LS Rose Online- Reset de Senha</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
<table align="center"  cellpadding="0" cellspacing="0" width="600">
    <tr>
        <td align="center" bgcolor="#FF8C1F">
            <img src="http://lsrose.com.br/images/logo2.png" alt="Rose Revised Logo" width="200" style="display: block;" />
        </td>
    </tr>
    <tr>
        <td style="padding: 20px; font-family: Arial" bgcolor="#ffffff">
            Prezado {{$user->Account}},<br>
            <br>
            Você nos solicitou a redefinição da sua senha. Para alterar a sua senha visite o link abaixo.<br>
            <br>
            <a href="http://lsrose.com.br/account/passreset?user={{$user->Account}}&token={{$user->token}}">http://lsrose.com.br/account/passreset?user={{$user->Account}}&token={{$user->token}}</a><br>
            <br>
            Se não conseguir abrir o link clicando nele, copie e cole na barra de navegação do seu navegador.<br>
            <br>
            Não esqueceu sua senha? Então você pode ignorar ou deletar esse e-mail.<br>
            Caso esteja recebendo esse e-mail sem ter solicitado, nos envie um ticket informando essa situação, para investigarmos!<br>
            <br>
            Abraços,<br>
            Staff LS Rose<br>
            <br>
            <a href="http://lsrose.com.br">www.lsrose.com.br</a><br>
            support@lsrose.com.br

        </td>
    </tr>
    <tr>
        <td style="color: gainsboro; padding: 10px;" height="50px" align="center" bgcolor="#1C1D1F">
            <h1 style="font-size: 12px;">&copy; 2020 - LS Rose</h1>
        </td>
    </tr>
</table>
</body>
</html>