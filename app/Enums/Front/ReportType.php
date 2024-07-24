<?php

namespace App\Enums\Front;

class ReportType
{
    /**
     * Retrieve a map of enum keys and values.
     *
     * @return array
     */
    public static function getReportType() : array
    {
        return [
            '1' => trans('report.1'),
            '2' => trans('report.2'),
            '3' => trans('report.3'),
            '4' => trans('report.4'),
            '5' => trans('report.5'),
            '6' => trans('report.6'),
            '7' => trans('report.7'),
            '8' => trans('report.8'),
        ];
    }

}
