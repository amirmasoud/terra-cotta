<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Tag;
use App\Role;
use App\Type;
use App\User;
use App\Key;
use App\Icon;
use App\Field;
use App\Group;
use App\Category;
use App\Policies\TagPolicy;
use App\Policies\IconPolicy;
use App\Policies\RolePolicy;
use App\Policies\KeyPolicy;
use App\Policies\TypePolicy;
use App\Policies\UserPolicy;
use App\Policies\FieldPolicy;
use App\Policies\GroupPolicy;
use App\Policies\CategoryPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Category::class   => CategoryPolicy::class,
        Field::class      => FieldPolicy::class,
        Group::class      => GroupPolicy::class,
        Icon::class       => IconPolicy::class,
        Key::class       => KeyPolicy::class,
        Tag::class        => TagPolicy::class,
        Type::class       => TypePolicy::class,
        User::class       => UserPolicy::class,
        Role::class       => RolePolicy::class,
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
