<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use App\Models\Kelas;
use App\Models\Platinum;

class WhatsappController extends Controller
{
    public function whatsapp(Request $request) {
        $kelas = Kelas::get();
        $platinum = Platinum::get();
        $data = $request->all();
        $number = $data["nomor"];
        $message = $data["pesan"];

        if (preg_match("/halo/i", $message)) {
            Http::post("https://wa-pkm.herokuapp.com/send", [
				"number" => $number,
				"message" => "halo juga"
			]);
        } else if (preg_match("/kelas/i", $message)) {
            Http::post("https://wa-pkm.herokuapp.com/sendlist", [
                'number' => $number,
                'body' => 'List Kelas',
                'title' => 'List Kelas',
                'message' => 
                    [
                        [
                            'title' => 'ini pesan',
                            'rows' => 
                                [
                                        [
                                            'title' => 'produk 1',
                                            'description' => 'ini adalah list produk 1',
                                        ],
                                        [
                                            'title' => 'produk 1',
                                            'description' => 'ini adalah list produk 1',
                                        ]
                                ],
                        ],
                    ],
                ]);
        }
    }
}
