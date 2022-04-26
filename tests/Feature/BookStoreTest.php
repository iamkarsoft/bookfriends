<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// this runs before each test
beforeEach(function () {
    $this->user = User::factory()->create();
});

it('only allows authenticated users to store book')
    ->post('/books')
    ->assertStatus(302);


it('creates a book', function () {

    $this->actingAs($this->user)
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
        'user_id' => $this->user->id,
        'status' => 'WANT_TO_READ'
    ]);
});


it('require a book and a title')
    // ->skip() // will skip this test
    ->tap(fn () => $this->actingAs($this->user))
    ->post('/books')
    ->assertSessionHasErrors(['title', 'author', 'status']);


it('requires a valid status')
    ->tap(fn () => $this->actingAs($this->user))
    ->post('/books', [
        'status' => 'Eating'
    ])
    ->assertSessionHasErrors(['status']);
