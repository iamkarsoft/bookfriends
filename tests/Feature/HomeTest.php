<?php

test('greets the user if they are signed out', function () {
    $this->get('/')
        ->assertSee('BookFriends')
        ->assertSee('Sign up to get started.');
});
