@props(['book'])

<div class="mt-2">

    <div class="flex items-center justify-between p-6 rounded bg-slate-100">
        <div>

            <h2 class="text-lg font-bold text-slate-800">Title: {{ $book->title }}</h2>

            <div class="text-sm text-slate-600">
                {{ $book->author }}
            </div>
        </div>



        @isset($links)
            <div>
                {{ $links }}
            </div>
        @endisset
    </div>
</div>
