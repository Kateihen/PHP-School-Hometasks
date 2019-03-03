<?php

interface ResolverInterface
{
    public function resolve($index, $hranilishche, $size);
    public function resolveRead($index, $hranilishche, $size);
}
