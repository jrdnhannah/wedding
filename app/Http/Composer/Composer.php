<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Http\Composer;

use Illuminate\Contracts\View\View;

interface Composer
{
    /**
     * @param View $view
     * @return mixed
     */
    public function composer(View $view);
}