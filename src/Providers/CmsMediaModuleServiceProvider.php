<?php
namespace Czim\CmsMediaModule\Providers;

use Czim\CmsCore\Contracts\Core\CoreInterface;
use Czim\CmsCore\Support\Enums\Component;
use Czim\CmsMediaModule\Contracts\Repositories\MediaFileRepositoryInterface;
use Czim\CmsMediaModule\Repositories\MediaFileRepository;
use Illuminate\Support\ServiceProvider;

class CmsMediaModuleServiceProvider extends ServiceProvider
{

    /**
     * @var CoreInterface
     */
    protected $core;


    public function boot()
    {
        $this->bootConfig();
    }

    public function register()
    {
        $this->core = app(Component::CORE);

        $this->registerConfig()
             ->registerInterfaceBindings()
             ->publishMigrations();
    }


    /**
     * @return $this
     */
    protected function registerConfig()
    {
        $this->mergeConfigFrom(
            realpath(dirname(__DIR__) . '/../config/cms-media-module.php'),
            'cms-media-module'
        );

        return $this;
    }

    /**
     * @return $this
     */
    protected function registerInterfaceBindings()
    {
        $this->app->singleton(MediaFileRepositoryInterface::class, MediaFileRepository::class);

        return $this;
    }

    /**
     * @return $this
     */
    protected function publishMigrations()
    {
        $this->publishes([
            realpath(dirname(__DIR__) . '/../migrations') => $this->getMigrationPath(),
        ], 'migrations');

        return $this;
    }

    /**
     * @return string
     */
    protected function getMigrationPath()
    {
        return database_path($this->core->config('database.migrations.path'));
    }

    /**
     * @return $this
     */
    protected function bootConfig()
    {
        $this->publishes([
            realpath(dirname(__DIR__) . '/../config/cms-media-module.php') => config_path('cms-media-module.php'),
        ]);

        return $this;
    }

}
