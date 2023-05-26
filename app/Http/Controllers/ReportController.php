<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $data = '';

        if ($user->level_id == 1) {
            if ($request->data == 'all') {
                $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                ->where('status', 'paid')
                                ->latest()
                                ->get();
            } elseif ($request->data == 'today') {
                $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                ->where('status', 'paid')
                                ->whereDate('created_at',Carbon::now())
                                ->latest()
                                ->get();
            } elseif ($request->data == 'thisMonth') {
                $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                ->where('status', 'paid')
                                ->whereMonth('created_at',Carbon::now()->month)
                                ->latest()
                                ->get();
            } else {
                if ($request->month) {
                    $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                    ->where('status', 'paid')
                                    ->whereMonth('created_at', $request->month)
                                    ->latest()
                                    ->get();
                } elseif ($request->year) {
                    $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                    ->where('status', 'paid')
                                    ->whereYear('created_at', $request->year)
                                    ->latest()
                                    ->get();
                } else {
                    $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                    ->where('status', 'paid')
                                    ->whereMonth('created_at', $request->month)
                                    ->whereYear('created_at', $request->year)
                                    ->latest()
                                    ->get();
                }
            }
            
        } else {
            if ($request->data == 'all') {
                $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                ->latest()
                                ->get();
            } elseif ($request->data == 'today') {
                $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                ->whereDate('created_at',Carbon::now())
                                ->latest()
                                ->get();
            } elseif ($request->data == 'thisMonth') {
                $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                ->whereMonth('created_at',Carbon::now()->month)
                                ->latest()
                                ->get();
            } else {
                if ($request->month) {
                    $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                    ->whereMonth('created_at', $request->month)
                                    ->latest()
                                    ->get();
                } elseif ($request->year) {
                    $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                    ->whereYear('created_at', $request->year)
                                    ->latest()
                                    ->get();
                } else {
                    $data = Transaction::with(['transaction_details', 'transaction_details.menu'])
                                    ->whereMonth('created_at', $request->month)
                                    ->whereYear('created_at', $request->year)
                                    ->latest()
                                    ->get();
                }
            }
        }
        return view('transaction.report', ['data' => $data]);
    }
}
