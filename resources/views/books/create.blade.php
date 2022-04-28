<x-layouts.app>

    <x-slot name="header">
        BookFriends
    </x-slot>

    <div class="mt-8">
        <p>Add a book</p>

        <form action="/books" method="Post" class="space-y-8">
            @csrf
            <div>
                <label for="title" class="block font-bold my-2">Title</label>
                <input type="text" id="title" name="title" id="" value="{{old('title')}}" class="block border border-slate-400 rounded mt-2">
                @error('title')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="author"  class="block font-bold my-2">Author</label>
                <input type="text" id="author" name="author" id=""  value="{{old('author')}}" class="block border border-slate-400 rounded mt-2">
                @error('author')
                   <span class="text-red-400"> {{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="status"  class="block font-bold my-2">status</label>
                <select type="text" id="status" name="status" id="status"
                 class="block border border-slate-400 rounded mt-2">
                 @foreach(\App\Models\Pivot\BookUser::$statuses as $key => $status)
                    <option value="{{ $key }}">{{ $status }}</option>
                 @endforeach
                </select>
                @error('status')
                   <span class="text-red-400"> {{ $message }}</span>
                @enderror
            </div>

            <div>
                <button class="bg-indigo-800 text-white rounded p-4">Add a book</button>
            </div>

        </form>
    </div>
</x-layouts.app>
