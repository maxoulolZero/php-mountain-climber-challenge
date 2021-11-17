<?php

namespace Hackathon\LevelC;

class RotationString
{
    /**
     * @TODO ! BAM
     *
     * @param $s1
     * @param $s2
     *
     * @return bool|int
     */
    public static function isRotation($s1, $s2)
    {
        /** @TODO */
        if (strlen($s1) != strlen($s2)) {
            return false;
        }
        $tmp = $s1 . $s1;
        return RotationString::isSubString($tmp, $s2); 
    }

    public static function isSubString($s1, $s2)
    {
        $pos = strpos($s1, $s2);

        return $pos;
    }
}