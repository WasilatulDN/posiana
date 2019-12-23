{% extends "dashboard/baseibu.volt" %}

{% block title %}List Anak{% endblock %}

{% block content %}
    <div class="dashboard-header" align="right">


        <div class="dropdown-btn" style="float: right;">
            <button><i class="fas fa-user-md"> </i> Profil</button>
            <div class="dropdown-ctn">
                <ul>
                    <li>
                        <a href="{{ url('') }}">
                            Akun
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('ibu/logout') }}">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="home-content">
        <div class="dok-hello">
            <h1 style="padding: 0px 5px">
                Hallo, {{ session.get('auth')['username'] }}!
                
            </h1>
        </div>
        <div class="home-content">
            <h2 class="dashboard-title">Daftar Anak</h2>
            <div id="daftar-anak"></div>
        </div>
    </div>
    <script>
        var table = new Tabulator("#daftar-anak", {
            height: "311px",
            layout: "fitColumns",
            placeholder: "Tidak Ada Anak",
            columns: [
                {title: "No", field: "no", formatter: "rownum", width: 10},
                {title: "Nama Anak", field: "namaAnak"},
                {title: "Jenis Kelamin", field: "jKel"},
                {title: "Tanggal Lahir", field: "tglLahir"},
                {
                    title: "Edit", field: "link", formatter: "link", formatterParams: {
                        labelField: "name",
                        label: "Edit",
                        urlPrefix: "{{ url('ibu/edit-anak/') }}",
                        target: "_blank",
                    }
                },
                {
                    title: "Hapus", field: "link", formatter: "link", formatterParams: {
                        labelField: "name",
                        label: "Hapus",
                        urlPrefix: "{{ url('ibu/hapus-anak/') }}",
                        // target: "_blank",
                    }
                }
            ],
        });
        table.setData("{{ url('ibu/lihatAnak') }}");
    </script>
{% endblock %}