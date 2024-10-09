<!DOCTYPE html>
<head>
    <script src="https://cdn.tailwindcss.com">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Arial:wght@400;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            -webkit-print-color-adjust: exact !important;
        }

        p,
        .f12 {
            font-size: 12px;
        }
    </style>
</head>

<body class="bg-white p-0">
@php
    $quotation_date = \Carbon\Carbon::parse($quotation->quotation_date);
    $due_date = \Carbon\Carbon::parse($quotation->due_date);
@endphp
    <div class="max-w-4xl mx-auto border p-8">
        <div class="flex justify-start items-start mb-8">
            <div>
                <img alt="Company Logo" class="mb-4" height="50" src="{{ asset('report_template/assets/img/aditiv-light.webp') }}" width="200" />
            </div>
            <div class="text-left mt-5 ml-10">
                <p class="font-bold">
                    PT ABAD DIGITAL KREATIV
                </p>
                <p>
                    Arcade Business Center 6th Floor Unit 6-03,Jl. Pantai Indah Utara 2,<br/> Kav.C1, Desa/Kelurahan Kapuk Muara, Kec. Penjaringan, <br/>Kota Adm. Jakarta Utara, Provinsi DKI Jakarta
                </p>
            </div>
        </div>
        <div class="flex justify-between mb-8">
            <div>
                <p class="font-bold">
                    ALAMAT PENAGIHAN
                </p>
                <p>
                    {{ $quotation->customer_company }}
                    <br />
                    {{ $quotation->customer_name }}
                    <br />
                    {{ $quotation->customer_address }}
                    <br />
                    Phone : {{ $quotation->customer_phone }}
                    <br />
                    Email : {{ $quotation->customer_email }}
                </p>
                <p class="mt-4">
                    Sender :
                    <br />
                    {{ $quotation->user->employee->full_name }} - {{ $quotation->user->employee->position->name }}
                    <br />
                    Phone : {{ $quotation->user->employee->phone_number ?? '08XXXXXXXXXXX' }}
                    <br />
                    Email : {{ $quotation->user->email }}
                </p>
            </div>
            <div class="text-right">
                <div class="bg-gray-200 p-2 mb-2 flex items-center justify-between"
                    style="background-color: #7989A1;color:#fff">
                    <p class="font-bold mr-2 ">
                        PENAWARAN # <span style="margin-right: 10px;margin-left: 30px;">:</span>
                    </p>
                    <p>
                        {{ $quotation->quotation_number }}
                    </p>
                </div>
                <div class="bg-gray-200 p-2 mb-2 flex items-center justify-between"
                    style="background-color: #7989A1;color:#fff">
                    <p class="font-bold mr-2">
                        TANGGAL <span style="margin-right: 10px;margin-left: 60px;">:</span>
                    </p>
                    <p>
                        {{ $quotation_date->format('d/m/y') }}
                    </p>
                </div>
                <div class="bg-gray-200 p-2 flex items-center justify-between"
                    style="background-color: #7989A1;color:#fff">
                    <p class="font-bold mr-2">
                        BERLAKU HINGGA <span style="margin-right: 10px;margin-left: 10px;">:</span>
                    </p>
                    <p>
                        {{ $due_date->format('d/m/y') }}
                    </p>
                </div>
            </div>
        </div>
        <table class="w-full border-collapse f12">
            <thead>
                <tr class="bg-gray-300" style="background-color: #7989A1;color:#fff">
                    <th class="p-2 text-left">
                        Keterangan
                    </th>
                    <th class="p-2 text-left">
                        Qty
                    </th>
                    <th class="p-2 text-left">
                        Diskon
                    </th>
                    <th class="p-2 text-left">
                        Harga (Rp.)
                    </th>
                    <th class="p-2 text-left">
                        Jumlah (Rp.)
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($quotation->quotation_items as $item)
                    <tr>
                    <td class="border p-2">
                        {{ $item->product_name }}
                    </td>
                    <td class="border p-2">
                        {{ $item->qty . ' ' }} {{ $item->satuan }}
                    </td>
                    <td class="border p-2">
                        {{ idr($item->discount,1) }}%
                    </td>
                    <td class="border p-2">
                        {{ idr($item->unit_price,2) }}
                    </td>
                    <td class="border p-2">
                        {{ idr($item->amount,2) }}
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="flex justify-between mb-8">
            <div class="text-sm w-1/2" style="color: 9d9fa6;font-size: 12px">
                <p class="font-bold pt-10">
                    Syarat &amp; Ketentuan
                </p>
                <ol class="list-decimal list-inside">
                    <li>
                        Harga sudah termasuk PPN 11%
                    </li>
                    <li>
                        Harga belum termasuk PPH 22/PPH 23
                    </li>
                    <li>
                        Harga belum termasuk biaya instalasi by remote &amp; onsite
                    </li>
                    <li>
                        Pembayaran CBD (Cash before delivery)
                    </li>
                    <li>
                        Ready stock (limited stock)
                    </li>
                    <li>
                        Dikenakan biaya pembatalan 50% jika pembeli membatalkan PO
                    </li>
                    <li>
                        Garansi 2 tahun
                    </li>
                    <li>
                        Harga FOB Jakarta
                    </li>
                </ol>
                <p class="mt-4">
                    Nomor Rekening :
                    <br />
                    BCA : 6044898009 - ABAD DIGITAL KREATIV PT
                    <br />
                    Kantor Cabang Utama Alam Sutera ( Tangerang Selatan )
                </p>
            </div>
            <div class="w-1/3 pt-10">
                <div class="flex justify-between mb-2">
                    <p>
                        SUBTOTAL
                    </p>
                    <p>
                        {{ idr($quotation->subtotal,2) }}
                    </p>
                </div>
                <div class="flex justify-between mb-2">
                    <p>
                        PPN 11.0%
                    </p>
                    <p>
                        {{ idr($quotation->ppn,2) }}
                    </p>
                </div>
                <div class="flex justify-between bg-gray-200 p-2" style="background-color: #7989A1;color:#fff">
                    <p class="font-bold">
                        TOTAL
                    </p>
                    <p class="font-bold">
                        {{ idr($quotation->total,2) }}
                    </p>
                </div>
                <div class="mt-8">
                    <p>
                        <img alt="Company Logo" height="50" src="{{ asset('storage/' . $quotation->user->signature) }}" width="200" />
                    </p>
                    <div class="border-t-2 border-gray-400 mt-4 pt-2">
                        <p>
                            {{ $quotation->user->employee->full_name }}
                        </p>
                        <p>
                            {{ $quotation->user->employee->position->name }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
