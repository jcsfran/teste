<?php

namespace Julio\Docs;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    private int $tries = 3;
    private int $minutes = 10;

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('docs_ip_address', function (Request $request) {
            return Limit::perMinutes($this->minutes, $this->tries)->by($request->ip());
        });
    }
}
