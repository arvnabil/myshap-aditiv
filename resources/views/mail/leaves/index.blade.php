<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>Pengajuan cuti</title>
  <link rel="stylesheet" href="{{ asset('report_template/assets/css/style.css')}}">
</head>

<body oncontextmenu="return false">
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
            @if ($leaveRequest->attachment)
            <div class="tm_left_footer" style="margin-top: 20px">
              <p class="tm_mb2">Attachment: <b class="tm_primary_color">
                    <a href="{{ url($leaveRequest->attachment)  }}" target="_blank" rel="noopener noreferrer">Lihat file</a>
                   </b></p>
            </div>
            @endif
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
          <div class="tm_note tm_text_center tm_m0_md">
            <p class="tm_m0">Laporan dibuat di sistem dan sah tanpa tanda tangan dan stempel.<br/>Tidak perlu membalas email ini. Karena email ini otomatis dari sistem.</p>
          </div>
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        {{-- @if(!Request::url() === route('reports.leave.view', ['record', $leaveRequest])) --}}
            <a href="{{ route('reports.leave.view',$leaveRequest) }}" class="tm_invoice_btn tm_color1" target="_blank">
              <span class="tm_btn_icon">
                <svg class="ionicon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                </svg>

              </span>
              <span class="tm_btn_text">Lihat Detail</span>
            </a>
        {{-- @endif --}}
        <button onclick="window.print()" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon" style="color:#34c759">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 0 0 3 3h.27l-.155 1.705A1.875 1.875 0 0 0 7.232 22.5h9.536a1.875 1.875 0 0 0 1.867-2.045l-.155-1.705h.27a3 3 0 0 0 3-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0 0 18 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25ZM16.5 6.205v-2.83A.375.375 0 0 0 16.125 3h-8.25a.375.375 0 0 0-.375.375v2.83a49.353 49.353 0 0 1 9 0Zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 0 1-.374.409H7.232a.375.375 0 0 1-.374-.409l.526-5.784a.373.373 0 0 1 .333-.337 41.741 41.741 0 0 1 8.566 0Zm.967-3.97a.75.75 0 0 1 .75-.75h.008a.75.75 0 0 1 .75.75v.008a.75.75 0 0 1-.75.75H18a.75.75 0 0 1-.75-.75V10.5ZM15 9.75a.75.75 0 0 0-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 0 0 .75-.75V10.5a.75.75 0 0 0-.75-.75H15Z" clip-rule="evenodd" />
            </svg>

          </span>
          <span id="text-download" class="tm_btn_text">Print</span>
        </button>
        {{-- <a id="tm_download_btn" href="{{ route('reports.leave.download', $leaveRequest) }}" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon" style="color:#34c759">

            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span id="text-download" class="tm_btn_text" style="color: #34c759">Download</span>
          <span id="text-loading" style="margin-right: 10px;display:none;color:#34c759">Loading...</span>
        </a> --}}
      </div>
    </div>
  </div>
  <script src="{{ asset('report_template/assets/js/jquery.min.js')}}"></script>
  <script src="{{ asset('report_template/assets/js/jspdf.min.js')}}"></script>
  <script src="{{ asset('report_template/assets/js/html2canvas.min.js')}}"></script>
  <script src="{{ asset('report_template/assets/js/main.js')}}"></script>

  <script>
    document.onkeydown = (e) => {
        if (e.key == 123) {
            e.preventDefault();
        }
        if (e.ctrlKey && e.shiftKey && e.key == 'I') {
            e.preventDefault();
        }
        if (e.ctrlKey && e.shiftKey && e.key == 'C') {
            e.preventDefault();
        }
        if (e.ctrlKey && e.shiftKey && e.key == 'J') {
            e.preventDefault();
        }
        if (e.ctrlKey && e.key == 'U') {
            e.preventDefault();
        }
    };
    $(document).on('click','#tm_download_btn', function(){
        const timer = ms => new Promise(res => setTimeout(res, ms));

        (async function () {
            $('#text-loading').fadeIn().css('display','inline-block');
            $('#text-download').fadeIn().css('display','none');
            await timer(4000);
            $('#text-loading').fadeIn().css('display','none');
            $('#text-download').fadeIn().css('display','inline-flex');
            await timer(1000);
        }());

    });
  </script>
</body>
</html>
