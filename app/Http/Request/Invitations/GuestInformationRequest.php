<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Request\Invitations;

use WeddingPlanr\App\Http\Request\Request;

/**
 * Class GuestInformationRequest
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class GuestInformationRequest extends Request
{
    /**
     * Validation rules for the given request
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'guest_name' => 'required|string'
        ];
    }
}