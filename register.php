<?php
$title = "Регистрация";

require_once('services/commons.php');
require_once('services/auth.php');

if (isAuth()) {
  redirect('/admin/products');
}

$error = null;
if (array_key_exists('name', $_POST) && array_key_exists('email', $_POST) && array_key_exists('password', $_POST)) {
  $name = htmlspecialchars($_POST['name']);
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  $result = registration($email, $password, $name);
  if ($result === true) {
    if (login($email, $password)) {
      redirect('/admin/products');
    } else {
      $error = 'Ошибка входа!';
    }
  } else {
    $error = $result;
  }
}

require_once('templates/header.php');
?>

<?php
if ($error) {
  showError($error);
}
?>

<div class="row justify-content-center">
  <div class="col-md-6">
    <h1 class="text-center mb-4">Регистрация</h1>

    <form action="#" method="POST">
      <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input type="text" class="form-control" name="name" id="name" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Зарегистрироваться</button>
    </form>

    <div class="mt-3 text-center">
      <p>Уже есть аккаунт? <a href="auth.php">Войдите</a></p>
    </div>
  </div>
</div>

<?php require_once('templates/footer.php') ?>