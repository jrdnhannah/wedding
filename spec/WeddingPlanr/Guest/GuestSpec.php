<?php declare(strict_types = 1);

namespace spec\WeddingPlanr\Guest;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use WeddingPlanr\Guest\Guest;
use WeddingPlanr\Guest\ValueObject\GuestId;

/**
 * Class GuestSpec
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class GuestSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedThrough('inviteToWedding', [
            new GuestId(uuid())
        ]);
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(Guest::class);
    }
}
