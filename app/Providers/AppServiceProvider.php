<?php

namespace App\Providers;

use App\Role;
use App\Type;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        $this->composeDropdownRoles('admin.users.form');
        $this->composeDropdownTypes('admin.interviews.form');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    /**
     * Compose roles for dropdown
     */
    private function composeDropdownRoles($partial) {
        view()->composer($partial, function($view){
            // get all roles
            $roles = Role::all()->pluck('name', 'id')->toArray();

            $view->with('roles', $roles);
        });
    }

    /**
     * Compose types for dropdown
     */
    private function composeDropdownTypes($action) {
        view()->composer($action, function($view){
            // get all types
            $types = Type::where('status', 1)->pluck('name', 'id')->toArray();

            $view->with('types', $types);
        });
    }
}
