<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p><b>Name : </b><?=$body_message['name']?></p>
    <p><b>Email : </b><?=$body_message['email']?></p>
    <br>
    <p><b>Message :</b></p>
    <p><?=$body_message['message_body']?></p>
</body>
</html>