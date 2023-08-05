<div class="footer pt-5">
    <div class="container">
        <div class="row row-cols-lg-3 row-cols-1 justify-content-between">
            <div class="col col-lg-6 mb-lg-0 mb-4">
                <h2 class="text-white">UMKM</h2>
                <p class="text-white-50">Website UMKM untuk menampung usaha-usaha milik masyarakat, dengan transaksi direct ke penjual namun, penjual diawasi oleh pihak admin untuk diperiksa keaslian usahanya.</p>
            </div>
            <div class="col col-lg-2 d-flex flex-column mb-lg-0 mb-4">
                <h5 class="fw-bold text-white">Menu</h5>
                <a href="{{ '/' }}" class="text-white-50 mt-3">
                    Home
                </a>
                <a href="{{ url('productpage') }}" class="text-white-50 mt-2">
                    Produk
                </a>
                <a href="{{ url('umkmpage') }}" class="text-white-50 mt-2">
                    UMKM
                </a>
                @guest
                @endguest
                @auth
                    <a href="{{ route('logout') }}" class="text-white-50 mt-2">Logout</a>
                @endauth
            </div>
            <div class="col col-lg-3 d-flex flex-column mb-lg-0 mb-4">
                <h5 class="fw-bold text-white mb-3">Contact</h5>
                <a href="#" class="text-white-50 mt-2">
                    emailhmif@gmail.com
                </a>
                <a href="https://www.bing.com/maps?osid=2227376b-d088-420d-b251-e31e6c26dc70&cp=-6.2885~106.509411&lvl=13&v=2&sV=2&form=S00027"
                    class="text-white-50 mt-2">Himpunan Mahasiswa Teknik Informatika - Institut Teknologi Indonesia</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <p class="text-white text-center copytext">&copy; Copyright 2023 by HMIF 2023-2023, All Right Reserved.
                </p>
            </div>
        </div>
    </div>
</div>
