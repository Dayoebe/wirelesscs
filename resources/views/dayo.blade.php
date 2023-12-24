<x-app-layout meta-title="Oyetoke Adedayo Ebenezer - Wireless Terminal">
    <x-slot name="favicon">
        <link rel="icon" type="image/x-icon" href="{{ asset('img/dayo.png') }}">
    </x-slot>
    <div class="flex flex-wrap container mx-auto md:mx-0 py-3">
        <section class="w-full md:w-1/2 lg:w-1/3 flex flex-col items-center px-3 bg-white justify-center">
            <div class="bg-white max-w-md rounded-lg overflow-hidden shadow-md p-6 flex flex-col md:flex-row">
                <div class="text-center md:mr-6 mb-6 md:mb-0">
                    <img src="{{ asset('img/dayo.png') }}" alt="Oyetoke Adedayo Ebenezer"
                        class="mx-auto rounded-full mb-4">
                    <h2 class="text-2xl font-bold text-gray-800">Adedayo Ebenezer Oyetoke </h2>
                    <p class="text-sm text-gray-500">Full-Stack Web Developer</p>
                </div>
            </div>
        </section>
        <section class="w-full md:w-1/2 lg:w-1/3 flex flex-col items-center px-3 bg-white justify-center">
            <div class="m-2">
                <p class="text-gray-700">
                    Hey there! I'm Adedayo, a passionate full-stack web developer with a knack for turning ideas into
                    reality.
                    I have a solid background in both front-end and back-end technologies, allowing me to create
                    seamless and
                    responsive web applications.
                </p> <hr class="mt-2">
                <p class="mt-2 text-gray-700">
                    My journey in web development began in 2021 when I discovered the power of coding to bring designs to life.
                    Over the years, I've honed my skills in HTML, CSS, JavaScript, and various frameworks like TailindCSS, AlpineJS, VueJS, ReactJS and
                    Laravel - PHP. I'm always eager to learn new technologies and stay updated with industry trends.
                </p> <hr class="mt-2">
                <p class="mt-4 text-gray-700">
                    Whether it's crafting intuitive user interfaces or optimizing server performance, I thrive on
                    challenges and collaborate effectively in a team environment. I believe in clean code, scalability,
                    and delivering high-quality solutions that meet the needs of users and stakeholders alike.
                </p> <hr class="mt-2">
                <p class="mt-4 text-gray-700">
                    When I'm not coding, you can find me exploring the latest web development trends, blogging, contributing to
                    open-source projects, or enjoying a good cup of coffee while brainstorming new project ideas.
                </p>
            </div>
        </section>

        <!-- Sidebar Section -->
        <x-sidebar />

    </div>

</x-app-layout>
