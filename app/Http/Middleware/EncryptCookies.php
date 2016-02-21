<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Middleware;

/**
 * Class EncryptCookies
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class EncryptCookies extends \Illuminate\Cookie\Middleware\EncryptCookies
{
    /**
     * The names of the cookies that should not be encrypted.
     *
     * @var string[]
     */
    protected $except = [
        //
    ];
}