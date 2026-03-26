<x-app-layout
    meta-title="Oyetoke Adedayo Ebenezer - Wireless Terminal"
    meta-description="Adedayo Ebenezer Oyetoke is a Full-Stack Web Developer and EdTech specialist with experience across Laravel, Vue.js, React, Tailwind CSS, digital growth, and scalable product delivery."
>
    @php
        $heroStats = [
            [
                'label' => 'Applications Delivered',
                'value' => '20+',
                'copy' => 'Enterprise, school, media, government, and corporate solutions shipped through Wireless Computer Services.',
                'class' => 'bg-slate-950 text-white',
            ],
            [
                'label' => 'Timeline Improvement',
                'value' => '30%',
                'copy' => 'Reduced project delivery time through tighter Laravel backend and Vue.js plus Tailwind frontend integration.',
                'class' => 'bg-amber-300 text-slate-950',
            ],
            [
                'label' => 'Professional Journey',
                'value' => '2018+',
                'copy' => 'Freelance development, consulting, product building, media work, teaching, and technical leadership.',
                'class' => 'bg-emerald-500 text-white',
            ],
        ];

        $contactPoints = [
            ['label' => 'Location', 'value' => 'Akure, Nigeria', 'icon' => 'fas fa-map-marker-alt', 'class' => 'bg-rose-500 text-white'],
            ['label' => 'Email', 'value' => 'oyetoke.ebenezer@gmail.com', 'href' => 'mailto:oyetoke.ebenezer@gmail.com', 'icon' => 'fas fa-envelope', 'class' => 'bg-sky-500 text-white'],
            ['label' => 'Phone', 'value' => '+234 903 003 6438', 'href' => 'tel:+2349030036438', 'icon' => 'fas fa-phone-alt', 'class' => 'bg-lime-400 text-slate-950'],
            ['label' => 'LinkedIn', 'value' => 'linkedin.com/in/dayoebe', 'href' => 'https://linkedin.com/in/dayoebe', 'icon' => 'fab fa-linkedin-in', 'class' => 'bg-blue-600 text-white'],
            ['label' => 'GitHub', 'value' => '@dayoebe', 'href' => 'https://github.com/Dayoebe', 'icon' => 'fab fa-github', 'class' => 'bg-zinc-800 text-white'],
            ['label' => 'Profile', 'value' => 'wirelesscs.ct.ws/dayo', 'href' => url('/dayo'), 'icon' => 'fas fa-globe-africa', 'class' => 'bg-violet-500 text-white'],
        ];

        $skillGroups = [
            [
                'title' => 'Frontend',
                'items' => 'HTML5, CSS3, JavaScript (ES6+), Vue.js, Alpine.js, React.js, Tailwind CSS',
                'class' => 'border-sky-200 bg-sky-50 text-sky-950',
            ],
            [
                'title' => 'Backend',
                'items' => 'PHP, Laravel (LAMP), Livewire, RESTful APIs',
                'class' => 'border-indigo-200 bg-indigo-50 text-indigo-950',
            ],
            [
                'title' => 'Mobile',
                'items' => 'React Native (in progress)',
                'class' => 'border-amber-200 bg-amber-50 text-amber-950',
            ],
            [
                'title' => 'Databases',
                'items' => 'MySQL, SQLite',
                'class' => 'border-emerald-200 bg-emerald-50 text-emerald-950',
            ],
            [
                'title' => 'Tools',
                'items' => 'Git, GitHub, Docker, Linux, CI/CD basics',
                'class' => 'border-stone-200 bg-stone-50 text-stone-950',
            ],
            [
                'title' => 'Design & UX',
                'items' => 'Figma, Photoshop, Illustrator, CorelDraw',
                'class' => 'border-fuchsia-200 bg-fuchsia-50 text-fuchsia-950',
            ],
        ];

        $experience = [
            [
                'role' => 'Founder & Lead Developer',
                'org' => 'Wireless Computer Services',
                'period' => '2022 - Present',
                'location' => 'Remote / Nigeria',
                'bullets' => [
                    'Designed and deployed 20+ enterprise-grade applications for schools, banking, corporate, and government use cases.',
                    'Led full SDLC delivery from requirements and architecture to coding, deployment, and maintenance.',
                    'Built a tech blog focused on AI, Laravel, JavaScript, coding, and emerging technologies.',
                ],
                'class' => 'bg-slate-950 text-white',
            ],
            [
                'role' => 'Digital & Web Specialist',
                'org' => 'Glow 99.1 FM',
                'period' => 'January 2026 - Present',
                'location' => 'Akure, Ondo State',
                'bullets' => [
                    'Designed and developed the station website from scratch and maintains it regularly.',
                    'Manages social media growth, engagement, content performance, and revenue-focused digital activity.',
                    'Works with management to align digital execution with wider station goals.',
                ],
                'class' => 'bg-blue-600 text-white',
            ],
            [
                'role' => 'NYSC Mathematics & Physics Teacher',
                'org' => 'Elites International College',
                'period' => '2025',
                'location' => 'Awka, Anambra State',
                'bullets' => [
                    'Delivered structured Mathematics and Physics lessons with real-life application and problem-solving emphasis.',
                    'Designed and developed the school website and a full school management system from scratch.',
                    'Implemented student records, result management, printable report cards, dashboards, payments, CBT, e-learning, and announcements.',
                ],
                'class' => 'bg-amber-300 text-slate-950',
            ],
            [
                'role' => 'Freelance Web Developer & Consultant',
                'org' => 'Independent Client Work',
                'period' => '2018 - 2024',
                'location' => 'Nigeria',
                'bullets' => [
                    'Built portfolio websites, school platforms, e-commerce products, and business landing pages.',
                    'Delivered SEO-optimized, mobile-first solutions that improved visibility and engagement.',
                    'Helped SMEs digitize workflows and increase operational efficiency.',
                ],
                'class' => 'bg-emerald-500 text-white',
            ],
            [
                'role' => 'Media Coordinator',
                'org' => 'First Baptist Church, Igede Ekiti',
                'period' => '2015 - 2018',
                'location' => 'Ekiti State',
                'bullets' => [
                    'Led technical operations for live streaming and digital engagement.',
                    'Trained volunteers on multimedia tools and improved digital outreach.',
                ],
                'class' => 'bg-rose-500 text-white',
            ],
        ];

        $projects = [
            [
                'title' => 'Glow 99.1 FM Website & Social Media',
                'copy' => 'Built, maintain, and update the station website while managing digital growth and revenue-driven social activity.',
                'stack' => 'Laravel, Vue.js, Tailwind CSS, MySQL',
                'class' => 'bg-cyan-400 text-slate-950',
            ],
            [
                'title' => 'Elites International College Platform',
                'copy' => 'School website and management system with result uploads, filtering, report cards, dashboards, CBT, e-learning, and multi-role access.',
                'stack' => 'Laravel, Livewire, Tailwind CSS, Alpine.js',
                'class' => 'bg-indigo-600 text-white',
            ],
            [
                'title' => 'BootKode Coding Bootcamp',
                'copy' => 'Founder-led learning platform with PDFs, videos, audio, career roadmaps, and a monetized certification flow.',
                'stack' => 'Laravel, Livewire, Tailwind CSS, Alpine.js',
                'class' => 'bg-lime-400 text-slate-950',
            ],
            [
                'title' => 'Wireless Terminal',
                'copy' => 'Personal blog and portfolio platform with a custom Livewire admin dashboard and SEO-focused content presentation.',
                'stack' => 'Laravel, Livewire, Tailwind CSS, Vue.js, Alpine.js',
                'class' => 'bg-violet-500 text-white',
            ],
            [
                'title' => 'Corporate & Portfolio Websites',
                'copy' => 'SEO-optimized business and personal portfolio websites built to improve online visibility and client credibility.',
                'stack' => 'Laravel, Vue.js, Bootstrap, MySQL',
                'class' => 'bg-stone-500 text-white',
            ],
        ];

        $supporting = [
            [
                'title' => 'Education',
                'content' => 'Federal University of Technology, Akure (FUTA) - B.Tech, Industrial Mathematics, 2018 - 2024',
                'class' => 'bg-yellow-300 text-slate-950',
            ],
            [
                'title' => 'Leadership & Community',
                'content' => 'Founder of BootKode, open-source contributor, tech mentor, workshop facilitator, and active participant in hackathons and competitions.',
                'class' => 'bg-purple-500 text-white',
            ],
            [
                'title' => 'Languages',
                'content' => 'English (Fluent), Yoruba (Native), Pidgin (Conversational)',
                'class' => 'bg-mauve text-white',
            ],
            [
                'title' => 'Interests',
                'content' => 'Open-source software, AI-driven applications, digital art and animation, blogging on web and mobile development trends.',
                'class' => 'bg-olive text-white',
            ],
        ];
    @endphp

    <style>
        .dayo-rise {
            animation: dayo-rise 0.7s ease-out both;
        }

        .dayo-float {
            animation: dayo-float 8s ease-in-out infinite;
        }

        @keyframes dayo-rise {
            from {
                opacity: 0;
                transform: translateY(18px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes dayo-float {
            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        .bg-mauve {
            background-color: #8b7285;
        }

        .bg-olive {
            background-color: #6b7a35;
        }
    </style>

    <div class="bg-stone-100 pb-24">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8">
            <section class="dayo-rise grid gap-6 lg:grid-cols-[minmax(0,1.15fr)_minmax(0,0.85fr)]">
                <div class="rounded-[34px] border-4 border-slate-950 bg-white p-6 shadow-[0_24px_70px_-36px_rgba(15,23,42,0.45)] sm:p-8 lg:p-10">
                    <div class="mb-8 flex flex-wrap gap-3">
                        <span class="rounded-full bg-red-500 px-4 py-2 text-xs font-bold uppercase tracking-[0.3em] text-white">Full-Stack</span>
                        <span class="rounded-full bg-orange-500 px-4 py-2 text-xs font-bold uppercase tracking-[0.3em] text-white">EdTech</span>
                        <span class="rounded-full bg-amber-300 px-4 py-2 text-xs font-bold uppercase tracking-[0.3em] text-slate-950">Digital Growth</span>
                    </div>

                    <div class="max-w-3xl">
                        <p class="text-sm font-semibold uppercase tracking-[0.32em] text-slate-500">ADEDAYO EBENEZER OYETOKE</p>
                        <h1 class="mt-4 text-4xl font-black uppercase leading-none text-slate-950 sm:text-5xl lg:text-6xl">
                            Full-Stack Web Developer With Product, Media, and EdTech Range
                        </h1>
                        <p class="mt-6 max-w-3xl text-lg leading-8 text-slate-700">
                            Full-Stack Web Developer and Digital &amp; EdTech Specialist with hands-on expertise in Laravel, Vue.js, React, and Tailwind CSS. Builds and maintains websites, manages digital growth, and develops scalable user-centric applications for schools, media, and corporate clients.
                        </p>
                        <p class="mt-4 max-w-3xl text-base leading-8 text-slate-600">
                            Founder of BootKode, a tech-education platform focused on project-based learning, with a strong interest in AI, cloud technologies, mentorship, and practical execution.
                        </p>
                    </div>

                    <div class="mt-8 grid gap-4 sm:grid-cols-3">
                        @foreach ($heroStats as $stat)
                            <div class="{{ $stat['class'] }} rounded-[26px] p-5">
                                <p class="text-xs font-semibold uppercase tracking-[0.24em] opacity-80">{{ $stat['label'] }}</p>
                                <p class="mt-3 text-3xl font-black">{{ $stat['value'] }}</p>
                                <p class="mt-2 text-sm leading-6 opacity-90">{{ $stat['copy'] }}</p>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-8 flex flex-wrap gap-3">
                        <a href="{{ route('contact-us') }}" class="inline-flex items-center rounded-full bg-slate-950 px-6 py-3 text-sm font-semibold uppercase tracking-[0.22em] text-white transition hover:bg-blue-600">
                            Work With Me
                        </a>
                        <a href="mailto:oyetoke.ebenezer@gmail.com" class="inline-flex items-center rounded-full border-2 border-slate-950 px-6 py-3 text-sm font-semibold uppercase tracking-[0.22em] text-slate-950 transition hover:bg-slate-950 hover:text-white">
                            Send Email
                        </a>
                    </div>
                </div>

                <div class="grid gap-6">
                    <div class="dayo-float relative overflow-hidden rounded-[34px] border-4 border-slate-950 bg-slate-950 p-6 text-white shadow-[0_24px_70px_-36px_rgba(15,23,42,0.55)] sm:p-8">
                        <div class="absolute right-5 top-5 h-12 w-12 rounded-2xl bg-red-500"></div>
                        <div class="absolute bottom-5 left-5 h-10 w-10 rounded-2xl bg-cyan-400"></div>
                        <div class="absolute bottom-10 right-12 h-8 w-8 rounded-full bg-lime-400"></div>

                        <div class="relative">
                            <div class="mx-auto flex w-fit items-center justify-center rounded-[30px] border-4 border-white bg-white p-3 shadow-2xl">
                                <img
                                    src="{{ asset('img/dayo.png') }}"
                                    alt="Oyetoke Adedayo Ebenezer"
                                    class="h-56 w-56 rounded-[24px] object-cover sm:h-64 sm:w-64"
                                >
                            </div>

                            <div class="mt-6 text-center">
                                <p class="text-xs font-semibold uppercase tracking-[0.32em] text-slate-400">Current Identity</p>
                                <p class="mt-3 text-2xl font-black uppercase">Builder, Mentor, Digital Operator</p>
                                <p class="mt-3 text-sm leading-7 text-slate-300">
                                    Strong on Laravel-based systems, frontend polish, digital execution, and products that need both technical structure and growth thinking.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[34px] border-4 border-slate-950 bg-white p-6 shadow-[0_24px_70px_-36px_rgba(15,23,42,0.35)]">
                        <div class="mb-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.32em] text-slate-500">Direct Contact</p>
                            <h2 class="mt-2 text-2xl font-black uppercase text-slate-950">Quick Access</h2>
                        </div>

                        <div class="grid gap-3 sm:grid-cols-2">
                            @foreach ($contactPoints as $point)
                                @php
                                    $tag = isset($point['href']) ? 'a' : 'div';
                                @endphp
                                <{{ $tag }}
                                    @if (isset($point['href']))
                                        href="{{ $point['href'] }}"
                                        @if (str_starts_with($point['href'], 'http'))
                                            target="_blank" rel="noopener noreferrer"
                                        @endif
                                    @endif
                                    class="{{ $point['class'] }} flex items-start gap-3 rounded-[22px] border-4 border-slate-950 px-4 py-4 shadow-sm transition hover:-translate-y-0.5"
                                >
                                    <i class="{{ $point['icon'] }} mt-1 text-lg"></i>
                                    <span>
                                        <span class="block text-xs font-semibold uppercase tracking-[0.24em] opacity-80">{{ $point['label'] }}</span>
                                        <span class="mt-2 block text-sm font-semibold leading-6">{{ $point['value'] }}</span>
                                    </span>
                                </{{ $tag }}>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="mt-6 rounded-[34px] border-4 border-slate-950 bg-white p-6 shadow-[0_24px_70px_-36px_rgba(15,23,42,0.35)] sm:p-8">
                <div class="max-w-3xl">
                    <p class="text-xs font-semibold uppercase tracking-[0.32em] text-slate-500">Professional Summary</p>
                    <h2 class="mt-3 text-3xl font-black uppercase text-slate-950">What The CV Actually Says</h2>
                    <p class="mt-5 text-base leading-8 text-slate-700">
                        My work sits at the intersection of engineering, education, and digital growth. I build and maintain web products, improve online visibility, mentor upcoming developers, and focus on solutions that are scalable, user-centered, and measurable.
                    </p>
                </div>

                <div class="mt-6 grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($skillGroups as $group)
                        <article class="{{ $group['class'] }} rounded-[26px] border-2 p-5">
                            <p class="text-xs font-semibold uppercase tracking-[0.28em] opacity-70">{{ $group['title'] }}</p>
                            <p class="mt-3 text-lg font-black uppercase">{{ $group['items'] }}</p>
                        </article>
                    @endforeach
                </div>
            </section>

            <section class="mt-6">
                <div class="mb-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.32em] text-slate-500">Professional Experience</p>
                    <h2 class="mt-3 text-3xl font-black uppercase text-slate-950">Timeline of Work</h2>
                </div>

                <div class="grid gap-4 lg:grid-cols-2">
                    @foreach ($experience as $item)
                        <article class="{{ $item['class'] }} rounded-[30px] border-4 border-slate-950 p-6 shadow-[0_24px_70px_-40px_rgba(15,23,42,0.45)]">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <p class="text-xs font-semibold uppercase tracking-[0.3em] opacity-75">{{ $item['period'] }}</p>
                                    <h3 class="mt-3 p-0 text-2xl font-black uppercase leading-tight">{{ $item['role'] }}</h3>
                                    <p class="mt-2 text-sm font-semibold uppercase tracking-[0.18em] opacity-85">{{ $item['org'] }}</p>
                                </div>
                                <span class="rounded-full bg-white/20 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em]">
                                    {{ $item['location'] }}
                                </span>
                            </div>

                            <div class="mt-5 space-y-3 text-sm leading-7 opacity-95">
                                @foreach ($item['bullets'] as $bullet)
                                    <div class="flex items-start gap-3">
                                        <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-current opacity-80"></span>
                                        <p>{{ $bullet }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            <section class="mt-6">
                <div class="mb-4">
                    <p class="text-xs font-semibold uppercase tracking-[0.32em] text-slate-500">Projects & Portfolio</p>
                    <h2 class="mt-3 text-3xl font-black uppercase text-slate-950">Selected Work</h2>
                </div>

                <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                    @foreach ($projects as $project)
                        <article class="{{ $project['class'] }} rounded-[30px] border-4 border-slate-950 p-6 shadow-[0_24px_70px_-40px_rgba(15,23,42,0.45)]">
                            <p class="text-xs font-semibold uppercase tracking-[0.28em] opacity-80">Project</p>
                            <h3 class="mt-3 p-0 text-2xl font-black uppercase leading-tight">{{ $project['title'] }}</h3>
                            <p class="mt-4 text-sm leading-7 opacity-95">{{ $project['copy'] }}</p>
                            <div class="mt-5 rounded-[20px] bg-white/20 px-4 py-3 text-xs font-semibold uppercase tracking-[0.18em]">
                                {{ $project['stack'] }}
                            </div>
                        </article>
                    @endforeach
                </div>
            </section>

            <section class="mt-6 grid gap-4 lg:grid-cols-4">
                @foreach ($supporting as $card)
                    <article class="{{ $card['class'] }} rounded-[30px] border-4 border-slate-950 p-6 shadow-[0_24px_70px_-40px_rgba(15,23,42,0.45)]">
                        <p class="text-xs font-semibold uppercase tracking-[0.28em] opacity-80">{{ $card['title'] }}</p>
                        <p class="mt-4 text-base font-semibold leading-8 opacity-95">{{ $card['content'] }}</p>
                    </article>
                @endforeach
            </section>
        </div>
    </div>
</x-app-layout>
