<?php if ($_GET['page'] == 'reg') : ?>
    <?php if ($_POST['login'] && $_POST['password']) :
        $res = User::registration();
        if ($res === true) : ?>
            <script>
                window.location.href = '/'
            </script>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                <?= $res ?>
            </div>
        <?php endif; ?>
    <?php endif; ?>
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

<?php elseif ($_GET['page'] == 'auth') : ?>
    <?php if ($_POST['login'] && $_POST['password']) :
        $res = User::login();
        if ($res !== false) : ?>
            <script>
                window.location.href = '/'
            </script>
        <?php else : ?>
            <div class="alert alert-danger" role="alert">
                The data incorrected. Please, try again.
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <h1>Authorization</h1>
    <form method="POST" action="/user/?page=auth" accept-charset="UTF-8" role="form" class="form-signin" name="auth">
        <fieldset>
            <input required class="form-control" placeholder="Login" name="login" type="text">
            <input required class="form-control middle" placeholder="Password" name="password" type="password" value="">
            <input class="btn btn-lg btn-primary btn-block" type="submit" value="Login">
        </fieldset>
    </form>

<?php elseif ($_GET['page'] == 'logout') : ?>
    <?php
    unset($_SESSION["str_access"], $_SESSION["arUser"]);
    header('Location: /user/?page=auth');
    exit;
    ?>
<?php else : ?>
    <?php include __DIR__ . '/user_task_list.php'; ?>
<?php endif; ?>

