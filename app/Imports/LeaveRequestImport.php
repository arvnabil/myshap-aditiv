<?php

namespace App\Imports;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use App\Models\User;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class LeaveRequestImport implements ToModel,WithHeadingRow
{
    use Importable;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

        return new LeaveRequest([
            'leave_type_id' => self::getLeaveTypeId($row['leave_type_id']),
            'start_date'  => self::getDate($row['start_date']),
            'end_date' => self::getDate($row['end_date']),
            'description' => $row['description'],
            'user_id' => self::getUserIdFromIDEmployee($row['user_id']),
            'approved_at' => $row['approved_at'],
            'checked_by' => $row['checked_by'] !== NULL ? self::getUserIdFromIDEmployee($row['checked_by']) : NULL,
            'status' => $row['status'],
            'is_imported' => true,
            'year' => date('Y', strtotime(self::getDate($row['start_date']))),
            'total_leave' => self::getTotalDay(self::getDate($row['start_date']), self::getDate($row['end_date'])),
        ]);
    }

    public static function getLeaveTypeId(string $description){
        return  LeaveType::where('description', $description)->first()->id;
    }
    public static function getUserIdFromIDEmployee(string $idEmployee){
        return User::whereHas('employee', function ($query) use ($idEmployee) {
            return $query->where('account_number', '=', $idEmployee);
        })->first()->id;
    }

    public static function getDate(string $date){
        return Carbon::parse($date)->timezone('Asia/Jakarta')->format('Y-m-d');
    }
    public static function getTotalDay(string $start_date, string $end_date){
        // Calculate Total Days
        $to = Carbon::createFromFormat('Y-m-d', Carbon::parse($start_date)->timezone('Asia/Jakarta')->format('Y-m-d'));
        $from = Carbon::createFromFormat('Y-m-d', Carbon::parse($end_date)->timezone('Asia/Jakarta')->format('Y-m-d'))->addDays();
        return $to->diffInDays($from);
    }
}
