<!DOCTYPE html>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Laralink">
    <!-- Site Title -->
    <title>Purchase Invoice</title>
    <style>
        body {
            color: #000 !important;
        }

        td.nobrd {
            border-top: 0px !important;
        }

        td.nolh {
            line-height: 0 !important;
        }

        .tm_round_border {
            border: none !important;
            /* border: 1px solid #000  !important; */
            overflow: hidden;
            border-radius: 0px !important;
        }

        .f14 {
            font-size: 14px;
        }

        .f12 {
            font-size: 12px;
        }

        .tdborder {
            border: 1px #000 solid;
        }

        .pd-1 {
            padding: 5px 5px;
        }

        .center {
            text-align: center;
        }

        td.nobtop {
            border-top: none !important;
        }

        .border-msg {
            border: 1px #000 solid;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('report_template/assets/css/style.css')}}">
</head>

<body>
@php
    $purchase_order_date = \Carbon\Carbon::parse($purchaseOrder->purchase_order_date);
    $due_date = \Carbon\Carbon::parse($purchaseOrder->due_date);
@endphp
    <div class="tm_container">
        <div class="tm_invoice_wrap">
            <div class="tm_invoice tm_style1" id="tm_download_section">
                <div class="tm_invoice_in">
                    <div class="tm_invoice_head tm_align_center">
                        <div class="tm_invoice_left" style="margin-right: -120px;">
                            <div class="tm_primary_color tm_f20 tm_text_uppercase tm_bold">PT ABAD DIGITAL KREATIV</div>
                        </div>
                        <div class="tm_invoice_right tm_text_right">
                            <img src="{{ asset('report_template/assets/img/aditiv-light.webp') }}" width="200" alt="Logo">
                        </div>
                    </div>
                    <div class="tm_invoice_head tm_mb10">
                        <div class="tm_invoice_left" style="margin-right: -140px;">
                            <p class="tm_mb2 f12">
                                Arcade Business Center 6th Floor Unit 6-03,Jl. Pantai Indah Utara 2, Kav.C1, Desa/Kelurahan Kapuk Muara, Kec. Penjaringan, Kota Adm. Jakarta Utara, Provinsi DKI Jakarta
                            </p>
                            <p class="tm_mb2 f12">
                                Telp: (021) 50105009
                            </p>
                            <p class="tm_mb2 f12">
                                Email: info@aditiv.co.id
                            </p>
                            <p class="tm_mb2 f12">
                                20.515.935.3-047.000
                            </p>
                        </div>
                        <div class="tm_invoice_right tm_text_right">
                            <div class="tm_invoice_info_left tm_mb20_md" style="margin-left: 150px;">
                                <table>
                                    <tr>
                                        <td class="nobrd nolh f12"><b>PEMBELIAN # :</b></td>
                                        <td class="nobrd nolh f12">{{ $purchaseOrder->purchase_order_number }}</td>
                                    </tr>
                                    <tr>
                                        <td class="nobrd nolh f12"><b>TANGGAL :</b></td>
                                        <td class="nobrd nolh f12">{{ $purchase_order_date->format('d/m/Y'); }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="">_______________________________________________________________________
                        <b>PEMBELIAN</b> _______________________________</div>
                    <br>
                    <div>SUPPLIER</div>
                    <div class="tm_invoice_head tm_mb10">
                        <div class="tm_invoice_left" style="margin-right: -120px;border: 1px #000 solid;">
                            <table>
                                <tr>
                                    <td class="nobrd nolh f12" style="padding:10px 5px;">
                                        NAMA<span style="margin-left: 27px;">:</span></td>
                                    <td class="nobrd nolh f12" style="padding:10px 5px;">{{ $purchaseOrder->supplier->name }}</td>
                                </tr>
                                <tr>
                                    <td class="nobrd f12" style="padding:10px 5px;">ALAMAT<span
                                            style="margin-left: 15px;">:</span></td>
                                    <td class="nobrd f12" style="padding:10px 5px;">{{ $purchaseOrder->supplier->address }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="tm_invoice_right">
                            <div class="tm_invoice_info_left tm_mb20_md"
                                style="margin-left: 150px; border: 1px #000 solid;">
                                <table>
                                    <tr>
                                        <td class="nobrd f12"
                                            style="padding: 7px;line-height: 1.5rem;padding-bottom:45px;">
                                            JATUHTEMPO<span style="margin-left: 7px;">:</span></td>
                                        <td class="nobrd tm_text_right"
                                            style="padding: 10px;line-height: 1.5rem; padding-bottom:45px;">{{ $due_date->format('d/m/Y'); }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="tm_table tm_style1 tm_mb30">
                        <div class="tm_round_border">
                            <div class="tm_table_responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th
                                                class="pd-1 f12 tdborder center tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">
                                                NO.
                                            </th>
                                            <th
                                                class="pd-1 f12 tdborder tm_width_4 tm_semi_bold tm_primary_color tm_gray_bg">
                                                KETERANGAN
                                            </th>
                                            <th class="pd-1 f12 tdborder center tm_width_2 tm_semi_bold tm_primary_color
                                                tm_gray_bg tm_text_right">
                                                QTY
                                            </th>
                                            <th class="pd-1 f12 tdborder tm_width_2 tm_semi_bold tm_primary_color
                                                tm_gray_bg tm_text_right">
                                                HARGA
                                                SATUAN
                                                (Rp.)</th>
                                            <th
                                                class="pd-1 f12 tdborder tm_width_1 tm_semi_bold tm_primary_color tm_gray_bg">
                                                DISKON
                                            </th>
                                            <th class="pd-1 f12 tdborder tm_width_3  tm_semi_bold tm_primary_color
                                                tm_gray_bg">
                                                PAJAK
                                            </th>
                                            <th class="pd-1 f12 tdborder tm_width_4 tm_semi_bold tm_primary_color
                                                tm_gray_bg tm_text_right">
                                                JUMLAH (Rp.)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i=1;
                                        @endphp
                                        @foreach ($purchaseOrder->purchase_order_items as $item)
                                        <tr>
                                            <td class="pd-1 f12 tdborder">{{ $i++ }}</td>
                                            <td class="pd-1 f12 tdborder">{{ $item->product_name }}</td>
                                            <td class="pd-1 f12 tdborder tm_text_right">{{ $item->qty }} {{ $item->satuan }}</td>
                                            <td class="pd-1 f12 tdborder tm_text_right">{{ idr($item->unit_price,2) }}</td>
                                            <td class="pd-1 f12 tdborder">{{ idr($item->discount,1) }}%</td>
                                            <td class="pd-1 f12 tdborder">{{ $item->vat === 'X' ? $item->vat : idr($item->discount,1) . '%' }}</td>
                                            <td class="pd-1 f12 tdborder tm_text_right">{{ idr($item->amount,2) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop pd-1 f12 tdborder">Subtotal</td>
                                            <td class="nobtop pd-1 f12 tdborder tm_text_right">{{ idr($purchaseOrder->subtotal,2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop pd-1 f12 tdborder">PPN (11.0%)</td>
                                            <td class="nobtop pd-1 f12 tdborder tm_text_right">{{ idr($purchaseOrder->ppn,2) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop pd-1 f12 tdborder"><b>TOTAL</b></td>
                                            <td class="nobtop pd-1 f12 tdborder tm_text_right"
                                                style="background-color:#d2d9ec"><b>{{ idr($purchaseOrder->total,2) }}</b></td>
                                        </tr>
                                        <tr>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop"></td>
                                            <td class="nobtop pd-1 f12 tdborder">Sisa Tagihan</td>
                                            <td class="nobtop pd-1 f12 tdborder tm_text_right">{{ idr($purchaseOrder->insufficient_payment,2) }}</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="tm_invoice_footer">
                            <div class="tm_left_footer">
                            </div>
                            <div class="tm_right_footer">
                            </div>
                        </div>
                    </div>
                    <div class="border-msg" style="width: 500px;padding: 5px;">
                        <p class="tm_mb5"><b class="tm_primary_color">PESAN</b></p>
                        <p class="tm_m0 tm_note_list">
                            {{ $purchaseOrder->message }}
                        </p>
                    </div><!-- .tm_note -->
                    <br>
                    <div class="border-msg" style="width: 500px;padding: 5px;">
                        <p class="tm_mb5"><b class="tm_primary_color">TERBILANG</b></p>
                        <p class="tm_m0 tm_note_list" style="text-transform: uppercase">
                            {{$purchaseOrder->spelled_out}}
                        </p>
                    </div><!-- .tm_note -->
                </div>
            </div>
            <div class="tm_invoice_btns tm_hide_print">
                    <a href="{{ route('letter.purchase_order.view', $purchaseOrder) }}" class="tm_invoice_btn tm_color1" target="_blank">
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
                {{-- <a id="tm_download_btn" href="{{ route('reports.overtime.download', $overtimeRequest) }}" class="tm_invoice_btn tm_color2">
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
