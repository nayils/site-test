<?php
$title = "Авторизация";

require_once('utils/paths.php');

require_once(getRootPath('services/commons.php'));
require_once(getRootPath('services/auth.php'));
require_once(getRootPath('templates/header.php'));

if (isAuth()) {
  redirect('/admin/products');
}

$error = null;
if (array_key_exists('email', $_POST) && array_key_exists('password', $_POST)) {
  $email = htmlspecialchars($_POST['email']);
  $password = htmlspecialchars($_POST['password']);

  if (login($email, $password)) {
    redirect('/admin/products');
  } else {
    $error = 'Ошибка входа!';
  }
}
?>

<?php
if ($error) {
  showError($error);
}
?>

<div class="row justify-content-center">
  <div class="col-md-6">
    <h1 class="text-center mb-4">Вход в систему</h1>

    <form method="POST" action="#">
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Пароль</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <button type="submit" class="btn btn-primary w-100">Войти</button>
    </form>

    <div class="mt-3 text-center">
      <p>Нет аккаунта? <a href="register.php">Зарегистрируйтесь</a></p>
    </div>
  </div>
</div>

<?php require_once(getRootPath('templates/footer.php')) ?>