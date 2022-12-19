<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <title>Confirm Email</title> -->
</head>
<body>
    Hello {{$first_name}} {{$last_name}},<br><br>

    Thank you for registering, please log in using the below URL
    <p>URL: {{$login_url}}</p>
    <p>Username: {{$username}}</p>
    <p>Password: {{$password}}</p><br>

    <br>
    Regards, <br>
    kgdemo Team
</body>
</html>