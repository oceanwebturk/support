<?php

namespace OceanWT\Support;

class ServiceProvider
{
    use Traits\Macro;
    /**
     * @var \OceanWT\OceanWT
     */
    public $app;
    
    /**
     * @var \OceanWT\Http\Route
     */
    public $route;
    
    /**
     * @var \OceanWT\Database\DB
     */
    public $db;

    /**
     * @var array
     */
    public static $providers = [];
    
    public function __construct()
    {
     $this->app=new \OceanWT\OceanWT();
     $this->db=new \OceanWT\Database\DB();
     $this->route=new \OceanWT\Http\Route();
    }

    public static function default()
    { 
        self::$providers = [];
        return new self();
    }

    /**
     * @param  array  $providers
     */
    public static function merge(array $providers)
    {
        self::$providers = array_merge(self::$providers, $providers);
        return new self();
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
        return self::$providers;
    }
    
    /**
     * @param  string $name
     */
    public static function loadRoutes(string $name)
    {
        require($name);
    }

    /**
     * @param  string $path
     * @param  string $namespace
     */
    public static function loadViews(string $path,string $namespace)
    {
     View::$paths[$namespace]=$path;
    }
}
