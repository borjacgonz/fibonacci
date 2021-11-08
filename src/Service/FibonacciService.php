<?php

namespace App\Service;


use Carbon\Carbon;

class FibonacciService
{

    public function currentMonth(): array
    {
        $start = Carbon::now('UTC')->startOfMonth()->getTimestamp();
        $end   = Carbon::now('UTC')->endOfMonth()->getTimestamp();

        return $this->calculateBetween($start, $end);
    }


    public function currentYear(): array
    {
        $start = Carbon::now('UTC')->startOfYear()->getTimestamp();
        $end   = Carbon::now('UTC')->endOfYear()->getTimestamp();

        return $this->calculateBetween($start, $end);
    }

    /**
     * Calculate the fibonacci serie between two numbers
     */
    public function calculateBetween(int $start, int $end): array
    {
        $n = 0;
        $result = [];
        do {
            $fib = $this->fibonacciRounding($n++);
            if ($fib >= $start) {
                $result[] = $fib;
            }
        } while($fib < $end);

        return $result;
    }

    /**
     * Calculate fibonnaci iteration by rounding.
     * http://en.wikipedia.org/wiki/Fibonacci_number#Computation_by_rounding
     */
    private function fibonacciRounding(int $iteration): string {
        $f = round(1.618 ** $iteration / 2.236);

        return sprintf("%d", $f);
    }

}