<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LessonsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLessonCreation()
    {
        $title = 'Sapiente ad quasi velit.';

        $this->assertDatabaseHas('lessons', [
            'title'=> $title
        ]);
    }
}
