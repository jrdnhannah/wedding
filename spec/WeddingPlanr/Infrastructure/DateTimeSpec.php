<?php declare(strict_types = 1);

namespace spec\WeddingPlanr\Infrastructure;

use Carbon\Carbon;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use SmoothPhp\Contracts\Serialization\Serializable;
use WeddingPlanr\Infrastructure\DateTime;

/**
 * Class DateTimeSpec
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class DateTimeSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(DateTime::class);
        $this->shouldImplement(Serializable::class);
        $this->shouldBeAnInstanceOf(Carbon::class);
    }
}
