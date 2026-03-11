<?php

declare(strict_types=1);

namespace ItalyStrap\Debug;

class Timer
{
    /**
     * @var float|null
     */
    private $start = null;

    /**
     * @var float|null
     */
    private $end = null;

    public function start(): void
    {
        if ($this->start !== null) {
            throw new \LogicException('Timer has already been started.');
        }

        if ($this->end !== null) {
            throw new \LogicException('Timer has already been stopped.');
        }

        $this->start = \microtime(true);
    }

    public function startedAt(): float
    {
        if ($this->start === null) {
            throw new \LogicException('Timer has not been started.');
        }

        return $this->start;
    }

    public function stop(): void
    {
        if ($this->start === null) {
            throw new \LogicException('Timer has not been started.');
        }

        if ($this->end !== null) {
            throw new \LogicException('Timer has already been stopped.');
        }

        $this->end = \microtime(true);
    }

    public function stoppedAt(): float
    {
        if ($this->end === null) {
            throw new \LogicException('Timer has not been stopped.');
        }

        return $this->end;
    }

    public function elapsed(): float
    {
        if ($this->start === null) {
            throw new \LogicException('Timer has not been started.');
        }

        if ($this->end === null) {
            throw new \LogicException('Timer has not been stopped.');
        }

        return $this->end - $this->start;
    }

    public function reset(): void
    {
        $this->start = null;
        $this->end = null;
    }

    public function __toString(): string
    {
        try {
            return \sprintf('Elapsed time: %s', $this->elapsed());
        } catch (\LogicException $e) {
            return 'Timer has not been properly started and stopped.';
        }
    }

    public function __clone()
    {
        $this->reset();
    }
}