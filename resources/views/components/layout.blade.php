<!DOCTYPE HTML>
<head>
<title>Blog</title>
<link href="//unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
<link href="//fonts.gstatic.com" rel="preconnect" />
<link href="//fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div class="mt-8 md:mt-0">
                <a href="/home">
                    <img src="/images/logo.svg" alt="Logo" width="165" height="16" />
                </a>
            </div>
            <div>
                @auth
                    <span class="text-xs font-bold uppercase">Welcome, {{ auth()->user()->name}}</span> |
                    <a href="/admin/posts" class="text-xs font-bold uppercase">Administration</a> |
                    <a href="/logout" class="text-xs font-bold uppercase">Logout</a>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a> |
                    <a href="/login" class="text-xs font-bold uppercase">Log in</a>
                @endauth
            </div>
        </nav>

        @yield('content')

        <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width:145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">
                    <form method="POST" action="#" class="lg:flex text-sm">
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input name="newsletter_email" id="newsletter_email" type="text" placeholder="Your email address" class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                        </div>

                        <button type="submit" class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>

    <x-flash />
</body>
