<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Controller;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Class Controller
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
abstract class Controller extends \Illuminate\Routing\Controller
{
    use AuthorizesRequests, ValidatesRequests;
}