<?php

namespace App\Providers;

use App\Tag;
use App\Type;
use App\User;
use App\Safe;
use App\Icon;
use App\Field;
use App\Group;
use App\Category;
use App\Policies\TagPolicy;
use App\Policies\IconPolicy;
use App\Policies\SafePolicy;
use App\Policies\TypePolicy;
use App\Policies\UserPolicy;
use App\Policies\FieldPolicy;
use App\Policies\GroupPolicy;
use App\Policies\CategoryPolicy;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Category::class => CategoryPolicy::class,
        Field::class    => FieldPolicy::class,
        Group::class    => GroupPolicy::class,
        Icon::class     => IconPolicy::class,
        Safe::class     => SafePolicy::class,
        Tag::class      => TagPolicy::class,
        Type::class     => TypePolicy::class,
        User::class     => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
