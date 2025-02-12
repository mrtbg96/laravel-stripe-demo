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
            <x-heading title="Products" />

            <div class="mt-12 grid grid-cols-4 gap-6">
                <div class="bg-slate-50 border border-slate-300 shadow rounded-lg">
                    <div>
                        <img src="" alt="" class="rounded-lg">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-slate-600">Product Name</h3>
                        <p class="mt-4 text-slate-400 text-sm">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Non sunt in sint voluptas vero. Porro libero est quibusdam.
                            Maxime soluta sequi adipisci destuctida alles polar di.
                        </p>
                        <p class="mt-4 font-bold text-lime-600">
                            $120.00
                        </p>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-300 shadow rounded-lg">
                    <div>
                        <img src="" alt="" class="rounded-lg">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-slate-600">Product Name</h3>
                        <p class="mt-4 text-slate-400 text-sm">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Non sunt in sint voluptas vero. Porro libero est quibusdam.
                            Maxime soluta sequi adipisci destuctida alles polar di.
                        </p>
                        <p class="mt-4 font-bold text-lime-600">
                            $120.00
                        </p>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-300 shadow rounded-lg">
                    <div>
                        <img src="" alt="" class="rounded-lg">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-slate-600">Product Name</h3>
                        <p class="mt-4 text-slate-400 text-sm">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Non sunt in sint voluptas vero. Porro libero est quibusdam.
                            Maxime soluta sequi adipisci destuctida alles polar di.
                        </p>
                        <p class="mt-4 font-bold text-lime-600">
                            $120.00
                        </p>
                    </div>
                </div>
                <div class="bg-slate-50 border border-slate-300 shadow rounded-lg">
                    <div>
                        <img src="" alt="" class="rounded-lg">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-slate-600">Product Name</h3>
                        <p class="mt-4 text-slate-400 text-sm">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Non sunt in sint voluptas vero. Porro libero est quibusdam.
                            Maxime soluta sequi adipisci destuctida alles polar di.
                        </p>
                        <p class="mt-4 font-bold text-lime-600">
                            $120.00
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </body>
</html>
