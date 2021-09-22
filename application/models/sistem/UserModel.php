<?php
class UserModel extends CI_Model
{

    public function list()
    {
        if (empty($this->input->post("perusahaan"))) {
            $filter = "";
        } else {
            $filter = 'AND PERUSAHAAN_KODE="' . $this->input->post("perusahaan") . '"';
        }

        $hasil = $this->db->query('SELECT * FROM USER WHERE RECORD_STATUS="AKTIF" ' . $filter . ' ORDER BY USER_INDEX DESC ')->result();
        return $hasil;
    }

    public function add()
    {
        if ($this->input->post('id') == "") {
            $data = array(
                'USER_ID' => create_id(),
                'USER_NAMA' => $this->input->post('nama'),
                'USER_TELEGRAM' => $this->input->post('telegram'),
                'USER_USERNAME' => $this->input->post('username'),
                'USER_PASSWORD' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'PERUSAHAAN_KODE' => $this->input->post('perusahaan'),
                'USER_FOTO' => "user.jpg",
                'MASTER_KARYAWAN_ID' => "user.jpg",

                'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                'ENTRI_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "AKTIF",
            );

            $result = $this->db->insert('USER', $data);
            return $result;
        } else {
            $data_edit = array(
                'USER_ID' => $this->input->post('id'),
                'USER_NAMA' => $this->input->post('nama'),
                'USER_TELEGRAM' => $this->input->post('telegram'),
                'USER_USERNAME' => $this->input->post('username'),
                'PERUSAHAAN_KODE' => $this->input->post('perusahaan'),
                'MASTER_KARYAWAN_ID' => $this->input->post('karyawan'),

                'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                'ENTRI_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "AKTIF",
            );

            $this->db->where('USER_ID', $this->input->post('id'));
            $edit = $this->db->update('USER', $data_edit);

            // $data = array(
            //     'USER_ID' => $this->input->post('id'),
            //     'USER_NAMA' => $this->input->post('nama'),
            //     'USER_USERNAME' => $this->input->post('username'),
            //     'PERUSAHAAN_KODE' => $this->input->post('perusahaan'),
            //     'MASTER_KARYAWAN_ID' => $this->input->post('karyawan'),

            //     'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
            //     'ENTRI_USER' => $this->session->userdata('USER_ID'),
            //     'RECORD_STATUS' => "AKTIF",
            // );

            // $result = $this->db->insert('USER', $data);
            return $edit;
        }
    }

    public function hapus($id)
    {
        $data = array(
            'DELETE_WAKTU' => date("Y-m-d G:i:s"),
            'DELETE_USER' => $this->session->userdata('USER_ID'),
            'RECORD_STATUS' => "DELETE",
        );

        $this->db->where('USER_ID', $id);
        $result = $this->db->update('USER', $data);
        return $result;
    }

    public function ganti_password()
    {
        $data = array(
            'USER_PASSWORD' => password_hash($this->input->post('konfirmasi_password_baru'), PASSWORD_DEFAULT),
            'EDIT_WAKTU' => date("Y-m-d G:i:s"),
            'EDIT_USER' => $this->session->userdata('USER_ID'),
        );

        $this->db->where('USER_ID', $this->session->userdata('USER_ID'));
        $result = $this->db->update('USER', $data);
        return $result;
    }

    public function foto_profil($config)
    {
        $data = array(
            'USER_FOTO' => $config['file_name'],
        );

        $this->db->where('USER_ID', $this->session->userdata('USER_ID'));
        $result = $this->db->update('USER', $data);
        return $result;
    }

    public function ganti_bahasa($id, $lang)
    {
        $data = array(
            'USER_BAHASA' => $lang,
        );

        $this->db->where('USER_ID', $id);
        $result = $this->db->update('USER', $data);
        $this->session->set_userdata('USER_BAHASA', $lang);
        return $result;
    }

