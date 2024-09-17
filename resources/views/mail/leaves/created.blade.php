<x-mail::message>
# Manajemen yang terhormat,

{{ $leaveRequest->user->employee->fullname  }} ingin mengajukan cuti <strong>{{ $leaveRequest->total_leave  }} Hari</strong>

<div>
    Detail cuti:
</div>
@php
    $start = \Carbon\Carbon::parse($leaveRequest->start_date);
    $end = \Carbon\Carbon::parse($leaveRequest->end_date);
    $created_at = \Carbon\Carbon::parse($leaveRequest->created_at);
@endphp
<div>
    Nama: <strong>{{ $leaveRequest->user->employee->fullname  }}</strong> <br/>
    Tipe Cuti: <strong>{{ $leaveRequest->leave_type->name  }} </strong><br/>
    Dari tanggal: <strong>{{ $start->format('d F Y');  }}</strong> <br/>
    Sampai tanggal: <strong>{{ $end->format('d F Y');  }}</strong> <br/>
    Deskripsi: <strong>{{ $leaveRequest->description  }}</strong> <br/>
    Status: <strong>{{ $leaveRequest->status  }}</strong> <br/>
</div>
<x-mail::subcopy>
    Tahun: <strong>{{ $leaveRequest->year  }}</strong> <br/>
    Total: <strong>{{ $leaveRequest->total_leave  }} Hari </strong><br/>
    Pengajuan pada tanggal: <strong>{{ $created_at->format('d F Y'); }}</strong><br/>
    ID: <strong>{{ $leaveRequest->id }}</strong><br/>
    Anda dapat melihat permintaan cuti ini dengan masuk ke portal menggunakan tombol di bawah.
</x-mail::subcopy>

<x-mail::button :url="route('filament.administrator.resources.leave-requests.edit' , ['record' => $leaveRequest])">
    Lihat detail
</x-mail::button>


Salam,<br/>
{{ config('app.name') }}

</x-mail::message>
