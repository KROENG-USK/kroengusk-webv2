<div class="header pb-5">
    <nav class="navbar bg-header-footer navbar-expand-md navbar-light bg-opacity-55 fixed-top animate__animated animate__fadeInDown">
        <div class="container" style="color: black">
            <a href="{{ url('/') }}" class="navbar-brand" aria-current="page">
                <img src="{{ asset('assets/images/KroengLogoHeader.png') }}" alt="" width="200" height="50">
            </a>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 300px">
                    <li class="nav-item">
                        <a href="{{ url('/news/') }}" class="nav-link text-white">BERITA</a>
                    </li>

                    <x-dropdown-menu :items="$listdivisi" title="DIVISI" includeDivider="true"/>
                    <x-dropdown-menu :items="$listdocument" title="DOKUMEN" includeDivider="false"/>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0)" class="nav-link text-white dropdown-toggle" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            PROFIL
                        </a>
                        <ul class="dropdown-menu bg-header-footer dropdown-menu-dark animate__animated animate__fadeIn" aria-labelledby="navbarScrollingDropDown">
                            <li>
                                <a href="{{ url('/profil/struktur-komunitas/') }}" class="dropdown-item">Struktru Komunitas</a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <a href="{{ url('/profil/prestasi') }}" class="dropdown-item">Prestasi</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{ url('/contact-us/') }}" class="nav-link text-white">CONTACT US</a>
                    </li>
                </ul>
                <form action="{{ url('/search/') }}" class="d-flex" method="get">
                    <input type="text" name="searchtitle" placeholder="Search" aria-label="Search" class="form-control search cb1 me-2" required>
                    <button class="btn btn-outline-warning bg-dark" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
</div>