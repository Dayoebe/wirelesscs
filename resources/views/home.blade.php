<x-app-layout meta-title="Wireless Terminal"
              meta-description="Welcome to Wireless Terminal! We are a community of technology enthusiasts and professionals dedicated to sharing knowledge, insights, and experiences related to a broad range of technology topics. Join us today and be a part of our growing community of tech enthusiasts!">
    <div class="container max-w-9xl mx-auto py-3">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <!-- Latest Post -->
            <div class="col-span-2">
                <h2 class="hover:uppercase text-lg pl-4 sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 hover:text-yellow-500 mb-3">
                    <i class="far fa-calendar-alt"></i> <?php echo(date('D d - M, Y')); ?> - Today's Story
                </h2>

                @if ($latestPost)
                    <x-post-item :post="$latestPost"/>
                @endif
            </div>

            <!-- Popular 5 post -->
            <div class="transition-transform transform hover:scale-105">
                <h2 class=" transition-transform transform hover:scale-105 text-lg pl-4 sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 hover:text-yellow-500 mb-3">
                    Popular Posts
                </h2>
                @foreach($popularPosts as $post)
                <div class="hover:uppercase grid grid-cols-4 gap-2 mb-4 hover:border hover:bg-blue-100 w-auto h-auto">
                    <a href="{{ route('view', $post) }}" class="pt-1 flex items-center justify-center">
                        <img src="{{ $post->getThumbnail() }}" alt="{{ $post->title }}" class="h-full max-h-24 object-contain">
                    </a>
                    <div class="col-span-3">
                        <a href="{{ route('view', $post) }}">
                            <h3 class="hover:uppercase text-sm uppercase whitespace-nowrap truncate">{{ $post->title }}</h3>
                        </a>
                        <div class="flex gap-4">
                            @foreach($post->categories as $category)
                                <a href="{{ route('by-category', $category) }}" class="hover:uppercase hover:text-red-500 text-blue-700 text-sm font-bold uppercase border-indigo-500 pb-2">
                                    {{ $category->title }}
                                </a>
                            @endforeach
                        </div>
                        <div class="text-xs">
                            {{ $post->shortBody(10) }}
                        </div>
                        <a href="{{ route('view', $post) }}" class="text-xs  bg-gray-400 hover:text-black hover:uppercase hover:bg-white text-gray-800">Continue
                            Reading <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <!-- Random posts -->
        <div class="mb-8">
           <h2 class="text-lg pl-4 sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 hover:text-yellow-500 mb-3">
               Reader's Choice
           </h2>

           <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                   @foreach($randomPosts as $post)
                   <x-post-item :post="$post" :show-author="true"/>
                   @endforeach
           </div>
       </div>


        <!-- Recommended posts -->
        <div class="mb-8">
            <h2 class="text-lg pl-4 sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 hover:text-yellow-500 mb-3">
                Recommended Posts
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                    @foreach($recommendedPosts as $post)
                    <x-post-item :post="$post" :show-author="false"/>
                    @endforeach
            </div>
        </div>


   <!-- Latest Categories -->

        @foreach($categories as $category)
            <div>
                <h2 class="text-lg pl-4 sm:text-xl font-bold text-blue-500 uppercase pb-1 border-b-2 border-blue-500 hover:text-yellow-500 mb-3">
                    Category "{{$category->title}}"
                    <a href="{{route('by-category', $category)}}">
                        <i class="fas fa-arrow-right hover:text-red-500"></i>
                    </a>
                </h2>

                <div class="mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                        @foreach($category->publishedPosts()->limit(3)->get() as $post)
                            <x-post-item :post="$post" :show-author="true"/>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach

</x-app-layout>
