<x-app-layout meta-title="Error 404 - Wireless Terminal">
    <!-- Post Section -->
    <div class="lg:px-24 lg:py-24 md:py-20 md:px-44 px-4 py-24 items-center flex justify-center flex-col-reverse lg:flex-row md:gap-28 gap-16">
        <div class="xl:pt-24 w-full xl:w-1/2 relative pb-12 lg:pb-0">
            <div class="relative">
                <div class="absolute">
                    <div class="">
                        <h1 class="my-2 text-gray-800 font-bold text-2xl">
                            Page Expired <br> <hr><br><br>
                            Sign in again to generate another verification mail. Each mail is only valid for 60 Minutes
                        </h1>
                        <p class="my-2 text-gray-800">Sorry about that! Please visit our hompage to get where you need to go.</p>
                        <a href="{{route('home')}}" class="w-full sm:w-auto md:w-auto lg:w-auto mb-3 bg-blue-600 border border-blue-500 hover:bg-white hover:text-blue-500 text-white rounded py-2 px-4 mx-2 my-2 text-center">
                            Go back home!
                        </a>
                        <a href="{{route('contact-us')}}" class="w-full sm:w-auto md:w-auto lg:w-auto bg-transparent text-blue-500 border border-blue-500 hover:bg-blue-500 hover:text-white py-2 px-4 rounded text-lg my-2 mx-2 text-center">
                            Report your Issue
                        </a>
                    </div>
                </div>
                <div>
                    <img src="https://i.ibb.co/G9DC8S0/404-2.png" />
                </div>
            </div>
        </div>
        <div>
            <img src="https://i.ibb.co/ck1SGFJ/Group.png" />
        </div>
</x-app-layout>
