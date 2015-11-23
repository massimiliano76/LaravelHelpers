<?php

use Illuminate\Support\Facades\Lang;

class HelpersTest extends PHPUnit_Framework_TestCase
{
    public function test_l_helper()
    {
        Lang::shouldReceive('has')->once()->with('laravel.welcome')->andReturn(true);
        Lang::shouldReceive('get')->once()->with('laravel.welcome', [])->andReturn("Welcome to Laravel");
        $this->assertEquals('Welcome to Laravel', t('laravel.welcome', 'Welcome to Rails'));

        Lang::shouldReceive('has')->once()->with('laravel.welcome')->andReturn(false);
        $this->assertEquals('Welcome to Rails', t('laravel.welcome', 'Welcome to Rails'));
    }
}