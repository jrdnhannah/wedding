<?php declare(strict_types = 1);

namespace WeddingPlanr\Guest;

use WeddingPlanr\App\Http\Request\Invitations\RsvpRequest;
use WeddingPlanr\Menu\DietryRequirements;
use WeddingPlanr\Menu\ReceptionMenuChoice;

/**
 * Class ReceptionGuest
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class ReceptionGuest extends Invitee
{
    /** @var string */
    protected static $requestKey = 'reception';

    /**
     * @param RsvpRequest $request
     * @return static
     */
    public static function fromRsvpRequest(RsvpRequest $request)
    {
        foreach ($request->request->get(static::$requestKey) as $invitee) {
            $guests[] = static::rsvp(
                $invitee['name'],
                in_array($invitee['name'], $request->request->get('guests-coming', [])),
                new ReceptionMenuChoice(new DietryRequirements($invitee['dietry']))
            );
        }

        return $guests ?? [];
    }
}