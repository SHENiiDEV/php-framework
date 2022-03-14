<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php \fw\core\base\View::getMeta(); ?>

    <link rel="stylesheet" href="/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="/css/main.css">
</head>
<body>

<div class="container">
  <ul class="nav nav-pills">
    <li class="nav-item">
      <a href="/" class="nav-link">Home</a>
    </li>
    <li class="nav-item">
      <a href="/admin" class="nav-link">Admin</a>
    </li>
    <li class="nav-item">
      <a href="/user/signup" class="nav-link">SignUp</a>
    </li>
    <li class="nav-item">
      <a href="/user/login" class="nav-link">Login</a>
    </li>
    <li class="nav-item">
      <a href="/user/logout" class="nav-link">Logout</a>
    </li>
  </ul>
    <div class="row">
        <div class="col-md-12">
            <nav class="nav nav-pills flex-column flex-sm-row">
              <?php if(!empty($menu)) {?>
                <?php foreach ($menu as $list) {?>
                      <a class="flex-sm-fill text-sm-center nav-link" href="#"><?php echo $list->title; ?></a>
                <?php }?>
              <?php }?>
            </nav>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['error'])) {?>
  <div class="alert alert-danger">
    <?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
  </div>
<?php } ?>
<?php if (isset($_SESSION['success'])) {?>
  <div class="alert alert-success">
    <?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
  </div>
<?php } ?>

<?php debug($_SESSION); ?>

<?php echo $content; ?>

<script src="/bootstrap/jquery-3.3.1.min.js"></script>
<script src="/bootstrap/bootstrap.min.js"></script>
<?php
  foreach ($scripts as $script) {
    echo $script;
  }
?>
</body>
</html>