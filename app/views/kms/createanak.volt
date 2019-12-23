{% extends "dashboard/basepos.volt" %}

{% block title %}KMS Anak{% endblock %}

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
                        <a href="{{ url('posyandu/logout') }}">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="home-content">
        <label>Formulir KMS</label>
        <form class="data-form" action="{{ url("kms/storekmsanak") }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idIbu" id="idIbu" value= {{ anak.idIbu }}> <br>
            <input type="hidden" name="idAnak" id="idAnak" value= {{ anak.idAnak }}> <br>
            <div class="form-group">
                <label for="tanggal">Tanggal Kunjungan</label><br>
                <input class="form-control" type="date" name="tanggal" id="tanggal">
            </div>
            <div class="form-group">
                <label for="tinggibadan">tinggi badan</label><br>
                <input type="number" name="tinggibadan" id="tinggibadan"> cm
            </div>
            <div class="form-group">
                <label for="beratbadan">berat badan</label><br>
                <input type="number" name="beratbadan" id="beratbadan"> kg
            </div>
            <div class="form-group">
                <label for="lingkarkepala">lingkar kepala</label><br>
                <input type="number" name="lingkarkepala" id="lingkarkepala"> cm
            </div>
            <div class="form-group">
                <label for="imunisasi">imunisasi</label><br>
                <input type="text" name="imunisasi" id="imunisasi">
            </div>
            <div class="form-group">
                <label for="vitamin">vitamin</label><br>
                <input type="text" name="vitamin" id="vitamin"> <br>
            </div>
            <div class="form-group">
                <label for="catatan">catatan</label><br>
                <input type="text" name="catatan" id="catatan">
            </div>

            <input class="log-btn" type="submit" value="Simpan">
        </form>
    </div>

{% endblock %}