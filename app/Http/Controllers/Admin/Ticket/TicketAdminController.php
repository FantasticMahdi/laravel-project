<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket\TicketAdmin;
use App\Models\User;
use Illuminate\Http\Request;

class TicketAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::where('user_type', 1)->get();
        return view('admin.ticket.admin.index', compact('admins'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function set(User $admin)
    {
        TicketAdmin::where('user_id', $admin->id)->first()
            ? TicketAdmin::where('user_id', $admin->id)->forceDelete()
            : TicketAdmin::create(['user_id' => $admin->id]);

        return redirect()->route('admin.ticket.admin.index')->with('swal-success','تغییر شما با موفقیت اعمال شد.');
    }
}
