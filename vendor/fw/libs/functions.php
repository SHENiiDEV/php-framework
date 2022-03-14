<?php

function debug($arr)
{
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
}

function redirect($http = false)
{
  if ($http) {
    $redirect = $http;
  } else {
    $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '/';
  }

  header("Location: $redirect");
  exit;
}

function h($str)
{
  return htmlspecialchars($str, ENT_QUOTES);
}

function __($key)
{
  return \fw\core\base\Lang::get($key);
}

/* gzip сжатие*/
function obSaveCookieAfter($s)
{
  setcookie("page_size_after", strlen($s));
  return $s;
}
// Аналогично, но для Cookie page_size_before.
function obSaveCookieBefore($s)
{
  setcookie("page_size_before", strlen($s));
  return $s;
}
// Устанавливаем конвейер обработчиков.
ob_start("obSaveCookieAfter");
ob_start("ob_gzhandler", 9);
ob_start("obSaveCookieBefore");