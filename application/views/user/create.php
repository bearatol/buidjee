<h1>Create new task.</h1>

<? if ($_POST["task_text"]) : ?>
   <?
   $new_create = true;

   $p_name = $arUser["login"] ? $arUser["login"] : '';
   $p_email = $arUser["email"] ? $arUser["email"] : '';

   $name = $_POST["name"] ? $_POST["name"] : $p_name;
   $email = $_POST["email"] ? $_POST["email"] : $p_email;
   
   if(!empty($email)){
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $new_create = false;
      }
   }
   if (!empty($name) && !empty($_POST["task_text"]) && $new_create) {
      $new_create = User::create($_POST["task_text"], $name, $email);
   }
   ?>
   <? if ($new_create) : ?>
      <div class="alert alert-success" role="alert">
         The task has been created.
      </div>
   <? else : ?>
      <div class="alert alert-danger" role="alert">
         The task has not been created. Try again.
      </div>
   <? endif; ?>
<? endif; ?>

<form method="POST" action="/user/create/" accept-charset="UTF-8" role="form" class="form-signin" name="create">
   <fieldset>
      <? if (!$arUser["login"]) : ?>
         <input required class="form-control" placeholder="Name" name="name" type="text">
         <input class="form-control" placeholder="Email" name="email" type="text">
      <? endif; ?>
      <div class="center input-group">
         <textarea class="form-control" name="task_text" required></textarea>
      </div>
      <br>
      <input class="btn btn-lg btn-primary btn-block" type="submit" value="Create">
   </fieldset>
</form>