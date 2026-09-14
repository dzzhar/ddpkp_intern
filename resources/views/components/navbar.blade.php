<header class="sticky top-0 z-50 border-b border-slate-100 bg-white/85 backdrop-blur-xl">
    <nav class="max-w-6xl mx-auto px-5 sm:px-6 h-16 flex items-center justify-between">
        <a href="(route)" class="font-heading font-semibold text-lg text-slate-950">
            Zharifah<span class="text-brand-500">.</span>
        </a>
        <div class="hidden md:flex items-center gap-8 text-sm font-medium text-slate-500">
            <a class="nav-link hover:text-brand-500 transition" href="/#home">
                Home
            </a>
            <a class="nav-link hover:text-brand-500 transition" href="/#skills">
                Skills
            </a>
            <a class="nav-link hover:text-brand-500 transition" href="/projects">
                Projects
            </a>
            <a class="nav-link hover:text-brand-500 transition" href="/#experience">
                Experience
            </a>
            <a class="nav-link hover:text-brand-500 transition" href="/#contact">
                Contact
            </a>
        </div>

        @auth
            <div class="flex flex-row gap-2">
                <a href="{{ route('admin.projects.create') }}"
                    class="hidden sm:inline-flex items-center gap-2 rounded-full border-2 border-slate-950 bg-slate-950 text-white px-4 py-2 text-sm font-medium hover:bg-brand-500 hover:border-brand-500 transition">
                    New Project
                </a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="hidden sm:inline-flex items-center gap-2 rounded-full bg-transparent border-2 border-slate-950 px-4 py-2 text-sm font-medium hover:bg-red-500 hover:text-white hover:border-red-500 transition">Logout</button>
                </form>
            </div>
        @else
            <a href="{{ route('login') }}"
                class="hidden sm:inline-flex items-center gap-2 rounded-full bg-slate-950 text-white px-4 py-2 text-sm font-medium hover:bg-brand-500 transition">Login</a>
        @endauth

        <button id="menuButton" class="md:hidden p-2 rounded-lg hover:bg-slate-100" aria-label="Buka menu">
            <svg id="menuIcon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>

    <div id="mobileMenu" class="hidden md:hidden border-t border-slate-100 bg-white">
        <div class="px-5 py-4 flex flex-col gap-4 text-sm font-medium text-slate-600">
            <a href="/#home">Home</a>
            <a href="/#skills">Skills</a>
            <a href="/projects">Projects</a>
            <a href="/#experience">Experience</a>
            <a href="/#contact">Contact</a>

            @auth
                <div class="flex flex-row gap-2">
                    <a href="{{ route('admin.projects.create') }}"
                        class=" items-center gap-2 rounded-full border-2 border-slate-950 bg-slate-950 text-white px-4 py-2 text-sm font-medium hover:bg-brand-500 hover:border-brand-500 transition">
                        New Project
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="items-center gap-2 rounded-full bg-transparent border-2 border-slate-950 px-4 py-2 text-sm font-medium hover:bg-red-500 hover:text-white hover:border-red-500 transition">Logout</button>
                    </form>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="items-center gap-2 rounded-full text-center bg-slate-950 text-white px-4 py-2 text-sm font-medium hover:bg-brand-500 transition">Login</a>
            @endauth
        </div>
    </div>
</header>

@push('scripts')
    <script>
        const menuButton = document.getElementById('menuButton');
        const mobileMenu = document.getElementById('mobileMenu');

        if (menuButton && mobileMenu) {
            menuButton.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
            });

            mobileMenu.querySelectorAll('a').forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });
        }

        const sections = document.querySelectorAll('section[id]');
        const navLinks = document.querySelectorAll('.nav-link');

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {

                    navLinks.forEach(link => {
                        link.classList.remove('active');
                    });

                    const active = document.querySelector(
                        `.nav-link[href="#${entry.target.id}"]`
                    );

                    if (active) {
                        active.classList.add('active');
                    }
                }
            });
        }, {
            rootMargin: '-35% 0px -55% 0px'
        });

        sections.forEach(section => {
            observer.observe(section);
        });
    </script>
@endpush
