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
        $admin = config('terracotta.namespace') . Str::of(Route::current()->resource)->singular()->title();
        if (class_exists($admin)) {
            $this->model = $admin::$model;
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
}
