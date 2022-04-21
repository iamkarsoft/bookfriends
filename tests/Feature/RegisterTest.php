<?php

it('has errors if details are not provided', function () {
    $this->post('/register')
        ->assertSessionHasErrors(['name', 'email', 'password']);
});
