<?php declare(strict_types = 1);

namespace WeddingPlanr\Query;

use WeddingPlanr\App\Infrastructure\Db\DbClient;

/**
 * Class GetRsvpNamesHandler
 * @package WeddingPlanr\Query
 * @author jrdn hannah <jordan@hotsnapper.com>
 */
final class GetRsvpNamesHandler
{
    /** @var DbClient */
    private $client;

    /**
     * GetAllRsvpHandler constructor.
     *
     * @param DbClient $client
     */
    public function __construct(DbClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param GetRsvpNames $query
     * @return string[]
     */
    public function handle(GetRsvpNames $query)
    {
        $q = $this->client->connection()->table('rsvp');

        if (!$query->includeNotComing()) {
            $q->where('is_coming', true);
        }

        return $q->pluck('name');
    }
}