<?php

namespace App;

class Foo
{
    public function bar(): string
    {
        return get_class($this);
    }

    public function baz(): void
    {
        $this->bar();
    }

    public function __destruct()
    {
        try {
            $this->bar();
        } catch (\Throwable) {
            // ...
        }
    }
}