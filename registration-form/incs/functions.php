<?php

function debug($data){
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function load($data){
    foreach ($_POST as $k => $v) {
        if(array_key_exists($k, $data)){
            $data[$k]['value'] = trim($v);
        }
    }
    return $data;
}

function validate($data){
    $errors = '';
    foreach ($data as $k => $v) {
        if($data[$k]['required'] && empty($data[$k]['value'])){
            $errors .= "<li>Вы не заполнили поле {$data[$k]['field_name']}</li>";
        }
    }
    return $errors;
}

function make_file($data){
    $json_data = json_encode($data);
    $file_name = 'form_' . date('Ymd_His') . '.json';
    if (!file_put_contents("applications/$file_name", $json_data, LOCK_EX)) {
        die("Не удалось сохранить данные в файл.");
    }
}
