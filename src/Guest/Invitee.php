<?php declare(strict_types = 1);

namespace WeddingPlanr\Guest;

use Exception;
use WeddingPlanr\App\Http\Request\Invitations\RsvpRequest;
use WeddingPlanr\Menu\Course\Dessert;
use WeddingPlanr\Menu\Course\Main;
use WeddingPlanr\Menu\Course\Starter;
use WeddingPlanr\Menu\DietryRequirements;
use WeddingPlanr\Menu\CeremonyMenuChoice;
use WeddingPlanr\Menu\MenuChoice;
use WeddingPlanr\Menu\ReceptionMenuChoice;

/**
 * Class Invitee
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */

abstract class Invitee
{
    /** @var string */
    private $name;
    /** @var CeremonyMenuChoice*/
    private $menu;
    /** @var bool */
    private $coming;
    
    /** @var string */
    protected static $requestKey;

    /**
     * @param RsvpRequest $request
     * @return static
     */
    public static function fromRsvpRequest(RsvpRequest $request)
    {
        foreach ($request->request->get(static::$requestKey) as $invitee) {
            $guests[] = static::rsvp($invitee['name'],
                in_array($invitee['name'], $request->request->get('guests-coming', [])),
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

    /**
     * @param string     $name
     * @param bool       $coming
     * @param MenuChoice $menu
     * @return Invitee
     */
    public static function rsvp(string $name, bool $coming, MenuChoice $menu = null) : Invitee
    {
        $guest = new static;
        $guest->name   = $name;
        $guest->coming = $coming;
        $guest->menu   = $menu;

        return $guest;
    }

    /**
     * @return string
     */
    public function name() : string
    {
        return $this->name;
    }

    /**
     * @return MenuChoice
     */
    public function isEating()
    {
        return $this->menu;
    }

    /**
     * @return boolean
     */
    public function isComing()
    {
        return $this->coming;
    }

    /**
     * @return string
     * @throws Exception
     */
    public static function getRequestKey() : string
    {
        if (!static::$requestKey) {
            throw new Exception('No request key!');
        }
        
        return static::$requestKey;
    }
}