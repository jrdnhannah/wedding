<?php declare(strict_types = 1);

namespace WeddingPlanr\Guest;

use WeddingPlanr\App\Http\Request\Invitations\RsvpRequest;
use WeddingPlanr\Menu\CeremonyMenuChoice;
use WeddingPlanr\Menu\Course\Dessert;
use WeddingPlanr\Menu\Course\Main;
use WeddingPlanr\Menu\Course\Starter;
use WeddingPlanr\Menu\DietryRequirements;

/**
 * Class PlusOne
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class PlusOne extends Invitee
{    
    /** @var string */
    protected static $requestKey = 'plus_one';

    public static function fromRsvpRequest(RsvpRequest $request)
    {
        foreach ($request->request->get(static::$requestKey) as $invitee) {
            if (collect($invitee)->flatten()->filter(function ($value) {
                return strlen(trim($value)) > 0;
            })->count() < 1) {
                continue;
            }


            $guests[] = static::rsvp($invitee['name'],
                true,
                new CeremonyMenuChoice(
                    new Starter($invitee['menu']['starter'] ?? 'EMPTY'),
                    new Main($invitee['menu']['main'] ?? 'EMPTY'),
                    new Dessert($invitee['menu']['dessert'] ?? 'EMPTY'),
                    new DietryRequirements($invitee['dietry'] ?? 'EMPTY')
                )
            );
        }

        return $guests ?? [];
    }
}