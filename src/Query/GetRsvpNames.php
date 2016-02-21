<?php declare(strict_types = 1);

namespace WeddingPlanr\Query;

/**
 * Class GetRsvpNames
 * @package WeddingPlanr\Query
 * @author jrdn hannah <jordan@hotsnapper.com>
 */
final class GetRsvpNames
{
    /** @var bool */
    private $includeNotComing;

    /**
     * @param bool $includeNotComing
     */
    public function __construct(bool $includeNotComing = false)
    {
        $this->includeNotComing = $includeNotComing;
    }

    /**
     * @return bool
     */
    public function includeNotComing() : bool
    {
        return $this->includeNotComing;
    }
}