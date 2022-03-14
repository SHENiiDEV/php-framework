<?php

namespace app\controllers;


use app\models\Main;
use fw\core\App;
use fw\core\base\View;
use fw\libs\Pagination;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MainController extends AppController
{

  //public $layout = 'main';
  //public $view = 'main';

  public function indexAction()
  {


    $model = new Main;

    $lang = App::$app->getProperty('lang')['code'];

    $total = \R::count('posts', 'lang_code = ? ', [$lang]);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perpage = 3;

    $pagination = new Pagination($page, $perpage, $total);
    $start = $pagination->getStart();

    $posts = \R::findAll('posts', "lang_code = ? LIMIT $start, $perpage", [$lang]);

    $cars = \R::findAll('fahrzeuge' ,'lang_code = ?', [$lang]);

    if($lang == "ru") View::setMeta( 'Transfer VIP в Берлине и Германии' , 'VIP Transfer в Берлине и Германии - элегантные машины Mercedes последней комплектации! Опытные, прекрасно знающие город, русско-, немецко-, англоговорящие водители', 'Berlin, трансфер, Mercedes, автомобили, аэропорт, Vip');
    elseif($lang == "en") View::setMeta( 'Transfer VIP in Berlin and Germany' , 'VIP Transfer in Berlin and Germany - Mercedes cars, new and elegant with the latest configuration! Experienced, well-know the city, Russian, German, English-speaking driver', 'Berlin, transfer, Mercedes, car, airport, Vip');
    elseif($lang == "de") View::setMeta( 'Transfer VIP in Berlin und Deutschland' , 'Vip Transfer Berlin - Mercedes Fahrzeuge der neuesten Baureihe, erfahrene russisch-, deutsch- und englischsprachige Fahrer mit guten Stadtkentnissen', 'Berlin, Transfer, Mercedes, Fahrzeug, Flughafen, Vip');

    $this->set(compact('posts', 'pagination', 'total', 'cars', 'lang'));
  }

  public function contactAction(){
      $_SESSION['kontakt'] = $_POST;
      Main::mailKontakt($_POST['email']);
      unset($_SESSION['kontakt']);
      redirect('/');
  }
  public function testAction()
  {
    if ($this->isAjax()) {

      $model = new Main();

      //$data = [
       // 'answer' => 'Ответ с сервера',
      //  'code' => 200,
      //];

      //echo json_encode($data);

      $post = \R::findOne('posts', "id = {$_POST['id']}");

      $this->loadView('_test', compact('post'));

      die;
    }
    echo 222;

    //$this->layout = 'test';
  }

}