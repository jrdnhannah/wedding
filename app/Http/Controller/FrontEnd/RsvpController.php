<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Controller\FrontEnd;

use Illuminate\Contracts\View\View;
use WeddingPlanr\App\Http\Controller\Controller;

/**
 * Class RsvpController
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class RsvpController extends Controller
{
    public function directRsvp(string $rsvpId) : View
    {
        $filtered = array_filter(config('wedding.guests'), function (array $guest) use ($rsvpId) {
            if (strtolower($rsvpId) == strtolower($guest['link'])) {
                return $guest;
            }
        });

        if (!$filtered) {
            abort(404, sprintf('Guest %s not found', $rsvpId));
        }

        return view('frontend.rsvp', ['rsvp' => json_encode(array_pop($filtered))]);
    }
}