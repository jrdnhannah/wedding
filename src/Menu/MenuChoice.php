<?php declare(strict_types = 1);

namespace WeddingPlanr\Menu;

/**
 * Interface CeremonyMenuChoice
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
interface MenuChoice
{
    /**
     * @return DietryRequirements
     */
    public function dietryRequirements() : DietryRequirements;
}