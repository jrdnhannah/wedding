<?php declare(strict_types = 1);

namespace WeddingPlanr\Menu;

/**
 * Class ReceptionMenuChoice
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class ReceptionMenuChoice implements MenuChoice
{
    /** @var DietryRequirements */
    private $dietryRequirements;

    /**
     * ReceptionMenuChoice constructor.
     *
     * @param DietryRequirements $dietryRequirements
     */
    public function __construct(DietryRequirements $dietryRequirements)
    {
        $this->dietryRequirements = $dietryRequirements;
    }

    /**
     * @return DietryRequirements
     */
    public function dietryRequirements() : DietryRequirements
    {
        return $this->dietryRequirements;
    }
}