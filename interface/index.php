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
            <div class="col">
                <br>
                <h1>Последние добавленные наблюдатели:</h1>
                <br>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col formblock">
                <br>
                <h1>Добавление нового наблюдателя</h1>
                <form action="add.php" method="post">
                    <br>
                    <input name="FIO" placeholder="ФИО" type="text" class="form-control">
                    <br>
                    <input name="borndate" placeholder="Дата рождения (день.месяц.год)" type="text" class="form-control">
                    <br>
                    <input name="email" placeholder="Электронная почта" type="text" class="form-control">
                    <br>
                    <input name="phone" placeholder="Телефон" type="text" class="form-control">
                    <br>
                    <input name="phone" placeholder="Адрес постоянной регистрации" type="text" class="form-control">
                    <br>
                    <h3>Паспорт</h3>
                    <br>
                    <input name="passportsn" placeholder="Серия / Номер" type="text" class="form-control">
                    <br>
                    <input name="issuedby" placeholder="Выдан" type="text" class="form-control">
                    <br>
                    <input name="issuedata" placeholder="Дата выдачи" type="text" class="form-control">
                    <br>
                    <input name="SNILS" placeholder="СНИЛС" type="text" class="form-control">
                    <br>
                    <input name="INN" placeholder="ИНН" type="text" class="form-control">
                    <br>
                    <h3>Банковские реквизиты</h3>
                    <input name="bankname" placeholder="Наименование банка" type="text" class="form-control">
                    <br>
                    <input name="bankINN" placeholder="ИНН банка" type="text" class="form-control">
                    <br>
                    <input name="bankBIK" placeholder="БИК банка" type="text" class="form-control">
                    <br>
                    <input name="bankKORRAcc" placeholder="Корр. счёт банка" type="text" class="form-control">
                    <br>
                    <input name="receiver" placeholder="Получатель" type="text" class="form-control">
                    <br>
                    <input name="personalAcc" placeholder="Лицевой счёт получателя" type="text" class="form-control">
                    <br>
                    <input name="card" placeholder="Карта МИР (Маэстро), сберкнижка и т.д." type="text" class="form-control">
                    <br>
                    <input value="Добавить наблюдателя" type="submit" class="form-control btn btn-outline-primary">
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
