<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function Pest\Laravel\get;

uses(RefreshDatabase::class);
test('greets the user if they are signed out', function () {
    get('/')
        ->assertSee('BookFriends')
        ->assertSee('Sign up to get started.')
        ->assertDontSee(['Feed']);
});


it('shows authenticated menu items if user is signed in', function () {

    // sign in as a user
    $user = User::factory()->create();

    // acting as a user
    $this->actingAs($user)
        ->get('/')
        ->assertSeeText(['Feed', 'My books', 'Add a book', 'Friend', $user->name]);

    // see if the correct name and navigation shows

});


it('shows unauthenticated menu items if user is not signed in', function () {


    get('/')
        ->assertSeeText(['Login', 'Register', 'Home']);
});
