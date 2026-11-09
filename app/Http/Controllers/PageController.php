<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    private function paket(): array
    {
        return [
            ['uc' => 60,   'bonus' => 0,   'harga' => 16200],
            ['uc' => 325,  'bonus' => 25,  'harga' => 81000],
            ['uc' => 660,  'bonus' => 60,  'harga' => 160000],
            ['uc' => 1800, 'bonus' => 300, 'harga' => 400000],
        ];
    }

    private function pesanan(): array
    {
        return [
            ['kode' => 'TU-001', 'player_id' => '5123456789', 'uc' => 660,  'total' => 160000, 'status' => 'Berhasil'],
            ['kode' => 'TU-002', 'player_id' => '5198765432', 'uc' => 60,   'total' => 16200,  'status' => 'Pending'],
            ['kode' => 'TU-003', 'player_id' => '5111222333', 'uc' => 1800, 'total' => 400000, 'status' => 'Berhasil'],
            ['kode' => 'TU-004', 'player_id' => '5144455566', 'uc' => 325,  'total' => 81000,  'status' => 'Gagal'],
        ];
    }

    // Total UC dari pesanan yang berhasil
    private function totalUc(): int
    {
        $berhasil = array_filter($this->pesanan(), fn($p) => $p['status'] === 'Berhasil');
        return array_sum(array_column($berhasil, 'uc'));
    }

    public function login()
    {
        return view('login');
    }

    public function dashboard(Request $request)
    {
        $username = $request->input('username');

        if ($request->isMethod('post')) {
            $password = $request->input('password');

            if ($username != 'tiarabrigite' || $password != '11111') {
                return redirect('/')->with('error', 'Maaf, login gagal. Silahkan cek username atau password');
            }
        } elseif (!$username) {
            return redirect('/');
        }

        return view('dashboard', [
            'username' => $username,
            'totalUc'  => $this->totalUc(),
            'paket'    => $this->paket(),
        ]);
    }

    public function profile(Request $request)
    {
        $username = $request->input('username');
        if (!$username) {
            return redirect('/');
        }

        return view('profile', [
            'username' => $username,
            'totalUc'  => $this->totalUc(),
            'info'     => ['Peran' => 'Member', 'Game' => 'PUBG Mobile', 'Bergabung' => '1 Sep 2026'],
        ]);
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->input('username');
        if (!$username) {
            return redirect('/');
        }

        return view('pengelolaan', [
            'username' => $username,
            'totalUc'  => $this->totalUc(),
            'paket'    => $this->paket(),
            'pesanan'  => $this->pesanan(),
        ]);
    }
}