<header class="app-header">
    <div class="header-container">
        <div class="greeting">
            <h2>Selamat Siang, {{ Auth::user()->name }}</h2>
            <p>Here’s a quick overview of today’s attendance activities!</p>
        </div>

        <div class="avatar">
            <img src="{{ $admin->photos ? asset('storage/' . $admin->photos) : asset('images/default-avatar.png') }}" alt="">
        </div>
    </div>
</header>
