<div>
    Hallo <strong>{{ $model->info->firstname." ".$model->info->lastname }}</strong>, Selamat datang di <strong>POS LST</strong>. <br>
    <br>
    Silahkan verifikasi email kamu, dengan mengklik link dibawah ini.<br>
    <a href="{{ url('/email/verify/'.$vkey) }}">Klik Disini</a>
</div>