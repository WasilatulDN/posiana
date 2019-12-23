{% extends "dashboard/basepos.volt" %}

{% block title %}Daftar KMS{% endblock %}

{% block content %}

 <div class="dashboard-header" align="right">
        <div class="dropdown-btn" style="float: right;">
            <button><i class="fas fa-user-md"> </i> Profil</button>
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
        <h2 class="dashboard-title">Daftar KMS</h2>
        <div id="daftar-kms"></div>
        
    </div>
    


    <script>
        var table = new Tabulator("#daftar-kms", {
            height: "311px",
            layout: "fitColumns",
            placeholder: "Tidak Ada KMS",
            columns: [
                {title: "No", field: "no", formatter: "rownum", width: 10},
                {title: "Nama", field: "nama"},
                {title: "Nama Ibu", field: "namaIbu"},
                {
                    title: "Lihat", field: "link", formatter: "link", formatterParams: {
                        labelField: "name",
                        label: "Lihat",
                        urlPrefix: "{{ url('kms/detail-kms/') }}",
                        target: "_blank",
                    }
                },
                {
                    title: "Hapus", field: "link", formatter: "link", formatterParams: {
                        labelField: "name",
                        label: "Hapus",
                        urlPrefix: "{{ url('kms/hapus-kms/') }}",
                        
                    }
                },
            ],
        });
        table.setData("{{ url('kms/daftar-kms') }}");

    </script>
{% endblock %}