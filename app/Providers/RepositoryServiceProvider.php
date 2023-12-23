<?php

namespace App\Providers;

use App\Interfaces\api\CategoryInterface as ApiCategoryInterface;
use App\Interfaces\api\ProductInterface as ApiProductInterface;
use App\Repositories\api\CategoryRepository as ApiCategoryRepository;
use App\Repositories\api\ProductRepository as ApiProductRepository;

use App\Interfaces\CategoryInterface;
use App\Interfaces\ProductInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface ::class,CategoryRepository::class);
        $this->app->bind(ProductInterface ::class,ProductRepository::class);
        $this->app->bind(ApiCategoryInterface::class,ApiCategoryRepository::class);
        $this->app->bind(ApiProductInterface::class,ApiProductRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
