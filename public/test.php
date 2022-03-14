<?php

require __DIR__ . '/rb.php';
$db = require __DIR__ . '/../config/config_db.php';
R::setup($db['dsn'], $db['user'], $db['pass'], $options);

// распечатка всех запросов
R::fancyDebug(true);

// заморозить структуру таблицы
//R::freeze(true);

// проверяем соединение с БД
//var_dump(R::testConnection());


// Create

// подготавливаем
//$cat = R::dispense('category');
//$cat->title = 'Категория 3';

// сохраняем
//$id = R::store($cat);


// Read чтение данных
//$cat = R::load('category', 2);

// echo $cat->title; // работа с объектом
//echo $cat['title']; // работа с массивом


// update
// получаем данные
//$cat = R::load('category', 3);
//echo $cat->title . '<br>';
//$cat->title = 'Категория 3';

// и сохраняем
//R::store($cat);

//echo $cat->title . '<br>';

// Delete
// удаление записи

// получаем объект записи
//$cat = R::load('category', 2);
//R::trash($cat);

// если мы хотим удалить все записи из таблицу

//R::wipe('category');


// получаем все записи из указанной таблицы
//$cats = R::findAll('category');
//$cats = R::findAll('category', 'id > ?', [2]); // по условию
//$cats = R::findAll('category', 'title LIKE ?', ['%2%']); // по условию
//$cats = R::findOne('category', 'title LIKE ?', ['%2%']); // по условию



//echo '<pre>';
//print_r($cats);
//echo '</pre>';