<?php

use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);
it('has errors if details are not provided', function () {
    $this->post('/register')
        ->assertSessionHasErrors(['name', 'email', 'password']);
});


test('register', function () {
    $this->post('/register', [
        'name' => 'Kofi Ramos',
        'email' => 'kofiramos@gmail.com',
        'password' => 'hellofresh'
    ])->assertRedirect('/');


    $this->assertDatabaseHas('users', [
        'name' => 'Kofi Ramos',
        'email' => 'kofiramos@gmail.com'
    ])->assertAuthenticated();
});
