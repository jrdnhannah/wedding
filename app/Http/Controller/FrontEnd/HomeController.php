<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Controller\FrontEnd;

use Illuminate\Contracts\View\View;
use SmoothPhp\Contracts\CommandBus\CommandBus;
use WeddingPlanr\App\Http\Controller\Controller;
use WeddingPlanr\App\Http\Request\Invitations\GuestInformationRequest;
use WeddingPlanr\App\Http\Request\Invitations\RsvpRequest;
use WeddingPlanr\Rsvp\Command\RsvpToWeddingInvitation;
use WeddingPlanr\Rsvp\RsvpResponse;

/**
 * Class HomeController
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class HomeController extends Controller
{
    /** @var CommandBus */
    private $bus;

    /**
     * HomeController constructor.
     *
     * @param CommandBus $bus
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @return View
     */
    public function home() : View
    {
        return view('frontend.home');
    }

    /**
     * @param GuestInformationRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function guestInformation(GuestInformationRequest $request) : \Symfony\Component\HttpFoundation\Response
    {
        $filtered = array_filter(config('wedding.guests'), function (array $guest) use ($request) {
            if (in_array(strtolower($request->query->get('guest_name')), array_map('strtolower', $guest['names']))) {
                return $guest;
            }
        });
        
        if (!$filtered) {
            return response()->json([
                'message' => sprintf('Guest %s not found', $request->query->get('guest_name'))
            ], 404);
        }
        
        return response(['guest' => array_pop($filtered)]);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function guestNames() : \Symfony\Component\HttpFoundation\Response
    {
        return response(array_reduce(config('wedding.guests'), function ($carry, array $guest) {
            if (is_array($carry)) {
                return array_merge($carry, $guest['names']);
            }
            return $guest['names'];
        }));
    }

    /**
     * @param RsvpRequest $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function rsvp(RsvpRequest $request) : \Symfony\Component\HttpFoundation\Response
    {
        if ($request->isReceptionRsvp()) {
            $this->bus->execute(
                new RsvpToWeddingInvitation(
                    RsvpResponse::receptionGuestRsvp($rsvpId = uuid(), $request->coming(), $request->receptionGuests())
                )
            );
        } else {
            $this->bus->execute(
                new RsvpToWeddingInvitation(
                    RsvpResponse::rsvp(
                        $rsvpId = uuid(),
                        $request->coming(),
                        $request->invitees(),
                        $request->plusOnes()
                    )
                )
            );
        }

        return response()->json([
            'status' => 'success',
            'coming' => $request->coming(),
        ]);
    }
}