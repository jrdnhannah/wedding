<?php declare(strict_types = 1);

namespace WeddingPlanr\Infrastructure\ValueObjects;

/**
 * Class UuidIdentity
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
abstract class UuidIdentity implements Identity
{
    /** @var string */
    private $id;

    /**
     * UuidIdentity constructor.
     *
     * @param string $id
     */
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->id;
    }
}