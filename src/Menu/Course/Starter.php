<?php declare(strict_types = 1);

namespace WeddingPlanr\Menu\Course;

/**
 * Class Starter
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class Starter implements Course
{
    /** @var string */
    private $name;

    /**
     * Starter constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->name;
    }
}