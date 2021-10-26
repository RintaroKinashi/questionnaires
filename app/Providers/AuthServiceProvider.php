<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
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

        //Gateの名前は admin とする。
        Gate::define('admin', function ($user) {
            // ユーザーに付与されている権限を全て調査する
            foreach ($user->roles as $role) {
                if ($role->name == 'admin') {
                    return true;
                }
            }
            // admin が未定義の場合
            return false;
        });
    }
}
