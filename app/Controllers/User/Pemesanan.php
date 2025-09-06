<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use Config\Database;

class Pemesanan extends BaseController
{
    protected $db;
    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function index()
    {
        if (logged_in()) {
            $carId = $this->request->getVar('id');
            $carPrice = $this->db->table('armada')->where('id', $carId)->get()->getRowArray();
            $payment = $this->db->table('rekening')->get()->getRowArray();
            $pickupTime = $this->request->getVar('pickupTime');
            $returnTime = $this->request->getVar('returnTime');
            $pickupDate = $this->request->getVar('pickupDate');
            $returnDate = $this->request->getVar('returnDate');
            $status_penyewaan = $this->request->getVar('status_penyewaan');
            $driver = $this->db->table('driver')->get()->getRowArray();

            // Gabungkan tanggal dan waktu untuk mendapatkan datetime dalam format ISO 8601
            $pickupDatetime = $pickupDate . 'T' . $pickupTime . ':00';
            $returnDatetime = $returnDate . 'T' . $returnTime . ':00';

            // Konversi datetime ke UNIX timestamp
            $pickupTimestamp = strtotime($pickupDatetime);
            $returnTimestamp = strtotime($returnDatetime);

            // Hitung selisih waktu dalam detik
            $durationSeconds = $returnTimestamp - $pickupTimestamp;

            // Konversi durasi dalam detik ke jam
            $durationHours = $durationSeconds / 3600;

            // Pembulatan durasi ke atas ke bilangan bulat
            $durationHours = ceil($durationHours);
            $durationDay =  $durationHours / 24;

            if ($durationHours < 12) {
                session()->setFlashdata('gagal', 'Maaf durasi sewa kendaraan minimal 12 Jam');
                return redirect()->back()->withInput();
            }

            $payRentPerDay = $carPrice['price'] * $durationDay;

            $payRent = round($payRentPerDay  / 100000) * 100000;

            if ($status_penyewaan == 'Dengan Driver') {
                $payRent += $driver['biaya'];
            }

            if ($durationHours % 24 == 0) {
                $durationString = $durationDay . ' hari';
            } else {
                $durationDay = floor($durationHours / 24);
                $durationHour = $durationHours % 24;
                if ($durationDay > 0 && $durationHour > 0) {
                    $durationString = $durationDay . ' hari ' . $durationHour . ' jam';
                } else if ($durationDay > 0) {
                    $durationString = $durationDay . ' hari';
                } else {
                    $durationString = $durationHour . ' jam';
                }
            }

            $data = [
                'title' => 'Booking kendaraan',
                'carId' => $carId,
                'payment' => $payment,
                'pickupDatetime' => date('Y-m-d H:i:s', $pickupTimestamp),
                'returnDatetime' => date('Y-m-d H:i:s', $returnTimestamp),
                'durationDay' =>  $durationString,
                'rentalPrice' => $payRent,
                'status_penyewaan' => $status_penyewaan
            ];

            return view('user/pemesanan/index', $data);
        }

        session()->setFlashdata('gagal', 'Mohon maaf sebelum melakukan pemesanan silahkan login terlebih dahulu.');
        return redirect()->back()->withInput();
    }

    public function booking()
    {
        $biaya = $this->request->getVar('biaya');

        $id = 'INV-' . uniqid();

        $ktp = $this->request->getFile('ktp');
        $kk = $this->request->getFile('kk');
        $bukti = $this->request->getFile('bukti');

        $renameFileKTP = $ktp->getRandomName();
        $renameFileKK = $kk->getRandomName();
        $renameFileBukti = $bukti->getRandomName();

        $ktp->move('img', $renameFileKTP);
        $kk->move('img', $renameFileKK);
        $bukti->move('img', $renameFileBukti);

        $data = [
            'id' => strtoupper($id),
            'user_id' => user()->id,
            'armada_id' => $this->request->getVar('carId'),
            'email' => $this->request->getVar('email'),
            'fullname' => $this->request->getVar('fullname'),
            'no_telp' => $this->request->getVar('no_telp'),
            'alamat' => $this->request->getVar('alamat'),
            'duration' => $this->request->getVar('duration'),
            'catatan' => $this->request->getVar('catatan'),
            'pickup_date' => $this->request->getVar('pickupDatetime'),
            'return_date' => $this->request->getVar('returnDatetime'),
            'status_penyewaan' => $this->request->getVar('status_penyewaan'),
            'biaya_sewa' => $biaya,
            'ktp' => $renameFileKTP,
            'kk' => $renameFileKK,
            'bukti_pembayaran' => $renameFileBukti
        ];

        $this->db->table('transaksi')->insert($data);

        session()->setFlashdata('berhasil', 'Pesanan sedang diproses...');
        return redirect()->to('catalog');
    }

    public function riwayat()
    {
        $getTransaction = $this->db->table('transaksi')
            ->select('transaksi.*, armada.merk as merk, armada.model as model')
            ->join('armada', 'transaksi.armada_id = armada.id')
            ->where('user_id', user()->id)
            ->get();


        $data = [
            'title' => 'Riwayat Pemesanan',
            'riwayat' => $getTransaction->getResultArray()
        ];

        return view('user/pemesanan/riwayat', $data);
    }

    public function detail($id)
    {
        $getDetailTransaksi = $this->db->table('transaksi')
            ->select('transaksi.*, armada.merk as merk, armada.model as model, armada.image as image, armada.price as price')
            ->join('armada', 'armada.id = transaksi.armada_id')
            ->where('transaksi.id', $id)->get();

        $data = [
            'title' => 'Detail Transaksi',
            'transaksi' => $getDetailTransaksi->getRowArray()
        ];

        return view('user/pemesanan/detail', $data);
    }

    public function batal($id)
    {
        $getDetailTransaksi = $this->db->table('transaksi')
            ->where('transaksi.id', $id)->get();

        $data = [
            'title' => 'Detail Transaksi',
            'transaksi' => $getDetailTransaksi->getRowArray()
        ];

        return view('user/pemesanan/batal', $data);
    }

    public function cancelled()
    {
        $id = $this->request->getVar('id');

        $data = [
            'cancelled_reason' => $this->request->getVar('alasan'),
            'status_transaksi' => 'Dibatalkan',
            'cancelled_by' => user_id()
        ];

        $this->db->table('transaksi')->where('id', $id)->update($data);

        session()->setFlashdata('berhasil', 'Selamat pesanan berhasil dibatalkan');
        return redirect()->to('riwayat-pemesanan');
    }
}
