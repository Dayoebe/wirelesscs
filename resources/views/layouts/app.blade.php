<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  @yield('meta')

  <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">
  <link rel="apple-touch-icon" href="{{ asset('icon-192.png') }}">
  <link rel="manifest" href="{{ asset('manifest.webmanifest') }}">
  <meta name="theme-color" content="#2563eb">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="default">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $metaTitle ?: 'Wireless Terminal' }}</title>
    <meta name="author" content="Wireless Computer Services">
    <meta name="description" content="{{ $metaDescription }}">

    <style>

        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    </style>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
            integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    @livewireStyles
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!--- Google stuff -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0Z80EFLGD1"> </script>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0Z80EFLGD1');
</script>


<style>
    [x-cloak] {
        display: none;
    }


    @keyframes marquee {
        0% {
            transform: translateX(100%);
        }

        100% {
            transform: translateX(-100%);
        }
    }
</style>


</head>
<body class="bg-gray-50 font-family-karla">


    <!--------- Navbar starts--->
    <nav class="sticky top-0 left-0 right-0 bg-white shadow-lg">
        <div class="max-w-1xl mx-auto px-2">
          <div class="flex justify-between items-center">
                 <!-- Website Logo -->

                 <a href="{{route('home')}}" class="flex items-center py-2 px-2">
                  <img src="{{ asset('favicon.png') }}" alt="" class="h-8 w-8 mr-2">
                <span class="flex-shrink font-bold text-gray-800 uppercase hover:border-b-2 hover:border-red-500 hover:text-blue-500 lg:text-3xl md:text-2xl sm:text-xl" href="{{route('home')}}">Wireless Terminal</span>
              </a>


              <div class="sm:flex items-center space-x-2 m-auto px-2 hover:border rounded">
                <form method="get" action="{{ route('search') }}" class="flex items-center">
                  <input name="q" value="{{ request()->get('q') }}" autocomplete type="text" placeholder="Search" class="w-24 sm:w-32 md:w-48 border rounded">
                  <button class="flex-shrink-0">
                    <i class="fas fa-search w-10 m-2 h-10 text-white-400 bg-info hover:bg-blue-500"></i>
                  </button>
                </form>
              </div>


              <div class="hidden md:flex items-center sm:space-x-1 lg:space-x-6 ml-auto">
                <a href="{{route('news')}}" class="hover:uppercase p-3 my-4 px-2  font-semibold hover:border-b-2 hover:border-red-500 hover:text-blue-500 rounded-lg hover:bg-gradient-to-r from-white to-indigo-100 shadow transition duration-300 ease-in-out">News</a>
                <a href="{{route('about-us')}}" class="hover:uppercase p-3 my-4 px-2  font-semibold hover:border-b-2 hover:border-red-500 hover:text-blue-500 rounded-lg hover:bg-gradient-to-r from-white to-indigo-100 shadow transition duration-300 ease-in-out">About</a>
                <a href="{{route('contact-us')}}" class="hover:uppercase p-3 my-4 px-2  font-semibold hover:border-b-2 hover:border-red-500 hover:text-blue-500 rounded-lg hover:bg-gradient-to-r from-white to-indigo-100 shadow transition duration-300 ease-in-out">Contact </a>

              <div class="relative group">
                <button class="hover:uppercase p-3 my-4 px-2 font-semibold hover:border-b-2 hover:border-red-500 hover:text-blue-500  hover:bg-gradient-to-r from-white to-indigo-100 shadow transition duration-300 ease-in-out dropdown-toggle flex items-center rounded group" aria-haspopup="true" aria-expanded="false">
                  Category
                  <div class="ml-1">
                    <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none">
                      <i class="fas fa-chevron-down text-sm text-red-600"></i>
                    </div>
                  </div>
                </button>

                <ul class="dropdown-menu absolute hidden bg-white text-gray rounded w-auto p-2 group-hover:block max-h-50 overflow-y-auto">
                  @foreach($categories as $category)
                    <li><a href="{{route('by-category', $category)}}" class="block w-auto hover:bg-blue-200 p-2 space-x-2 ml-auto">{{$category->title}}</a> <hr></li>
                  @endforeach
                </ul>
              </div>

          <script>
              document.addEventListener('DOMContentLoaded', function () {
                const dropdowns = document.querySelectorAll('.group');

                dropdowns.forEach((dropdown) => {
                  dropdown.addEventListener('mouseover', () => {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    menu.classList.remove('hidden');
                  });

                  dropdown.addEventListener('mouseout', () => {
                    const menu = dropdown.querySelector('.dropdown-menu');
                    menu.classList.add('hidden');
                  });
                });
              });
            </script>


                @auth
                <div class="sm:hidden md:flex items-center space-x-7 ml-auto">
                  <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                      <button class="hover:uppercase p-3 my-4 px-2 font-semibold hover:border-b-2 hover:border-red-500 hover:text-blue-500  hover:bg-gradient-to-r from-white to-indigo-100 shadow transition duration-300 ease-in-out dropdown-toggle flex items-center rounded group" aria-haspopup="true" aria-expanded="false">
                        <div class="truncate max-w-[6ch] inline-block overflow-hidden">{{ Auth::user()->name }}</div>
                        <div class="ml-1">
                          <i class="fas fa-chevron-down text-sm text-red-600"></i>
                        </div>
                      </button>
                    </x-slot>

                    <x-slot name="content">
                      <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                      </x-dropdown-link>

                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf

                          <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">

                            {{ __('Log Out') }}

                          </x-dropdown-link>
                      </form>
                    </x-slot>
                  </x-dropdown>
                </div>
                    @else
                      <a href="{{ route('login') }}" class="bg-transparent text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white font-semibold py-2 px-4 rounded text-sm sm:py-1 sm:px-2">Sign in</a>
                      <a href="{{ route('register') }}" class="bg-blue-600 border border-blue-500 hover:bg-white hover:text-blue-500 text-white rounded py-2 px-4 mx-2 text-sm sm:py-1 sm:px-2">Sign Up</a>
                @endauth
            </div>

          <!-- Mobile menu button -->
          <div class="md:hidden flex items-center">
            <button class="outline-none mobile-menu-button">
              <div class="fas fa-bars mx-2 w-6 h-6 text-gray-500 hover:text-green-500">
                <div x-show="!showMenu"> </div>
              </div>
            </button>
          </div>
      </div>
    </div>

			<!-- mobile menu -->
			<div class="hidden mobile-menu max-h-64overflow-y-auto">
				<ul class="p-3">
          <li class="block text-sm px-2 py-4 hover:bg-blue-100 transition duration-300">
            @auth
              <div class="flex md:items-center sm:ml-6">
                <x-dropdown align="left" width="48">
                  <x-slot name="trigger">
                    <button
                      class="hover:bg-blue-600 hover:text-white flex items-center rounded py-2 px-4 mx-2">
                        <div>{{ Auth::user()->name }}</div>
                          <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                              viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                            </svg>
                          </div>
                    </button>
                  </x-slot>
                  <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                      {{ __('Profile') }}
                    </x-dropdown-link>
                       <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                          onclick="event.preventDefault();
                          this.closest('form').submit();">
                          {{ __('Log Out') }}
                        </x-dropdown-link>
                      </form>
                  </x-slot>
                </x-dropdown>
              </div>
              @else
              <a href="{{route('login')}}" class="bg-transparent text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white font-semibold py-2 px-4 rounded text-sm sm:py-1 sm:px-2">Sign in</a>
              <a href="{{route('register')}}" class="bg-blue-600 text-white rounded py-2 px-4 mx-2">Sign Up</a>
            @endauth
          </li>
            <li><a href="{{route('about-us')}}" class="font-semibold hover:border-b-2 hover:border-red-500 hover:text-blue-500  hover:bg-gradient-to-r from-white to-indigo-100 shadow transition duration-300 ease-in-out dropdown-toggle flex items-center rounded group text-sm px-2 py-4">About</a></li> <hr>
            <li><a href="{{route('contact-us')}}" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">Contact</a></li>
          <hr>
          <li><a href="{{route('news')}}" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">News</a></li>
          <hr>
          <li class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300 relative">
            <div class="justify-start">
              <button class="block text-sm px-2 hover:bg-blue-500 transition duration-300 w-full text-left" aria-label="Category" aria-haspopup="true" onclick="toggleDropdown()">
                <span class="w-full">Category</span>
                <i class="fas fa-chevron-down ml-1"></i>
              </button>
            </div>
            <ul class="dropdown-menu absolute hidden bg-white text-gray rounded w-full p-2" id="category-dropdown">
              @foreach($categories as $category)
              <li><a href="{{route('by-category', $category)}}" class="block text-sm px-2 py-4 hover:bg-blue-500 transition duration-300">{{$category->title}}</a></li>
              <hr>
              @endforeach
            </ul>
          </li>

          <script>
          function toggleDropdown() {
            var dropdownMenu = document.getElementById("category-dropdown");
            dropdownMenu.classList.toggle("hidden");
          }
          </script>       <hr>
        </ul>
			</div>

			<script>
				const btn = document.querySelector("button.mobile-menu-button");
				const menu = document.querySelector(".mobile-menu");

				btn.addEventListener("click", () => {
					menu.classList.toggle("hidden");
				});
			</script>
		</nav>

