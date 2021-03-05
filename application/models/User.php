<?php

class User
{
    private static function checkUser($user = NULL)
    {
        $db   = Db::getConnection();
        $stmt = $db->prepare("SELECT * FROM users WHERE login = :login");
        $stmt->execute(array('login' => $user));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            return $result;
        } else {
            return false;
        }
    }

    private static function str_access($length = 24)
    {
        $characters       = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString     = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function registration()
    {
        if (!$_POST['login']) {
            return 'Login is empty.';
        } else {
            $check_user = User::checkUser($_POST['login']);
        }
        if (!$check_user):
            if ($_POST['password'] !== $_POST['password_confirmation']) {
                return 'Confirm you password';
            }
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
                return 'Email incorrect.';
            }
            if (
                !empty($_POST['login']) &&
                !empty($_POST['email']) &&
                !empty($_POST['password'])
            ) {
                $str_access = User::str_access() . $_POST['login'];
                $db         = Db::getConnection();
                $stmt       = $db->prepare("INSERT INTO users (login, email, password, permissions, str_access) VALUES (?,?,?,?,?)");
                $stmt->execute(
                    [
                        $_POST['login'],
                        $_POST['email'],
                        md5($_POST['password']),
                        'user',
                        $str_access,
                    ]
                );
                if ($stmt) {
                    $_SESSION["str_access"] = $str_access;
                }
                return true;
            } else {
                return 'Some field is empty.';
            }
        else:
            return 'We have user with this login already. You can enter another login.';
        endif;
    }

    public static function login()
    {
        $db   = Db::getConnection();
        $stmt = $db->prepare("SELECT `id`, `login`, `email`, `permissions` FROM users WHERE login = :login and password = :password");
        $stmt->execute(
            array(
                'login'    => $_POST['login'],
                'password' => md5($_POST['password'])
            )
        );
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            $str_access = User::str_access() . $_POST['login'];
            $stmt2      = $db->prepare("UPDATE users SET str_access=? WHERE id=?");
            $stmt2->execute(
                [
                    $str_access,
                    $result["id"]
                ]
            );
            if ($stmt2) {
                $_SESSION["str_access"] = $str_access;
                return $result;
            } else {
                return false;
            }


        } else {
            return false;
        }
    }

    public static function create($text = '', $name = '', $email = '')
    {
        $db   = Db::getConnection();
        $stmt = $db->prepare("INSERT INTO tasks (status, task_text, login, email) VALUES (?,?,?,?)");
        $stmt->execute(
            array(
                'active',
                $text,
                $name,
                $email,
            )
        );
        if ($stmt) {
            return true;
        }


        return false;
    }
}