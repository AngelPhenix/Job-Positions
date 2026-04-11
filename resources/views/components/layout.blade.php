<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobPositions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-zinc-950 text-zinc-100 font-hanken-grotesk pb-10">
    <div class="px-10">
        <nav class="flex justify-between items-center py-4 border-b border-zinc-700/70">
            <div>
                <a href="/">
                    <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="logo">
                </a>
            </div>
            <div class="space-x-6 font-bold text-zinc-300">
                <a class="hover:text-orange-400 transition-colors duration-150" href="#">Jobs</a>
                <a class="hover:text-orange-400 transition-colors duration-150" href="#">Careers</a>
                <a class="hover:text-orange-400 transition-colors duration-150" href="#">Salaries</a>
                <a class="hover:text-orange-400 transition-colors duration-150" href="#">Companies</a>
            </div>

            @auth
                <div class="space-x-6 font-bold flex text-zinc-300">
                    <a class="hover:text-orange-400 transition-colors duration-150" href="/jobs/create">Post a job</a>

                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')
                        <button class="hover:text-orange-400 transition-colors duration-150">Log Out</button>
                    </form>
                </div>
            @endauth

            @guest()
                <div class="space-x-6 font-bold text-zinc-300">
                    <a class="hover:text-orange-400 transition-colors duration-150" href="/register">Sign Up</a>
                    <a class="hover:text-orange-400 transition-colors duration-150" href="/login">Log In</a>
                </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-[1120px] mx-auto">
            {{ $slot }}
        </main>

    </div>
</body>
</html>