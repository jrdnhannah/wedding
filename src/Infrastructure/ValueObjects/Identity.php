<?php declare(strict_types = 1);

namespace WeddingPlanr\Infrastructure\ValueObjects;

/**
 * Interface Identity
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
interface Identity
{
    /**
     * Identity constructor.
     *
     * @param string $id
     */
    public function __construct(string $id);

    /**
     * @return string
     */
    public function __toString() : string;
}