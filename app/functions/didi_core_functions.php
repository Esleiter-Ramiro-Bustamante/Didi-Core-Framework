<?php

function to_object($array) {
  return json_decode(json_encode($array));
}

function get_sitename() {
  return 'Didi framework';
}

function now() {
  return date('Y-m-d H:i:s');
}
