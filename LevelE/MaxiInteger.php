<?php

namespace Hackathon\LevelE;

class MaxiInteger
{
    private $value;
    private $reverse;

    public function __construct($value)
    {
        $this->setValue($value);
    }

    /**
     * @FIX : CAN BE UPDATED
     *
     * @param MaxiInteger $other
     * @return $this|MaxiInteger
     */
    public function add(MaxiInteger $other)
    {
        if (is_null($other)) {
            return $this;
        }

        /**
         * You can delete this part of the code
         */
        $maxLength = max(strlen($this->getValue()), strlen($other->getValue()));
        if ($maxLength) {
            $other = $other->fillWithZero($maxLength);
            $this->setValue($this->fillWithZero($maxLength)->getValue());
        }

        return $this->realSum($this, $other);
    }

    /**
     * @TODO
     *
     * @param MaxiInteger $a
     * @param MaxiInteger $b
     * @return MaxiInteger
     */
    private function realSum($a, $b)
    {
        /** @TODO */
        $res = "";
        $i = 0;
        $retenue = false;
        $max = min(strlen($a->getValue()), strlen($b->getValue()));
        for ($i; $i < $max; $i++) {
            if ($retenue) {
                $sum = (intval($a->getValue()[$i]) + intval($b->getValue()[$i]) + 1) % 10;
                $retenue = (intval($a->getValue()[$i]) + intval($b->getValue()[$i]) + 1) >= 10;
                $res .= $sum;
            } else {
                $sum = (intval($a->getValue()[$i]) + intval($b->getValue()[$i])) % 10;
                $retenue = (intval($a->getValue()[$i]) + intval($b->getValue()[$i])) >= 10;
                $res .= $sum;
            }
        }
        $tmp = $a;
        if ($max = strlen($a->getValue())) {
            $tmp = $b;
        }
        for ($i; $i < strlen($tmp->getValue()); $i++) {
            if ($retenue) {
                $retenue = false;
                $res .= intval($tmp->getValue()[$i]) + 1;
            } else {
                $res .= intval($tmp->getValue()[$i]);
            }
        }
        return new MaxiInteger($res);
    }

    private function setValue($value)
    {
        $this->value = $value;
        $this->reverse = $this->createReverseValue($value);
    }

    public function getValue()
    {
        return $this->value;
    }

    private function getNthOfMaxiInteger($n)
    {
        return $this->value[$n];
    }
    private function createReverseValue($value)
    {
        return strrev($value);
    }

    private function fillWithZero($totalLength)
    {
        return new self(strrev(str_pad($this->reverse, $totalLength, '0')));
    }
}