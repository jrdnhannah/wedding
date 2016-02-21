<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Provider;

use Illuminate\Support\ServiceProvider;
use WeddingPlanr\App\Infrastructure\Db\DbClient;
use WeddingPlanr\App\Infrastructure\Db\SqliteClient;

/**
 * Class DatabaseServiceProvider
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DbClient::class, SqliteClient::class);
    }
}