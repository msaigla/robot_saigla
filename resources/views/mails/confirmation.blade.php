<!DOCTYPE html>
<html>
<head>
    <title>Подтверждение Email</title>
</head>
<body>
    <h1>Спасибо за регистрацию.</h1>
    <p>
        Вам необходимо <a href="{{url("register/confirm/{$user->token}")}}"> подтвердить свой адрес электронной почты.</a>
    </p>
</body>
</html>