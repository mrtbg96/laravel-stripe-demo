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

        <section class="mt-16">
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
        </section>

        <section class="mt-16">
            <div class="flex justify-between items-center">
                <x-heading title="Orders" :counter="count($orders)" />
                <span></span>
            </div>

            <div class="mt-12">
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Session ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Total Price
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orders as $order)
                                <tr class="border-b border-gray-200">
                                    <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap">
                                        {{ $order->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $order->session_id }}
                                    </td>
                                    <td class="px-6 py-4">
                                        ${{ $order->total_price }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <x-badge :status="$order->status" />
                                    </td>
                                </tr>
                            @empty
                                <tr class="border-b border-gray-200">
                                    <td scope="row" colspan="4" class="px-6 py-4 text-center">
                                        No data found!
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </body>
</html>
