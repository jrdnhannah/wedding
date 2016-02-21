<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class Request
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
abstract class Request extends FormRequest
{
    /**
     * Validation rules for the given request
     *
     * @return array
     */
    abstract public function rules() : array;

    /**
     * @return bool
     */
    public function authorize() : bool
    {
        return true;
    }
}