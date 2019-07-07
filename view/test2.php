<?php

class Test {

    public function foo() {
        echo "this is some";
    }

    public function foo2() {
        echo " this is farhan";
        $this->foo();
    }
}

$test = new Test();
$test->foo2();
