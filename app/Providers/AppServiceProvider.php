<?php

namespace App\Providers;

use App\Queries\QueryBuilder;
use App\Queries\QueryBuilderCategory;
use App\Queries\QueryBuilderSpandings;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(QueryBuilder::class, QueryBuilderCategory::class);
        $this->app->bind(QueryBuilder::class, QueryBuilderSpendings::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
