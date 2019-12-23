{% extends "dashboard/basepos.volt" %}

{% block title %}Daftar Anak{% endblock %}

{% block content %}

 <div class="dashboard-header" align="right">
        <div class="dropdown-btn" style="float: right;">
            <button><i class="fas fa-user"> </i> Profil</button>
            <div class="dropdown-ctn">
                <ul>
                    <li>
                        <a href="{{ url('dokter/datadokter') }}">
                            Akun
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('posyandu/logout') }}">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="home-content" align="center">
        <h2 class="dashboard-title">Daftar Anak</h2>
        <div id="daftar-anak"></div>
        
    </div>
    


    <script>
        var table = new Tabulator("#daftar-anak", {
            height: "311px",
            layout: "fitColumns",
            placeholder: "Tidak Ada Anak",
            columns: [
                {title: "No", field: "no", formatter: "rownum", width: 10},
                {title: "Nama Anak", field: "namaAnak"},
                {title: "Nama Ibu", field: "namaIbu"},
                {
                    title: "Tambah KMS Anak", field: "link", formatter: "link", formatterParams: {
                        labelField: "name",
                        label: "Tambah",
                        urlPrefix: "{{ url('kms/anak/') }}",
                        target: "_blank",
                    }
                },
            ],
        });
        table.setData("{{ url('kms/list-anak') }}");

    </script>
{% endblock %}