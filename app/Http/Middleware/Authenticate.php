<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Authenticate
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class Authenticate
{
    /** @var AuthManager */
    private $auth;

    /**
     * Authenticate constructor.
     *
     * @param AuthManager $auth
     */
    public function __construct(AuthManager $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  Request     $request
     * @param  Closure     $next
     * @param  string|null $guard
     * @return Response
     */
    public function handle(Request $request, Closure $next, string $guard = null) : Response
    {
        if ($this->auth->guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        }

        return $next($request);
    }
}