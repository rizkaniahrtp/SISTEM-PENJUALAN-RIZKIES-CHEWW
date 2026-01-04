<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <!-- <form method="post" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Cari sesuatu..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-warning" name="tombol_search" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form> -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a> -->

                            <!-- Dropdown - Messages -->
                            <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Cari sesuatu..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-warning" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li> -->

                        
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="/inbox" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                @if ($jumlah_belum_dibaca > 0)
                                    <span class="badge badge-danger badge-counter">
                                        {{ $jumlah_belum_dibaca }}
                                    </span>                                
                                @endif
                            </a>

                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Inbox
                                </h6>                                
                                @if (count($inbox_terbaru) < 1)
                                    <tbody>
                                        <tr>
                                            <td colspan="11">
                                                <p class="pt-3 text-center">Tidak ada data untuk ditampilkan</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                @else
                                @foreach ($inbox_terbaru as $inbox)
                                    <a class="dropdown-item d-flex align-items-center">
                                        <div class="dropdown-list-image mr-3">
                                            <img class="rounded-circle" src="{{ asset('/image.foto-profil.jpg') }}" alt="">
                                            <div class="status-indicator bg-success"></div>    
                                        </div>

                                        <div class="font-weight-bold">
                                            <div class="text-truncate" style="max-width: 240px;">
                                                {{ $inbox->pesan }}
                                            </div>

                                            <div class="small text-gray-500">
                                                {{ $inbox->nama }} . {{ $inbox->created_at->diffForHumans() }}
                                            </div>                                            
                                        </div>
                                    </a>                                
                                @endforeach
                                @endif
                                <a class="dropdown-item text-center small text-gray-500" href="/inbox">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>
                        @auth
                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->nama_user }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ auth()->user()->foto_profil ? asset('image/user/' . auth()->user()->foto_profil) : asset('image/foto-profil.jpg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in bg-warning"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/admin/profil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-white-400"></i>
                                    Profil
                                </a>
                                <a class="dropdown-item" href="/admin/ubah_password">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-white-400"></i>
                                    Ubah Password
                                </a>
                                
                                <!-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->

                                <div class="dropdown-divider"></div>
                                 <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-white-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                        @endauth
                    </ul>
                </nav>