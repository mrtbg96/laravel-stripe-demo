<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Stripe Demo</title>
        @vite('resources/css/app.css')
    </head>
    <body class="bg-gray-50 w-[72%] py-6 min-h-dvh mx-auto antialiased">
        <x-header />

        <main class="mt-16">
            <div class="flex justify-between items-center">
                <x-heading title="Products" :counter="count($products)" />
                @unless (count($products) == 0)
                    <form action="{{ route('checkout') }}" method="POST">
                        @csrf
                        <button class="py-2 px-4 rounded-lg bg-lime-600 font-bold text-white hover:bg-lime-700 transition-colors duration-300">
                            Checkout
                        </button>
                    </form>
                @endunless
            </div>

            <div class="mt-12 grid grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="bg-slate-50 border border-slate-300 shadow rounded-lg hover:border-lime-600 hover:shadow-lime-300 hover:cursor-pointer transition-colors duration-300">
                        <div>
                            <img
                                src="{{ $product->image }}"
                                alt="{{ $product->name }}"
                                class="rounded-lg w-full"
                            >
                        </div>
                        <div class="p-4">
                            <h3 class="font-bold text-slate-600">
                                {{ $product->name }}
                            </h3>
                            <p class="mt-4 text-slate-400 text-sm">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                Non sunt in sint voluptas vero. Porro libero est quibusdam.
                                Maxime soluta sequi adipisci destuctida alles polar di.
                            </p>
                            <p class="mt-4 font-bold text-lime-600">
                                ${{ $product->price }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </main>
    </body>
</html>
