<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Provider;

use Illuminate\Support\ServiceProvider;
use SmoothPhp\Contracts\CommandBus\CommandBus;
use WeddingPlanr\App\Infrastructure\Command\SelfHandlingCommandBus;

/**
 * Class CommandBusServiceProvider
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class CommandBusServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Register bindings
     */
    public function boot()
    {
        $this->app->bind(CommandBus::class, SelfHandlingCommandBus::class);
    }
}