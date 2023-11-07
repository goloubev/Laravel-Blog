<?php

namespace Tests\Unit\Database\Factories;

use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;
use Illuminate\Support\Str;

class UserFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function testUserFactory()
    {
        $factory = UserFactory::new();

        // Generate attributes
        $attributes = $factory->definition();

        // Check generated attributes
        $this->assertArrayHasKey('name', $attributes);
        $this->assertArrayHasKey('username', $attributes);
        $this->assertArrayHasKey('email', $attributes);
        $this->assertArrayHasKey('password', $attributes);
        $this->assertArrayHasKey('remember_token', $attributes);

        // Check 'username'
        $expectedUsername = Str::slug($attributes['name']);
        $this->assertSame($expectedUsername, $attributes['username']);
    }
}
