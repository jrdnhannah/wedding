<?php declare(strict_types = 1);

namespace WeddingPlanr\Query;

use WeddingPlanr\App\Infrastructure\Db\DbClient;

/**
 * Class GetAllRsvpHandler
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class GetAllRsvpHandler
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
     * @param GetAllRsvp $query
     * @return array|static[]
     */
    public function handle(GetAllRsvp $query)
    {
        $q = $this
            ->client
            ->connection()
            ->table('rsvp');

        if (!$query->includeNonAttending()) {
            $q->where('is_coming', true);
        } else {
            $q->orderBy('is_coming', 'desc');
        }

        return $q->get();
    }
}