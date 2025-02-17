<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment Successful - Laravel Stripe Demo</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-50 w-[72%] py-6 min-h-dvh mx-auto antialiased">
    <x-header />

    <main class="mt-16">
        <div class="flex justify-center items-center">
            <div class="py-6 px-12 rounded-lg border-2 border-green-300 bg-green-200 flex flex-col items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor"
                    class="size-10">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h1 class="mt-2 mb-4 font-bold text-gray-950 text-2xl">
                    Success
                </h1>
                <p>
                    Congratulations, {{ $customer->name }}. Your payment is successful!
                </p>
                <a href="{{ route('index') }}" class="mt-6 text-sm underline">
                    Go Home
                </a>
            </div>
        </div>
    </main>
</body>

</html>
