<?php declare(strict_types = 1);

namespace WeddingPlanr\Guest;

use WeddingPlanr\Guest\ValueObject as Val;

/**
 * Class Guest
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class Guest extends Invitee
{
    /** @var string */
    protected static $requestKey = 'invitee';   
}