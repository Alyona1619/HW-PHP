<?php

require_once __DIR__ . '/incs/data.php';
require_once __DIR__ . '/incs/functions.php';

if(!empty($_POST)){
    debug($_POST);
    $fields = load($fields);
    debug($fields);
    if($errors = validate($fields)){
        debug($errors);
    }else{
        make_file($fields);
        echo 'OK';
    }
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1>Заявка на участие в конференции</h1>
            <form method="post">

                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="form-group">
                    <label for="surname">Фамилия</label>
                    <input type="text" class="form-control" id="suname" name="surname">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="phone">Телефон</label>
                    <input type="tel" class="form-control" id="phone" name="phone">
                </div>

                <div class="form-group">
                    <label for="topic">Тематика конференции</label>
		            <select name="topic">
			            <option value="Бизнес">Бизнес</option>
			            <option value="Технологии">Технологии</option>
			            <option value="Реклама и Маркетинг">Реклама и Маркетинг</option>
		            </select>
                </div>

                <div class="form-group">
                    <label for="payment">Способ оплаты</label>
		            <select name="payment" class="form-select">
			            <option value="WebMoney"> WebMoney</option>
		                <option value="Яндекс.Деньги"> Яндекс.Деньги </option>
		                <option value="PayPal"> PayPal </option>
		                <option value="Кредитная карта"> Кредитная карта </option>
		            </select>
                </div>

                <div class="form-group form-check">
                    <input name="agree" type="checkbox" class="form-check-input" id="agree">
                    <label class="form-check-label" for="agree">Получать рассылку о конференции</label>
                </div>

                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
