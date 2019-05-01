<?php

interface ResolverInterface
{
    public function resolve($index, $hranilishche, $value, $size);
    public function resolveRead($index, $hranilishche, $value, $size);
}
