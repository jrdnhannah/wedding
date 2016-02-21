<?php declare(strict_types = 1);

namespace WeddingPlanr\Menu;

/**
 * Class CeremonyMenuChoice
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class CeremonyMenuChoice implements MenuChoice
{
    /** @var Course\Starter */
    private $starter;
    /** @var Course\Main */
    private $main;
    /** @var Course\Dessert */
    private $dessert;
    /** @var DietryRequirements */
    private $dietryRequirements;

    /**
     * CeremonyMenuChoice constructor.
     *
     * @param Course\Starter $starter
     * @param Course\Main $main
     * @param Course\Dessert $dessert
     * @param DietryRequirements $dietryRequirements
     */
    public function __construct(
        Course\Starter $starter,
        Course\Main $main,
        Course\Dessert $dessert,
        DietryRequirements $dietryRequirements
    ) {
        $this->starter = $starter;
        $this->main = $main;
        $this->dessert = $dessert;
        $this->dietryRequirements = $dietryRequirements;
    }

    /**
     * @return Course\Starter
     */
    public function starter() : Course\Starter
    {
        return $this->starter;
    }

    /**
     * @return Course\Main
     */
    public function main() : Course\Main
    {
        return $this->main;
    }

    /**
     * @return Course\Dessert
     */
    public function dessert() : Course\Dessert
    {
        return $this->dessert;
    }

    /**
     * @return DietryRequirements
     */
    public function dietryRequirements() : DietryRequirements
    {
        return $this->dietryRequirements;
    }
}