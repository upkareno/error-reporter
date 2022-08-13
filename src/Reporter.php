<?php
namespace Upkareno\ErrorReporter;
use Upkareno\ErrorReporter\Models\Error;
use Upkareno\ErrorReporter\Notifications\ReporterNotification;

class Reporter
{
    public function report($errors)
    {
        $error = new Error();
        $error->message = $errors->getMessage();
        $error->file = $errors->getFile();
        $error->line = $errors->getLine();
        $error->trace = $errors->getTraceAsString();
        $error->code = $errors->getCode();
        $error->os =  php_uname();
        $error->ip = request()->ip();
        $error->user_agent = request()->header('User-Agent');
        $error->save();
        $this->sendEmail($errors);
    }

    public function reports()
    {
        return Error::all();
    }

    // get todays errors 
    public function todaysErrors()
    {
        return Error::whereDate('created_at', today())->orderBy('created_at', 'desc')->get();
    }

    // get errors from last week
    public function lastWeekErrors()
    {
        return Error::whereDate('created_at', '>=', today()->subDays(7))->orderBy('created_at', 'desc')->get();
    }

    // get errors from last month
    public function lastMonthErrors()
    {
        return Error::whereDate('created_at', '>=', today()->subDays(30))->orderBy('created_at', 'desc')->get();
    }

    // get errors from last year
    public function lastYearErrors()
    {
        return Error::whereDate('created_at', '>=', today()->subDays(365))->orderBy('created_at', 'desc')->get();
    }

    // get error by id
    public function getError($id)
    {
        return Error::find($id);
    }

    // send email
    public function sendEmail($errors)
    {
        $notification = new ReporterNotification();
        // send email to all reporters users
        $users = \Upkareno\ErrorReporter\Models\ReporterUser::get();
        foreach ($users as $user) {
            $user->notify($notification);
        }
     }
}
