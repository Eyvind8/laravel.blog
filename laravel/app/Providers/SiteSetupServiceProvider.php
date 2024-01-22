<?php

// app/Providers/SiteSetupServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Tag;

class SiteSetupServiceProvider extends ServiceProvider
{
    /**
     * Регистрация любых услуг приложения.
     *
     * @return void
     */
    public function register()
    {
        // Реализация
    }

    /**
     * Загрузка сервис-провайдера.
     *
     * @return void
     */
    public function boot()
    {
        // Добавим переменную $tags со всеми тегами во все представления
        view()->share('tags', Tag::all());
    }
}
