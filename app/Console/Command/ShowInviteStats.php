<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Console\Command;

use Illuminate\Console\Command;
use Symfony\Component\Console\Helper\Table;

/**
 * Class ShowInviteStats
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class ShowInviteStats extends Command
{
    /** @var string */
    protected $signature = 'wedding:invite:stats';

    public function handle()
    {
        $ceremonyPlusOnes = $receptionPlusOnes = 0;
        $plusOnes = function () use (&$ceremonyPlusOnes, &$receptionPlusOnes) {
            return $ceremonyPlusOnes + $receptionPlusOnes;
        };

        $guestNames = array_merge_recursive(...array_map(function (array $guest) use (&$ceremonyPlusOnes, &$receptionPlusOnes) {
            if (in_array('ceremony', $guest['invited_to'])) {
                $ceremonyPlusOnes += $guest['plus_ones'];
                return ['ceremony' => $guest['names']];
            }

            $receptionPlusOnes += $guest['plus_ones'];
            return ['reception' => $guest['names']];
        }, config('wedding.guests')));

        $table = new Table($this->getOutput());

        $table->setHeaders(['Overall Count', 'Plus Ones', 'Ceremony', 'Reception']);

        $table->addRow([
            count($guestNames['reception']) + count($guestNames['ceremony']) + $plusOnes(),
            $plusOnes(),
            count($guestNames['ceremony']) + $ceremonyPlusOnes,
            count($guestNames['reception']) + $receptionPlusOnes
        ]);

        $table->render();
    }
}