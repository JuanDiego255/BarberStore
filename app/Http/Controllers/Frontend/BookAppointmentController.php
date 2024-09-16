<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Traits\Notify;
use App\Mail\SendBookAppointmentMail;
use App\Models\BookAppointment;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookAppointmentController extends Controller
{
    use Notify;

    public function bookAppointmentStore(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'full_name' => 'required|max:40',
            'email' => 'required|max:100',
            'phone' => 'required',
            'service_name' => 'required',
            'date_of_appointment' => 'required',
            'message' => 'required',
        ]);

        $bookAppointment = new BookAppointment();
        $bookAppointment->user_id = $user->id;
        $bookAppointment->full_name = $request->full_name;
        $bookAppointment->email = $request->email;
        $bookAppointment->phone = $request->phone;
        $bookAppointment->service_id = $request->service_name;
        $bookAppointment->date_of_appointment = $request->date_of_appointment;
        $bookAppointment->message = $request->message;
        $bookAppointment->save();

        $service_name = Service::with('serviceDetails')->where('id', $bookAppointment->service_id)->first();

        $msg = [
            'username' => $user->username,
            'service' => optional($bookAppointment->service->serviceDetails)->service_name ?? 'abc',
            'date' => $bookAppointment->date_of_appointment,
        ];

        $action = [
            "link" => route('admin.edit.appointment', $bookAppointment->id),
            "icon" => "fa fa-money-bill-alt text-white"
        ];
        $this->adminPushNotification('BOOK_APPOINTMENT ', $msg, $action);
        return back()->with('success', 'Appointment request send successfully');
    }
}