    public function menu_list()
    {
        if (empty($_GET['menu_filter'])) {
            $filter = '';
        } else {
            $filter = 'AND M.APLIKASI_ID="' . $_GET['menu_filter'] . '"';
        }

        $hasil = $this->db->query('SELECT * FROM MENU AS M 
        LEFT JOIN APLIKASI AS A ON M.APLIKASI_ID=A.APLIKASI_ID
        WHERE 
        M.RECORD_STATUS="AKTIF" 
        AND A.RECORD_STATUS="AKTIF" 
        ' . $filter . '
        ORDER BY A.APLIKASI_LINK ASC ')->result();
        foreach ($hasil as $row) {
            $status = $this->db->query('SELECT RECORD_STATUS as STATUS FROM USER_AKSES WHERE MENU_ID="' . $row->MENU_ID . '" AND USER_ID="' . $this->uri->segment('4') . '" AND RECORD_STATUS="AKTIF"');
            if ($status->num_rows() > 0) {
                $row->STATUS = "AKTIF";
            } else {
                $row->STATUS = "";
            }
            $result[] = $row;
        }
        return $hasil;
    }
    public function perusahaan_list()
    {

        $hasil = $this->db->query('SELECT * FROM PERUSAHAAN
        WHERE RECORD_STATUS="AKTIF" ')->result();
        foreach ($hasil as $row) {
            $status = $this->db->query('SELECT RECORD_STATUS as STATUS FROM USER_AKSES_PERUSAHAAN WHERE PERUSAHAAN_KODE="' . $row->PERUSAHAAN_KODE . '" AND USER_ID="' . $this->uri->segment('4') . '" AND RECORD_STATUS="AKTIF"');
            if ($status->num_rows() > 0) {
                $row->STATUS = "AKTIF";
            } else {
                $row->STATUS = "";
            }
            $result[] = $row;
        }
        return $hasil;
    }

    public function akses_menu($user, $menu_id)
    {
        $menu = $this->db->query('SELECT * FROM MENU WHERE RECORD_STATUS="AKTIF" AND MENU_ID="' . $menu_id . '"')->result();
        $aplikasi = $this->db->query('SELECT * FROM APLIKASI WHERE RECORD_STATUS="AKTIF" AND APLIKASI_ID="' . $menu[0]->APLIKASI_ID . '"')->result();
        $hasil = $this->db->query('SELECT * FROM USER_AKSES WHERE RECORD_STATUS="AKTIF" AND MENU_ID="' . $menu_id . '" AND USER_ID="' . $user . '"');
        $data = $hasil->num_rows();
        if ($data == 0) {
            $data = array(
                'USER_AKSES_ID' => create_id(),
                'USER_ID' => $user,
                'MENU_ID' => $menu_id,
                'APLIKASI_ID' => $menu[0]->APLIKASI_ID,
                'USER_AKSES_LINK' => $aplikasi[0]->APLIKASI_LINK . '/' . $menu[0]->MENU_LINK,
                'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                'ENTRI_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "AKTIF",
            );

            $result = $this->db->insert('USER_AKSES', $data);
            return $result;
        } else {
            $data_menu = $hasil->result();
            $data = array(
                'DELETE_WAKTU' => date("Y-m-d G:i:s"),
                'DELETE_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "DELETE",
            );

            $this->db->where('USER_AKSES_ID', $data_menu[0]->USER_AKSES_ID);
            $result = $this->db->update('USER_AKSES', $data);
            return $result;
        }
    }
    public function akses_perusahaan($user, $perusahaan_kode)
    {
        $hasil = $this->db->query('SELECT * FROM USER_AKSES_PERUSAHAAN WHERE RECORD_STATUS="AKTIF" AND PERUSAHAAN_KODE="' . $perusahaan_kode . '" AND USER_ID="' . $user . '"');
        $data = $hasil->num_rows();
        if ($data == 0) {
            $data = array(
                'USER_AKSES_PERUSAHAAN_ID' => create_id(),
                'USER_ID' => $user,
                'PERUSAHAAN_KODE' => $perusahaan_kode,
                'ENTRI_WAKTU' => date("Y-m-d G:i:s"),
                'ENTRI_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "AKTIF",
            );

            $result = $this->db->insert('USER_AKSES_PERUSAHAAN', $data);
            return $result;
        } else {
            $data = array(
                'DELETE_WAKTU' => date("Y-m-d G:i:s"),
                'DELETE_USER' => $this->session->userdata('USER_ID'),
                'RECORD_STATUS' => "DELETE",
            );

            $this->db->where('PERUSAHAAN_KODE', $perusahaan_kode);
            $this->db->where('USER_ID', $user);
            $result = $this->db->update('USER_AKSES_PERUSAHAAN', $data);
            return $result;
        }
    }

    public function detail($id)
    {
        $hasil = $this->db->query('SELECT * FROM USER WHERE USER_ID="' . $id . '" AND RECORD_STATUS="AKTIF" LIMIT 1')->result();
        return $hasil;
    }
}
