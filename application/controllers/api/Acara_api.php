<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Acara_api extends CI_Controller
{

    public function getJadwal()
    {
        $email = $this->input->get_post('email');
        $month = $this->input->get_post('m');
        $year = $this->input->get_post('y');

        $where = [
            'user_petugas.userid' => $email,
            'MONTH(acara.tanggal_pelaksanaan)' => $month,
            'YEAR(acara.tanggal_pelaksanaan)' => $year
        ];
        $jdwl = $this->acara->getAcaraPetugas($where)->result();
        $jadwal = [];
        foreach ($jdwl as $jd) {
            $data['id_acara'] = $jd->id_acara;
            $data['hari'] = $this->etc->getDayIndonesia(date_format(date_create($jd->tanggal_pelaksanaan), 'n'));
            $data['tanggal'] = date_format(date_create($jd->tanggal_pelaksanaan), 'd');
            $data['jam_pelaksanaan'] = date_format(date_create($jd->tanggal_pelaksanaan), 'H:i');
            $data['full_date'] = trim($this->etc->indonesiaDate(date_format(date_create($jd->tanggal_pelaksanaan), 'Y-m-d')));
            $data['tugas'] = $jd->jenis_petugas;
            $data['nama_acara'] = $jd->nama_acara;

            array_push($jadwal, $data);
        }
        if (!empty($jadwal)) {
            die(json_encode(['jadwal' => $jadwal, 'code' => 200, 'message' => 'data ditemukan']));
        } else {
            die(json_encode(['code' => 404, 'message' => 'Jadwal anda belum tersedia']));
        }
    }

    public function getHistory()
    {
        $email = $this->input->get_post('email');

        $where = [
            'user_petugas.userid' => $email
        ];
        $jdwl = $this->acara->getAcaraPetugas($where)->result();
        $jadwal = [];
        foreach ($jdwl as $jd) {
            $data['id_acara'] = $jd->id_acara;
            $data['hari'] = $this->etc->getDayIndonesia(date_format(date_create($jd->tanggal_pelaksanaan), 'n'));
            $data['tanggal'] = date_format(date_create($jd->tanggal_pelaksanaan), 'd');
            $data['full_date'] = trim($this->etc->indonesiaDate(date_format(date_create($jd->tanggal_pelaksanaan), 'Y-m-d')));
            $data['jam_pelaksanaan'] = date_format(date_create($jd->tanggal_pelaksanaan), 'H:i');
            $data['tugas'] = $jd->jenis_petugas;
            $data['nama_acara'] = $jd->nama_acara;

            array_push($jadwal, $data);
        }
        if (!empty($jadwal)) {
            die(json_encode(['jadwal' => $jadwal, 'code' => 200, 'message' => 'data ditemukan']));
        } else {
            die(json_encode(['code' => 404, 'message' => 'data tidak ditemukan']));
        }
    }

    public function showQrCode()
    {
        $email = $this->input->get_post('email');
        $where = "user_petugas.userid IN ('$email') 
        AND DATE(tanggal_pelaksanaan) BETWEEN NOW() 
        AND NOW() + INTERVAL 7 DAY";
        $data = $this->acara->getAcaraTerdekat("id_acara, tanggal_pelaksanaan,jenis_petugas, nama_acara", $where)->row();
        $qr = [];

        if (empty($data->id_acara)) {
            die(json_encode(['code' => 500, 'message' => 'QR Code Belum Tersedia']));
        }
        $qr['id_acara'] = $data->id_acara;
        $qr['hari'] = $this->etc->getDayIndonesia(date_format(date_create($data->tanggal_pelaksanaan), 'n'));
        $qr['tanggal'] = date_format(date_create($data->tanggal_pelaksanaan), 'd');
        $qr['full_date'] = trim($this->etc->indonesiaDate(date_format(date_create($data->tanggal_pelaksanaan), 'Y-m-d')));
        $qr['jam_pelaksanaan'] = date_format(date_create($data->tanggal_pelaksanaan), 'H:i');
        $qr['tugas'] = $data->jenis_petugas;
        $qr['nama_acara'] = $data->nama_acara;
        die(json_encode(['qr' => $qr, 'code' => 200, 'message' => 'data ditemukan']));
    }

    public function getProfile()
    {
        $email = $this->input->get_post('email');
        $user = $this->petugas->userPetugas("no_kk_gereja, email, username", ['email' => $email])->row();
        if (!empty($user)) {
            die(json_encode(['user' => $user, 'code' => 200, 'message' => 'data ditemukan']));
        } else {
            die(json_encode(['code' => 404, 'message' => 'data tidak ditemukan']));
        }
    }
}

/* End of file Acara_api.php */
