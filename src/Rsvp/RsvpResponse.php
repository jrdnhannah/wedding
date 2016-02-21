<?php declare(strict_types = 1);

namespace WeddingPlanr\Rsvp;

use WeddingPlanr\Guest\Guest;
use WeddingPlanr\Guest\PlusOne;
use WeddingPlanr\Guest\ReceptionGuest;

/**
 * Class RsvpResponse
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class RsvpResponse
{
    const RECEPTION = 'reception';
    const CEREMONY  = 'ceremony';

    /** @var string */
    private $rsvpId;

    /** @var int */
    private $coming;

    /** @var Guest[] */
    private $guests;
    
    /** @var PlusOne[] */
    private $plusOnes;

    /** @var ReceptionGuest[] */
    private $receptionGuests;

    /** @var string */
    private $type;

    private function __construct()
    {
        $this->guests = $this->receptionGuests = $this->plusOnes = [];
    }

    /**
     * @param string $rsvpId
     * @param int   $coming
     * @param array  $guests
     * @param array  $plusOnes
     * @return RsvpResponse
     */
    public static function rsvp(
        string $rsvpId,
        int $coming,
        array $guests,
        array $plusOnes
    ) : RsvpResponse {
        $response = new static;
        $response->coming    = $coming;
        $response->rsvpId    = $rsvpId;
        $response->guests    = $guests;
        $response->plusOnes  = $plusOnes;

        $response->type = static::CEREMONY;
        
        return $response;
    }

    /**
     * @param string $rsvpId
     * @param int   $coming
     * @param array  $receptionGuests
     * @return RsvpResponse
     */
    public static function receptionGuestRsvp(string $rsvpId, int $coming, array $receptionGuests) : RsvpResponse
    {
        $response = new static;
        $response->coming = $coming;
        $response->rsvpId = $rsvpId;
        $response->receptionGuests = $receptionGuests;

        $response->type = static::RECEPTION;

        return $response;
    }

    /**
     * @return int
     */
    public function isComing() : int
    {
        return $this->coming;
    }

    /**
     * @return string
     */
    public function rsvpId() : string
    {
        return $this->rsvpId;
    }

    /**
     * @return \WeddingPlanr\Guest\Guest[]
     */
    public function guests() : array
    {
        return $this->guests;
    }

    /**
     * @return \WeddingPlanr\Guest\PlusOne[]
     */
    public function plusOnes() : array
    {
        return $this->plusOnes;
    }

    /**
     * @return \WeddingPlanr\Guest\ReceptionGuest[]
     */
    public function receptionGuests() : array
    {
        return $this->receptionGuests;
    }

    /**
     * @return string
     */
    public function type() : string
    {
        return $this->type;
    }
}