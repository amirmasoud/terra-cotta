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
     * @return Illuminate\Database\Eloquent\Model|null
     */
    public function __construct()
    {
        $class = config('terracotta.model.namespace') . Str::of(Route::current()->resource)->singular()->title();
        if (class_exists($class)) {
            $this->model = $class;
        }
    }

    /**
     * List of model relations.
     *
     * @return array
     */
    public function relations()
    {
        $reflector = new \ReflectionClass($this->model);
        foreach ($reflector->getMethods() as $reflectionMethod) {
            $returnType = $reflectionMethod->getReturnType();
            if ($returnType) {
                if (in_array(class_basename($returnType->getName()), ['HasOne', 'HasMany', 'BelongsTo', 'BelongsToMany', 'MorphToMany', 'MorphTo'])) {
                    $relation = [];
                    $relation['type'] = class_basename($returnType->getName());
                    $relation['name'] = $reflectionMethod->name;
                    $relation['class'] = $reflectionMethod->class;
                    $relations[] = $relation;
                }
            }
        }
        return $relations;
    }

    // /**
    //  * Invoke method on the model.
    //  *
    //  * @param string $name
    //  * @param array $arguments
    //  * @return mixed
    //  */
    // public static function __callStatic($name, $arguments)
    // {
    //     if (empty($arguments)) {
    //         return [self::model(), $name]();
    //     } else {
    //         return [self::model(), $name]($arguments);
    //     }
    // }

    // public function __construct()
    // {
    //     $model = self::model();
    //     $this->model = new $model;
    // }

    // public function __call($name, $arguments)
    // {
    //     self::model()->{$name}($arguments);
    // }
}
