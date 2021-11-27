<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>LS Rose Online - Ticket de suporte recebido</title>
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
            O usuario {{$ticket->Account}} acaba de registrar um novo ticket de suporte!<br>
            <br>
            <h3>{{$ticket->id}} - {{$ticket->title}} | {{$ticket->department}}</h3>
                {{$ticketmessage->message}}

            <br>
            Favor averiguar o problema.<br>
            <br>
            <a href="https://lsrose.com.br">Link Spawn Rose Online</a><br>
            support@lsrose.com.br

        </td>
    </tr>
    <tr>
        <td style="color: gainsboro; padding: 10px;" height="50px" align="center" bgcolor="#1C1D1F">
            <h1 style="font-size: 12px;">&copy; {{ date('Y') }} - LS Rose Online</h1>
        </td>
    </tr>
</table>
</body>
</html>