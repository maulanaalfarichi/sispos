<?php

use App\Token;

class ExampleTest extends PHPUnit_Framework_TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $token = new Token();

        $this->assertTrue($token->id == env('JWT_KEY'));
    }
}
