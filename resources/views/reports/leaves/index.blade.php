<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Nabil">
  <!-- Site Title -->
  <title>Pengajuan cuti</title>
  <link rel="stylesheet" href="{{ asset('report_template/assets/css/style.css')}}">
  <style>
    @page { margin: 0; }
    .tm_container{
        padding:0 !important;
    }
    .tm_invoice{
        padding: 35px;
    }

  </style>
</head>

<body>
@php
    $start = \Carbon\Carbon::parse($leaveRequest->start_date);
    $end = \Carbon\Carbon::parse($leaveRequest->end_date);
    $updated_at = \Carbon\Carbon::parse($leaveRequest->updated_at);
@endphp
  <div class="tm_container">
    <div class="tm_invoice_wrap">
      <div class="tm_invoice tm_style1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_align_center tm_mb20">
            <div class="tm_invoice_left">
              <p class="tm_m0">
                <b class="tm_primary_color">PT Alfa Cipta Teknologi Virtual</b> <br>
                Infinity Office, Belleza BSA 1st Floor Unit 106, Jl. Letjen Soepeno,<br>
                Kebayoran Lama Jakarta Selatan 12210<br>
                noreply@activ.co.id
              </p>
            </div>
            <div class="tm_invoice_right tm_text_right">
              <div class="tm_logo tm_size2"><img src="{{ asset('report_template/assets/img/logo.png')}}" alt="Logo"></div>
            </div>
          </div>
          <div class="tm_invoice_info tm_mb30">
            <div class="tm_invoice_seperator tm_gray_bg"></div>
            <div class="tm_invoice_info_list">
              <p class="tm_invoice_number tm_m0">No: <b class="tm_primary_color">{{ $leaveRequest->id }}</b></p>
              <p class="tm_invoice_date tm_m0">Tahun: <b class="tm_primary_color">{{ $leaveRequest->year  }}</b></p>
            </div>
          </div>
          <div class="tm_padd_15_20 tm_round_border tm_mb30">
            <div class="tm_grid_row tm_col_4">
                <div class="tm_border_right tm_border_none_md">
                  Tipe Cuti: <br>
                  <b class="tm_primary_color">{{ $leaveRequest->leave_type->name  }}</b>
                </div>
                <div class="tm_border_right tm_border_none_md">
                  Dari Tanggal: <br>
                  <b class="tm_primary_color">{{ $start->format('d F Y');  }}</b>
                </div>
                <div class="tm_border_right tm_border_none_md">
                  Sampai Tanggal: <br>
                  <b class="tm_primary_color">{{ $end->format('d F Y');  }}</b>
                </div>
                <div>
                  Status: <br>
                  @if ($leaveRequest->status === 'Approved')
                      <strong style="color:#21C55E"> {{ $leaveRequest->status }} </strong>
                    @elseif ($leaveRequest->status === 'Pending')
                      <strong style="color:#F59E09"> {{ $leaveRequest->status }} </strong>
                    @else
                      <strong style="color:#F87171"> {{ $leaveRequest->status }} </strong>
                  @endif
                </div>
            </div>
            <div class="tm_left_footer" style="margin-top: 20px">
              <p class="tm_mb2">Deskripsi: <b class="tm_primary_color">{{ $leaveRequest->description  }}</b></p>
            </div>
          </div>
          <div class="tm_left_footer" style="margin-bottom: 20px">
              <p class="tm_mb2"><b class="tm_primary_color">Informasi Karyawan:</b></p>
          </div>
          <div class="tm_table tm_style1">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table>
                  <tbody>
                    <tr>
                      <td class="tm_border_top_0"><b class="tm_primary_color">Nama Depan:</b> {{ $leaveRequest->user->employee->firstname  }}</td>
                      <td class="tm_border_left tm_border_top_0"><b class="tm_primary_color">Nama Belakang:</b> {{ $leaveRequest->user->employee->lastname ?? '-'  }}</td>
                    </tr>
                    <tr>
                      <td><b class="tm_primary_color">Email: </b>{{ $leaveRequest->user->email  }}</td>
                      <td class="tm_border_left"><b class="tm_primary_color">Address: </b>{{ $leaveRequest->user->employee->address ?? '-'  }}</td>
                    </tr>
                    <tr>
                      <td><b class="tm_primary_color">ID Karyawan:</b> {{ $leaveRequest->user->employee->account_number  }}</td>
                      <td class="tm_border_left"><b class="tm_primary_color">Phone Number:</b> {{ $leaveRequest->user->employee->phone_number ? '(+62)' . $leaveRequest->user->employee->phone_number : "-" }}</td>
                    </tr>
                    <tr>
                      <td><b class="tm_primary_color">Departemen:</b> {{ $leaveRequest->user->employee->position->departement->name  }}</td>
                      <td class="tm_border_left"><b class="tm_primary_color">Posisi: </b>{{ $leaveRequest->user->employee->position->name  }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tm_invoice_footer">
            <div class="tm_left_footer">
              <p class="tm_mb2"><b class="tm_primary_color">Total hari:</b></p>
              <p class="tm_m0">{{ $leaveRequest->total_leave  }} Hari </p>
            </div>
            <div class="tm_right_footer" style="padding:10px 15px">
                <p class="tm_mb2"><b class="tm_primary_color">Diperiksa oleh:</b></p>

                @if ($leaveRequest->user_checked_by !== null)
                    <p class="tm_m0">
                            <strong style="color:#029AFF">
                        {{ $leaveRequest->user_checked_by->employee->gender === 'male' ? ' Pak ': ' Bu ' }}{{ $leaveRequest->user_checked_by->employee->fullname }}
                        </strong>
                    </p>
                @else
                    <p>Menunggu persetujuan</p>
                @endif
            </div>
          </div>
          <div class="tm_note tm_text_center tm_m0_md" style="padding-bottom:50px">
            <p class="tm_m0">Laporan dibuat di sistem dan sah tanpa tanda tangan dan stempel.<br/>Tidak perlu membalas email ini. Karena email ini otomatis dari sistem.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('report_template/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('report_template/assets/js/jspdf.min.js')}}"></script>
  <script src="{{ asset('report_template/assets/js/html2canvas.min.js')}}"></script>
  <script src="{{ asset('report_template/assets/js/main.js')}}"></script>
</body>
</html>
