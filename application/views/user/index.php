<? if ($_GET['page'] == 'reg') : ?>
   <? if ($_POST['login'] && $_POST['password']) :
      $res = User::registration();
      if ($res === true) : ?>
         <script>
            window.location.href = '/'
         </script>
      <? else : ?>
         <div class="alert alert-danger" role="alert">
            <?= $res ?>
         </div>
      <? endif; ?>
   <? endif; ?>
   <h1>Registration</h1>
   <form method="POST" action="/user/?page=reg" accept-charset="UTF-8" role="form" class="form-signin" name="reg">
      <fieldset>
         <input required class="form-control" placeholder="Login" name="login" type="text">
         <input required class="form-control middle" placeholder="E-mail" name="email" type="text">
         <input required class="form-control middle" placeholder="Password" name="password" type="password" value="">
         <input required class="form-control bottom" placeholder="Confirm Password" name="password_confirmation" type="password" value="">
         <input class="btn btn-lg btn-primary btn-block" type="submit" value="Register">
      </fieldset>
   </form>

<? elseif ($_GET['page'] == 'auth') : ?>
   <? if ($_POST['login'] && $_POST['password']) :
      $res = User::login();
      if ($res !== false) : ?>
         <script>
            window.location.href = '/'
         </script>
      <? else : ?>
         <div class="alert alert-danger" role="alert">
            The data incorrected. Please, try again.
         </div>
      <? endif; ?>
   <? endif; ?>
   <h1>Authorization</h1>
   <form method="POST" action="/user/?page=auth" accept-charset="UTF-8" role="form" class="form-signin" name="auth">
      <fieldset>
         <input required class="form-control" placeholder="Login" name="login" type="text">
         <input required class="form-control middle" placeholder="Password" name="password" type="password" value="">
         <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
      </fieldset>
   </form>

<? elseif ($_GET['page'] == 'logout') : ?>
   <? unset($_SESSION["str_access"]); ?>
   <script>
      window.location.href = '/user/?page=auth'
   </script>
<? else : ?>
   <? include __DIR__. '/user_task_list.php'; ?>
<? endif; ?>