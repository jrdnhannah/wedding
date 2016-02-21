<?php declare(strict_types = 1);

namespace WeddingPlanr\Tests;

use DomainException;
use Illuminate\Support\Collection;
use SmoothPhp\CommandBus\BaseCommand;
use SmoothPhp\Domain\DateTime;
use SmoothPhp\Domain\DomainEventStream;
use SmoothPhp\Domain\DomainMessage;
use SmoothPhp\Domain\Metadata;
use SmoothPhp\EventSourcing\AggregateRoot;
use SmoothPhp\Contracts\EventSourcing\Event;
use PHPUnit_Framework_TestCase as TestCase;
use SmoothPhp\EventSourcing\EventSourcedRepository;

/**
 * Class DomainTestCase
 *
 * @author jrdn hannah <jrdn@jrdnhannah.co.uk>
 */
abstract class DomainTestCase extends TestCase
{
    /** @var Event[] */
    private $events = [];
    
    /** @var AggregateRoot */
    private $subject;
    
    /** @var DomainException */
    private $caughtException;

    /**
     * Given the following events have
     * taken place within the
     * domain...
     *
     * @return Event[]
     */
    abstract protected function given() : array;

    /**
     * Create and return the domain command
     *
     * @return BaseCommand
     */
    abstract protected function when() : BaseCommand;

    /**
     * Create an instance of the domain command handler
     * 
     * @param EventSourcedRepository $repository
     * @return mixed
     */
    abstract protected function handler($repository);

    /**
     * Return the aggregate repository class
     *
     * @return string
     */
    abstract protected function repository() : string;

    /**
     * Returns the aggregate class under test
     * 
     * @return string
     */
    abstract protected function aggregate() : string;

    public function setUp()
    {
        parent::setUp();

        try {
            $events = new Collection($this->given());
            $repo = $this->getMockBuilder($this->repository())->getMock();

            $sut = $this->aggregate();
            $this->subject = new $sut;

            if (!$events->isEmpty()) {
                $this->subject->initializeState(new DomainEventStream(array_map(function (Event $event) {
                    return new DomainMessage(0, 0, new Metadata, $event, DateTime::now());
                }, $events->toArray())));
            }
            
            $repo->method('load')->willReturn($this->subject);
            $repo->method('save')->will($this->returnCallback(function ($subject) {
                $this->subject = $subject;
            }));
            
            $this->handler($repo)->handle($this->when());

            foreach ($this->subject->getUncommittedEvents() as $event) {
                $this->events[] = $event->getPayload();
            }

        } catch (DomainException $e) {
            $this->caughtException = $e;
        }
    }

    /**
     * The events emitted after execution
     * of the given command
     *
     * @return Collection
     */
    protected function emitted() : Collection
    {
        return collect($this->events);
    }
}