<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Infrastructure\Db;

use Illuminate\Database\ConnectionInterface;

/**
 * Interface DbClient
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
interface DbClient
{
    /**
     * @return ConnectionInterface
     */
    public function connection() : ConnectionInterface;
}