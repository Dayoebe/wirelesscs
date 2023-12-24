<x-app-layout :meta-title="$post->meta_title ?: $post->title" :meta-description="$post->meta_description">
            @section('meta')
                @if ($post->getThumbnail())
                    <meta property="og:image" content="{{ $post->getThumbnail() }}">
                @endif
            @endsection

    <div class="flex flex-wrap">
            <!-- Post Section -->
            <section class="w-full md:w-2/3 px-2">
                <article class="flex flex-col shadow my-4">
                <!-- Article Image -->
                <a href="#" class="hover:opacity-75">
                    <img src="{{$post->getThumbnail()}}">
                </a>
                <div class="bg-white flex flex-col justify-start py-3 px-2">
                    <div class="flex gap-4">
                        @foreach($post->categories as $category)
                            <a href="{{route('by-category', $category)}}" class="text-blue-700 hover:text-yellow-500 text-sm font-bold uppercase pb-4">
                                {{$category->title}}
                            </a>
                        @endforeach
                    </div>
                    <h1 class="text-3xl font-bold hover:text-indigo-700 pb-4">
                        {{$post->title}}
                    </h1>
                    <h6 href="#" class="text-sm pb-3">
                        By <a href="{{ route('dayo') }}" class="font-semibold hover:text-gray-800">{{$post->user->name}}</a>, Published on
                        {{$post->getFormattedDate()}} | {{ $post->human_read_time }}
                    </h6> <hr>
                    <div class="mb-3 pt-3" >
                        {!! $post->body !!}
                    </div>
                    <livewire:upvote-downvote :post="$post"/>
                </div>
            </article>

            <div class="w-full flex pt-3">
                <div class="w-1/2">
                    @if($prev)
                        <a href="{{route('view', $prev)}}"
                           class="block w-full bg-white shadow hover:shadow-md text-left p-6">
                            <p class="text-lg text-blue-800 font-bold flex items-center">
                                <i class="fas fa-arrow-left pr-1"></i>
                                Previous
                            </p>
                            <p class="pt-2">{{\Illuminate\Support\Str::words($prev->title, 20)}}</p>
                        </a>
                    @endif
                </div>
                <div class="w-1/2">
                    @if($next)
                        <a href="{{route('view', $next)}}"
                           class="block w-full bg-white shadow hover:shadow-md text-right p-6">
                            <p class="text-lg text-blue-800 font-bold flex items-center justify-end">Next
                                <i
                                    class="fas fa-arrow-right pl-1"></i></p>
                            <p class="pt-2">
                                {{\Illuminate\Support\Str::words($next->title, 20)}}
                            </p>
                        </a>
                    @endif
                </div>
            </div>

            <livewire:comments :post="$post"/>
        </section>

        <x-sidebar/>
    </div>
</x-app-layout>
