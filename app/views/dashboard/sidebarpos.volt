<nav class="sidebar">
    <div class="side-header">
        <a href="{{ url('') }}">
            <img src="{{ url('img/posiana-pjg.png') }}" style="width: 100%">
        </a>
    </div>
    <div class="side-menu">
        <ul>
            <li>
                <a href="{{ url('posyandu/home') }}">
                    <i class="fas fa-clipboard-list"> </i>
                    <span>KMS</span>
                </a>
            </li>
           <li>
                <a href="{{ url() }}">
                    <i class="fas fa-users"> </i>
                    <span>Daftar Peserta Posyandu</span>
                </a>
                <div class="side-submenu">
                    <ul>
                        <li>
                            <a href="{{ url('posyandu/list-peserta') }}">
                                <i class="fas fa-list-ul"></i>
                                <span>Daftar Ibu</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('posyandu/list-anak') }}">
                                <i class="fas fa-list-ul"></i>
                                <span>Daftar Anak</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li>
                <a href="{{ url('') }}">
                    <i class="fas fa-clipboard-list"> </i>
                    <span>Kegiatan</span>
                </a>
            </li>
            
        </ul>
    </div>
</nav>