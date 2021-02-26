<?php

namespace OTHER;

use \Db;
use \PDO;

class User
{
    public static function getUser()
    {
        if (!empty($_SESSION["str_access"])) {
            $db   = Db::getConnection();
            $stmt = $db->prepare("SELECT `id`, `login`, `email`, `permissions` FROM users WHERE str_access = ?");
            $stmt->execute([$_SESSION["str_access"]]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                return $result;
            }

            return false;
        } else {
            return false;
        }
    }
}

class Task
{
    public static function all_quantity($login = '')
    {
        $db   = Db::getConnection();
        $sql  = !empty($login) ? "SELECT COUNT(*) FROM tasks WHERE login = ?" : "SELECT COUNT(*) FROM tasks";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            [$login]
        );
        $result = $stmt->fetch()[0];
        return $result;
    }

    public static function getList($login = '', $art = 0, $coun = 3, $sort = "id", $order = "ASC")
    {
        $db   = Db::getConnection();
        $sql  = !empty($login) ? "SELECT * FROM tasks WHERE login = ? ORDER BY {$sort} {$order} LIMIT {$art},{$coun}" : "SELECT * FROM tasks ORDER BY {$sort} {$order} LIMIT {$art},{$coun}";
        $stmt = $db->prepare($sql);
        $stmt->execute(
            [$login]
        );
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($result))
            return $result;

        return false;
    }
}

class some_functions
{
    public static function setGET($name, $val, $del = false)
    {
        if (!empty($_GET)) {
            $url   = "?";
            $i     = 0;
            $arGet = $_GET;
            foreach ($arGet as $k => $v) {
                if ($k == $name && $del === false) {
                    $url .= $i != 0 ? "&" : '';
                    $url .= $k . "=" . $val;
                } elseif ($k == $name && $del === true) {
                    continue;
                } else {
                    $url .= $i != 0 ? "&" : '';
                    $url .= $k . "=" . $v;
                }
                $i++;
            }
            if (!isset($arGet[$name])) {
                $url .= $i != 0 ? "&" : '';
                $url .= $name . "=" . $val;
            }
        } else {
            $url = "?{$name}={$val}";
        }
        return $url;
    }
}