<div class="mx-auto py-3">

    {{ $slot }}

</div>


    <!-- Marquee Section -->
    <div class="bg-red-500 text-white py-3 fixed bottom-0 left-0 w-full overflow-hidden">
        <div class="marquee flex items-center">
            <p class="whitespace-no-wrap px-4 text-3xl">Merry Christmas and Prosperous New Year</p>
            <svg class="w-6 h-6 fill-current" viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                <!-- Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                <path d="M190.5 68.8L225.3 128H224 152c-22.1 0-40-17.9-40-40s17.9-40 40-40h2.2c14.9 0 28.8 7.9 36.3 20.8zM64 88c0 14.4 3.5 28 9.6 40H32c-17.7 0-32 14.3-32 32v64c0 17.7 14.3 32 32 32H480c17.7 0 32-14.3 32-32V160c0-17.7-14.3-32-32-32H438.4c6.1-12 9.6-25.6 9.6-40c0-48.6-39.4-88-88-88h-2.2c-31.9 0-61.5 16.9-77.7 44.4L256 85.5l-24.1-41C215.7 16.9 186.1 0 154.2 0H152C103.4 0 64 39.4 64 88zm336 0c0 22.1-17.9 40-40 40H288h-1.3l34.8-59.2C329.1 55.9 342.9 48 357.8 48H360c22.1 0 40 17.9 40 40zM32 288V464c0 26.5 21.5 48 48 48H224V288H32zM288 512H432c26.5 0 48-21.5 48-48V288H288V512z"></path>
            </svg>
        </div>
    </div>

    <script>
        // JavaScript to apply the marquee animation
        const marquee = document.querySelector('.marquee');
        marquee.style.animation = 'marquee 15s linear infinite';
    </script>





