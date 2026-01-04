<?php

namespace App\Providers;

use App\Models\inbox;
use App\Models\Keranjang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::composer('*', function ($view) {
            $inbox_terbaru = Inbox::latest()->take(3)->get();
            $jumlah_belum_dibaca = Inbox::where('status', 'baru')->count();
            $view->with('inbox_terbaru', $inbox_terbaru)->with('jumlah_belum_dibaca',$jumlah_belum_dibaca);

            if(Auth::check()) {
                $view->with('keranjang', Keranjang::where('user_id', Auth::id())->get());
            } else {
                $view->with('keranjang', collect([]));
            }
        });
    }
}
