<?php declare(strict_types = 1);

namespace WeddingPlanr\App\Console\Command;

use Illuminate\Console\Command;
use SmoothPhp\QueryBus\QueryBus;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Translation\TranslatorInterface;
use WeddingPlanr\Query\GetAllRsvp;

/**
 * Class ShowGuestRsvps
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
final class ShowGuestRsvps extends Command
{
    /** @var QueryBus */
    private $queryBus;

    /** @var string */
    protected $signature = 'wedding:rsvp:all {--show-menu} {--show-not-coming}';
    /** @var TranslatorInterface */
    private $translator;

    /**
     * ShowGuestRsvps constructor.
     *
     * @param QueryBus            $queryBus
     * @param TranslatorInterface $translator
     */
    public function __construct(QueryBus $queryBus, TranslatorInterface $translator)
    {
        parent::__construct();
        $this->queryBus = $queryBus;
        $this->translator = $translator;
    }

    /**
     * 
     */
    public function handle()
    {
        $table = new Table($this->getOutput());

        $headers = ['Name', 'Coming', 'Type'];

        if ($this->option('show-menu')) {
            $headers = array_merge($headers, ['Starter', 'Main', 'Dessert', 'Dietry']);
        }

        $table->setHeaders($headers);
        
        $table->setRows(iterator_to_array((function () {
            foreach ($this->queryBus->query(new GetAllRsvp((bool) $this->option('show-not-coming'))) as $rsvp) {
                $fields = [
                    $rsvp->name,
                    (bool) $rsvp->is_coming ? 'Yes' : 'No',
                    $rsvp->type,
                ];

                if ($this->option('show-menu')) {
                    $fields = array_merge($fields,[
                        $this->menu($rsvp->starter),
                        $this->menu($rsvp->main),
                        $this->menu($rsvp->dessert),
                        $rsvp->dietry_requirements,
                    ]);
                }

                yield $fields;
            }
        })()));
        
        $table->render();

        $coming = $this->queryBus->query(new GetAllRsvp);
        $nonAttending = $this->queryBus->query(new GetAllRsvp($includeNonAttending = true));
        $this->output->writeln(sprintf('Coming: %d', count($coming)));
        $this->output->writeln(sprintf('Not Coming: %d', count($nonAttending) - count($coming)));
        $this->output->writeln(sprintf('Ceremony Guests: %d', collect($coming)->sum(function ($guest) {
            return (int) boolval($guest->type == 'ceremony');
        })));
        $this->output->writeln(sprintf('Reception Guests: %d', collect($coming)->sum(function ($guest) {
            return (int) boolval($guest->type == 'reception');
        })));
    }

    /**
     * @param $choice
     * @return string
     */
    private function menu($choice) : string
    {
        $combined = 'menu.' . $choice;
        
        if (($translated = $this->translator->trans($combined)) == $combined) {
            return $choice;
        }
        
        return $translated;
    }
}