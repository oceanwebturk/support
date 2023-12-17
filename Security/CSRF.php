<?php 

namespace OceanWT\Support\Security;
use OceanWT\Config;
class CSRF
{

  /**
   * @return string
   */
  public static function meta()
  {
   return '<meta name="'.(isset(Config::get("security")->csrf['meta_tag']) ? Config::get("security")->csrf['meta_tag'] : 'csrf-token').'" content="'.self::token().'"/>';
  }

  /**
   * @return string
   */
  public static function token()
  {
   return md5(rand().uniqid(true));
  }

  public static function verify()
  {

  }
}
