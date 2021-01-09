<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Manajer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('manajer/Manajemen_user_model', 'm_user_model');
        is_logged_in();
    }

    public function book_guidance()
    {
        $data['title'] = "Buku Petunjuk";
        $data['title_nav'] = "Buku Petunjuk";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manajer/book_guidance', $data);
        $this->load->view('templates/footer');
    }

    public function index()
    {
        $data['title'] = "Dashboard Manajer";
        $data['title_nav'] = "Dashboard Manajer";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manajer/index', $data);
        $this->load->view('templates/footer');
    }






    //=================================== Manajemen User ===================================
    public function manajemen_user()
    {
        $data['title'] = "Manajemen User";
        $data['title_nav'] = "Manajemen User";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id_entitas = $this->session->userdata('id_entitas');
        $data['m_user'] = $this->m_user_model->getManajemenUser($id_entitas);

        $this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong',
            'valid_email' => 'Tidak valid karena tidak sesuai format email !',
            'is_unique' => 'Email sudah ada, pilih email lain !'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[8]|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !',
            'min_length' => 'Passwordnya singkat minimal 8 karakter !'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('name_laundry', 'Nama Laundry', 'required|trim|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('id_entitas', 'No Identitas Laundry', 'required|trim|numeric|min_length[10]|max_length[16]|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !',
            'numeric' => 'Kolom harus berisi angka !',
            'min_length' => 'Kolom harus berisi minimal 10 karakter !',
            'max_length' => 'Kolom harus berisi minimal 16 karakter !',
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|numeric|min_length[12]|max_length[12]|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !',
            'numeric' => 'Kolom harus berisi angka !',
            'min_length' => 'Kolom harus berisi minimal 12 karakter !',
            'max_length' => 'Kolom harus berisi maximal 12 karakter !',
        ]);
        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required|trim|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('jam_keluar', 'Jam Keluar', 'required|trim|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('manajer/manajemen_user', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'name_laundry' => htmlspecialchars($this->input->post('name_laundry', true)),
                'id_entitas' => htmlspecialchars($this->input->post('id_entitas', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'role_id' => 2,
                'is_active' => 1,
                'date_created' => time(),
                'fitur_active' => 1,
                'jam_masuk' =>  htmlspecialchars($this->input->post('jam_masuk', true)),
                'jam_keluar' => htmlspecialchars($this->input->post('jam_keluar', true)),
                'date_active' => date('Y-m-d'),
                'date_expired' => date('Y-m-d', strtotime('+1 month', strtotime(date('Y-m-d')))),
            ];
            $register = $this->db->insert('user', $data);

            if ($register == true) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                        Akun user berhasil ditambahkan !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('manajer/manajemen_user');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Maaf akun user gagal ditambahkan !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('manajer/manajemen_user');
            }
        }
    }

    public function edit_manajemen_user()
    {
        $data['title'] = "Edit Manajemen User";
        $data['title_nav'] = "Edit Manajemen User";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id');
        $data['em_user'] = $this->m_user_model->getIdUser($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manajer/edit/edit_manajemen_user', $data);
        $this->load->view('templates/footer');
    }

    public function update_manajemen_user()
    {
        $data['title'] = "Edit Manajemen User";
        $data['title_nav'] = "Edit Manajemen User";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $id = $this->input->post('id');
        $data['em_user'] = $this->m_user_model->getIdUser($id);

        $id_entitas = $this->session->userdata('id_entitas');
        $data['m_user'] = $this->m_user_model->getManajemenUser($id_entitas);


        $this->form_validation->set_rules('name', 'Name', 'required|trim', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Kolom input tidak boleh kosong',
            'valid_email' => 'Tidak valid karena tidak sesuai format email !',
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('no_telp', 'No Telpon', 'required|trim|numeric|min_length[12]|max_length[12]', [
            'required' => 'Kolom input tidak boleh kosong !',
            'numeric' => 'Kolom harus berisi angka !',
            'min_length' => 'Kolom harus berisi minimal 12 karakter !',
            'max_length' => 'Kolom harus berisi maximal 12 karakter !',
        ]);
        $this->form_validation->set_rules('is_active', 'Status Aktif', 'required|trim|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/navbar', $data);
            $this->load->view('manajer/edit/edit_manajemen_user', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'name_laundry' => htmlspecialchars($this->input->post('name_laundry', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'is_active' =>  htmlspecialchars($this->input->post('is_active', true)),
                'jam_masuk' =>  htmlspecialchars($this->input->post('jam_masuk', true)),
                'jam_keluar' => htmlspecialchars($this->input->post('jam_keluar', true)),
            ];
            $id = array(
                'id' => $this->input->post('id'),
            );

            $this->db->where($id);
            $edt_user = $this->db->update('user', $data);

            if ($edt_user) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                        Akun user berhasil diedit !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('manajer/manajemen_user');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Maaf akun user gagal diedit !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('manajer/manajemen_user');
            }
        }
    }

    public function inactive_manajemen_user()
    {
        $id = $this->input->post('id');
        $inv = $this->db->delete('user', ['id' => $id]);
        if ($inv) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success" role="alert">
                    Akun user berhasil dihapus !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('manajer/manajemen_user');
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                    Maaf akun user gagal dihapus !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('manajer/manajemen_user');
        }
    }
    //=================================== Manajemen User ===================================












    public function my_profile()
    {
        $data['title'] = "My Profile";
        $data['title_nav'] = "My Profile";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('manajer/my_profile', $data);
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
            $this->load->view('manajer/edit_profile', $data);
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
            redirect('manajer/my_profile');
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
            $this->load->view('manajer/change_password', $data);
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
                redirect('manajer/change_password');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> New Password tidak boleh sama dengan Current Password ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('manajer/change_password');
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
                    redirect('manajer/change_password');
                }
            }
        }
    }
}
