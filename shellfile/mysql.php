<?php
/**
 * Created by PhpStorm.
 * User: 93441
 * Date: 2018/10/26
 * Time: 11:01
 */
$user = new mysqli("localhost", "dockertest", "123456","dockertest");
if ($user->connect_error) {
    die("connection failed: " . $user->connect_error);
}