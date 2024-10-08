<?php

namespace ArafatIslamKhairul\LaravelPageSpeed\Middleware;

class RemoveComments extends PageSpeed
{
    public function apply($buffer)
    {
        $replace = [
            '/<!--[^]><!\[](.*?)[^\]]-->/s' => ''
        ];

        return $this->replace($replace, $buffer);
    }
}
