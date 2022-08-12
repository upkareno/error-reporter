<?php
namespace Upkareno\ErrorReporter\Controllers;

use Upkareno\ErrorReporter\Reporter;
use Illuminate\Http\Request;

class ReporterController 
{
    public function reports($type)
    {
        $reporter = new Reporter();

        switch ($type) {
            case 'todays':
                $reporter = $reporter->todaysErrors();
                break;
            case 'last-week':
                $reporter = $reporter->lastWeekErrors();
                break;
            case 'last-month':
                $reporter = $reporter->lastMonthErrors();
                break;
            case 'last-year':
                 $reporter = $reporter->lastYearErrors();
                break;
            default:
                $reporter =  $reporter->reports();
                break;
        }
        $data = json_decode($reporter, true);
        return $data;
    }
}
