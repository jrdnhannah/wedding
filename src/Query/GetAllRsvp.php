<?php declare(strict_types = 1);

namespace WeddingPlanr\Query;

/**
 * Class GetAllRsvp
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class GetAllRsvp
{
    /** @var bool */
    private $includeNonAttending;

    /**
     * @param bool $includeNonAttending
     */
    public function __construct(bool $includeNonAttending = false)
    {
        $this->includeNonAttending = $includeNonAttending;
    }

    /**
     * @return boolean
     */
    public function includeNonAttending() : bool
    {
        return $this->includeNonAttending;
    }
}