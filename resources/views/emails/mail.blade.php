<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Rose Revised - Email verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body style="margin: 0; padding: 0;">
<table align="center"  cellpadding="0" cellspacing="0" width="600">
    <tr>
        <td align="center" bgcolor="#FF8C1F">
            <img src="http://revisedonline.com/images/logo2.png" alt="Rose Revised Logo" width="200" style="display: block;" />
        </td>
    </tr>
    <tr>
        <td style="padding: 20px; font-family: Arial" bgcolor="#ffffff">
            Dear {{$user->Account}},<br>
            <br>
            Welcome to Rose Revised! Before you can start your adventure
            you first have to verify your account. To verify your account
            you can press the link below.<br>
            <br>
            <a href="http://revisedonline.com/account/verify/{{$user->Account}}/{{$user->token}}">http://revisedonline.com/account/verify/{{$user->Account}}/{{$user->token}}</a><br>
            <br>
            If nothing happens when you click the link, please copy it and paste it in your browser.<br>
            <br>
            We wish you best of luck in Rose Revised. Hope to see you in game soon!<br>
            <br>
            Kind regards,<br>
            Rose Revised Staff<br>
            <br>
            <a href="http://revisedonline.com">www.revisedonline.com</a><br>
            support@revisedonline.com

        </td>
    </tr>
    <tr>
        <td style="color: gainsboro; padding: 10px;" height="50px" align="center" bgcolor="#1C1D1F">
            <h1 style="font-size: 12px;">&copy; 2016 - Rose Revised</h1>
        </td>
    </tr>
</table>
</body>
</html>