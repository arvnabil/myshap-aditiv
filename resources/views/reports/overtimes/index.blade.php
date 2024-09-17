<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>Pengajuan Lembur</title>
  <link rel="stylesheet" href="{{ asset('report_template/assets/css/style.css')}}">
</head>

<body>
@php
    $request_date = \Carbon\Carbon::parse($overtimeRequest->request_date);
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
              <p class="tm_invoice_number tm_m0">No: <b class="tm_primary_color">{{ $overtimeRequest->id }}</b></p>
              <p class="tm_invoice_date tm_m0"><b class="tm_primary_color">SURAT LEMBUR</b></p>
            </div>
          </div>

          <div class="tm_padd_15_20 tm_round_border tm_mb30">
            <div class="tm_grid_row tm_col_4">
                <div class="tm_border_right tm_border_none_md">
                  Nama Pengajuan: <br>
                  <b class="tm_primary_color">{{ $overtimeRequest->title  }}</b>
                </div>
                <div class="tm_border_right tm_border_none_md">
                  Tanggal Pengajuan: <br>
                  <b class="tm_primary_color">{{ $request_date->format('d F Y');  }}</b>
                </div>
                <div class="tm_border_right tm_border_none_md">
                  Diperiksa Oleh: <br>
                    @if ($overtimeRequest->user_checked_by !== null)
                    <b class="tm_primary_color">
                        <strong style="color:#029AFF">
                            {{ $overtimeRequest->user_checked_by->employee->gender === 'male' ? ' Pak ': ' Bu ' }}{{ $overtimeRequest->user_checked_by->employee->fullname }}
                        </strong>
                    </b>
                    @else
                        <p style="color:#F59E09">Menunggu persetujuan</p>
                    @endif

                </div>
                <div>
                  Status: <br>
                  @if ($overtimeRequest->overtime_status === 'Done')
                      <strong style="color:#029AFF"> {{ $overtimeRequest->overtime_status }} </strong>
                    @elseif ($overtimeRequest->overtime_status === 'Process')
                      <strong style="color:#F59E09"> {{ $overtimeRequest->overtime_status }} </strong>
                  @endif
                </div>
            </div>
          </div>
          <div class="tm_left_footer" style="margin-bottom: 20px">
              <p class="tm_mb2"><b class="tm_primary_color">Informasi Karyawan:</b></p>
          </div>
          <div class="tm_table tm_style1 tm_mb30">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table>
                  <tbody>
                    <tr>
                      <td class="tm_border_top_0"><b class="tm_primary_color">Nama Depan:</b> {{ $overtimeRequest->user->employee->firstname  }}</td>
                      <td class="tm_border_left tm_border_top_0"><b class="tm_primary_color">Nama Belakang:</b> {{ $overtimeRequest->user->employee->lastname ?? '-'  }}</td>
                    </tr>
                    <tr>
                      <td><b class="tm_primary_color">Email: </b>{{ $overtimeRequest->user->email  }}</td>
                      <td class="tm_border_left"><b class="tm_primary_color">Address: </b>{{ $overtimeRequest->user->employee->address ?? '-'  }}</td>
                    </tr>
                    <tr>
                      <td><b class="tm_primary_color">ID Karyawan:</b> {{ $overtimeRequest->user->employee->account_number  }}</td>
                      <td class="tm_border_left"><b class="tm_primary_color">Phone Number:</b> {{ $overtimeRequest->user->employee->phone_number ? '(+62)' . $overtimeRequest->user->employee->phone_number : "-" }}</td>
                    </tr>
                    <tr>
                      <td><b class="tm_primary_color">Departemen:</b> {{ $overtimeRequest->user->employee->position->departement->name  }}</td>
                      <td class="tm_border_left"><b class="tm_primary_color">Posisi: </b>{{ $overtimeRequest->user->employee->position->name  }}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="tm_left_footer" style="margin-bottom: 20px">
              <p class="tm_mb2"><b class="tm_primary_color">Item Lembur:</b></p>
          </div>
           <div class="tm_table tm_style1 tm_mb30">
            <div class="tm_round_border">
              <div class="tm_table_responsive">
                <table>
                  <thead>
                      <tr>
                          <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Aktivitas</th>
                          <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Tanggal Pengajuan</th>
                          <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Waktu Mulai</th>
                          <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Waktu Akhir</th>
                          <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Total</th>
                          <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg">Keterangan</th>
                          <th class="tm_width_2 tm_semi_bold tm_primary_color tm_gray_bg tm_text_right">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($overtimeRequest->overtime_items as $item)
                    @php
                        $overtime_date = \Carbon\Carbon::parse($item->overtime_date);
                    @endphp
                    <tr>
                      <td class="tm_width_2">{{ $item->activity_name }}</td>
                      <td class="tm_width_2">{{ $overtime_date->format('d F Y'); }}</td>
                      <td class="tm_width_2">{{ $item->time_in }}</td>
                      <td class="tm_width_2">{{ $item->time_out }}</td>
                      <td class="tm_width_2">{{ $item->total_hours }} Jam</td>
                      <td class="tm_width_2">{{ $item->reason ?? '-'}}</td>
                      <td class="tm_width_2 tm_text_right">
                        @if ($item->status === 'Approved')
                        <strong style="color:#21C55E"> {{ $item->status }} </strong>
                        @elseif ($item->status === 'Pending')
                        <strong style="color:#F59E09"> {{ $item->status }} </strong>
                        @else
                        <strong style="color:#F87171"> {{ $item->status }} </strong>
                    @endif
                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>

          </div>
          {{-- <div class="tm_padd_15_20 tm_round_border">
            <p class="tm_mb5"><b class="tm_primary_color">Terms & Conditions:</b></p>
            <ul class="tm_m0 tm_note_list">
              <li>All claims relating to quantity or shipping errors shall be waived by Buyer unless made in writing to Seller within thirty (30) days after delivery of goods to the address stated.</li>
              <li>Delivery dates are not guaranteed and Seller has no liability for damages that may be incurred due to any delay in shipment of goods hereunder. Taxes are excluded unless otherwise stated.</li>
            </ul>
          </div><!-- .tm_note --> --}}
          <div class="tm_note tm_text_center tm_m0_md">
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

  <script>
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
