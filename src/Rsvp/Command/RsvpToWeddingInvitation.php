<?php declare(strict_types = 1);

namespace WeddingPlanr\Rsvp\Command;

use SmoothPhp\CommandBus\BaseCommand;
use WeddingPlanr\App\Infrastructure\Db\DbClient;
use WeddingPlanr\Guest\Invitee;
use WeddingPlanr\Guest\PlusOne;
use WeddingPlanr\App\Infrastructure\Command\SelfHandlingCommand;
use WeddingPlanr\Rsvp\RsvpResponse;

/**
 * Class RsvpToWeddingInvitation
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class RsvpToWeddingInvitation extends BaseCommand implements SelfHandlingCommand
{
    /** @var RsvpResponse */
    private $rsvp;

    /**
     * RsvpToWeddingInvitation constructor.
     *
     * @param RsvpResponse $rsvp
     */
    public function __construct(RsvpResponse $rsvp)
    {
        $this->rsvp = $rsvp;
    }

    /**
     * @param DbClient $db
     */
    public function handle(DbClient $db)
    {
        info($this->rsvp->type() == RsvpResponse::CEREMONY);
        if ($this->rsvp->type() == RsvpResponse::CEREMONY) {
            $this->handleCeremonyRsvp($db);
        } else {
            $this->handleReceptionRsvp($db);
        }
    }

    /**
     * @param DbClient $db
     */
    private function handleCeremonyRsvp(DbClient $db)
    {
        /** @var Invitee $invitee */
        foreach (array_merge($this->rsvp->guests(), $this->rsvp->plusOnes()) as $invitee) {
            $db->connection()
               ->table('rsvp')
               ->insert(
                   [
                       'rsvp_id'             => $this->rsvp->rsvpId(),
                       'is_coming'           => $this->rsvp->isComing() && $invitee->isComing(),
                       'name'                => $invitee->name(),
                       'starter'             => $invitee->isEating()
                                                        ->starter(),
                       'main'                => $invitee->isEating()
                                                        ->main(),
                       'dessert'             => $invitee->isEating()
                                                        ->dessert(),
                       'dietry_requirements' => $invitee->isEating()
                                                        ->dietryRequirements(),
                       'is_plus_one'         => $invitee instanceof PlusOne,
                       'type'                => $this->rsvp->type(),
                   ]
               );
        }
    }

    /**
     * @param DbClient $db
     */
    private function handleReceptionRsvp(DbClient $db)
    {
        foreach ($this->rsvp->receptionGuests() as $guest) {
            $db->connection()
               ->table('rsvp')
               ->insert(
                   [
                       'rsvp_id'             => $this->rsvp->rsvpId(),
                       'is_coming'           => $this->rsvp->isComing() && $guest->isComing(),
                       'name'                => $guest->name(),
                       'starter'             => 'N/A',
                       'main'                => 'N/A',
                       'dessert'             => 'N/A',
                       'dietry_requirements' => $guest->isEating()
                                                      ->dietryRequirements(),
                       'is_plus_one'         => false,
                       'type'                => $this->rsvp->type(),
                   ]
               );
        }
    }
}