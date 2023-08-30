<header>
    <div class="logo">
        <a href="" class="logo-desktop-bynd a-decoration-none">
            <div class="flex-flow-logo">
                <img src="{{ asset('storage/assets/images/1zuz3a9bwqa0b2k6cnno.png') }}" alt="Logo"
                    title="{{ config('app.name') }}">
            </div>
        </a>
        <a href="" class="logo-mobile-tab-alternative">
            <img src="{{ asset('storage/assets/images/1zuz3a9bwqa0b2k6cnno.png') }}" alt="Logo" width="40px"
                title="{{ config('app.name') }}">
        </a>
        <div class="user-greeting-status">
            <h1>Good Morning,</h1>
            <p>creativeartghana@gmail.com</p>
        </div>
    </div>
    <nav>
        <div class="search-engine">
            <form action="#" method="POST" autocomplete="off">
                @csrf
                <div class="search-background">
                    <input type="search" name="query" id="search" placeholder="Search employees files & more.">
                    <div class="btn-search-engine-group">
                        <button type="submit"><i class="icofont-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </nav>
    <div class="actions">
        <div id="plugin" class="hamburger" onclick="toggleMenu()">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>

        <button class="btn lang-btn" id="lang-btn"><img
                src="{{ asset('storage/utilities/components/auth/2shy6ikkqb31nxrcrvck.png') }}"
                alt="Translator" width="16px">&nbsp;{{ app()->getLocale() }}</button>
    </div>
</header>
