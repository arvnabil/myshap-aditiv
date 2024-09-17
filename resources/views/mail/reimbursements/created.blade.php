<x-mail::message>
# Manajemen yang terhormat,

{{ $reimbursementRequest->user->employee->fullname  }} ingin mengajukan rembes: <strong>{{ $reimbursementRequest->title  }}</strong>

<div>
    Detail rembes:
</div>
@php
    setlocale(LC_TIME, 'id_ID');
    \Carbon\Carbon::setLocale('id');
    $request_date = \Carbon\Carbon::parse($reimbursementRequest->request_date);
    $created_at = \Carbon\Carbon::parse($reimbursementRequest->created_at);
@endphp
<div>
    ID: <strong>{{ $reimbursementRequest->id  }}</strong> <br/>
    Title: <strong>{{ $reimbursementRequest->title  }} </strong><br/>
    Tanggal Pengajuan: <strong>{{ $request_date->format('d F Y');  }}</strong> <br/>
    Total Rembes: <strong>{{ 'Rp ' . $reimbursementRequest->total_amount;  }}</strong> <br/>
    Status: <strong style="color:#EA580C">{{ $reimbursementRequest->reimbursement_status;  }}</strong> <br/>
</div>

<x-mail::table style="font-size: 14px;">
|    Tanggal      |     Deskripsi     |     Tag PO     |    Jumlah      |    Perusahaan    |
| ----------------- | :-------------: | -------------- | :-----------:  | ---------------: |
@foreach ($reimbursementItems as $item)
|  {{ $item->reimbursement_date }}  |  {{ $item->description }}  |  {{ $item->tag_po }}   |  {{ 'Rp ' . $item->amount }}  |  {{ $item->company->name }}  |
@endforeach
</x-mail::table>

<x-mail::subcopy>
    Anda dapat melihat permintaan rembes ini dengan masuk ke portal menggunakan tombol di bawah.
</x-mail::subcopy>

<x-mail::button :url="route('filament.administrator.resources.reimbursements.edit' , ['record' => $reimbursementRequest])">
    Lihat detail
</x-mail::button>


Salam,<br/>
{{ config('app.name') }}

</x-mail::message>
