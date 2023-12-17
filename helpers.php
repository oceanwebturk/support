<?php 

use OceanWT\Support\Security\CSRF;

if(!function_exists("csrf_meta")){
 function csrf_meta(){
  return CSRF::meta();
 }
}
