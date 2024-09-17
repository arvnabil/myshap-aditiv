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
        font-family: "myFirstFont", sans-serif;
        font-size: 38pt;
        font-weight:600;
        color: #BEBBD7;
    }
    .code{
        font-family: "myFirstFont", sans-serif;
        margin-left: 315px;
    }
    .desc {
        font-family: "myFirstFont", sans-serif;
        color: #5B5B5B;
        font-size: 12pt;
    }

    .tm_container{
        max-width: 1123px !important;
        padding-top: 65px;
        margin: -72px;
    }
  </style>
</head>

<body>
  <div class="tm_container bg-zoom">
    <div class="tm_invoice_wrap">
      <div class=" tm_style1" id="tm_download_section">
        <div class="tm_invoice_in">
          <div class="tm_invoice_head tm_align_center tm_mb20">
            <p class="pl code" style="margin-top: 10px;">{{ $activation_letter->code }}</p>

            <p class="code desc" style="margin-top: 105px;">{{ $activation_letter->company->name }}</p>
            <p class="code desc" style="margin-top: -10px;">{{ $activation_letter->name }} </p>
            <p class="code desc" style="margin-top: -11px;">{{ $activation_letter->email }}</p>
            <p class="code desc" style="margin-top: -11px;">{{ $activation_letter->total_license }}</p>
            <p class="code desc" style="margin-top: -12px;">{{ $activation_letter->address }}</p>
            <p class="code desc" style="margin-top: -13px;">{{ Carbon\Carbon::parse($activation_letter->start_date)->format('d M, Y') }}</</p>
            <p class="code desc" style="margin-top: -14px;">{{ Carbon\Carbon::parse($activation_letter->end_date)->format('d M, Y') }}</</p>
            <p class="code desc" style="margin-top: 96px;margin-left: 315px;">{{ $activation_letter->user->name }}</p>
            <p class="code desc" style="margin-top: -15px;margin-left: 315px;">{{ $activation_letter->user->email }}</p>
            @php
                function localize_us_number($phone) {
                    $numbers_only = preg_replace("/[^\d]/", "", $phone);
                    return preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $numbers_only);
                }
            @endphp
            <p class="code desc" style="margin-top: -13px;margin-left: 315px;">(+62) {{ localize_us_number($activation_letter->user->employee->phone_number)}}</p>
            <p class="code desc" style="margin-top: 100px"></p>
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
