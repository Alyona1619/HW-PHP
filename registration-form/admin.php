<?php

  if (isset($_POST['delete'])) {
      $forms_to_delete = array_keys($_POST['delete']);
      foreach ($forms_to_delete as $form) {
          $form_path = 'applications/' . $form;
          if (file_exists($form_path)) {
              unlink($form_path);
          }
      }
          
  }
  
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Administrator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
<div class="container-xxl">
<form method="post">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Почта</th>
      <th scope="col">Телефон</th>
      <th scope="col">Тематика</th>
      <th scope="col">Способ оплаты</th>
      <th scope="col">Рассылка</th>
      <th scope="col">Дата-время</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
        $files = glob('applications/' . '*.json');
        $number = 1;
        foreach ($files as $file) {
            $json_data = file_get_contents($file);
            $data = json_decode($json_data, true);

            $name = $data['name'] ?? '';
            $surname = $data['surname'] ?? '';
            $email = $data['email'] ?? '';
            $phone = $data['phone'] ?? '';
            $topic = $data['topic'] ?? '';
            $payment = $data['payment'] ?? '';
            $agree = $data['agree'] ?? '';
            $date = date('d.m.Y H:i:s', filemtime($file)) ?? '';

            $filename = basename($file);
        

            echo "<tr> <th scope='row'>$number</th> <td>$name</td> <td>$surname</td> 
            <td>$email</td> <td>$phone</td> <td>$topic</td> <td>$payment</td>
            <td>$agree</td> <td>$date</td> 
            <td>
              <input type='checkbox' name=\"delete[$filename]\" value=\"$filename\">
            </td>
            </tr>";
            $number++;
        }
    ?>
  </tbody>
</table>
    <input class="btn btn-danger" type="submit" value="Удалить" />
</form>
</div>
</body>
</html>
