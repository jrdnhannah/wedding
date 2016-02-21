<?php declare(strict_types = 1);

namespace WeddingPlanr\Infrastructure;

use Carbon\Carbon;
use SmoothPhp\Contracts\Serialization\Serializable;

/**
 * Class DateTime
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
/*final */class DateTime extends Carbon implements Serializable
{
    /**
     * @return array
     */
    public function serialize()
    {
        return ['datetime' => (string) $this];
    }

    /**
     * @param array $data
     * @return static
     */
    public static function deserialize(array $data)
    {
        return new static($data['datetime']);
    }
}
