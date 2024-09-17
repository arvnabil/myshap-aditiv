<x-mail::message>
# {{ $reimbursementRequest->user->employee->fullname }} yang terhormat,

Selamat! Pengajuan rembes <strong>{{ $reimbursementRequest->title  }} </strong> telah <strong style="color:#029AFF">selesai Diproses.</strong>

<div>
    Berikut detail rembes Anda:
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
    Status: <strong style="color:#029AFF">{{ $reimbursementRequest->reimbursement_status == 'Done' ? 'Selesai Diproses' : $reimbursementRequest->reimbursement_status;  }}</strong> <br/>
</div>

<x-mail::table style="font-size: 14px;">
|    Tanggal      |     Deskripsi     |     Tag PO     |    Jumlah      |    Perusahaan    |
| ----------------- | :-------------: | -------------- | :-----------:  | ---------------: |
@foreach ($reimbursementItems as $item)
|  {{ $item->reimbursement_date }}  |  {{ $item->description }}  |  {{ $item->tag_po }}   |  {{ 'Rp ' . $item->amount }}  |  {{ $item->company->name }}  |
@endforeach
</x-mail::table>

<x-mail::subcopy>
    Diproses oleh: <strong style="color:#029AFF">{{ $reimbursementRequest->user_checked_by->employee->gender === 'male' ? ' Pak ': ' Bu ' }}{{ $reimbursementRequest->user_checked_by->employee->fullname }}</strong><br/>
    Tidak perlu membalas email ini. Karena email ini otomatis dari sistem.
</x-mail::subcopy>

<x-mail::button :url="route('filament.employee.resources.reimbursements.index')">
    Lihat Halaman Rembes
</x-mail::button>


Salam,<br/>
{{ config('app.name') }}

</x-mail::message>
