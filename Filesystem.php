<?php 
namespace OceanWT\Support;
class Filesystem
{
 use \OceanWT\Traits\Macro;
 public static function createFile($file,$content){
  file_put_contents($file,$content);
 }
}
