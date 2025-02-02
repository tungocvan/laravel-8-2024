<?php

namespace App\Providers;

use Modules\Wordpress\Models\Wordpress;
use Modules\Wordpress\Policies\WordpressPolicy;


use Modules\Help\Models\Help;
use Modules\Help\Policies\HelpPolicy;


use Modules\Test\Models\Test;
use Modules\Test\Policies\TestPolicy;


use Modules\Menu\Models\Menu;
use Modules\Menu\Policies\MenuPolicy;


use Modules\Thuoc\Models\Thuoc;
use Modules\Thuoc\Policies\ThuocPolicy;


use Modules\Category\Models\Category;
use Modules\Category\Policies\CategoryPolicy;


use Modules\Users\Models\Users;
use Modules\Users\Policies\UsersPolicy;


use Modules\Groups\Models\Groups;
use Modules\Groups\Policies\GroupsPolicy;


use Modules\Post\Models\Post;
use Modules\Post\Policies\PostPolicy;

use Laravel\Passport\Passport;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
		Wordpress::class => WordpressPolicy::class,
		Help::class => HelpPolicy::class,
		Test::class => TestPolicy::class,
		Menu::class => MenuPolicy::class,
		Thuoc::class => ThuocPolicy::class,
		Category::class => CategoryPolicy::class,
		Users::class => UsersPolicy::class,
		Groups::class => GroupsPolicy::class,
		Post::class => PostPolicy::class,
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
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
        if (! $this->app->routesAreCached()) {
            Passport::routes();
        }
    }
}
