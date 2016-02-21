<?php declare(strict_types = 1);

namespace WeddingPlanr\Menu;

/**
 * Class DietryRequirements
 * @package WeddingPlanr\Menu
 * @author jrdn hannah <jordan@hotsnapper.com>
 */
final class DietryRequirements
{
    /** @var string */
    private $requirements;

    /**
     * @param string $requirements
     */
    public function __construct(string $requirements)
    {
        $this->requirements = $requirements;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->requirements;
    }
}