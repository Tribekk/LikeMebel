<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use OpenAI\Client;

class OpenAIProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(Client::class, function () {
            return new Client(config('openai.api_key'));
        });
    }
}
