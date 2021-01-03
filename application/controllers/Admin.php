<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pdf');
        $this->load->model('admin/Data_pemesanan_model', 'data_pemesanan');
        is_logged_in();
    }

    //==================================== Area untuk buku petunjuk admin ====================================
    public function book_guidance()
    {
        $data['title'] = "Buku Petunjuk";
        $data['title_nav'] = "Dashboard Admin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/book_guidance', $data);
        $this->load->view('templates/footer');
    }
    //==================================== Area untuk buku petunjuk admin ====================================

    //==================================== Area untuk dashboard/index admin ====================================
    public function index()
    {
        $data['title'] = "Dashboard Admin";
        $data['title_nav'] = "Dashboard Admin";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->db->order_by('nama_customer', 'ASC');
        $data['data_pemesanan'] = $this->db->get_where('data_pemesanan', ['id_user' => $this->session->userdata('id_entitas')])->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    // autofil data pemesanan
    public function data_pemesanan()
    {
        $id_entitas = $this->session->userdata('id_entitas');
        $nama_customer = $this->input->get('nama_customer');

        $bio = $this->data_pemesanan->getDataPemesanan($id_entitas, $nama_customer);

        $data = array(
            'no_pemesanan' => $bio['no_pemesanan'],
            'no_telp_customer' => $bio['no_telp_customer'],
            'status' => $bio['status'],
        );

        echo json_encode($data);
    }

    public function coba()
    {
        $no_pemesanan = $this->input->post('no_pemesanan');
        $nm_customer = $this->input->post('nama_customer');
        $nm_kasir = $this->input->post('nama_kasir');
        $no_telp_customer = $this->input->post('no_telp_customer');
        $status = $this->input->post('status');
        $berat  = $this->input->post('berat');
        $paket  = $this->input->post('paket');
        $jenis  = $this->input->post('jenis');
        $parfum = $this->input->post('parfum');
        $grandttl = $this->input->post('harga_total');
        $id_pemesanan;

        for ($i = 0; $i < count($berat); $i++) {

            $data = array(
                'no_pemesanan'      => $no_pemesanan,
                'nama_customer'     => $nm_customer,
                'nama_kasir'        => $nm_kasir,
                'jenis_cucian'      => $jenis[$i],
                'paket_cucian'      => $paket[$i],
                'berat_cucian'      => $berat[$i],
                'parfum_cucian'     => $parfum[$i],
                'no_telp_customer'  => $no_telp_customer,
                'status'            => $status,
                'total_pemesanan'   => preg_replace('/,.*|[^0-9]/', '', $grandttl),
                'id_user'           => $this->session->userdata('id_entitas')
            );
            $this->db->insert('data_pemesanan', $data);
        }
        $this->cetakpemesanan($no_pemesanan);
    }

    public function hapuspemesanan()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan')
        );
        $this->db->where($data);
        $this->db->delete('data_pemesanan');
        redirect('admin');
    }

    public function editpemesanan()
    {
        $where = array(
            'id_pemesanan' => $this->input->post("id")
        );

        $data = array(
            'no_pemesanan' => $this->input->post("no_pemesanan")
        );
        $this->db->where($where);
        echo json_encode($data);
        //$this->crud_model->update($id,$value,$modul);
    }
    public function printpemesanan()
    {
        $no_pemesanan = $this->input->post('no_pemesanan');
        $this->cetakpemesanan($no_pemesanan);
    }

    function cetakpemesanan($id_pemesanan)
    {

        $where = array(
            'no_pemesanan' => $id_pemesanan
        );
        $pdf = new FPDF('p', 'mm', 'A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAUNDRY-KUY', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(190, 7, 'Semoga harimu menyenangkan :) ', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $this->db->where($where);
        $mahasiswa = $this->db->get('data_pemesanan')->result();
        $no = 1;
        foreach ($mahasiswa as $row) {
            $pdf->SetMargins(10, 3, 4);
            $pdf->Cell(15, 6, "Nama", 0, 0);
            $pdf->Cell(6, 6, " : ", 0, 0);
            $pdf->Cell(25, 6, $row->nama_customer, 0, 1);
            $pdf->Cell(25, 6, " ", 0, 1);
            $pdf->Cell(30, 6, "Pemesanan " . $no++, 0, 1);
            $pdf->Cell(30, 6, "Berat", 0, 0);
            $pdf->Cell(6, 6, " : ", 0, 0);
            $pdf->Cell(30, 6, $row->berat_cucian . " Kg", 0, 1);
            $pdf->Cell(30, 6, "Parfum", 0, 0);
            $pdf->Cell(6, 6, " : ", 0, 0);
            $pdf->Cell(30, 6, $row->parfum_cucian, 0, 1);
            $pdf->Cell(30, 6, "Paket Cucian", 0, 0);
            $pdf->Cell(6, 6, " : ", 0, 0);
            $pdf->Cell(30, 6, $row->paket_cucian, 0, 1);
            $pdf->Cell(30, 6, "Jam Pesan", 0, 0);
            $pdf->Cell(6, 6, " : ", 0, 0);
            $pdf->Cell(30, 6, $row->waktu_pemesanan, 0, 1);
            $pdf->Cell(30, 6, "Tanggal Pesan", 0, 0);
            $pdf->Cell(6, 6, " : ", 0, 0);
            $pdf->Cell(30, 6, $row->tanggal_pemesanan, 0, 1);
            $pdf->Cell(30, 6, "Total Pemesanan", 0, 0);
            $pdf->Cell(6, 6, " : ", 0, 0);
            $pdf->Cell(30, 6, $row->total_pemesanan, 0, 1);
            $pdf->Cell(25, 6, " ", 0, 1);
        }
        $pdf->Output();
    }
    //==================================== Area untuk dashboard/index admin ====================================







    public function my_profile()
    {
        $data['title'] = "My Profile";
        $data['title_nav'] = "My Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('admin/my_profile', $data);
        $this->load->view('templates/footer');
    }
    public function edit_profile()
    {
        $data['title'] = "Edit Profile";
        $data['title_nav'] = "Edit Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim', [
            'required' => 'Kolom input tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('testi', 'Testimoni', 'required|trim', [
            'required' => 'Kolom input tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('no_telp', 'No Whatsapp Aktif', 'required|trim|numeric|min_length[12]|max_length[12]', [
            'required' => 'Kolom input tidak boleh kosong',
            'numeric' => 'Kolom harus berisi angka !',
            'min_length' => 'Kolom harus berisi minimal 12 karakter !',
            'max_length' => 'Kolom harus berisi maximal 12 karakter !',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/edit_profile', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name')),
                'testi' => htmlspecialchars($this->input->post('testi')),
                'no_telp' => htmlspecialchars($this->input->post('no_telp')),
            ];

            //cek jika ada gambar yang akan diupload

            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['max_width'] = '300';
                $config['max_height'] = '300';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $where = $this->input->post('email');

            $this->db->where('email', $where);
            $this->db->update('user', $data);

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert"> Selamat akun anda terupdate 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/my_profile');
        }
    }

    public function change_password()
    {
        $data['title'] = "Ubah Password";
        $data['title_nav'] = "Ubah Password";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim|min_length[8]', [
            'required' => 'Kolom input tidak boleh kosong',
            'min_length' => 'Passwordnya singkat minimal 8 karakter !',
        ]);
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[8]|matches[new_password2]', [
            'required' => 'Kolom input tidak boleh kosong',
            'min_length' => 'Passwordnya singkat minimal 8 karakter !',
            'matches' => 'passwordnya tidak sama dengan Confirm New Password!',
        ]);
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[8]|matches[new_password1]', [
            'required' => 'Kolom input tidak boleh kosong',
            'min_length' => 'Passwordnya singkat minimal 8 karakter !',
            'matches' => 'passwordnya tidak sama dengan New Password !',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/change_password', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Current Password Salah !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('admin/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New Password tidak boleh sama dengan Current Password ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('admin/change_password');
                } else {
                    //password bener
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Ubah password berhasil ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('admin/change_password');
                }
            }
        }
    }
}
