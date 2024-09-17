<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Laralink">
  <!-- Site Title -->
  <title>Activation Letter</title>
  <link rel="stylesheet" href="{{ asset('report_template/assets/css/style.css')}}">
  <style>
    @font-face {
			font-family: "myFirstFont";
			src: url({{ asset('font/now.light.otf') }}) format('opentype');
			font-weight: normal;
			font-style: normal;
		}
    .bg-zoom{
        border-radius: 10px;
        background:url({{ asset('images/background-certificate-ex.png') }});
        background-repeat: no-repeat;
        background-size: cover;
    }

    .p16{
        font-family: "myFirstFont", sans-serif;
        font-size: 16px;
        color: #575757;
    }

    .pl{
        /* font-family: "myFirstFont", sans-serif; */
        font-size: 35pt;
        font-weight:600;
        color: #BEBBD7;
    }
    .code{
        margin-left: 305px;
    }
    .desc {
        /* font-family: "myFirstFont", sans-serif; */
        color: #5B5B5B;
        font-weight: 400;
        font-size: 12pt;
    }
    .customerDetails{
        margin-left: 322px;
    }
    .tm_container{
        max-width: 1123px !important;
    }

    @media only screen and (max-width: 600px) {
        .tm_style1, .tm_color1{
            display: none;
    }
}
  </style>
</head>

<body>
  <div class="tm_container bg-zoom">
    <div class="tm_invoice_wrap">
      <div class=" tm_style1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_align_center tm_mb20">
            <p class="pl code" style="margin-top: 50px;">{{ $activation_letter->code }}</p>

            <p class="code desc" style="margin-top: 102px;">{{ $activation_letter->company->name }}</p>
            <p class="code desc" style="margin-top: -10px;">{{ $activation_letter->name }} </p>
            <p class="code desc" style="margin-top: -12px;">{{ $activation_letter->email }}</p>
            <p class="code desc" style="margin-top: -12px;">{{ $activation_letter->total_license }}</p>
            <p class="code desc" style="margin-top: -12px;">{{ $activation_letter->address }}</p>
            <p class="code desc" style="margin-top: -12px;">{{ Carbon\Carbon::parse($activation_letter->start_date)->format('d M, Y') }}</</p>
            <p class="code desc" style="margin-top: -12px;">{{ Carbon\Carbon::parse($activation_letter->end_date)->format('d M, Y') }}</</p>
            <p class="code desc" style="margin-top: 92px;">{{ $activation_letter->user->name }}</p>
            <p class="code desc" style="margin-top: -16px;">{{ $activation_letter->user->email }}</p>
            @php
                function localize_us_number($phone) {
                    $numbers_only = preg_replace("/[^\d]/", "", $phone);
                    return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $numbers_only);
                }
            @endphp
            <p class="code desc" style="margin-top: -12px;">(+62) {{ localize_us_number($activation_letter->user->employee->phone_number)}}</p>
            <p class="code desc" style="margin-top: 155px"></p>
          </div>
        </div>
      </div>
      <div class="tm_invoice_btns tm_hide_print">
        <a href="{{ route('reports.activation_letter.view',$activation_letter) }}" class="tm_invoice_btn tm_color1" target="_blank">
              <span class="tm_btn_icon">
                <svg class="ionicon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 14v4.833A1.166 1.166 0 0 1 16.833 20H5.167A1.167 1.167 0 0 1 4 18.833V7.167A1.166 1.166 0 0 1 5.167 6h4.618m4.447-2H20v5.768m-7.889 2.121 7.778-7.778"/>
                </svg>

              </span>
              <span class="tm_btn_text">Lihat Detail</span>
            </a>
        <a id="tm_download_btn" href="{{ route('reports.activation_letter.download', $activation_letter) }}" class="tm_invoice_btn tm_color2">
          <span class="tm_btn_icon" style="color:#34c759">
            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M320 336h76c55 0 100-21.21 100-75.6s-53-73.47-96-75.6C391.11 99.74 329 48 256 48c-69 0-113.44 45.79-128 91.2-60 5.7-112 35.88-112 98.4S70 336 136 336h56M192 400.1l64 63.9 64-63.9M256 224v224.03" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
          </span>
          <span id="text-download" class="tm_btn_text" style="color: #34c759">Download</span>
          <span id="text-loading" style="margin-right: 10px;display:none;color:#34c759">Loading...</span>
        </a>
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
