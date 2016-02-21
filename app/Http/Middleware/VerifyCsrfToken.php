<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Middleware;

/**
 * Class VerifyCsrfToken
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class VerifyCsrfToken extends \Illuminate\Foundation\Http\Middleware\VerifyCsrfToken
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var string[]
     */
    protected $except = [
        //
    ];
}