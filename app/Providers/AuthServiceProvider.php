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
        //'App\Models\Post' => 'App\Policies\PostPolicy',
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
        Gate::before(function($user){
            if($result = $user->isAdmin()) return $result;
        });

        Gate::define('user-can-access', function($user) {
            return false;
        });


        Gate::define('user-can-edit', function($user, $post) {

            //return $post->user->id == $user->id;

            // return $user->posts->contains($post);
        });
    }
}
