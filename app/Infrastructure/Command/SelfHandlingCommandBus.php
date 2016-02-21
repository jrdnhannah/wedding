<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Infrastructure\Command;

use SmoothPhp\Contracts\CommandBus\Command;
use SmoothPhp\Contracts\CommandBus\CommandBus;

/**
 * Class SelfHandlingCommandBus
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class SelfHandlingCommandBus implements CommandBus
{
    /**
     * @param Command $command
     * @return void
     */
    public function execute(Command $command)
    {
        app()->call([$command, 'handle']);
    }
}