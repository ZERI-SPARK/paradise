<?php

require_once '../component.php';

if (is_session_started() === FALSE) session_start();

unset($_SESSION['cart']);

echo "<script>window.history.go(-1);</script>";
