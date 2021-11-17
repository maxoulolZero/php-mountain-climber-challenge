<?php

namespace Hackathon\LevelA;

class Palindrome
{
    private $str;

    public function __construct($str)
    {
        $this->str = $str;
    }

    /**
     * This function creates a palindrome with his $str attributes
     * If $str is abc then this function return abccba
     *
     * @TODO
     * @return string
     */
    public function generatePalindrome()
    {
        /** @TODO */
        if ($this->str == utf8_encode(strrev(utf8_decode($this->str)))) {
            return $this->str;
        }
        return $this->str . utf8_encode(strrev(utf8_decode($this->str)));
    }
}