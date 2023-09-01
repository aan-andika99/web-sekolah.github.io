<?php

namespace App\Providers;

use App\Models\ModelFile;
use Illuminate\Support\Facades\Gate;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();
        
        Gate::define('isVerif', function($user) {
            return $user->active == '1';
        });
        Gate::define('isNotVerif', function($user) {
            return $user->active == '';
        });

        Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('isSiswa', function($user) {
            return $user->role == 'siswa';
        });

        Gate::define('isGuru', function($user) {
            return $user->role == 'guru';
        });
        Gate::define('isPending', function($user) {
            return $user->status == 'pending';
        });
        Gate::define('isActive', function($user) {
            return $user->status == 'process';
        });
        Gate::define('isSuccess', function($files) {
            return $files->status == 'success';
        });
        Gate::define('isProcess', function($files) {
            return $files->status == 'process';
        });

        // Form Berkas
        Gate::define('isProcess', function($ModelFile) {
            return $ModelFile->status == 'process';
        });
        Gate::define('isSuccess', function($ModelFile) {
            return $ModelFile->status == 'success';
        });
    }
}
