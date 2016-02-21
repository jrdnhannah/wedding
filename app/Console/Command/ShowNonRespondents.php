<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Console\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use SmoothPhp\QueryBus\QueryBus;
use Symfony\Component\Console\Helper\Table;
use WeddingPlanr\Query\GetRsvpNames;

/**
 * Class ShowNonRespondents
 * @package WeddingPlanr\App\Console\Command
 * @author jrdn hannah <jordan@hotsnapper.com>
 */
final class ShowNonRespondents extends Command
{
    /** @var string */
    protected $signature = 'wedding:invite:non-respondent';

    /** @var QueryBus */
    private $bus;

    /**
     * @param QueryBus $bus
     */
    public function __construct(QueryBus $bus)
    {
        parent::__construct();
        $this->bus = $bus;
    }


    public function handle()
    {
        /** @var string[] $guestList */
        $guestList = Arr::collapse(array_map(function ($g) { return $g['names']; }, config('wedding.guests')));
        $responded = $this->bus->query(new GetRsvpNames(true));

        $dnr = array_diff($guestList, $responded);
        $table = new Table($this->output);

        $table->setHeaders(['Name']);

        foreach ($dnr as $d) {
            $table->addRow([$d]);
        }

        $table->render();
    }
}