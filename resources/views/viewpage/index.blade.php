<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-cyan-800">
    <div class="flex min-h-screen flex-col items-center justify-center">
        <h1 id="typewriter" class="text-4xl font-bold mb-8"></h1>
        <h3 class="mb-8">Please click the cards below to explore our amenities!</h3>
        <script>
            const words = ["Welcome To The College Amenities!"];
            let i = 0;
            let j = 0;
            let currentWord = "";
            let isDeleting = false;

            function type() {
                currentWord = words[i];
                if (isDeleting) {
                    document.getElementById("typewriter").textContent = currentWord.substring(0, j - 1);
                    j--;
                    if (j == 0) {
                        isDeleting = false;
                        i++;
                        if (i == words.length) {
                            i = 0;
                        }
                    }
                } else {
                    document.getElementById("typewriter").textContent = currentWord.substring(0, j + 1);
                    j++;
                    if (j == currentWord.length) {
                        isDeleting = true;
                    }
                }
                setTimeout(type, 100);
            }

            type();
        </script>

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2 lg:grid-cols-3 ml-72 gap-y-10 ">
            <!-- Card 1 -->
            <div class="group relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30">
                <div class="h-96 w-72">
                    <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="/img/coffee.png" alt="" />
                </div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70"></div>
                <div class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
                    <h1 class="font-dmserif text-3xl font-bold text-white">Cafe</h1>
                    <p class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">A cozy retreat for coffee enthusiasts, offering aromatic blends and delectable pastries.</p>
                    <button class="rounded-full bg-neutral-900 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60"><a href="{{ route('login') }}">See More</a></button>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="group relative cursor-pointer items-center justify-center overflow-hidden transition-shadow hover:shadow-xl hover:shadow-black/30 mr-10">
                <div class="h-96 w-72">
                    <img class="h-full w-full object-cover transition-transform duration-500 group-hover:rotate-3 group-hover:scale-125" src="/img/stationery.png" alt="" />
                </div>
                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black group-hover:from-black/70 group-hover:via-black/60 group-hover:to-black/70"></div>
                <div class="absolute inset-0 flex translate-y-[60%] flex-col items-center justify-center px-9 text-center transition-all duration-500 group-hover:translate-y-0">
                    <h1 class="font-dmserif text-3xl font-bold text-white">Stationery</h1>
                    <p class="mb-3 text-lg italic text-white opacity-0 transition-opacity duration-300 group-hover:opacity-100">An organized oasis of creativity, providing the tools for expression and organization in style.</p>
                    <button class="rounded-full bg-neutral-900 py-2 px-3.5 font-com text-sm capitalize text-white shadow shadow-black/60"><a href="{{ route('login') }}">See More</a></button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
