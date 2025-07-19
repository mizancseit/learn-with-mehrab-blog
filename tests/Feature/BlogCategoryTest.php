<?php

namespace Tests\Feature;

use App\Models\BlogCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogCategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_category()
    {
        $category = BlogCategory::factory()->create([
            'title' => 'Electronics',
        ]);

        $this->assertDatabaseHas('blog_categories', [
            'title' => 'Electronics',
        ]);
    }

    /** @test */
    public function it_can_read_a_category()
    {
        $category = BlogCategory::factory()->create([
            'title' => 'Books',
        ]);

        $found = BlogCategory::find($category->id);

        $this->assertEquals('Books', $found->title);
    }

    /** @test */
    public function it_can_update_a_category()
    {
        $category = BlogCategory::factory()->create([
            'title' => 'Old Name',
        ]);

        $category->update(['title' => 'New Name']);

        $this->assertDatabaseHas('blog_categories', [
            'id' => $category->id,
            'title' => 'New Name',
        ]);
    }

    /** @test */
    public function it_can_delete_a_category()
    {
        $category = BlogCategory::factory()->create();

        $category->delete();

        $this->assertDatabaseMissing('blog_categories', [
            'id' => $category->id,
        ]);
    }
}
