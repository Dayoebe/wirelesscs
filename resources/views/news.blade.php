<x-app-layout meta-title="Wireless Terminal"
              meta-description="Wireless Terminal Latest News">
     
<div class="bg-indigo-100">
  <div class="container mx-auto py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-6xl font-bold hover:uppercase text-black">Wireless Terminal</h1>
      <p class="mt-2 pb-4 text-3xl text-black">Stay up-to-date with the latest news, articles, blog posts, and updates from our website. Explore a wide range of topics and discover valuable insights and information.</p>
      <p class="pt-2 pb-2 pl-2 text-lg bg-indigo-50 text-black">Sign in to see more news</p>
        <a href="{{ route('register') }}" class="mt-2 inline-block bg-blue-500 text-white py-2 px-4 font-semibold rounded-lg shadow-lg border border-blue-700 text-2xl hover:bg-white hover:text-blue-500 transition duration-300 ease-in-out">Sign up</a>
        <a href="{{ route('login') }}" class="mt-2 inline-block bg-white text-blue-500 py-2 px-4 font-semibold  text-2xl hover:bg-blue-700 hover:text-white rounded-lg shadow-lg transition duration-300 ease-in-out">Sign in</a>
  </div>
             <br> <hr>
              
  <!-- Free News -->
      <div class="container mx-auto shadow mb-4">
        <div class="card">
          @php
            $apikey = '4e25dfce191e50e8267092a457c14994';
            $category = 'technology';
            $country = '';
            $url = "https://gnews.io/api/v4/top-headlines?category=$category&lang=en&country=$country&max=100&apikey=$apikey";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $data = json_decode(curl_exec($ch), true);
            curl_close($ch);
            if (isset($data['articles'])) {
                $articles = $data['articles'];
                }
            @endphp
            @if (isset($articles))
                @foreach ($articles as $article)
                  <div class="card-body">
                    <div class="flex flex-wrap">
                      <div class="w-full md:w-1/2 md:pr-4">
                        @if (isset($article['image']) && !empty($article['image']))
                          <img src="{{ $article['image'] }}" class="h-64 w-full object-cover rounded-md" alt="News Image">
                        @endif
                      </div>
                      <div class="w-full md:w-1/2 mt-4 md:mt-0 hover:bg-blue-100 hover:border">
                        <h2 class="hover:uppercase text-3xl font-bold hover:bg-gray-100 p-2 rounded-md">
                          <strong>{{ $article['title'] }}</strong>
                        </h2>
                        <h5 class="text-primary">{{ $article['description'] }}</h5>
                          <p>{{ $article['content'] }}</p>
                          <hr class="my-4 border-t-2 border-gray-300">
                          <strong class="text-blue-600 hover:text-red-500">
                            <a href="{{ $article['url'] }}" target="_blank">{{ $article['source']['name'] }}</a>
                          </strong><br>
                            <em class="text-green-500">{{ $article['publishedAt'] }}</em><br>
                      </div>
                    </div>
                      <hr class="my-4 border-t-2 border-gray-300">
                  </div>
                @endforeach
            @else
                <p><!--- You need to be authenticated to view this content. --></p>
            @endif
        </div>
    </div>
  
    

  <!--Subscribed News -->
  <div class="container mx-auto shadow mb-4">
      <div class="card">
        @auth
        <?php
        $apikey = '4e25dfce191e50e8267092a457c14994';
        $category = 'science';
        $country = '';
        $url = "https://gnews.io/api/v4/top-headlines?category=$category&lang=en&country=$country&max=100&apikey=$apikey";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $articles = $data['articles'];
        ?>
    
        @foreach ($articles as $article)
        <div class="card-body">
          <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 md:pr-4">
              @if (isset($article['image']) && !empty($article['image']))
              <img src="{{ $article['image'] }}" class="h-64 w-full object-cover rounded-md" alt="News Image">
              @endif
            </div>
            <div class="w-full md:w-1/2 mt-4 md:mt-0 hover:bg-blue-100 hover:border">
              <h2 class="hover:uppercase text-3xl font-bold hover:bg-gray-100 p-2 rounded-md"><strong>{{ $article['title'] }}</strong></h2>
              <h5 class="text-primary">{{ $article['description'] }}</h5>
              <p>{{ $article['content'] }}</p>
              <hr class="my-4 border-t-2 border-gray-300">
              <strong class="text-blue-600 hover:text-red-500"><a href="{{ $article['url'] }}" target="_blank">{{ $article['source']['name'] }}</a></strong><br>
              <em class="text-green-500">{{ $article['publishedAt'] }}</em><br>
            </div>
          </div>
          <hr class="my-4 border-t-2 border-gray-300">
        </div>
        @endforeach
    
        @else
        <p><!--- You need to be authenticated to view this content. --> </p>
        @endauth
      </div>
    </div>
    
      <!-- News -->
  <div class="container mx-auto shadow">
      <div class="card">
        @auth
        <?php
        $apikey = '4e25dfce191e50e8267092a457c14994';
        $category = 'AI';
        $country = '';
        $url = "https://gnews.io/api/v4/top-headlines?category=$category&lang=en&country=$country&max=100&apikey=$apikey";
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($ch), true);
        curl_close($ch);
        $articles = $data['articles'];
        ?>
    
        @foreach ($articles as $article)
        <div class="card-body">
          <div class="flex flex-wrap">
            <div class="w-full md:w-1/2 md:pr-4">
              @if (isset($article['image']) && !empty($article['image']))
              <img src="{{ $article['image'] }}" class="h-64 w-full object-cover rounded-md" alt="News Image">
              @endif
            </div>
            <div class="w-full md:w-1/2 mt-4 md:mt-0 hover:bg-blue-100 hover:border">
              <h2 class="text-3xl font-bold hover:bg-gray-100 p-2 rounded-md"><strong>{{ $article['title'] }}</strong></h2>
              <h5 class="text-primary">{{ $article['description'] }}</h5>
              <p>{{ $article['content'] }}</p>
              <hr class="my-4 border-t-2 border-gray-300">
              <strong class="text-blue-600 hover:text-red-500"><a href="{{ $article['url'] }}" target="_blank">{{ $article['source']['name'] }}</a></strong><br>
              <em class="text-green-500">{{ $article['publishedAt'] }}</em><br>
            </div>
          </div>
          <hr class="my-4 border-t-2 border-gray-300">
        </div>
        @endforeach
    
        @else
        <p><!--- You need to be authenticated to view this content. --> </p>
        @endauth
      </div>
    </div>

  </div>

</x-app-layout>
