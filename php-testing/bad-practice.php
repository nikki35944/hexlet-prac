<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Implementations\Cart;

class SolutionTest extends TestCase
{
    public function testCart(): void
    {
        // BEGIN (write your solution here)
        $cart = new Cart();
        $cart->addItem(['name' => 'car', 'price' => 100], 3);
        $cart->addItem(['name' => 'tv', 'price' => 10], 5);
        $this->assertEquals(count($cart->getItems()), 2);
        $this->assertEquals($cart->getCount(), 8); // 8
        $this->assertEquals($cart->getCost(), 350); // 350
        // END
    }
}