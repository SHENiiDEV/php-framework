<?php

namespace fw\core;

class Router
{

  /**
   * таблица маршрутов
   * @var array
   */
  protected static $routes = [];

  /**
   * текущий маршрут
   * @var array
   */
  protected static $route = [];

  /**
   * добавляет маршрут в таблицу маршрутов
   *
   * @param string $regexp регулярное выражение маршрута
   * @param array $route маршрут ([controller, action, params])
   */
  public static function add($regexp, $route = [])
  {
    self::$routes[$regexp] = $route;
  }

  /**
   * возвращает таблицу маршрутов
   *
   * @return array
   */
  public static function getRoutes()
  {
    return self::$routes;
  }

  /**
   * возвращает текущий маршрут (controller, action, [params])
   *
   * @return array
   */
  public static function getRoute()
  {
    return self::$route;
  }

  /**
   * ищет URL в таблице маршрутов
   * @param string $url входящий URL
   * @return boolean
   */
  public static function matchRoute($url)
  {
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#$pattern#i", $url, $matches)) {
        //debug($matches);
        foreach ($matches as $k => $v) {
          if (is_string($k)) {
            $route[$k] = $v;
          }
        }

        //debug($route);

        if (!isset($route['action'])) {
          $route['action'] = 'index';
        }

        // prefix for admin controllers
        if (!isset($route['prefix'])) {
          $route['prefix'] = '';
        } else {
          $route['prefix'] .= '\\';
        }



        $route['controller'] = self::upperCamelCase($route['controller']);

        //debug($route);

        self::$route = $route;
        return true;
      }
    }
    return false;
  }

  /**
   * перенаправляет URL по корректному маршруту
   * @param string $url входящий URL
   */

  public static function dispatch($url)
  {

    $url = self::removeQueryString($url);

    if (self::matchRoute($url)) {
      $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';
      if (class_exists($controller)) {
        $cObj = new $controller(self::$route);
        $action = self::lowerCamelCase(self::$route['action']) . "Action";
        if (method_exists($cObj, $action)) {
          $cObj->$action();
          $cObj->getView();
        } else {
          //echo "Метод <strong>$controller::$action</strong> не найден";
          throw new \Exception("Метод <strong>$controller::$action</strong> не найден", 404);
        }
      } else {
        //echo "Контроллер <strong>$controller</strong> не найден";
        throw new \Exception("Контроллер <strong>$controller</strong> не найден", 404);
      }
    } else {
      throw new \Exception('Страница не найдена', 404);
    }
  }

  protected static function upperCamelCase($name)
  {
    // убираем дефис
    $name = str_replace('-', ' ', $name);
    // каждое новое слово в верхний регистр
    $name = ucwords($name);
    // убираем пробел
    $name = str_replace(' ', '', $name);
    // возвращаем результат
    return $name;
  }

  protected static function lowerCamelCase($name)
  {
    // делаем первую букву маленькой
    return lcfirst(self::upperCamelCase($name));
  }

  protected static function removeQueryString($url)
  {

    if ($url) {

      $params = explode('&', $url, 2);

      if (false === strpos($params[0], '=')) {
        return rtrim($params[0], '/');
      } else {
        return '';
      }

    }
  }

}