<?php
namespace App\Services;

use App\Models\SystemLog;
use Illuminate\Support\Facades\Auth;

class LoggerService
{
    public static function log($action, $model, $context)
    {
        $classification = session()->get('classification');
        switch ($classification) {
            case 'employee':
                $user_id = session()->get('employeeId');
                break;

            case 'agency':
                $user_id = session()->get('agencyId');
                break;

            case 'patient':
                $user_id = session()->get('patientId');
                break;

            default:
                $user_id = 0;
                break;
        }

        SystemLog::create([
            'action' => $action,
            'model' => $model,
            'context' => json_encode($context),
            'user_id' => $user_id,
            'classification' => $classification,
            'dept_id' => session()->get('dept_id') ?? null,
        ]);
    }
}
