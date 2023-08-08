<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todo-it</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    {{-- blade-formatter-disable --}}
    <style type="text/tailwindcss">
        .btn {
            @apply rounded-md px-4 py-1 text-center font-medium shadow-sm ring-1 ring-slate-700/10 text-slate-700 hover:bg-slate-50 hover:text-slate-400
        }
        label {
            @apply font-bold text-neutral-800 text-2xl
        }
        input, textarea {
            @apply border w-full rounded-lg h-12 mt-3 text-slate-500 ps-4 font-bold
        }
        textarea {
            @apply pt-3
        }
        .error {
            @apply text-red-500 text-sm
        }
        .cta {
            @apply bg-blue-500 ring-blue-700/40 text-neutral-50 hover:bg-blue-50 hover:text-blue-700/40
        }
    </style>
    {{-- blade-formatter-enable --}}
    @yield('styles')
    <script src="https://kit.fontawesome.com/33b68c81a7.js" crossorigin="anonymous"></script>
</head>
<body class="container mx-auto my-10 max-w-sm bg-neutral-50">

    <nav class="flex content-center items-center justify-between mb-6">
        @yield('cta')
        <h1 class="text-xl text-neutral-800 text-center font-bold">@yield('title')</h1>
        @hasSection('secondary-cta')
            @yield('secondary-cta')
            @else
            <span></span>
        @endif
    </nav>

    <div x-data="{flash:true}">
        @if(session()->has('success'))
        <div x-show="flash" class="relative mb-10 rounded border border-green-400 bg-green-100 px-4 py-3 text-sm text-green-700" role="alert">
            <strong class="font-bold text-lg">Success!</strong> <div>{{session()->get('success')}}</div>
            <span class="absolute top-0 right-0 px-4 py-3">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                  stroke-width="1.5" @click="flash = false"
                  stroke="currentColor" class="h-6 w-6 cursor-pointer">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </span>
        </div>
        @endif
    </div>
    @yield('content')
</body>
</html>
