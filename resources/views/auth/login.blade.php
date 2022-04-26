<x-layouts.app>
    <x-slot name="header">
        Login
    </x-slot>

    <div class="mt-8">
        <form action="/login" class="space-y-8">
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" id="" class="block border border-slate-400 rounded mt-2">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" id="" class="block border border-slate-400 rounded mt-2">
            </div>

            <div>
                <button class="bg-indigo-800 text-white rounded p-4">Login</button>
            </div>

        </form>
    </div>

</x-layouts.app>
