<?php

namespace App\Providers;

use App\Models\cart;
use App\Models\categories;
use App\Models\order;
use App\Models\subcategories;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::share("subcategories",subcategories::all());
        View::share('category',categories::all());
        View::composer('*', function ($view) {
            $user = auth()->user();
            $cart = null;
            if ($user) {
              $cart = cart::where('user_id', $user->id)->get();
            }
            $view->with('cart', $cart);
          });
          View::composer('*', function ($view) {
            $user = auth()->user();
            $cartCount = 0;
            if ($user) {
              $cart = Cart::where('user_id', $user->id)->get();
              $cartCount = $cart->count();
            }
            $view->with('cartCount', $cartCount);
          });
          View::composer('*', function ($view) {
            $user = auth()->user();
            $cart_total = 0;
            if ($user) {
              $cart = Cart::where('user_id', $user->id)->get();
              foreach($cart as $item)
              {
                $cart_total += $item->quantity * $item->product_price;
              }
            }
            $view->with('cart_total', $cart_total);
          });
          View::share('orders',order::all());
          View::share('unseen_orders',order::where('statues',0)->count());
        Paginator::useBootstrap();
    }
}
