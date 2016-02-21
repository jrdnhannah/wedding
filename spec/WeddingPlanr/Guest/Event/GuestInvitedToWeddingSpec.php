<?php declare(strict_types = 1);

namespace spec\WeddingPlanr\Guest\Event;

use PhpSpec\ObjectBehavior;
use SmoothPhp\Contracts\EventSourcing\Event;
use SmoothPhp\Contracts\Serialization\Serializable;
use WeddingPlanr\Guest\Event\GuestInvitedToWedding;
use WeddingPlanr\Guest\ValueObject\GuestId;
use WeddingPlanr\Infrastructure\DateTime;

/**
 * Class GuestInvitedToWeddingSpec
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class GuestInvitedToWeddingSpec extends ObjectBehavior
{
    public function let()
    {
        $this->beConstructedWith(new GuestId(uuid()), DateTime::now());
    }

    public function it_is_initializable()
    {
        $this->shouldHaveType(GuestInvitedToWedding::class);
        $this->shouldImplement(Event::class);
        $this->shouldImplement(Serializable::class);
    }

    public function it_should_return_guest_id()
    {
        $this->guestId()->shouldBeAnInstanceOf(GuestId::class);
    }

    public function it_should_store_creation_date()
    {
        $this->invitedAt()->shouldBeAnInstanceOf(DateTime::class);
    }

    public function it_should_serialize_correctly()
    {
        $this->serialize()->shouldBeArray();
        $this->serialize()->shouldHaveKeys('guest_id', 'invited_at');
    }

    public function it_should_deserialize_correctly()
    {
        $this->deserialize([
            'guest_id'   => uuid(),
            'invited_at' => DateTime::now()->serialize(),
        ])->shouldBeAnInstanceOf(GuestInvitedToWedding::class);
    }

    public function getMatchers()
    {
        return [
            'haveKeys' => function ($subject, ...$keys) {
                foreach ($keys as $key) {
                    if (!array_key_exists($key, $subject)) {
                        return false;
                    }

                    return true;
                }
            }
        ];
    }
}