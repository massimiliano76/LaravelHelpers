<?php

use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;

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

    public function test_gravatar()
    {
        $avatar = gravatar('test@email.com');
        $expected = "https://www.gravatar.com/avatar/93942e96f5acd83e2e047ad8fe03114d?s=100&d=&r=g";
        $this->assertSame($expected, $avatar); 

        $avatar = gravatar('test@email.com', 200);
        $expected = "https://www.gravatar.com/avatar/93942e96f5acd83e2e047ad8fe03114d?s=200&d=&r=g";
        $this->assertSame($expected, $avatar); 
		
        $avatar = gravatar('test@email.com', 'not-a-valid-size');
        $expected = "https://www.gravatar.com/avatar/93942e96f5acd83e2e047ad8fe03114d?s=100&d=&r=g";
        $this->assertSame($expected, $avatar); 
        
        $avatar = gravatar('test@email.com', 100, '', 'pg');
        $expected = "https://www.gravatar.com/avatar/93942e96f5acd83e2e047ad8fe03114d?s=100&d=&r=pg";
        $this->assertSame($expected, $avatar); 
		
        $avatar = gravatar('test@email.com', 200, 'http://mysite.com/default.png', 'pg');
        $expected = "https://www.gravatar.com/avatar/93942e96f5acd83e2e047ad8fe03114d?s=200&d=http://mysite.com/default.png&r=pg";
        $this->assertSame($expected, $avatar); 
    }

    public function test_is_active()
    {
        Route::shouldReceive('currentRouteName')->once()->andReturn('about');
        $this->assertEquals('active', isActive(['faq', 'about']));

        Route::shouldReceive('currentRouteName')->once()->andReturn('home');
        $this->assertEquals('active', isActive('home'));

        URL::shouldReceive('current')->once()->andReturn('http://localhost:8000/about');
        $this->assertEquals('custom-clas-name', isActive('about', 'custom-clas-name'));

        Route::shouldReceive('currentRouteName')->once()->andReturn('news');
        $this->assertEquals('', isActive('home'));
    }
}