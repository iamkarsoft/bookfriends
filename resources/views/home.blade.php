<x-layouts.app>

    <x-slot name="header">
        BookFriends
    </x-slot>

    @guest
    <div class="mt-8">
    </div>
    @endguest

    @auth
    <div class="mt-8 space-y-6">
        <div>
            <header>
                <h1>My Books</h1>
            </header>
        </div>

        <div class="mt-4 space-y-6">
            @foreach ($booksByStatus as $status => $books )

            <div class="space-y-4">
                <p class="text-xl font-bold">{{App\Models\Pivot\BookUser::$statuses[$status]}}</p>

                <div>
                @foreach ($books as $book )
                    <x-book :book="$book">
                        <x-slot name="links">
                            Links
                        </x-slot>
                    </x-book>
                @endforeach
                </div>
            </div>
            @endforeach

        </div>
    </div>
    @endauth
</x-layouts.app>
