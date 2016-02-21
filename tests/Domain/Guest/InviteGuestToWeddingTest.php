<?php declare(strict_types = 1);

namespace WeddingPlanr\Tests\Domain\Guest;

use SmoothPhp\CommandBus\BaseCommand;
use SmoothPhp\Contracts\EventSourcing\Event;
use SmoothPhp\EventSourcing\EventSourcedRepository;
use WeddingPlanr\Guest\Command\InviteGuestToWedding;
use WeddingPlanr\Guest\Command\InviteGuestToWeddingHandler;
use WeddingPlanr\Guest\Event\GuestInvitedToWedding;
use WeddingPlanr\Guest\Guest;
use WeddingPlanr\Guest\Repository\GuestRepository;
use WeddingPlanr\Tests\DomainTestCase;

/**
 * Class InviteGuestToWeddingTest
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class InviteGuestToWeddingTest extends DomainTestCase
{
    /**
     * Given the following events have
     * taken place within the
     * domain...
     *
     * @return Event[]
     */
    protected function given() : array
    {
        return [];
    }

    /**
     * Create and return the domain command
     *
     * @return BaseCommand
     */
    protected function when() : BaseCommand
    {
        return new InviteGuestToWedding(uuid());
    }

    /**
     * Return the aggregate repository class
     *
     * @return string
     */
    protected function repository() : string
    {
        return GuestRepository::class;
    }

    /**
     * Create an instance of the domain command handler
     *
     * @param GuestRepository $repository
     * @return mixed
     */
    protected function handler($repository)
    {
        return new InviteGuestToWeddingHandler($repository);
    }

    /**
     * Returns the aggregate class under test
     *
     * @return string
     */
    protected function aggregate() : string
    {
        return Guest::class;
    }

    /**
     * @test
     */
    public function invitation_event_should_be_emitted()
    {
        $this->assertInstanceOf(GuestInvitedToWedding::class, $this->emitted()->first());
    }
}