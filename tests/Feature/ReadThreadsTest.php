<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadThreadsTest extends TestCase
{
    use RefreshDatabase;

    private $thread;
    private $reply;

    public function setUp()
    {
        parent::setUp();

        $this->thread = factory('App\Thread')->create();

        $this->reply = factory('App\Reply')->create([
            'thread_id' => $this->thread->id,
            'user_id' => $this->thread->user_id,
        ]);
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_view_a_single_thread()
    {
        $this->get('/threads/' . $this->thread->id)
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replied_associated_with_a_thread()
    {
        $this->get('/threads/' . $this->thread->id)
            ->assertSee($this->reply->body);
    }
}
