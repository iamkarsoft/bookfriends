<?php



use App\Models\Book;
use App\Models\User;
use function Pest\Laravel\get;
use function Pest\Laravel\post;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);


beforeEach(function () {
    $this->user = User::factory()->create();
});


it('shows books the user want to read', function () {

    $this->user->books()->attach($book = Book::factory()->create(), [
        'status' => 'WANT_TO_READ'
    ]);


    actingAs($this->user)
        ->get('/')
        ->assertSeeText('Want to read')
        ->assertSeeText($book->title);
});


it('shows books the user read', function () {

    $this->user->books()->attach($book = Book::factory()->create(), [
        'status' => 'Read'
    ]);


    actingAs($this->user)
        ->get('/')
        ->assertSeeText('Read')
        ->assertSeeText($book->title);
});


it('shows books the user is reading', function () {

    $this->user->books()->attach($book = Book::factory()->create(), [
        'status' => 'Reading'
    ]);


    actingAs($this->user)
        ->get('/')
        ->assertSeeText('Reading')
        ->assertSeeText($book->title);
});