<footer class="bg-gray-800 text-gray-300 py-2 w-full">
  <div class="container mx-auto py-2 flex flex-wrap">
    <div class="w-full md:w-1/3 lg:w-1/3 mb-4 px-2 border-r border-gray-600">
      <!-- About Us and Contact Us content -->
      <h2 class="hover:uppercase text-sm font-semibold text-gray-400 tracking-wider uppercase border-b mb-2 pb-2">About Us</h2>
      <p class="text-gray-400 leading-6">
        {!! \App\Models\TextWidget::getContent('about-us-sidebar') !!}
      </p>
        <p class="hover:uppercase text-sm font-semibold text-gray-400 tracking-wider uppercase border-t mt-2 pt-2 ">Contact Us</p>
        <ul class="flex flex-wrap list-none mt-2">
          <li class="mr-6 mb-2"><a href="https://web.facebook.com/WirelessTerminal" class="mr-2 text-gray-400 hover:text-blue-600 transition duration-300 ease-in-out"><i class="fab fa-facebook fa-2x"></i></a></li>
          <li class="mr-6 mb-2"><a href="https://twitter.com/dayoebe" class="mr-2 text-gray-400 hover:text-blue-400 transition duration-300 ease-in-out"><i class="fab fa-twitter fa-2x"></i></a></li>
          <li class="mr-6 mb-2"><a href="https://www.youtube.com/channel/UC9WC_XRzBaFo47digsuA26Q/" class="mr-2 text-gray-400 hover:text-red-600 transition duration-300 ease-in-out"><i class="fab fa-youtube fa-2x"></i></a></li>
          <li class="mr-6 mb-2"><a href="https://github.com/Dayoebe" class="mr-2 text-gray-400 hover:text-gray-700 transition duration-300 ease-in-out"><i class="fab fa-github fa-2x"></i></a></li>
          <li class="mr-6 mb-2"><a href="https://stackoverflow.com/users/18967430/adedayo-oyetoke" class="mr-2 text-gray-400 hover:text-orange-500 transition duration-300 ease-in-out"><i class="fab fa-stack-overflow fa-2x"></i></a></li>
          <li class="mr-6 mb-2"><a href="https://www.pinterest.com/oyetokeebenezer/" class="mr-2 text-gray-400 hover:text-red-500 transition duration-300 ease-in-out"><i class="fab fa-pinterest fa-2x"></i></a></li>
          <li class="mr-6 mb-2"><a href="https://www.instagram.com/oyetoke.ebenezer/" class="mr-2 text-gray-400 hover:text-pink-500 transition duration-300 ease-in-out"><i class="fab fa-instagram fa-2x"></i></a></li>
          <li class="mr-6 mb-2"><a href="https://www.linkedin.com/in/dayoebe/" class="mr-2 text-gray-400 hover:text-blue-500 transition duration-300 ease-in-out"> <i class="fab fa-linkedin fa-2x"></i></a></li>
          <li class="mr-6 mb-2"><a href="https://wa.me/+2349030036438" class="mr-2 text-gray-400 hover:text-green-500 transition duration-300 ease-in-out"> <i class="fab fa-whatsapp fa-2x"></i></a></li>
          <li class="mr-6 mb-2"><a href="https://t.me/Dayoebe" class="mr-2 text-gray-400 hover:text-blue-600 transition duration-300 ease-in-out"> <i class="fab fa-telegram fa-2x"></i></a></li>

        </ul>
    </div>

    <div class="w-full md:w-1/3 lg:w-1/3 mb-4 px-2 border-r border-gray-600">
      <!-- Top Categories content -->
      <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase border-b mb-2 pb-2">Top Categories</h3>
      <ul class="space-y-3">
        @foreach($categories as $category)
        <li><a href="{{route('by-category', $category)}}" class="hover:uppercase hover:text-white hover:bg-gray-900 block w-auto  px-2 space-x-2 ml-auto">{{$category->title}}</a> <hr></li>
      @endforeach
      <li><a href="{{route('news')}}" class="hover:uppercase hover:text-white hover:bg-gray-900 block w-auto  px-2 space-x-2 ml-auto">News</a></li><hr>
      </ul>
    </div>







       <div class="w-full md:w-1/3 lg:w-1/3 mb-1 px-2">
      <!-- Subscribe to our newsletter and Advertise content -->
      <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase border-b mb-2 pb-2">Subscribe to our newsletter</h3>
      <p>By signing up to the Wireless Terminal newsletter you agree to receive electronic communications from Wireless Terminal that may sometimes include advertisements or sponsored content.</p> <hr class="text-grey-500" >

      <form action="{{ route('subscribe') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="email" class="hover:uppercase hover:text-blue-600 block text-gray-400 font-bold mb-2">Email address</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-input rounded-md text-gray-800 shadow-sm block w-full {{ (isset($errors) && $errors->has('email')) ? 'border-red-500' : '' }}">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


        </div>
        <div class="flex">
          <button type="submit" class="w-full hover:uppercase py-2 px-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-opacity-75">Subscribe</button>
          <button type="button" class="w-full hover:uppercase py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 ml-2" onclick="event.preventDefault(); document.getElementById('unsubscribe-form').submit();">Unsubscribe</button>
      </div>

    </form>

    <form id="unsubscribe-form" action="{{ route('unsubscribe') }}" method="POST" style="display: none;">
        @csrf
        <input type="email" name="email" id="unsubscribe-email" value="{{ old('email') }}" class="form-input rounded-md text-gray-800 shadow-sm block w-full {{ (isset($errors) && $errors->has('email')) ? 'border-red-500' : '' }}">
        <button type="submit">Unsubscribe</button>
    </form>



    <h3 class="text-sm font-semibold text-gray-400 tracking-wider uppercase border-b  mb-2 py-3">Advertise</h3>
    <ul class="mt-2 space-y-4">
        <li><a href="mailto:mail@wirelesscs.com" class="hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900 block w-auto space-x-2 ml-auto"> mail@wirelesscs.com </a> </li>
    </ul>
    </div>
  </div>
