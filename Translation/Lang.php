<?php

namespace OceanWT\Support\Translation;

class Lang
{

 /**
  * @var array
  */
 public static $paths=[
  GET_DIRS["LANGS"],
  'system'=>__DIR__.'/',
 ],$langs=[];

 /**
  * @var string
  */
 public static $appLang,$sysLang="tr";

 /**
  * @param  string $name
  */
 public static function get(string $name)
 {
   $args=self::setData($name);
   $fileName=$args[1].".php";
   if(file_exists($args[0].self::$appLang."/".$fileName)){
    $file=$args[0].self::$appLang."/".$fileName;
   }elseif(file_exists(self::$paths[$args[0]].self::$sysLang."/".$fileName)){
    $file=self::$paths[$args[0]].self::$sysLang."/".$fileName;
   }else{
    throw new \Exception("Undefined Langs <br>App Lang [".self::$appLang."] | System Lang [".self::$sysLang."]");
   }
   return include($file);
 }

 /**
  * @param string $name
  * @return string|array
  */
 protected static function setData(string $name)
 {
   if(strpos($name,'::')){
    return explode("::",$name);
   }else{
    return [self::$paths[0],$name];
   }
 }

}
