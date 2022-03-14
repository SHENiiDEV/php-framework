<?php

namespace fw\widgets\menu;


use fw\libs\Cache;

class Menu
{
  protected $data;
  protected $tree;
  protected $menuHtml;
  protected $tpl;
  protected $container = 'ul';
  protected $class = 'menu';
  protected $table = 'categories';
  protected $cache = 3600; // один час

  protected $cacheKey = 'fw_menu';

  public function __construct($options = [])
  {

    $this->tpl = __DIR__ . '/menu_tpl/menu.php';

    $this->getOptions($options);

    $this->run();

  }

  protected function getOptions($options)
  {
    foreach ($options as $k => $v) {

      // если существует свойство текущего класса под название
      if (property_exists($this, $k)) {
        // тогда возьмем значение и запишем в данное свойство
        $this->$k = $v;
      }
    }
  }

  protected function output() {
    echo "<{$this->container} class='{$this->class}'>";
      echo $this->menuHtml;
    echo "</{$this->container}>";
  }

  // метод который будет запускать все прочие методы которые будут запускать меню
  protected function run()
  {
    $cache = new Cache();
    // пытаемся получить меню из кеша
    $this->menuHtml = $cache->get($this->cacheKey);

    // если нет
    if (!$this->menuHtml) {
      $this->data = \R::getAssoc("SELECT * FROM {$this->table}");

      $this->tree = $this->getTree();

      $this->menuHtml = $this->getMenuHtml($this->tree);

      $cache->set($this->cacheKey, $this->menuHtml, $this->cache);
    }
    // если оно там есть
    $this->output();
  }

  protected function getTree()
  {
    $tree = [];

    $data = $this->data;

    foreach ($data as $id=>&$node) {
      if (!$node['parent']){
        $tree[$id] = &$node;
      }else{
        $data[$node['parent']]['childs'][$id] = &$node;
      }
    }

    return $tree;
  }

  protected function getMenuHtml($tree, $tab = '')
  {

    $str = '';
    foreach ($tree as $id => $category) {
      $str .= $this->catToTemplate($category, $tab, $id);
    }

    return $str;

  }

  protected function catToTemplate($category, $tab, $id)
  {
    // включаем буферизация
    ob_start();

    require $this->tpl;

    // возвращаем и очищаем буфер
    return ob_get_clean();
  }

}