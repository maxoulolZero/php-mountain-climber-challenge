<?php

namespace Hackathon\LevelD;

class Bobby
{
    public $wallet = array();
    public $total;

    public function __construct($wallet)
    {
        $this->wallet = $wallet;
        $this->computeTotal();
    }

    /**
     * @TODO
     *
     * @param $price
     *
     * @return bool|int|string
     */
    public function giveMoney($price)
    {
        /** @TODO */
        if ($price > $this->total) {
            return false;
        }
        $tmp = array();
        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                array_push($tmp, $element);
            }
        }
        $copy = $this->wallet;
        sort($tmp, SORT_NUMERIC);
        $this->wallet = array_reverse($tmp);
        $index = 0;
        while ($price > 0) {
            if ($index == count($this->wallet)) {
                $price -= $this->wallet[$index - 1];
                array_splice($this->wallet, $index - 1, 1);
                $index = 0;
            } else if ($index != 0 && $this->wallet[$index] <= $price) {
                $price -= $this->wallet[$index - 1];
                array_splice($this->wallet, $index - 1, 1);
                $index = 0;
            } else if ($index == 0) {
                $price -= $this->wallet[$index];
                array_splice($this->wallet, $index, 1);
                $index = 0;
            } else {
                $index++;
            }
        }
        foreach ($copy as $element) {
            if (!is_numeric($element)) {
                array_push($this->wallet, $element);
            }
        }
        $this->computeTotal();
        return true;
    }

    /**
     * This function updates the amount of your wallet
     */
    private function computeTotal()
    {
        $this->total = 0;

        foreach ($this->wallet as $element) {
            if (is_numeric($element)) {
                $this->total += $element;
            }
        }
    }
}