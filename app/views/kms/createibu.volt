{% extends "dashboard/basepos.volt" %}

{% block title %}KMS Ibu{% endblock %}

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
        <form class="data-form" action="{{ url("kms/storekmsibu") }}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="idIbu" id="idIbu" value= {{ ibu.idIbu }}> <br>
            <div class="form-group">
                <label for="tanggal">Tanggal Kunjungan</label><br>
                <input class="form-control" type="date" name="tanggal" id="tanggal">
            </div>
            <div class="form-group">
                <label for="beratbadan">berat badan</label><br>
                <input type="number" name="beratbadan" id="beratbadan"> kg
            </div>
            <div class="form-group">
                <label for="tekanandarah">tekanan darah</label><br>
                <input type="text" name="tekanandarah" id="tekanandarah">
            </div>
            <div class="form-group">
                <label for="usiakandungan">usia kandungan</label><br>
                <input type="number" name="usiakandungan" id="usiakandungan"> bulan
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