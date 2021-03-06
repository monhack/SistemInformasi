<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class BookingController extends Controller
{

    public function Insert()
    {
        return view('Booking');
            // 'name' => $data['name'],
            // 'book_time' => $data['book_time'],
            // 'book_date' => $data['book_date'],
            // 'phone' => $data['phone'],
            // 'people_amount' => $data['people_amount'],
    }
    public function store(Request $rq){
        $name=$rq->name;
        $book_date=$rq->book_date;
        $book_time=$rq->book_time;
        $phone=$rq->phone;
        $people_amount=$rq->people_amount;

        $Booking=new Booking();
        $Booking->name=$name;
        $Booking->book_date=$book_date;
        $Booking->book_time=$book_time;
        $Booking->phone=$phone;
        $Booking->status='BELUM DATANG';
        $Booking->people_amount=$people_amount;
        $Booking->save();
        return back()->with('info','Pesanan tempat anda telah diproses untuk selanjutnya tunggu konfirmasi dari admin lewat Whatsapp, Trimakasih :).');
    }
    public function index() {
    	$bookings = Booking::all();
    	return view('admin/admin_booking', compact('bookings'));
    }

    public function change_status($id) {
        $booking = Booking::find($id);
        $booking->status = 'SUDAH DATANG';
        $booking->save();

        return redirect(route('admin.booking'))->with('info', 'Status booking berhasil diubah!');
    }
}
