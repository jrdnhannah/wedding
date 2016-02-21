<?php declare(strict_types = 1);

namespace spec\WeddingPlanr\Guest\Command;

use PhpSpec\ObjectBehavior;
use WeddingPlanr\Guest\Command\InviteGuestToWeddingHandler;

/**
 * Class InviteGuestToWeddingHandlerSpec
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class InviteGuestToWeddingHandlerSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(InviteGuestToWeddingHandler::class);
    }
}