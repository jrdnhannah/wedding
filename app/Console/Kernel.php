<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Console;

/**
 * Class Kernel
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class Kernel extends \Illuminate\Foundation\Console\Kernel
{
    /**
     * @var \Illuminate\Console\Command[]
     */
    protected $commands = [
        Command\ShowGuestRsvps::class,
        Command\ShowInviteStats::class,
        Command\ShowNonRespondents::class,
    ];
}