<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Пользователи</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary " data-bs-theme="dark">
    <div class="container-fluid container d-flex justify-content-between">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?php echo BASE_URL; ?>">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL . '/users'; ?>">Пользователи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo BASE_URL . '/news'; ?>">Новости</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<form action="<?php echo BASE_URL . '/news/create'; ?>">
    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="exampleFormControlInput1" class="form-label">User name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Андрей">
        </div>
    </div>

    <div class="row g-3 align-items-center">
        <div class="col-auto">
            <label for="exampleFormControlInput1" class="form-label">User password</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="1234">
        </div>
    </div>
    <div class="p-3">
            <input type="submit" value="Отправить">
    </div>
</form>

</html>