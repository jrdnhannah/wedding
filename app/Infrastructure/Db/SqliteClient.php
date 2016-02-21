<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Infrastructure\Db;


use Illuminate\Database\ConnectionInterface;

/**
 * Class SqliteClient
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class SqliteClient implements DbClient
{
    /** @var ConnectionInterface */
    private $connection;

    /**
     * SqliteClient constructor.
     *
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return ConnectionInterface
     */
    public function connection() : ConnectionInterface
    {
        return $this->connection;
    }
}