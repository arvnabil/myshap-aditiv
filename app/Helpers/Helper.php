<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

function my_escapeshellarg($input)
{
    $input = str_replace('\'', '\\\'', $input);

    return '\'' . $input . '\'';
};

if (!function_exists('set_active')) {
    function set_active($uri, $output = 'active')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}
if (!function_exists('set_active_page')) {
    function set_active_page($uri, $output = 'active-page')
    {
        if (is_array($uri)) {
            foreach ($uri as $u) {
                if (Route::is($u)) {
                    return $output;
                }
            }
        } else {
            if (Route::is($uri)) {
                return $output;
            }
        }
    }
}

function cutText($string, $limit)
{
    $string = strip_tags($string);
    if (strlen($string) > $limit) {

        // truncate string
        $stringCut = substr($string, 0, $limit);
        $endPoint = strrpos($stringCut, ' ');

        //if the string doesn't contain any space then it will cut without word basis.
        $string = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        $string .= '...';
    }
    echo $string;
}


/**
 * Convert number to roman
 *
 * @param int $integer name
 *
 * @return string
 */
function integerToRoman($integer)
{
    $integer = intval($integer);
    $result = '';

    // Create a lookup array that contains all of the Roman numerals.
    $lookup = ['M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1];

    foreach ($lookup as $roman => $value) {
        $matches = intval($integer / $value);
        $result .= str_repeat($roman, $matches);
        $integer = $integer % $value;
    }

    return $result;
}

/**
 * Apply price format to number
 *
 * @param double $number   number
 * @param string $currency format
 *
 * @return string
 */
function priceFormat($number, $currency = '')
{
    $currency = !empty($currency) ? $currency . ' ' : '';
    return $currency . number_format($number, 0, ",", ".");
}

/**
 * Apply date format to datetime
 *
 * @param string $datetime datetime
 * @param string $format   format
 *
 * @return string
 */
function datetimeFormat($datetime, $format = 'd M Y H:i:s')
{
    if (!empty($datetime)) {
        return date($format, strtotime($datetime));
    } else {
        return '';
    }
}

// Array Helper
function get_options($length = 10)
{
    $options = [];
    foreach (range(1, $length) as $number) {
        $options['Option ' . $number] = 'Option ' . $number;
    }
    return $options;
}

// Date Time Helper
function differenceInHours($timein, $timeout)
{
    $starttimestamp = strtotime($timein);
    $endtimestamp = strtotime($timeout);
    $difference = abs($endtimestamp - $starttimestamp) / 3600;
    return $difference;
}

function time_since($waktu)
{
    $original = strtotime($waktu);
    $chunks = array(
        array(60 * 60 * 24 * 365, 'tahun'),
        array(60 * 60 * 24 * 30, 'bulan'),
        array(60 * 60 * 24 * 7, 'minggu'),
        array(60 * 60 * 24, 'hari'),
        array(60 * 60, 'jam'),
        array(60, 'menit'),
    );

    $today = time();
    $since = $today - $original;

    if ($since > 604800) {
        $print = date("M j", $original);
        if ($since > 31536000) {
            $print .= ", " . date("Y", $original);
        }
        return $print;
    }

    for ($i = 0, $j = count($chunks); $i < $j; $i++) {
        $seconds = $chunks[$i][0];
        $name = $chunks[$i][1];

        if (($count = floor($since / $seconds)) != 0) {
            break;
        }
    }

    $print = ($count == 1) ? '1 ' . $name : "$count {$name}";

    if ($count <= 10) {
        return 'baru saja';
    } else if ($count <= 60) {
        return $since . ' detik yang lalu';
    }

    return $print . ' yang lalu';
}

function namaBulan($b)
{
    $b = (int) $b;
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    return $bulan[$b];
}

function array_bulan()
{
    return ['1' => 'Januari', '2' => 'Februari', '3' => 'Maret', '4' => 'April', '5' => 'Mei', '6' => 'Juni', '7' => 'Juli', '8' => 'Agustus', '9' => 'September', '10' => 'Oktober', '11' => 'November', '12' => 'Desember'];
}

function array_year($start, $end)
{
    $years = [];
    foreach (range($start, $end) as $thn) {
        $years[$thn] = $thn;
    }
    return $years;
}

// FILE HELPER

/**
 * getFileNamesFromDir
 *
 * @param string $path
 * @return \Illuminate\Support\Collection
 */
function getFileNamesFromDir(string $path)
{
    $files = File::files($path);
    $files = collect($files);
    $fileNames = $files->map(function (\Symfony\Component\Finder\SplFileInfo $file) {
        return $file->getRelativePathname();
    });
    return $fileNames;
}

/**
 * create folder
 *
 * @param string $folderName
 * @return void
 */
function createFolder(string $folderName)
{
    if (!file_exists($folderName)) {
        mkdir($folderName);
    }
}

// MESSAGE HEPER

/**
 * successMessageCreate
 *
 * @param string $nextTitle
 * @return string
 */
function successMessageCreate($nextTitle = '')
{
    return __('Berhasil Menambahkan Data ' . ($nextTitle));
}

/**
 * successMessageUpdate
 *
 * @param string $nextTitle
 * @return string
 */
function successMessageUpdate($nextTitle = '')
{
    return __('Berhasil Memperbarui Data ' . ($nextTitle));
}

/**
 * successMessageDelete
 *
 * @param string $nextTitle
 * @return string
 */
function successMessageDelete($nextTitle = '')
{
    return __('Berhasil Menghapus Data ' . ($nextTitle));
}

/**
 * successMessageImportExcel
 *
 * @param string $nextTitle
 * @return string
 */
function successMessageImportExcel($nextTitle = '')
{
    return __('Berhasil Mengimpor Data ' . ($nextTitle) . ' Dari Excel');
}


/**
 * successMessageLoadData
 *
 * @param string $nextTitle
 * @return string
 */
function successMessageLoadData($nextTitle = '')
{
    return __('Berhasil Mengambil Data ' . ($nextTitle));
}


// GAGAL SECCTION
// ===================================================================================================================

/**
 * failedMessageCreate
 *
 * @param string $nextTitle
 * @return string
 */
function failedMessageCreate($nextTitle = '')
{
    return __('Gagal Menambahkan Data ' . ($nextTitle));
}

/**
 * failedMessageUpdate
 *
 * @param string $nextTitle
 * @return string
 */
function failedMessageUpdate($nextTitle = '')
{
    return __('Gagal Memperbarui Data ' . ($nextTitle));
}

/**
 * failedMessageDelete
 *
 * @param string $nextTitle
 * @return string
 */
function failedMessageDelete($nextTitle = '')
{
    return __('Gagal Menghapus Data ' . ($nextTitle));
}


/**
 * failedMessageLoadData
 *
 * @param string $nextTitle
 * @return string
 */
function failedMessageLoadData($nextTitle = '')
{
    return __('Gagal Mengambil Data ' . ($nextTitle));
}

// NUMBER HELPER

function rp($number, $decimals = 0)
{
    return number_format($number, $decimals, ',', '.');
}

function dollar($number, $decimals = 0)
{
    return number_format($number, $decimals, '.', ',');
}

function idr($number, $decimals = 0)
{
    return rp($number, $decimals);
}

// RESPONSE HELPER

/**
 * response422
 *
 * @param mixed $errors
 * @param string $message
 * @return JsonResponse
 */
function response422($errors, string $message = null)
{
    if ($message === null) $message = __('Form tidak valid');
    return response()->json([
        'errors' => $errors,
        'message' => $message,
    ], 422);
}

/**
 * response200
 *
 * @param mixed $errors
 * @param string $message
 * @return JsonResponse
 */
function response200($data = null, string $message = null)
{
    if ($message === null) $message = __('Berhasil');
    return response()->json([
        'data' => $data,
        'message' => $message,
    ], 200);
}

/**
 * response404
 *
 * @param mixed $errors
 * @param string $message
 * @return JsonResponse
 */
function response404($data = null, string $message = null)
{
    if ($message === null) $message = __('Data tidak ditemukan.');
    return response()->json([
        'data' => $data,
        'message' => $message,
    ], 404);
}

/**
 * response200
 *
 * @param mixed $errors
 * @param string $message
 * @return JsonResponse
 */
function response500($data = null, string $message = null)
{
    if ($message === null) $message = __('Server Error');
    return response()->json([
        'data' => $data,
        'message' => $message,
    ], 500);
}

// STRING HELPER

class StringHelper
{

    /**
     * get acronym from string
     *
     * @param string $words
     * @return string
     */
    public static function acronym(string $words, int $max = -1)
    {
        $words = explode(" ", $words);
        $acronym = "";
        if ($max === -1)
            foreach ($words as $w) {
                $acronym .= $w[0];
            }
        else {
            $i = 1;
            foreach ($words as $w) {
                $acronym .= $w[0];
                if ($i === $max) break;
                $i++;
            }
        }
        return $acronym;
    }

    /**
     * isUrl
     *
     * @param string $url
     * @return boolean
     */
    public static function isUrl(string $url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
            return false;
        }
        return true;
    }
}

