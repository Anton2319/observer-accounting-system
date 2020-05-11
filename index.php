<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">Система учета наблюдателей</a>
            </li>
        </ul>
    </nav>  
    <div class="container">
        <div class="row">
            <div class="col loginblock">
                <form action="interface/auth.php" method="post">
                    <input name="login" placeholder="Логин (ваш email)" type="login" class="form-control">
                    <br>
                    <input name="password" placeholder="Пароль" type="password" class="form-control">
                    <br>
                    <input value="Вход" type="submit" class="form-control btn btn-outline-primary">
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
