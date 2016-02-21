<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Request\Invitations;

use WeddingPlanr\App\Http\Request\Request;
use WeddingPlanr\Guest\Guest;
use WeddingPlanr\Guest\PlusOne;
use WeddingPlanr\Guest\ReceptionGuest;
use WeddingPlanr\Rsvp\RsvpResponse;

/**
 * Class RsvpRequest
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class RsvpRequest extends Request
{
    /**
     * Validation rules for the given request
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'coming'                  => 'required|integer',
            'invitee.*.name'          => 'sometimes|required|string',
            'invitee.*.menu.starter'  => 'sometimes|string',
            'invitee.*.menu.main'     => 'sometimes|string',
            'invitee.*.menu.dessert'  => 'sometimes|string',
            'invitee.*.menu.dietry'   => 'sometimes|string',

            'plus_one.*.name'         => 'sometimes|string',
            'plus_one.*.menu.starter' => 'sometimes|string',
            'plus_one.*.menu.main'    => 'sometimes|string',
            'plus_one.*.menu.dessert' => 'sometimes|string',
            'plus_one.*.menu.dietry'  => 'sometimes|string',

            'reception.*.name'         => 'sometimes|required',
            'reception.*.menu.dietry'  => 'sometimes|string',
        ];
    }

    /**
     * @return RsvpResponse
     */
    public function rsvpResponse() : RsvpResponse
    {
        return RsvpResponse::rsvp($rsvpId = uuid(), $this->coming(), $this->invitees(), $this->plusOnes());
    }

    /**
     * @return Guest[]
     */
    public function invitees() : array
    {
        if ($this->request->has(Guest::getRequestKey())) {
            return Guest::fromRsvpRequest($this);
        }

        return [];
    }

    /**
     * @return PlusOne[]
     */
    public function plusOnes() : array
    {
        if ($this->request->has(PlusOne::getRequestKey())) {
            return PlusOne::fromRsvpRequest($this);
        }

        return [];
    }

    public function receptionGuests() : array
    {
        if ($this->request->has(ReceptionGuest::getRequestKey())) {
            return ReceptionGuest::fromRsvpRequest($this);
        }

        return [];
    }

    /**
     * @return bool
     * @throws \Exception
     */
    public function isReceptionRsvp() : bool
    {
        return $this->request->has(ReceptionGuest::getRequestKey());
    }

    /**
     * @return int
     */
    public function coming() : int
    {
        return (int) $this->request->get('coming');
    }
}