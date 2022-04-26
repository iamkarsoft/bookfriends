<x-layouts.app>

    <x-slot name="header">
        BookFriends
    </x-slot>

    <div class="mt-8">
        <p>Create  Books</p>

        <form action="/books" method="Post" class="space-y-8">
            @csrf
            <div>
                <label for="name">Title</label>
                <input type="text" id="name" name="name" id="" class="block border border-slate-400 rounded mt-2">
            </div>



            <div>
                <button class="bg-indigo-800 text-white rounded p-4">Register</button>
            </div>

        </form>
    </div>
</x-layouts.app>
