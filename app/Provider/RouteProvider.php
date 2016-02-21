<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Provider;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Routing\Router;

/**
 * Class RouteProvider
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class RouteProvider extends RouteServiceProvider
{
    /** @var string */
    protected $namespace = 'WeddingPlanr\App\Http\Controller';

    /**
     * Define the routes for the application.
     *
     * @param  \Illuminate\Routing\Router $router
     * @return void
     */
    public function map(Router $router)
    {
        $router->group(
            ['namespace' => $this->namespace],
            function (Router $router) {
                require app_path('Http/routes.php');
            }
        );
    }
}