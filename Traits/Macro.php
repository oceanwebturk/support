<?php 

namespace OceanWT\Support\Traits;

trait Macro
{
 /**
  * @var array
  */
 protected static $macros=[];

 /**
  * @param  string   $name    
  * @param  callable $callback
  */
 public static function macro(string $name,callable $macro)
 {
   self::$macros[$name]=$macro;
 }
 
 /**
  * @param  string  $name
  * @return boolean      
  */
 public static function hasMacro(string $name)
 {
  return isset(self::$macros[$name]);
 }
 
 /**
  * @return void
  */
 public static function flushMacros()
 {
   static::$macros = [];
 }
 
 /**
  * @param  string $method
  * @param  array  $params
  * @return mixed
  */
 public static function __callStatic(string $method,array $params)
 {
  return self::useClass($method,$params);
 }
 
 /**
  * @param  string $method
  * @param  array  $params
  * @return mixed
  */
 public function __call(string $method,array $params)
 {
  return self::useClass($method,$params);
 }
 
 /**
  * @param  string $method
  * @param  array  $params
  * @return mixed
  */
 public static function useClass(string $method,array $params)
 {
  $macro=self::$macros[$method];
  return $macro(...$params);
 }

}
