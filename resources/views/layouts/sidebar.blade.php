<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="index.html"><span class="brand-logo">
                        <defs>
                            <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%"
                                y2="89.4879456%">
                                <stop stop-color="#000000" offset="0%"></stop>
                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                            </lineargradient>
                            <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%"
                                y2="100%">
                                <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                <stop stop-color="#FFFFFF" offset="100%"></stop>
                            </lineargradient>
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                <g id="Group" transform="translate(400.000000, 178.000000)">
                                    <path class="text-primary" id="Path"
                                        d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z"
                                        style="fill:currentColor"></path>
                                    <path id="Path1"
                                        d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z"
                                        fill="url(#linearGradient-1)" opacity="0.2"></path>
                                    <polygon id="Path-2" fill="#000000" opacity="0.049999997"
                                        points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325">
                                    </polygon>
                                    <polygon id="Path-21" fill="#000000" opacity="0.099999994"
                                        points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338">
                                    </polygon>
                                    <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994"
                                        points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                </g>
                            </g>
                        </g>
                        </svg>
                    </span>
                    <h2 class="brand-text">Sewa Kontrakan</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                        class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                        class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc"
                        data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            {{-- Dashboard --}}
            <li class="nav-item" id="dashboard-menu">
                <a class="d-flex align-items-center" href="{{ route('dashboard') }}"
                    onclick="setActive('dashboard-menu')">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span>
                </a>
            </li>
            {{-- End Dashboard --}}

            {{-- Ke menu lainnya --}}
            <li class="navigation-header"><span data-i18n="Apps &amp; Pages">CRUD &amp; SETTINGS</span><i
                    data-feather="more-horizontal"></i>
            </li>
            {{-- Ke menu lainnya end --}}

            <!-- Untuk Perusahaan -->
            <li class="nav-item" id="company-management-menu">
                <a class="d-flex align-items-center" href="#" onclick="setActive('company-management-menu')">
                    <i data-feather="briefcase"></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Manage Kontrakan</span>
                </a>
                <ul class="menu-content">
                    <li id="perusahaan-menu">
                        <a class="d-flex align-items-center" href="{{ url('kategorikontrakan') }}"
                            onclick="setActive('perusahaan-menu')">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Perusahaan">Kategori Kontrakan</span>
                        </a>
                    </li>
                    <li id="gedung-menu">
                        <a class="d-flex align-items-center" href="{{ url('kontrakan') }}"
                            onclick="setActive('gedung-menu')">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Kontrakan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Perusahaan -->

            <!-- Untuk Users -->
            <li class="nav-item" id="users-management-menu">
                <a class="d-flex align-items-center" href="#" onclick="setActive('users-management-menu')">
                    <i data-feather="user"></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Users Management</span>
                </a>
                <ul class="menu-content">
                    <li id="users-menu">
                        <a class="d-flex align-items-center" href="{{ url('users') }}"
                            onclick="setActive('users-menu')">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="List">Users</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Users -->

            <!-- Untuk Device -->
            <li class="nav-item" id="device-management-menu">
                <a class="d-flex align-items-center" href="#" onclick="setActive('device-management-menu')">
                    <i data-feather="grid"></i>
                    <span class="menu-title text-truncate" data-i18n="Invoice">Invoice</span>
                </a>
                <ul class="menu-content">

                    <li id="jenis-device-menu">
                        <a class="d-flex align-items-center" href="{{ url('diskon') }}"
                            onclick="setActive('jenis-device-menu')">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Edit">Diskon</span>
                        </a>
                    </li>
                    
                    <li id="category-device-menu">
                        <a class="d-flex align-items-center" href="{{ url('pesanan') }}"
                            onclick="setActive('category-device-menu')">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Preview">Pesanan</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- End Device -->

            <!-- History -->
            {{-- <li class="nav-item" id="history-menu">
                <a class="d-flex align-items-center" href="{{ url('history') }}"
                    onclick="setActive('history-menu')">
                    <i data-feather="pie-chart"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">History</span>
                </a>
            </li> --}}
            <!-- End History -->

        </ul>
    </div>
</div>

<!-- END: Main Menu-->

<!-- Javascript Untuk Sidebar Active-->
{{-- Class active sudah ada dari templatenya --}}

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil item yang aktif ke local storage, kalo ada
        const activeMenuId = localStorage.getItem('activeMenu');

        // Pastikan item menu yang sesuai yang dikasih kelas 'active'
        if (activeMenuId) {
            const activeMenuElement = document.getElementById(activeMenuId);
            if (activeMenuElement) {
                activeMenuElement.classList.add('active');
            }
        }

        // Tambahin kelas 'active' ke menu yang ada di kelas nya contohnya aja itu 'nav-item'
        const currentUrl = window.location.pathname;
        document.querySelectorAll('.nav-item a').forEach(link => {
            if (link.getAttribute('href') === currentUrl) {
                link.parentElement.classList.add('active');
                // Simpan di localStorage jika rute berubah
                localStorage.setItem('activeMenu', link.parentElement.id);
            }
        });
    });

    function setActive(menuId) {
        // Hapus kelas 'active' kalo pindah halaman
        document.querySelectorAll('.nav-item').forEach(item => {
            item.classList.remove('active');
        });

        // Tambahin class 'active' kalo pindah halaman
        const activeMenuElement = document.getElementById(menuId);
        if (activeMenuElement) {
            activeMenuElement.classList.add('active');
        }

        // Simpan item yang aktif ke localStorage
        localStorage.setItem('activeMenu', menuId);
    }
</script>

{{-- End Javascript Untuk Sidebar Active --}}
