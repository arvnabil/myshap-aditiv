<x-mail::message>
# Manajemen yang terhormat,

{{ $overtimeRequest->user->employee->fullname  }} ingin mengajukan lembur: <strong>{{ $overtimeRequest->title  }}</strong>

<div>
    Detail lembur:
</div>
@php
    setlocale(LC_TIME, 'id_ID');
    \Carbon\Carbon::setLocale('id');
    $request_date = \Carbon\Carbon::parse($overtimeRequest->request_date);
    $created_at = \Carbon\Carbon::parse($overtimeRequest->created_at);
@endphp
<div>
    ID: <strong>{{ $overtimeRequest->id  }}</strong> <br/>
    Title: <strong>{{ $overtimeRequest->title  }} </strong><br/>
    Tanggal Pengajuan: <strong>{{ $request_date->format('d F Y');  }}</strong> <br/>
    Status: <strong style="color:#EA580C">{{ $overtimeRequest->overtime_status;  }}</strong> <br/>
</div>

<x-mail::table style="font-size: 14px;">
|    Aktifitas      |     Tanggal     |           Waktu Lembur          |    Total      |    Keterangan    |
| ----------------- | :-------------: | ------------------------------- | :-----------: | ---------------: |
@foreach ($overtimeItems as $item)
|  {{ $item->activity_name }}  |  {{ $item->overtime_date }}  |  {{ $item->time_in }}  -  {{ $item->time_out }}  |  {{ $item->total_hours }} Jam  |  {{ $item->reason }}  |
@endforeach
</x-mail::table>

<x-mail::subcopy>
    Anda dapat melihat permintaan lembur ini dengan masuk ke portal menggunakan tombol di bawah.
</x-mail::subcopy>

<x-mail::button :url="route('filament.administrator.resources.overtimes.edit' , ['record' => $overtimeRequest])">
    Lihat detail
</x-mail::button>


Salam,<br/>
{{ config('app.name') }}

</x-mail::message>
