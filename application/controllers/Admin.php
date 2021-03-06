<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->library('Zend');
        $this->load->model('admin/Data_pemesanan_model', 'data_pemesanan');
        $this->load->model('admin/Absensi_pegawai_model', 'data_absen');
        $this->load->model('admin/Stok_barang_model', 'stok_barang');
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
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
        $this->form_validation->set_rules('nama_customer', 'Nama_customer', 'required|trim', [
            'required' => 'Nama Customer tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => 'Status tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('berat[]', 'Berat', 'required|numeric|regex_match[/^[5-99]/]', [
            'required' => 'Berat tidak boleh kosong !',
            'regex_match' => 'Pesanan tidak boleh lebih rendah dari 5 Kg',
        ]);
        /*($this->form_validation->set_rules('bayar', 'Bayar', 'required', [
            'required' => 'Bayar tidak boleh kosong !'
        ]);*/
        $this->form_validation->set_rules('no_telp_customer', 'No_telp_Customer', 'required|trim|numeric|max_length[14]', [
            'required' => 'No Telp tidak boleh kosong !',
            'numeric' => 'Kolom harus berisi angka !',
            'max_length' => 'Kolom harus berisi maximal 14 karakter !',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = "Dashboard Admin";
            $data['title_nav'] = "Dashboard Admin";
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->db->order_by('nama_customer', 'ASC');
            $data['data_pemesanan'] = $this->db->get_where('data_pemesanan', ['id_user' => $this->session->userdata('id_entitas')])->result_array();
            $data['kode'] = $this->kodePemesananAcak();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        } else {
            $data_pemesanan = array(
                'no_pemesanan'      => preg_replace('/,.*|[^a-zA-Z0-9]/', '.', $this->input->post('no_pemesanan')),
                'nama_customer'     => $this->input->post('nama_customer'),
                'nama_kasir'        => $this->input->post('nama_kasir'),
                'no_telp_customer'  => '0' . $this->input->post('no_telp_customer'),
                'total_pemesanan'   => preg_replace('/,.*|[^0-9]/', '', $this->input->post('harga_total')),
                'id_user'           => $this->session->userdata('id_entitas'),
                'status'            => $this->input->post('status'),
                'tanggal_pemesanan' => date('Y-m-d'),
                'waktu_pemesanan'   => date('h:i:sa')
            );
            /*$o_pemesanan = $this->input->post('no_pemesanan');
            $data = preg_replace('/,.*|[^a-zA-Z0-9]/', ' ', $o_pemesanan);
            echo $data;*/
            $query1 = $this->db->insert('data_pemesanan', $data_pemesanan);
            $id_pemesanan = $this->db->insert_id();
            if ($query1) {
                $berat  = $this->input->post('berat');
                $paket  = $this->input->post('paket');
                $jenis  = $this->input->post('jenis');
                $parfum = $this->input->post('parfum');
                $subttl = $this->input->post('item_total');

                for ($i = 0; $i < count($berat); $i++) {

                    $data = array(
                        'id_pemesanan'      => $id_pemesanan,
                        'jenis_cucian'      => $jenis[$i],
                        'paket_cucian'      => $paket[$i],
                        'berat_cucian'      => $berat[$i],
                        'parfum_cucian'     => $parfum[$i],
                        'sub_ttl'           => preg_replace('/,.*|[^0-9]|[^-]/', '', $subttl[$i])
                    );
                    $query = $this->db->insert('detail_pemesanan', $data);
                }
                if ($query) {
                    redirect(site_url('Admin/index'));
                }
            }
        }
    }

    public function barcode($kode)
    {
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::render('code128', 'image', array('text' => $kode));
    }

    public function detail_pemesanan()
    {
        $where = array(
            'detail_pemesanan.id_pemesanan' => $this->input->post('id')
        );

        $this->db->join('detail_pemesanan', 'data_pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan');
        $this->db->where($where);
        $data = $this->db->get('data_pemesanan')->result();
        echo json_encode($data);
    }
    // autofil data pemesanan
    public function data_pemesanan()
    {
        $id_entitas = $this->session->userdata('id_entitas');
        $nama_customer = $this->input->get('nama_customer');

        $bio = $this->data_pemesanan->getDataPemesanan($id_entitas, $nama_customer);

        $data = array(
            'no_telp_customer' => $bio['no_telp_customer']
        );

        echo json_encode($data);
    }
    // menghapus data detail pemesanan
    public function hapusdetail()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'id_detail'  => $this->input->post('id_detail')
        );
        $this->db->where($data);
        $this->db->delete('detail_pemesanan');
        redirect('admin');
    }
    // menghapus data pemesanan
    public function hapuspemesanan()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan')
        );
        $this->db->where($data);
        $this->db->delete('data_pemesanan');
        redirect('admin');
    }
    // edit detail_pemesanan
    public function editdetail()
    {
        $where = array(
            'id_pemesanan' => $this->input->post("id")
        );

        $data = array(
            'jenis_cucian' => $this->input->post('jenis_cucian'),
            'paket_cucian' => $this->input->post('paket_cucian'),
            'parfum_cucian' => $this->input->post('parfum_cucian'),
            'berat_cucian' => $this->input->post('berat_cucian'),
            'sub_ttl' => $this->input->post('sub_ttl')
        );
        $this->db->where($where);
        $this->db->update('detail_pemesanan', $data);
    }
    // edit data pemesanan
    public function editpemesanan()
    {
        $where = array(
            'id_pemesanan' => $this->input->post("id")
        );

        $data = array(
            'nama_customer' => $this->input->post('nama_customer'),
            'no_telp_customer' => $this->input->post('no_telp_customer'),
            'status' => $this->input->post('status')
        );
        $this->db->where($where);
        $this->db->update('data_pemesanan', $data);
        //$this->crud_model->update($id,$value,$modul);
    }
    function tampilcetakpemesanan()
    {
        $where = array(
            'id_user' => $this->session->userdata('id_entitas')
        );
        $this->db->join('detail_pemesanan', 'data_pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan');
        $this->db->where($where);
        $data['detail_pemesanan'] = $this->db->get('data_pemesanan')->result();
        $data['data_pemesanan'] = $this->db->get('data_pemesanan')->result();
        $data['title'] = "Data Pemesanan";
        $this->load->view('admin/tampil_pemesanan', $data);
    }
    //fungsi cetak pemesanan fpdf
    function cetakpemesanan()
    {

        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        // setting jenis font yang akan digunakan
        $html = $this->load->view('admin/tampil_pemesanan');
        $pdf->AddPage();
        $pdf->WriteHTML($html);
        $pdf->Output();
    }
    //==================================== Area untuk dashboard/index admin ====================================
    // fungsi filtering dari jangka tanggal yang ditentukan
    public function filtering()
    {
        $data1 = $this->input->post('from_date');
        $data2 = $this->input->post('to_date');
        $from = date('Y-m-d', strtotime($data1));
        $to = date('Y-m-d', strtotime($data2));
        $this->db->where('tanggal_pemesanan >=', $from);
        $this->db->where('tanggal_pemesanan <=', $to);
        $data = $this->db->get('data_pemesanan')->result();
        echo json_encode($data);
    }
    // fungsi membuat kode pemesanan sesuai tanggal
    public function kodePemesananAcak()
    {
        $tgl = date('d.m.');
        $tahun = date('Y');
        $date = date('d/m/');
        $this->db->like('no_pemesanan', $tgl);
        $this->db->like('no_pemesanan', $tahun);
        $this->db->select('RIGHT(data_pemesanan.no_pemesanan,2) as no_pemesanan', FALSE);
        $this->db->order_by('no_pemesanan', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('data_pemesanan');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->no_pemesanan) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = $date . 'V' . $tahun . $batas;  //format kode
        return $kodetampil;
    }
    public function kode_barang()
    {
        date_default_timezone_set('Asia/Jakarta');
        //ini biar dilaptopku ngepas antara jam laptop dan jam di web
        $tgl = date('d/m/', strtotime('-1 day', strtotime(date('d:m'))));
        $tahun = date('Y');
        $this->db->like('kode_barang', $tgl);
        $this->db->select('RIGHT(stok_barang.kode_barang,2) as kode_barang', FALSE);
        $this->db->order_by('kode_barang', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('stok_barang');  //cek dulu apakah ada sudah ada kode di tabel.    
        if ($query->num_rows() <> 0) {
            //cek kode jika telah tersedia    
            $data = $query->row();
            $kode = intval($data->kode_barang) + 1;
        } else {
            $kode = 1;  //cek jika kode belum terdapat pada table
        }
        $batas = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodetampil = $tgl . 'B' . $tahun . $batas;  //format kode
        return $kodetampil;
    }
    //==================================== Area untuk Absensi Pegawai admin ====================================
    public function absensi_pegawai()
    {
        $data['title'] = "Absensi Pegawai";
        $data['title_nav'] = "Absensi Pegawai";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['data_absen'] = $this->data_absen->getDataAbsen($id_entitas);

        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim', [
            'required' => 'Kolom input tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('tanggal_hadir', 'Tanggal Hadir', 'required|trim', [
            'required' => 'Kolom input tidak boleh kosong',
        ]);
        $this->form_validation->set_rules('presensi', 'Presensi', 'required|trim', [
            'required' => 'Kolom input tidak boleh kosong',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/absensi_pegawai', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_pegawai' => $this->input->post('nama_pegawai'),
                'tanggal_hadir' => $this->input->post('tanggal_hadir'),
                'jam_masuk' => date('H:i', strtotime('+9 hour', strtotime(date('H:i:s')))),
                'presensi' => $this->input->post('presensi'),
                'id_user' => $this->session->userdata('id_entitas'),
            ];
            $data_absen = $this->db->insert('absensi_pegawai', $data);
            if ($data_absen == true) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert"> Presensi Berhasil ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('admin/absensi_pegawai');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert"> Presensi Gagal ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('admin/absensi_pegawai');
            }
        }
    }
    //==================================== Area untuk Absensi Pegawai admin ====================================





    //==================================== Area untuk Stok Barang admin ====================================
    public function stok_barang()
    {
        $data['title'] = "Stok Barang";
        $data['title_nav'] = "Stok Barang";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['stok'] = $this->stok_barang->getStokBarang($id_entitas);
        $data['jenis'] = $this->stok_barang->getJenisCuci($id_entitas);
        $data['paket'] = $this->stok_barang->getPaketCuci($id_entitas);
        $data['bahan'] = $this->stok_barang->getBahanCuci($id_entitas);

        $data['kode_barang'] = $this->kode_barang();

        $this->form_validation->set_rules('kode_barang[]', 'Kode Barang', 'required|trim', [
            'required' => 'Kode Barang tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('nama_barang[]', 'Nama Barang', 'required|trim', [
            'required' => 'Nama Barang tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('tanggal_barang[]', 'Tanggal Barang', 'required|trim', [
            'required' => 'Tanggal Barang tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('harga_satuan[]', 'Harga Satuan', 'required|regex_match[/^[0-999999]/]', [
            'required' => 'Harga Satuan tidak boleh kosong !',
            'regex_match' => 'Isian tidak boleh lebih rendah dari 0 !'
        ]);
        $this->form_validation->set_rules('jumlah_barang[]', 'Jumlah barang', 'required|numeric|regex_match[/^[0-99]/]', [
            'required' => 'Jumlah Barang tidak boleh kosong !',
            'numeric' => 'Isian harus berformat angka !',
            'regex_match' => 'Isian tidak boleh lebih rendah dari 0 !'
        ]);
        $this->form_validation->set_rules('digunakan[]', 'Digunakan', 'required|numeric|regex_match[/^[0-99]/]', [
            'required' => 'Digunakan tidak boleh kosong !',
            'numeric' => 'Isian harus berformat angka !',
            'regex_match' => 'Isian tidak boleh lebih rendah dari 0 !'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('admin/stok_barang', $data);
            $this->load->view('templates/footer');
        } else {
            $kode_barang = $this->input->post('kode_barang');
            $nama_barang = $this->input->post('nama_barang');
            $harga_satuan = $this->input->post('harga_satuan');
            $jumlah_barang = $this->input->post('jumlah_barang');
            $total_harga_barang = $this->input->post('total_harga_barang');
            $digunakan = $this->input->post('digunakan');
            $tersedia = $this->input->post('tersedia');
            $tanggal_barang = $this->input->post('tanggal_barang');

            for ($i = 0; $i < count($kode_barang); $i++) {
                $data = array(
                    'kode_barang' => $kode_barang[$i],
                    'nama_barang' => $nama_barang[$i],
                    'harga_satuan' => preg_replace('/,.*|[^0-9]/', '', $harga_satuan[$i]),
                    'jumlah_barang' => $jumlah_barang[$i],
                    'total_harga_barang' => preg_replace('/,.*|[^0-9]/', '', $total_harga_barang[$i]),
                    'digunakan' => $digunakan[$i],
                    'tersedia' => preg_replace('/,.*|[^0-9]/', '', $tersedia[$i]),
                    'tanggal_barang' => $tanggal_barang[$i],
                    'active' => 1,
                    'id_user' => $this->session->userdata('id_entitas'),
                );
                // var_dump($data);
                $stok = $this->stok_barang->insertStokBarang($data);
            }
            if ($stok == true) {
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Stok Barang Sukses disimpan !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/stok_barang');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Stok Barang Gagal disimpan :( !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
                redirect('admin/stok_barang');
            }
        }
    }
    //==================================== Area untuk Stok Barang admin ====================================

    public function print()
    {
        $html = $this->input->get('table');
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->WriteHTML($html);
        $pdf->output();
    }

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
