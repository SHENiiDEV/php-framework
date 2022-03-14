<?php

namespace app\controllers;


class PostsController extends AppController
{

  public function indexAction()
  {

    echo "Метод Post::index";

  }

  public function testAction()
  {

    debug($this->route);
    echo "Метод Post::test";

  }

  public function testPageAction()
  {

    echo "Метод Post::testPage";

  }

  public function before()
  {

    echo "Метод Post::before";

  }

}