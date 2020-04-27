<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Product;
use App\Permission;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
//        Product::class=>'App\Policies\ProductPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    
    public function getPermissions(){
        return Permission::with('role')->get();
    }
    
    public function boot()
    {
        $this->registerPolicies();
        $permissions = $this->getPermissions();
        foreach($permissions as $permission){
            Gate::define($permission->en_name, function
                         ($user) use ($permission){
                             return $user->hasRole($permission->role);
                         });
        }
        //
    }
}
