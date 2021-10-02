<?php
class PenawaranModel extends CI_Model
{

    public function list()
    {
        $tanggal_dari = $this->input->post("tanggal_dari");
        $tanggal_sampai = $this->input->post("tanggal_sampai");
        $tanggal = 'PENAWARAN_TANGGAL BETWEEN "' . $tanggal_dari . '" AND "' . $tanggal_sampai . '" AND';

        $hasil = $this->db->query('SELECT * FROM PENAWARAN WHERE  RECORD_STATUS="AKTIF"  ORDER BY PENAWARAN_NOMOR DESC ')->result();
        foreach ($hasil as $row) {
            $file = explode("/", $row->PENAWARAN_FILE);
            $row->EXT = $file[0];
            $relasi = $this->db->query('SELECT * FROM MASTER_RELASI WHERE MASTER_RELASI_ID="' . $row->MASTER_RELASI_ID . '" AND RECORD_STATUS="AKTIF"')->result();
            $status = $this->db->query('SELECT * FROM PENAWARAN_STATUS WHERE PENAWARAN_ID="' . $row->PENAWARAN_ID . '" AND RECORD_STATUS="AKTIF" ORDER BY PENAWARAN_STATUS_TANGGAL DESC LIMIT 1')->result();
            $row->TANGGAL = tanggal($row->PENAWARAN_TANGGAL);
            $row->RELASI = $relasi;
            $row->STATUS = $status;
        }
        return $hasil;
    }

    public function detail_list($id)
    {
        $hasil = $this->db->query('SELECT * FROM PENAWARAN_DETAIL WHERE PENAWARAN_ID="' . $id . '" AND RECORD_STATUS="AKTIF"')->result();
        return $hasil;
    }
    public function status_list($id)
    {
        $hasil = $this->db->query('SELECT * FROM PENAWARAN_STATUS WHERE PENAWARAN_ID="' . $id . '" AND RECORD_STATUS="AKTIF" ORDER BY PENAWARAN_STATUS_TANGGAL DESC')->result();
        foreach ($hasil as $row) {
            $row->TANGGAL = tanggal($row->PENAWARAN_STATUS_TANGGAL);
        }
        return $hasil;
    }

