<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('only allows authenticated users to store book')
    ->post('/books')
    ->assertStatus(302);


it('creates a book', function () {
    $user = User::factory()->create();
    $this->actingAs($user)
        ->post('/books', [
            'title' => 'A book',
            'author' => 'An author',
            'status' => 'WANT_TO_READ'
        ]);


    $this->assertDatabaseHas('books', [
        'title' => 'A book',
        'author' => 'An author'
    ]);

    $this->assertDatabaseHas('book_user', [
        'user_id' => $user->id,
        'status' => 'WANT_TO_READ'
    ]);
});
