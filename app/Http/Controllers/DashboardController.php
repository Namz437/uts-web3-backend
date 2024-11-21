<?php

namespace App\Http\Controllers;

use App\Models\Kontrakan;
use App\Models\Pesanan;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $kontrakan = Kontrakan::all();
        $users = User::all();

        // Chart counting data
        $users = User::all()->count();
        $kontrakan = Kontrakan::all()->count();
        $pesanan = Pesanan::all()->count();

        return view('/dashboard', [
            'kontrakan' => $kontrakan,
            'users' => $users,

            // Chart counting data views
            'totalUser' => $users,
            'totalKontrakan' => $kontrakan,
            'totalPesanan' => $pesanan
        ]);
    }
}
