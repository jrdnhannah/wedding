<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Middleware;

use Closure;
use Illuminate\Auth\AuthManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RedirectIfAuthenticated
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class RedirectIfAuthenticated
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
     * @param  Request      $request
     * @param  Closure      $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $guard = null) : Response
    {
        if ($this->auth->guard($guard)->check()) {
            return redirect('/');
        }
        
        return $next($request);
    }
}