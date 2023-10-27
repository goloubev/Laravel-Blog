<?php

namespace Tests\Unit\Database\Factories;

use PHPUnit\Framework\TestCase;
use Database\Factories\CategoryFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class CategoryFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function testCategoryFactory()
    {
        // Generate attributes
        $categoryAttributes = CategoryFactory::new()->definition();

        // Check generated attributes
        $this->assertArrayHasKey('name', $categoryAttributes);
        $this->assertArrayHasKey('slug', $categoryAttributes);

        // Check 'slug' attribute
        $expectedSlug = Str::slug($categoryAttributes['name']);
        $this->assertSame($expectedSlug, $categoryAttributes['slug']);
    }
}
