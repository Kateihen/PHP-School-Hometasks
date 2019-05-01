<?php

interface ResolverInterface
{
    public function resolve($index, $hranilishche, $value);
    public function resolveRead($index, $hranilishche, $value);
}
