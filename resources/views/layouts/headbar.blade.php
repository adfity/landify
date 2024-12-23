<div class="text-white text-xl font-bold">
    <a href="{{ Auth::check() ? (Auth::user()->role == 'admin' ? '/admin-dashboard' : '/dashboard') : '/' }}" class="hover:underline">Landing-App</a>
</div>

<div class="relative">
    <button class="text-white flex items-center space-x-2" id="userMenuButton">
        <span>{{ $nama }}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
        </svg>
    </button>

    <!-- Dropdown Menu -->
    <div id="dropdownMenu" class="absolute right-0 hidden mt-2 w-48 bg-white rounded-md shadow-lg z-10">
        <div class="py-2">
            <!-- Link untuk Update Profil -->
            <a href="/user/edit" class="block w-full text-left px-4 py-2 text-blue-500 hover:bg-gray-100 rounded">
                Update Profil
            </a>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="block w-full text-left px-4 py-2 text-red-500 hover:bg-gray-100 rounded">
                    Keluar
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Script untuk menampilkan/hide dropdown -->
<script>
    const userMenuButton = document.getElementById('userMenuButton');
    const dropdownMenu = document.getElementById('dropdownMenu');

    userMenuButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('hidden');
    });

    // Menyembunyikan dropdown jika klik di luar dropdown
    window.addEventListener('click', (event) => {
        if (!userMenuButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
            dropdownMenu.classList.add('hidden');
        }
    });
</script>
