<?php

namespace App\Http\Controllers;

use App\Mail\Support;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function view_support_page(Request $request)
    {
        $data = session()->all();
        return view('Support.support', compact('data'));
    }

    public function store_support_request(Request $request)
    {
        try {
            $filePath = $this->storeSupportAttachment($request->file('ss_issue'));

            $supportRequest = $this->createSupportRequest(
                $request->only(['role', 'name', 'email', 'subject', 'issue']),
                $filePath
            );

            $this->sendSupportNotification($supportRequest);

            return $this->redirectBasedOnRole($request->role)
                ->with('success_support', 'Successfully Sent');

        } catch (Exception $e) {
            Log::error('Support request failed: ' . $e->getMessage());
            return back()->with('error_support', 'Failed to submit support request. Please try again.');
        }
    }

    /**
     * Store the support request attachment
     */
    protected function storeSupportAttachment($file): string
    {
        if (!$file) {
            throw new Exception('No support attachment provided');
        }

        $fileName = $file->getClientOriginalName();
        $file->move(public_path('app-assets/images/support/'), $fileName);

        return $fileName;
    }

    /**
     * Create support request record
     */
    protected function createSupportRequest(array $data, string $filePath): array
    {
        $supportData = array_merge($data, ['ss_issue' => $filePath]);

        DB::table('support')->insert($supportData);

        return $supportData;
    }

    /**
     * Send support notification email
     */
    protected function sendSupportNotification(array $supportRequest): void
    {
        Mail::to(env('DEVELOPER_EMAIL'))
            ->send(new Support($supportRequest));
    }

    /**
     * Determine redirect based on user role
     */
    protected function redirectBasedOnRole(string $role)
    {
        return match ($role) {
            'employee' => redirect('/dashboard'),
            'patient' => redirect('/patient_info'),
            default => redirect('/agency_dashboard'),
        };
    }
}
