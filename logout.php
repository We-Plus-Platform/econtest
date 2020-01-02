<?php
/**
 * Created by PhpStorm.
 * User: Byron
 * Date: 2018/4/25
 * Time: 22:54
 */

// include 'session.php';
include 'configure.php';
// session_set_save_handler($handler, true);
session_start();
session_destroy();
header("Location: index.php");
