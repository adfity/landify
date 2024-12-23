<button class="toggle-button" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<div class="sidebar" id="sidebar">
    <br><br><br>
        <a href="#" >
            <img  class="logo" src="" />
            <span >Landing-App</span>
        </a>
    
    @if (auth()->user()->role == 'Admin')

    @endif

    @if (auth()->user()->role == 'User')

    @endif
    

</div>

<style>
  /* Style untuk link yang aktif */
    .sidebar a.active {
        color: #ffcc00; /* Warna highlight */
        font-weight: bold;
    }
    .logo-section {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    margin-right: 20px;
    margin-top: 70px; /* Tambahkan ini untuk menurunkan logo */
    }

    .logo {
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

</style>
