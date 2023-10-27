<?php

namespace Tests\Unit\Database\factoriess;

use Database\Factories\PostFactory;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use PHPUnit\Framework\TestCase;
use App\Models\Category;
use App\Models\User;

class PostFactoryTest extends TestCase
{
    use RefreshDatabase;

    public function testPostFactory()
    {
        // Generate attributes
        $postAttributes = PostFactory::new()->definition();

        // Check generated attributes
        $this->assertArrayHasKey('user_id', $postAttributes);
        $this->assertArrayHasKey('category_id', $postAttributes);
        $this->assertArrayHasKey('slug', $postAttributes);
        $this->assertArrayHasKey('title', $postAttributes);
        $this->assertArrayHasKey('thumbnail', $postAttributes);
        $this->assertArrayHasKey('excerpt', $postAttributes);
        $this->assertArrayHasKey('body', $postAttributes);

        // Check 'slug'
        $expectedSlug = Str::slug($postAttributes['title']);
        $this->assertSame($expectedSlug, $postAttributes['slug']);

        // Check 'title'
        $expectedTitle = $postAttributes['title'];
        $this->assertSame($expectedTitle, $postAttributes['title']);

        // Check 'thumbnail'
        $thumbnail = realpath(__DIR__ . '/../../../../').'/public/images/illustration-' . rand(1, 5) . '.png';
        $this->assertFileExists($thumbnail);
    }
}
