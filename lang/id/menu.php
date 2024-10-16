<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Menu Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'counting_badge_request' => 'Jumlah permintaan',
    'counting_badge' => 'Jumlah :attribute',

    'leaves' => [
        'leave' => 'Cuti',
        'success' => ' Sudah diSetujui!',
        'reject_by' => ' Ditolak oleh:',
        'manage_leave' => 'Kelola Cuti',
        'create_leave' => 'Buat Pengajuan Cuti',
        'update_leave' => 'Ubah Pengajuan Cuti',
        'section_form' => 'Form Pengajuan Cuti',
        'sub_section_form' => 'Informasi mengenai cuti',
        'chart' => 'Grafik Cuti',
        'field' => [
            'leave_id' => 'ID cuti',
            'leave_type' => 'Tipe cuti',
            'start_date' => 'Mulai tanggal',
            'end_date' => 'Sampai tanggal',
            'day' => 'Hari',
            'year' => 'Tahun',
            'status' => 'Status',
            'request_by' => 'Diajukan oleh',
            'checked_by' => 'Diperiksa oleh',
            'total_leave' => 'Total cuti',
            'description' => 'Deskripsi',
            'attachment' => 'Unggah File (File Pdf)',
            'created_at' => 'Dibuat pada',
            'updated_at' => 'Diperbarui pada',
        ],
    ],
    'overtimes' => [
        'manage_overtime' => 'Kelola Lembur',
        'create_overtime' => 'Buat Pengajuan Lembur',
        'update_overtime' => 'Ubah Pengajuan Lembur',
        'section_form' => 'Formulir Pengajuan Lembur',
        'sub_section_form' => 'Informasi tentang lembur',
        'chart' => 'Grafik Lembur',
        'field' => [
            'overtime_id' => 'ID lembur',
            'title' => 'Nama lembur',
            'request_date' => 'Tanggal pengajuan',
            'overtime_items' => 'Item lembur',
            'acitvity' => 'Aktifitas',
            'overtime_date' => 'Tanggal lembur',
            'from' => 'Dari',
            'to' => 'Sampai',
            'total_hour' => 'Total',
            'note' => 'Catatan',
            'status' => 'Status',
            'request_by' => 'Diajukan oleh',
            'checked_by' => 'Diperiksa oleh',
            'created_at' => 'Dibuat pada',
            'updated_at' => 'Diperbarui pada',
        ],
    ],
    'reimbursements' => [
        'manage_reimbursement' => 'Kelola Rembes',
        'create_reimbursement' => 'Buat Pengajuan Rembes',
        'update_reimbursement' => 'Ubah Pengajuan Rembes',
        'section_form' => 'Formulir Pengajuan Rembes',
        'sub_section_form' => 'Informasi Tentang Rembes',
        'chart' => 'Grafik Rembes',
        'field' => [
            'reimbursement_id' => 'ID Rembes',
            'title' => 'Nama Pengajuan',
            'request_date' => 'Tanggal Pengajuan',
            'reimbursement_items' => 'Item Rembes',
            'date' => 'Tanggal',
            'description' => 'Deskripsi',
            'tag' => 'Tag PO',
            'amount' => 'Jumlah',
            'receipt' => 'Kwitansi',
            'company' => 'Perusahaan',
            'status' => 'Status',
            'total_amount' => 'Jumlah Total',
            'status_process' => 'Status Proses',
            'request_by' => 'Diajukan Oleh',
            'checked_by' => 'Diperiksa Oleh',
            'created_at' => 'Dibuat Tanggal',
            'updated_at' => 'Diperbarui pada',
        ],
    ],
    'leave_types' => [
        'manage_leave_type' => 'Tipe Cuti',
        'create_leave_type' => 'Tambah Tipe Cuti',
        'update_leave_type' => 'Ubah Tipe Cuti',
        'section_form' => 'Formulir Tipe Cuti',
        'sub_section_form' => 'Information tentang tipe cuti',
        'field' => [
            'name' => 'Nama Tipe',
            'description' => 'Deskripsi',
            'max_days_allowed' => 'Maksimal Hari',
            'strict' => 'Batasi',
            'created_at' => 'Dibuat Tanggal',
        ],
    ],
    'companies' => [
        'manage_company' => 'Klien Perusahaan',
        'create_company' => 'Tambah Klien Perusahaan',
        'update_company' => 'Ubah Klien Perusahaan',
        'section_form' => 'Form Tambah Klien Perusahaan',
        'sub_section_form' => 'Informasi tentang Klien perusahaan',
        'field' => [
            'company_id' => 'ID Klien Perusahaan',
            'name' => 'Nama Klien Perusahaan',
            'logo' => 'Logo',
            'address' => 'Alamat',
            'description' => 'Deskripsi',
            'phone' => 'Nomor Telepon',
            'email' => 'Surel/Email',
            'created_at' => 'Dibuat Tanggal',
        ],
    ],

    'activation_letters' => [
        'manage_activation_letter' => 'Sertifikat Aktivasi',
        'create_activation_letter' => 'Buat Sertifikat Aktivasi',
        'update_activation_letter' => 'Ubah Sertifikat Aktivasi',
        'section_form' => 'Formulir Sertifikat Aktivasi',
        'sub_section_form' => 'Informasi tentang Sertifikat Aktivasi',
        'field' => [
            'id' => 'ID',
            'code' => 'Kode',
            'name' => 'Nama Klien',
            'email' => 'Email Klien',
            'start_date' => 'Mulai tanggal',
            'end_date' => 'Sampai tanggal',
            'total_license' => 'Total Lisensi',
            'address' => 'Alamat',
            'code_reference' => 'Kode Referensi',
            'company' => 'Perusahaan',
            'brand' => 'Merek',
            'pic' => 'PIC',
            'created_at' => 'Dibuat Tanggal',
            'updated_at' => 'Diubah Tanggal',
        ],
    ],
    'employees' => [
        'manage_employee' => 'Karyawan',
        'update_employee' => 'Ubah Karyawan',
        'section_form' => 'Formulir Karyawan',
        'sub_section_form_update' => 'Perbarui informasi profil dan alamat email akun Anda.',
        'sub_section_form' => 'Informasi tentang Karyawan',
        'field' => [
            'id' => 'ID',
            'firstname' => 'Nama depan',
            'lastname' => 'Nama belakang',
            'account_number' => 'ID Karyawan',
            'phone_number' => 'Nomor Telepon',
            'gender' => 'Jenis kelamin',
            'blood_group' => 'Golongan Darah',
            'dateofbirth' => 'Tanggal Lahir',
            'dateofjoining' => 'Tanggal Bergabung',
            'position' => 'Posisi',
            'address' => 'Alamat',
            'city' => 'Kota',
            'zip_code' => 'Kode Pos',
            'matrial_status' => 'Status Perkawinan',
            'nationality' => 'Kewarganegaraan',
            'pincode' => 'PIN Web (Opsional) fitur ini sedang dikembangkan',
            'created_at' => 'Dibuat pada',
            'updated_at' => 'Diperbarui tanggal',
        ],
    ],
    'user_update' => [
        'section_form' => 'Akses Informasi Masuk',
        'sub_section_form' => 'Perbarui informasi profil dan alamat email akun Anda.',
        'section_form_update_password' => 'Perbarui Kata Sandi',
        'sub_section_form_update_password' => 'Pastikan akun Anda menggunakan kata sandi yang panjang dan acak agar tetap aman.',
        'field' => [
            'avatar' => 'Foto Profil',
            'email' => 'Alamat Email',
            'username' => 'Nama pengguna (username untuk masuk)',
            'leave_type' => 'Tipe Cuti',
            'last_login' => 'Login Terakhir',
            'email_verified_at' => 'Email Diverifikasi pada',
            'current_password' => 'Kata sandi saat ini',
            'password' => 'Kata sandi',
            'password_confirmation' => 'Konfirmasi Kata sandi',

        ]
    ]

];
