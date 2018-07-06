<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class DingoSerializerProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['Dingo\Api\Transformer\Factory']->setAdapter(function ($app) {
            $fractal = new \League\Fractal\Manager;
            $fractal->setSerializer(new \App\Http\Serializers\NoEnvelopeSerializer());
            return new \Dingo\Api\Transformer\Adapter\Fractal($fractal);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