    public function surat_jalan_baru()
    {
        $hasil = $this->db->query('SELECT * FROM 
        SURAT_JALAN
        WHERE SURAT_JALAN_STATUS="open" AND SURAT_JALAN_JENIS="penjualan" AND SURAT_JALAN_REALISASI_STATUS="selesai" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '" ORDER BY SURAT_JALAN_TANGGAL DESC, SURAT_JALAN_NOMOR DESC')->result();
        foreach ($hasil as $row) {
            $relasi = $this->db->query('SELECT * FROM MASTER_RELASI WHERE MASTER_RELASI_ID="' . $row->MASTER_RELASI_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"')->result();
            $row->TANGGAL = tanggal($row->SURAT_JALAN_TANGGAL);
            $oleh = $this->db->query('SELECT * FROM USER WHERE USER_ID="' . $row->ENTRI_USER . '" AND RECORD_STATUS="AKTIF" LIMIT 1')->result();
            $row->RELASI = $relasi;
            $row->OLEH = $oleh;
        }
        return $hasil;
    }

    public function add($config)
    {

        $data_edit_aktif = array(
            'EDIT_WAKTU' => date("Y-m-d G:i:s"),
            'EDIT_USER' => $this->session->userdata('USER_ID'),
            'RECORD_STATUS' => "EDIT",
        );
        $this->db->where('PENAWARAN_ID', $this->input->post('id'));
        $this->db->where('RECORD_STATUS', 'AKTIF');
        $this->db->update('PENAWARAN', $data_edit_aktif);

        if ($this->input->post('nomor_penawaran') == "") {
            $nomor_penawaran = nomor_penawaran($this->input->post('tanggal'));
        } else {
            $nomor_penawaran = $this->input->post('nomor_penawaran');
        }

        if ($this->input->post('ppn') == 'on') {
            $ppn = $this->input->post('total') * 10 / 100;
        } else {
            $ppn = 0;
        }
        if ($this->input->post('pph') == 'on') {
            $pph = $this->input->post('total') * 10 / 100;
        } else {
            $pph = 0;
        }
        $data = array(
            'PENAWARAN_ID' => $this->input->post('id'),
            'PENAWARAN_NOMOR' => $nomor_penawaran,
            'PENAWARAN_TANGGAL' => $this->input->post('tanggal'),
            'PENAWARAN_JENIS' => $this->input->post('jenis'),
            'MASTER_RELASI_ID' => $this->input->post('relasi'),
            'AKUN_ID' => $this->input->post('akun'),
            'PENAWARAN_FILE' => $config['file_name'],
            'PENAWARAN_TOTAL' => $this->input->post('total'),
            'PENAWARAN_DISKON' => $this->input->post('diskon'),
            'PENAWARAN_PPN' => $ppn,
            'PENAWARAN_PPH' => $pph,
            'PENAWARAN_GRANDTOTAL' => $this->input->post('grandtotal'),

            'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
            'ENTRI_USER' => $this->session->userdata('USER_ID'),
            'RECORD_STATUS' => "AKTIF",
        );

        $data_penarawan = $this->db->insert('PENAWARAN', $data);
        return $data_penarawan;
    }

    public function add_detail()
    {

        $data = array(
            'PENAWARAN_DETAIL_ID' => create_id(),
            'PENAWARAN_ID' => $this->input->post('id'),
            'PENAWARAN_DETAIL_JUDUL' => $this->input->post('judul'),
            'PENAWARAN_DETAIL_KETERANGAN' => $this->input->post('keterangan'),
            'PENAWARAN_DETAIL_TOTAL' => $this->input->post('rupiah'),

            'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
            'ENTRI_USER' => $this->session->userdata('USER_ID'),
            'RECORD_STATUS' => "AKTIF",
        );

        $data_penarawan = $this->db->insert('PENAWARAN_DETAIL', $data);
        return $data_penarawan;
    }
    public function add_status()
    {

        $data = array(
            'PENAWARAN_STATUS_ID' => create_id(),
            'PENAWARAN_ID' => $this->input->post('id_status'),
            'PENAWARAN_STATUS' => $this->input->post('status'),
            'PENAWARAN_STATUS_KETERANGAN' => $this->input->post('keterangan'),
            'PENAWARAN_STATUS_TANGGAL' => $this->input->post('tanggal'),

            'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
            'ENTRI_USER' => $this->session->userdata('USER_ID'),
            'RECORD_STATUS' => "AKTIF",
        );

        $data_penarawan = $this->db->insert('PENAWARAN_STATUS', $data);
        return $data_penarawan;
    }


    public function hapus($id)
    {
        $data = array(
            'DELETE_WAKTU' => date("Y-m-d G:i:s"),
            'DELETE_USER' => $this->session->userdata('USER_ID'),
            'RECORD_STATUS' => "DELETE",
        );

        $this->db->where('PENAWARAN_DETAIL_ID', $id);
        $result = $this->db->update('PENAWARAN_DETAIL', $data);

        return $result;
    }

    public function detail($id)
    {
        $hasil = $this->db->query('SELECT * FROM 
        PENAWARAN
        WHERE PENAWARAN_ID="' . $id . '" AND RECORD_STATUS="AKTIF"  LIMIT 1')->result();
        foreach ($hasil as $row) {
            // $transaksi = $this->db->query('SELECT * FROM FAKTUR_TRANSAKSI WHERE FAKTUR_ID="' . $row->FAKTUR_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '" LIMIT 1');
            // if ($transaksi->num_rows() < 1) {
            //     $row->TRANSAKSI = array();
            // } else {
            //     $row->TRANSAKSI = $transaksi->result();
            // }
        }
        return $hasil;
    }

    public function surat_jalan_list($id)
    {
        $hasil = $this->db->query('SELECT * FROM 
                                    FAKTUR_SURAT_JALAN AS FSJ
                                    LEFT JOIN SURAT_JALAN AS SJ
                                    ON FSJ.SURAT_JALAN_ID=SJ.SURAT_JALAN_ID
                                     WHERE FSJ.FAKTUR_ID="' . $id . '" 
                                     AND FSJ.RECORD_STATUS="AKTIF" 
                                     AND FSJ.PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"
                                     AND SJ.RECORD_STATUS="AKTIF" 
                                     AND SJ.PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"')->result();
        return $hasil;
    }
    public function barang_list($id, $relasi)
    {
        $hasil = $this->db->query('SELECT * FROM 
                                    FAKTUR_BARANG AS FB
                                    LEFT JOIN MASTER_BARANG AS B
                                    ON FB.MASTER_BARANG_ID=B.MASTER_BARANG_ID 
                                     WHERE FB.FAKTUR_ID="' . $id . '" 
                                     AND FB.RECORD_STATUS="AKTIF" 
                                     AND FB.PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"
                                     AND B.RECORD_STATUS="AKTIF" 
                                     AND B.PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"')->result();
        foreach ($hasil as $row) {
            $harga = $this->db->query('SELECT * FROM MASTER_HARGA WHERE MASTER_RELASI_ID="' . $relasi . '" AND MASTER_BARANG_ID="' . $row->MASTER_BARANG_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '" LIMIT 1');
            if ($harga->num_rows() == 0) {
                $row->HARGA = $row->MASTER_BARANG_HARGA_SATUAN;
            } else {
                $harga_satuan = $harga->result();
                $row->HARGA = $harga_satuan[0]->MASTER_HARGA_HARGA;
            }
        }
        return $hasil;
    }

    public function jaminan_list($id, $relasi)
    {
        $hasil = $this->db->query('SELECT * FROM 
                                    FAKTUR_JAMINAN
                                     WHERE FAKTUR_JAMINAN_REF="' . $id . '" 
                                     AND (RECORD_STATUS="AKTIF" OR RECORD_STATUS="DRAFT") 
                                     AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"')->result();
        foreach ($hasil as $row) {
            $surat_jalan = $this->db->query('SELECT * FROM SURAT_JALAN WHERE SURAT_JALAN_ID="' . $row->SURAT_JALAN_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '" LIMIT 1')->result();
            $row->SURAT_JALAN_NOMOR  = $surat_jalan[0]->SURAT_JALAN_NOMOR;
        }
        return $hasil;
    }
    public function edit_harga_jaminan()
    {
        $data_barang = array(
            'FAKTUR_JAMINAN_HARGA' => str_replace(".", "", $this->input->post('harga')),
            'FAKTUR_JAMINAN_TOTAL_RUPIAH' => str_replace(".", "", $this->input->post('harga')) * $this->input->post('jumlah'),
        );

        $this->db->where('FAKTUR_JAMINAN_ID', $this->input->post('id'));
        $result = $this->db->update('FAKTUR_JAMINAN', $data_barang);
    }

    public function edit_harga_barang()
    {
        $hasil = $this->db->query('SELECT * FROM 
        FAKTUR_BARANG
        WHERE FAKTUR_BARANG_ID="' . $this->input->post('id') . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"')->result();
        $cek = $this->db->query('SELECT * FROM MASTER_HARGA WHERE MASTER_RELASI_ID="' . $this->input->post('relasi') . '" AND MASTER_BARANG_ID="' . $hasil[0]->MASTER_BARANG_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"');
        if ($cek->num_rows() == 0) {
            $data = array(
                'MASTER_HARGA_ID' => create_id(),
                'MASTER_RELASI_ID' => $this->input->post('relasi'),
                'MASTER_BARANG_ID' => $hasil[0]->MASTER_BARANG_ID,
                'MASTER_HARGA_HARGA' => str_replace(".", "", $this->input->post('harga')),
                'MASTER_HARGA_JAMINAN' => "0",

                'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                'ENTRI_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "AKTIF",
                'PERUSAHAAN_KODE' => $this->session->userdata('PERUSAHAAN_KODE'),
            );

            $this->db->insert('MASTER_HARGA', $data);
        } else {
            $harga = $cek->result();
            $data_delete = array(
                'DELETE_WAKTU' => date("Y-m-d G:i:s"),
                'DELETE_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "DELETE",
            );

            $this->db->where('MASTER_HARGA_ID', $harga[0]->MASTER_HARGA_ID);
            $this->db->update('MASTER_HARGA', $data_delete);

            $data = array(
                'MASTER_HARGA_ID' => create_id(),
                'MASTER_RELASI_ID' => $this->input->post('relasi'),
                'MASTER_BARANG_ID' => $hasil[0]->MASTER_BARANG_ID,
                'MASTER_HARGA_HARGA' => str_replace(".", "", $this->input->post('harga')),
                'MASTER_HARGA_JAMINAN' => "0",

                'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                'ENTRI_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "AKTIF",
                'PERUSAHAAN_KODE' => $this->session->userdata('PERUSAHAAN_KODE'),
            );

            $this->db->insert('MASTER_HARGA', $data);
        }
        $data_barang = array(
            'FAKTUR_BARANG_HARGA' => str_replace(".", "", $this->input->post('harga')),
            //         'FAKTUR_JAMINAN_TOTAL_RUPIAH' => str_replace(".", "", $this->input->post('harga')) * $this->input->post('jumlah'),
        );

        $this->db->where('FAKTUR_BARANG_ID', $this->input->post('id'));
        $result = $this->db->update('FAKTUR_BARANG', $data_barang);
    }

    public function surat_jalan($relasi)
    {
        $hasil = $this->db->query('SELECT * FROM 
        SURAT_JALAN
        WHERE MASTER_RELASI_ID="' . $relasi . '" AND SURAT_JALAN_STATUS="open" AND SURAT_JALAN_JENIS="penjualan" AND SURAT_JALAN_REALISASI_STATUS="selesai" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"')->result();
        return $hasil;
    }

    public function add_surat_jalan()
    {
        $data = array(
            'FAKTUR_SURAT_JALAN_ID' => create_id(),
            'FAKTUR_ID' => $this->input->post('id'),
            'SURAT_JALAN_ID' => $this->input->post('surat_jalan'),

            'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
            'ENTRI_USER' => $this->session->userdata('USER_ID'),
            'RECORD_STATUS' => "AKTIF",
            'PERUSAHAAN_KODE' => $this->session->userdata('PERUSAHAAN_KODE'),
        );

        $this->db->insert('FAKTUR_SURAT_JALAN', $data);

        $hasil = $this->db->query('SELECT * FROM 
        SURAT_JALAN_BARANG
        WHERE SURAT_JALAN_ID="' . $this->input->post('surat_jalan') . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"')->result();
        foreach ($hasil as $row) {
            $data = array(
                'FAKTUR_BARANG_ID' => create_id(),
                'FAKTUR_ID' => $this->input->post('id'),
                'SURAT_JALAN_ID' => $this->input->post('surat_jalan'),
                'MASTER_BARANG_ID' => $row->MASTER_BARANG_ID,
                'FAKTUR_BARANG_JENIS' => $row->SURAT_JALAN_BARANG_JENIS,
                'FAKTUR_BARANG_QUANTITY' => $row->SURAT_JALAN_BARANG_QUANTITY - $row->SURAT_JALAN_BARANG_QUANTITY_KLAIM,
                'FAKTUR_BARANG_SATUAN' => $row->SURAT_JALAN_BARANG_SATUAN,

                'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                'ENTRI_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "AKTIF",
                'PERUSAHAAN_KODE' => $this->session->userdata('PERUSAHAAN_KODE'),
            );
            $this->db->insert('FAKTUR_BARANG', $data);

            $jaminan = $this->db->query('SELECT * FROM SURAT_JALAN WHERE SURAT_JALAN_ID="' . $row->SURAT_JALAN_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"  ')->result();
            if ($jaminan[0]->SURAT_JALAN_JAMINAN == 'Yes') {
                $nomor_jaminan = nomor_jaminan($this->input->post('tanggal'));
                $harga_dasar = $this->db->query('SELECT * FROM MASTER_BARANG WHERE MASTER_BARANG_ID="' . $row->MASTER_BARANG_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '" LIMIT 1');
                $harga = $this->db->query('SELECT * FROM MASTER_HARGA WHERE MASTER_RELASI_ID="' . $jaminan[0]->MASTER_RELASI_ID . '" AND MASTER_BARANG_ID="' . $row->MASTER_BARANG_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '" LIMIT 1');
                if ($harga->num_rows() == 0) {
                    $harga_dasar_jaminan = $harga_dasar->result();
                    $harga_jaminan = $harga_dasar_jaminan[0]->MASTER_BARANG_HARGA_JAMINAN;
                } else {
                    $harga_satuan = $harga->result();
                    $harga_jaminan = $harga_satuan[0]->MASTER_HARGA_JAMINAN;
                }
                $data = array(
                    'FAKTUR_JAMINAN_ID' => create_id(),
                    'MASTER_RELASI_ID' => $jaminan[0]->MASTER_RELASI_ID,
                    'AKUN_ID' => $this->input->post('akun'),
                    'FAKTUR_JAMINAN_NOMOR' => $nomor_jaminan,
                    'SURAT_JALAN_ID' => $jaminan[0]->SURAT_JALAN_ID,
                    'FAKTUR_JAMINAN_TANGGAL' => $this->input->post('tanggal'),
                    'FAKTUR_JAMINAN_KETERANGAN' => "JAMINAN NO. " . $nomor_jaminan . "",
                    'FAKTUR_JAMINAN_JUMLAH'   => $row->SURAT_JALAN_BARANG_QUANTITY - $row->SURAT_JALAN_BARANG_QUANTITY_KLAIM,
                    'FAKTUR_JAMINAN_HARGA' => $harga_jaminan,
                    'FAKTUR_JAMINAN_TOTAL_RUPIAH' => ($row->SURAT_JALAN_BARANG_QUANTITY - $row->SURAT_JALAN_BARANG_QUANTITY_KLAIM) * $harga_jaminan,
                    'FAKTUR_JAMINAN_REF' => $this->input->post('id'),

                    'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                    'ENTRI_USER' => $this->session->userdata('USER_ID'),
                    'RECORD_STATUS' => "DRAFT",
                    'PERUSAHAAN_KODE' => $this->session->userdata('PERUSAHAAN_KODE'),
                );
                $this->db->insert('FAKTUR_JAMINAN', $data);
            }
        }

        return true;
    }

    public function add_surat_jalan_semua()
    {
        $surat_jalan = $this->db->query('SELECT * FROM 
        SURAT_JALAN
        WHERE MASTER_RELASI_ID="' . $this->input->post('relasi') . '" AND SURAT_JALAN_STATUS="open" AND SURAT_JALAN_JENIS="penjualan" AND SURAT_JALAN_REALISASI_STATUS="selesai" AND 
        MONTH(SURAT_JALAN_TANGGAL) = ' . $this->input->post('bulan') . ' 
                                        AND YEAR(SURAT_JALAN_TANGGAL) = ' . $this->input->post('tahun') . ' 
                                    AND
        RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"')->result();

        foreach ($surat_jalan as $row_sj) {

            $data = array(
                'FAKTUR_SURAT_JALAN_ID' => create_id(),
                'FAKTUR_ID' => $this->input->post('id'),
                'SURAT_JALAN_ID' => $row_sj->SURAT_JALAN_ID,

                'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                'ENTRI_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "AKTIF",
                'PERUSAHAAN_KODE' => $this->session->userdata('PERUSAHAAN_KODE'),
            );

            $this->db->insert('FAKTUR_SURAT_JALAN', $data);

            $hasil = $this->db->query('SELECT * FROM 
        SURAT_JALAN_BARANG
        WHERE SURAT_JALAN_ID="' . $row_sj->SURAT_JALAN_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"')->result();
            foreach ($hasil as $row) {
                $data = array(
                    'FAKTUR_BARANG_ID' => create_id(),
                    'FAKTUR_ID' => $this->input->post('id'),
                    'SURAT_JALAN_ID' => $row_sj->SURAT_JALAN_ID,
                    'MASTER_BARANG_ID' => $row->MASTER_BARANG_ID,
                    'FAKTUR_BARANG_JENIS' => $row->SURAT_JALAN_BARANG_JENIS,
                    'FAKTUR_BARANG_QUANTITY' => $row->SURAT_JALAN_BARANG_QUANTITY - $row->SURAT_JALAN_BARANG_QUANTITY_KLAIM,
                    'FAKTUR_BARANG_SATUAN' => $row->SURAT_JALAN_BARANG_SATUAN,

                    'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                    'ENTRI_USER' => $this->session->userdata('USER_ID'),
                    'RECORD_STATUS' => "AKTIF",
                    'PERUSAHAAN_KODE' => $this->session->userdata('PERUSAHAAN_KODE'),
                );

                $this->db->insert('FAKTUR_BARANG', $data);

                $jaminan = $this->db->query('SELECT * FROM SURAT_JALAN WHERE SURAT_JALAN_ID="' . $row->SURAT_JALAN_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '"  ')->result();
                if ($jaminan[0]->SURAT_JALAN_JAMINAN == 'Yes') {
                    $nomor_jaminan = nomor_jaminan($jaminan[0]->SURAT_JALAN_TANGGAL);
                    $harga_dasar = $this->db->query('SELECT * FROM MASTER_BARANG WHERE MASTER_BARANG_ID="' . $row->MASTER_BARANG_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '" LIMIT 1');
                    $harga = $this->db->query('SELECT * FROM MASTER_HARGA WHERE MASTER_RELASI_ID="' . $jaminan[0]->MASTER_RELASI_ID . '" AND MASTER_BARANG_ID="' . $row->MASTER_BARANG_ID . '" AND RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $this->session->userdata('PERUSAHAAN_KODE') . '" LIMIT 1');
                    if ($harga->num_rows() == 0) {
                        $harga_dasar_jaminan = $harga_dasar->result();
                        $harga_jaminan = $harga_dasar_jaminan[0]->MASTER_BARANG_HARGA_JAMINAN;
                    } else {
                        $harga_satuan = $harga->result();
                        $harga_jaminan = $harga_satuan[0]->MASTER_HARGA_JAMINAN;
                    }
                    $data = array(
                        'FAKTUR_JAMINAN_ID' => create_id(),
                        'MASTER_RELASI_ID' => $jaminan[0]->MASTER_RELASI_ID,
                        'AKUN_ID' => $this->input->post('akun'),
                        'FAKTUR_JAMINAN_NOMOR' => $nomor_jaminan,
                        'SURAT_JALAN_ID' => $jaminan[0]->SURAT_JALAN_ID,
                        'FAKTUR_JAMINAN_TANGGAL' => $jaminan[0]->SURAT_JALAN_TANGGAL,
                        'FAKTUR_JAMINAN_KETERANGAN' => "JAMINAN NO. " . $nomor_jaminan . "",
                        'FAKTUR_JAMINAN_JUMLAH' => $row->SURAT_JALAN_BARANG_QUANTITY - $row->SURAT_JALAN_BARANG_QUANTITY_KLAIM,
                        'FAKTUR_JAMINAN_HARGA' => $harga_jaminan,
                        'FAKTUR_JAMINAN_TOTAL_RUPIAH' => ($row->SURAT_JALAN_BARANG_QUANTITY - $row->SURAT_JALAN_BARANG_QUANTITY_KLAIM) * $harga_jaminan,
                        'FAKTUR_JAMINAN_REF' => $this->input->post('id'),

                        'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                        'ENTRI_USER' => $this->session->userdata('USER_ID'),
                        'RECORD_STATUS' => "DRAFT",
                        'PERUSAHAAN_KODE' => $this->session->userdata('PERUSAHAAN_KODE'),
                    );
                    $this->db->insert('FAKTUR_JAMINAN', $data);
                }
            }
        }
        return true;
    }
}
