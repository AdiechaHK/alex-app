<?php

function url($str) {
  return $_SERVER['SCRIPT_NAME'] . '/' . $str;
}

function assets($str) {
  return $_SERVER['HTTP_COOKIE'];
}

?>