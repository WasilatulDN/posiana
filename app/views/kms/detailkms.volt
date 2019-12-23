{% extends "dashboard/basepos.volt" %}

{% block title %}Detail KMS{% endblock %}

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
    <div class="home-content">   
    {%if kms.idAnak == NULL%}
        <h3>KMS Ibu</h3>
        tanggal kunjungan : {{kms.tanggal}} <br>
        berat badan : {{kms.beratBadan}} kg <br>
        tekanan darah : {{kms.tekananDarah}} <br>
        usia kandungan : {{kms.usiaKandungan}} bulan <br>
        vitamin : {{kms.vitamin}} <br>
        catatan : {{kms.catatan}} <br>
    {%else%}
         <h3>KMS Anak</h3>
        tanggal kunjungan : {{kms.tanggal}} <br>
        berat badan : {{kms.beratBadan}} kg <br>
        tinggi badan : {{kms.tinggiBadan}} cm <br>
        lingkar kepala : {{kms.lingkarKepala}} cm <br>
        imunisasi : {{kms.imunisasi}} <br>
        vitamin : {{kms.vitamin}} <br>
        catatan : {{kms.catatan}} <br>
    {%endif%}
    </div>

       
{% endblock %}