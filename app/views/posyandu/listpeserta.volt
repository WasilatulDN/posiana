{% extends "dashboard/basepos.volt" %}

{% block title %}Daftar Ibu{% endblock %}

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
        <form action="{{ url("posyandu/list-peserta") }}" method="post">
            <h3>Masukkan username ibu </h3>
            <div class="input-group">
                <div class="input-group-ctn">
                    <input type="username" name="username" id="username" style="padding: 5%">
                </div>
                <div class="input-group-back">
                    <input type="submit" value="Tambah">
                </div>
            </div>
        </form>
        <div class='successMessage'></div>
        <h2 class="dashboard-title">Daftar Ibu</h2>
        <div id="daftar-ibu"></div>
        
    </div>

    <script>
        var table = new Tabulator("#daftar-ibu", {
            height: "311px",
            layout: "fitColumns",
            placeholder: "Tidak Ada Ibu",
            columns: [
                {title: "No", field: "no", formatter: "rownum", width: 10},
                {title: "Nama Ibu", field: "nama"},
                {
                    title: "Tambah KMS Ibu", field: "link", formatter: "link", formatterParams: {
                        labelField: "name",
                        label: "Tambah",
                        urlPrefix: "{{ url('kms/ibu/') }}",
                        target: "_blank",
                    }
                },
            ],
        });
        table.setData("{{ url('kms/list-ibu') }}");

    </script>
{% endblock %}