<?php

namespace app\controllers\admin;


use fw\core\base\View;

class TestController extends AppController
{

  public $layout = 'default';

  public function indexAction()
  {
    View::setMeta('Админка :: Заголовок', 'Описание админки', 'Ключевые слова админки');

    $test = 'Тестовая переменная';
    $data = ['test', 2];

    // передача переменных в шаблон
    /*$this->set([
      'test' => $test,
      'data' => $data
    ]);*/

    $this->set(compact('test', 'data'));
  }

  public function testAction()
  {

  }

}