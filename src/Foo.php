<?php

namespace App;

class Foo
{
    public function bar(): string
    {
        return get_class($this);
    }

    public function runMe()
    {
        return $this->bar();
    }
}