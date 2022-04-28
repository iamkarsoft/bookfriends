<?php

use App\Models\User;
use App\Models\Pivot\BookUser;
use Illuminate\Foundation\Testing\RefreshDatabase;


uses(RefreshDatabase::class);

beforeEach(function () {
    $this->user = User::factory()->create();
});


test('have access to create book page', function () {

    $this->actingAs($this->user)
        ->get('/books')
        ->assertSeeText('Add a book');
});



test('make sure all the status are available in dropdown', function () {

    $this->actingAs($this->user)
        ->get('/books')
        ->assertSeeTextInOrder(BookUser::$statuses);
});
