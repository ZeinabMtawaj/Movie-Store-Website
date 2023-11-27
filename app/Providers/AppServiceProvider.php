<?php

namespace App\Providers;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Container\Container;
// use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;


class AppServiceProvider extends ServiceProvider
{
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::unguard();
    //     Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
    //         $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);

    //         return new LengthAwarePaginator(
    //             $this->forPage($page, $perPage),
    //             $total ?: $this->count(),
    //             $perPage,
    //             $page,
    //             [
    //                 'path' => LengthAwarePaginator::resolveCurrentPath(),
    //                 'pageName' => $pageName,
    //             ]
    //         );
    //     });
    }
}