</footer>



@include('cookie-consent::index')




  <footer class="bg-gray-800 text-gray-300">
    <div class="container mx-auto px-2">
      <div class="flex flex-wrap justify-between items-center">
        <div class="flex flex-wrap justify-center">
          <a href="{{route('home')}}" class="hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900 border-r border-gray-300">Home</a>
          <a href="{{route('by-category', $category)}}" class="hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900 border-r border-gray-300">Category</a>
          <a href="{{route('about-us')}}" class="hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900 border-r border-gray-300">About</a>
          <a href="{{route('contact-us')}}" class="hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900 border-r border-gray-300">Contact</a>
          <a href="{{route('privacy-policy')}}" class="hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900 border-r border-gray-300">Privacy Policy</a>
          <a href="{{route('terms-condition')}}" class="hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900 border-r border-gray-300">Terms and Condition</a>
          <a href="{{route('content-guideline')}}" class="hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900">Content Guideline</a>


        </div>
        <hr class="my-2 w-full border-gray-600 md:hidden">
        <div class=" flex flex-wrap  text-center md:text-left justify-center md:justify-start pt-2 md:hidden">
            <a href="{{route('home')}}" class="uppercase py-1 hover:text-white pr-1 hover:bg-gray-900">&copy; Wireless Computer Services</a>
            <p class="hover:uppercase pl-1 text-lg text-gray-600 hover:bg-gray-900 hover:text-blue-500">{{ \App\Models\TextWidget::getTitle('header') }}</p>
          </div>
        <hr class="my-2 w-full border-gray-600 md:hidden">
        <div class="text-sm md:text-base flex flex-inline space-x-3">
          <p class="pr-3 hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900 border-r border-gray-300"><i class="far fa-calendar-alt"></i> <?php echo(date('D d - M, Y')); ?></p>
          <p class="hover:uppercase hover:text-white px-2 py-1 hover:bg-gray-900 border-r border-gray-300"><i class="far fa-clock"></i> <?php date_default_timezone_set("Africa/Lagos"); echo(strftime('%H:%M %p %Z %z')); ?></p>
        </div>
      </div>
    </div>
  </footer>

@livewireScripts
</body>
</html>
