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
    'counting_badge_request' => 'The number of request',

    'leaves' => [
        'leave' => 'Leave',
        'success' => ' has been Approved!',
        'reject_by' => ' Rejected by:',
        'manage_leave' => 'Manage Leave',
        'create_leave' => 'New Leave Request',
        'update_leave' => 'Update Leave Request',
        'section_form' => 'Form Leave Request',
        'sub_section_form' => 'Information about leave',
        'chart' => 'Leave Chart',
        'field' => [
            'leave_id' => 'Leave ID',
            'leave_type' => 'Leave type',
            'start_date' => 'Start date',
            'end_date' => 'End date',
            'day' => 'Day',
            'year' => 'Year',
            'status' => 'Status',
            'request_by' => 'Request by',
            'checked_by' => 'Checked by',
            'total_leave' => 'Total Leave',
            'description' => 'Description',
            'attachment' => 'Attachment (File Pdf)',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ],
    ],
    'overtimes' => [
        'manage_overtime' => 'Manage Overtime',
        'create_overtime' => 'New Overtime Request',
        'update_overtime' => 'Update Overtime Request',
        'section_form' => 'Form Overtime Request',
        'sub_section_form' => 'Information about overtime',
        'chart' => 'Overtime Chart',
        'field' => [
            'overtime_id' => 'Overtime ID',
            'title' => 'Overtime name',
            'request_date' => 'Request date',
            'overtime_items' => 'Overtime items',
            'acitvity' => 'Activity',
            'overtime_date' => 'Overtime date',
            'from' => 'From',
            'to' => 'To',
            'total_hour' => 'Total',
            'note' => 'Note',
            'status' => 'Status',
            'request_by' => 'Request by',
            'checked_by' => 'Checked by',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ],
    ],

    'reimbursements' => [
        'manage_reimbursement' => 'Reimbursement',
        'create_reimbursement' => 'New Reimbursement Request',
        'update_reimbursement' => 'Update Reimbursement Request',
        'section_form' => 'Form Reimbursement Request',
        'sub_section_form' => 'Information about reimbursement',
        'chart' => 'Reimbursement Chart',
        'field' => [
            'reimbursement_id' => 'Reimbursement ID',
            'title' => 'Reimbursement name',
            'request_date' => 'Request date',
            'reimbursement_items' => 'Reimbursement items',
            'date' => 'Date',
            'description' => 'Description',
            'tag' => 'Tag PO',
            'amount' => 'Amount',
            'receipt' => 'Receipt',
            'company' => 'Company',
            'status' => 'Status',
            'total_amount' => 'Total Amount',
            'status_process' => 'Status Process',
            'request_by' => 'Request by',
            'checked_by' => 'Checked by',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ],
    ],
    'leave_types' => [
        'manage_leave_type' => 'Leave Type',
        'create_leave_type' => 'New Leave Type',
        'update_leave_type' => 'Update Leave Type',
        'section_form' => 'Form Leave Type',
        'sub_section_form' => 'Information about leave type',
        'field' => [
            'name' => 'Name Type',
            'description' => 'Description',
            'max_days_allowed' => 'Max Days',
            'strict' => 'Strict',
            'created_at' => 'Created at',
        ],
    ],
    'companies' => [
        'manage_company' => 'Customer Company',
        'create_company' => 'New Customer Company Request',
        'update_company' => 'Update Customer Company Request',
        'section_form' => 'Form Customer Company Request',
        'sub_section_form' => 'Information about customer company',
        'field' => [
            'company' => 'Customer Company',
            'company_id' => 'Company ID',
            'name' => 'Company name',
            'logo' => 'Logo',
            'address' => 'address',
            'description' => 'Description',
            'phone' => 'Phone Number',
            'email' => 'Email Address',
            'created_at' => 'Created at',
        ],
    ],

    'brands' => [
        'manage_brand' => 'Brand',
        'create_brand' => 'New Brand Request',
        'update_brand' => 'Update Brand Request',
        'section_form' => 'Form Brand Request',
        'sub_section_form' => 'Information about brand',
        'field' => [
            'brand' => 'Brand',
            'brand_id' => 'Brand ID',
            'name' => 'Brand name',
            'logo' => 'Logo',
            'address' => 'address',
            'description' => 'Description',
            'pic_name' => 'PIC Name',
            'pic_phone' => 'PIC Phone',
            'pic_email' => 'PIC Email',
            'created_at' => 'Created at',
        ],
    ],

    'activation_letters' => [
        'manage_activation_letter' => 'Activation Letter',
        'create_activation_letter' => 'New Activation Letter',
        'update_activation_letter' => 'Update Activation Letter',
        'section_form' => 'Form Activation Letter',
        'sub_section_form' => 'Information about Activation Letter',
        'field' => [
            'id' => 'ID',
            'code' => 'Code',
            'name' => 'Client Name',
            'email' => 'Client Email',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'total_license' => 'Total License',
            'address' => 'Address',
            'code_reference' => 'Code Reference',
            'company' => 'Company',
            'brand' => 'Brand',
            'pic' => 'PIC',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ],
    ],
    'employees' => [
        'manage_employee' => 'Employee',
        'update_employee' => 'Edit Employee',
        'section_form' => 'Form Employee',
        'sub_section_form_update' => 'Update your account\'s profile information and email address.',
        'sub_section_form' => 'Information about Employee',
        'field' => [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'account_number' => 'Employee ID',
            'phone_number' => 'Phone Number',
            'gender' => 'Gender',
            'blood_group' => 'Blood Group',
            'dateofbirth' => 'Date of Birth',
            'dateofjoining' => 'Date of Joining',
            'position' => 'Position',
            'address' => 'Address',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'matrial_status' => 'Matrial Status',
            'nationality' => 'Nationality',
            'pincode' => 'PIN Web(Optional) this feautue under development',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ],
    ],
    'user_update' => [
        'section_form' => 'Access Login Information',
        'sub_section_form' => 'Update your account\'s profile information and email address.',
        'section_form_update_password' => 'Update Password',
        'sub_section_form_update_password' => 'Ensure your account is using long, random password to stay secure.',
        'field' => [
            'avatar' => 'Avatar',
            'email' => 'Email Address',
            'username' => 'Username (for login)',
            'leave_type' => 'Leave Type',
            'last_login' => 'Last Login',
            'email_verified_at' => 'Email Verified At',
            'current_password' => 'Current password',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation',

        ]
    ]

];
