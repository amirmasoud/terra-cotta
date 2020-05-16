<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

trait ResourceModel
{
    /**
     * Default model namespace.
     *
     * @var string
     */
    public static $namespace = '\App\\';

    /**
     * Custom model.
     *
     * @var String|Null
     */
    public $model = null;

    /**
     * Return model based on route resource.
     *
     * @return Illuminate\Database\Eloquent\Model
     */
    public static function model()
    {
        return $model ?? static::$namespace . Str::of(Route::current()->resource)->singular()->title();
    }

    /**
     * Invoke method on the model.
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        if (empty($arguments)) {
            return [self::model(), $name]();
        } else {
            return [self::model(), $name]($arguments);
        }
    }

    /**
     * Return model name.
     *
     * @return string
     */
    public function __toString()
    {
        return self::model();
    }
}
