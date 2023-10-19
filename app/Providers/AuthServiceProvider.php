<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Book;
use App\Policies\BookPolicy;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Book::class => BookPolicy::class,
    ];

    // protected $scopes = [
    //     'admin' => 'Access as admin',
    //     'editor' => 'Access as editor',
    //     'viewer' => 'Access as viewer',
    // ];

    protected $scopes = [
        'read-books' => 'Read Books',
        'create-books' => 'Create Books',
        'edit-books' => 'Edit Books',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Passport::tokensCan([
            'read-books' => 'Read Books',
            'create-books' => 'Create Books',
            'edit-books' => 'Edit Books',
        ]);
    }
}
