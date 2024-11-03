<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="JRLRppTqB5rejSt0IekunYWCmDOTEL0ZiHShlgoo">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/build/assets/app-D0QO6I-I.css">

    <!-- Scripts -->
    <link rel="preload" as="style" href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/build/assets/app-D0QO6I-I.css" />
    <link rel="modulepreload" href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/build/assets/app-DI6-W-r-.js" />
    <link rel="stylesheet" href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/build/assets/app-D0QO6I-I.css" />
    <script type="module" src="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/build/assets/app-DI6-W-r-.js"></script>
    <script src="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/build/assets/app-DI6-W-r-.js" defer></script>

</head>
<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-white-100">
        <div>
            <a href="/">
                <img src="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/storage/images/logo bird.png" alt="SpinShare Logo" class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg border border-gray-500">
            <!-- Session Status -->
            <form method="POST" action="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/login">
                <input type="hidden" name="_token" value="JRLRppTqB5rejSt0IekunYWCmDOTEL0ZiHShlgoo" autocomplete="off">
                <!-- Email Address -->
                <div>
                    <label class="block font-medium text-sm text-gray-700" for="email">Email</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="email" type="email" name="email" required="required" autofocus="autofocus" autocomplete="username">
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label class="block font-medium text-sm text-gray-700" for="password">Password</label>
                    <input class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full" id="password" type="password" name="password" required="required" autocomplete="current-password">
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ms-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="https://spinshare-h9hhbff5dfdpd7hq.westeurope-01.azurewebsites.net/forgot-password">
                        Forgot your password?
                    </a>
                    
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 ms-3">
                        Log in
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
