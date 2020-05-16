<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;

trait ResourceModel
{
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
        return $model ?? config('terracotta.model.namespace') . Str::of(Route::current()->resource)->singular()->title();
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

    public function __construct()
    {
        return new self::model();
    }

    public function __call($name, $arguments)
    {
        if (empty($arguments)) {
            return [self::model(), $name]();
        } else {
            return [self::model(), $name]($arguments);
        }
    }
}
