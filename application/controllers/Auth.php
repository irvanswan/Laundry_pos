<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('email')) {
            //astagfirullah ternyata bisa digunain pas pakek form 403 Access Forbidden kodingan kek gini :(
            if ($this->session->userdata('role_id') == 1) {
                redirect('manajer');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('admin');
            } elseif ($this->session->userdata('role_id') == 0) {
                redirect('superadmin');
            }
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Kolom input tidak boleh kosong !',
            'valid_email' => 'Tidak valid karena tidak sesuai format email !',
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = "Login Kuy Laundry";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            //jika validasinya sukses
            $this->_login();
        }
    }
    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        //maka usernya ada
        if ($user) {
            //jika usernya aktif
            if ($user['is_active'] == 1) {
                //check passwordnya persis kah sama dengan database
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_entitas' => $user['id_entitas'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('manajer');
                    } else {
                        redirect('admin');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger" role="alert">
                            Maaf password salah !
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Maaf Akun email anda belum aktif !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('auth');
            }
        } else {
            //tidak ada email dengan user ini
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">
                    Maaf Akun email anda belum terdaftar !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>'
            );
            redirect('auth');
        }
    }
    public function register()
    {
        if ($this->session->userdata('email')) {
            //astagfirullah ternyata bisa digunain pas pakek form 403 Access Forbidden kodingan kek gini :(
            if ($this->session->userdata('role_id') == 1) {
                redirect('manajer');
            } elseif ($this->session->userdata('role_id') == 2) {
                redirect('admin');
            } elseif ($this->session->userdata('role_id') == 0) {
                redirect('superadmin');
            }
        }

        $this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong',
            'valid_email' => 'Tidak valid karena tidak sesuai format email !',
            'is_unique' => 'Email sudah ada, pilih email lain !'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !',
            'matches' => 'Password tidak sama dengan Confirm Password !',
            'min_length' => 'Passwordnya singkat minimal 8 karakter !'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]|xss_clean', [
            'required' => 'Kolom input tidak boleh kosong !',
            'matches' => 'password tidak sama dengan New Password !',
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
        if ($this->form_validation->run() == false) {
            $data['title'] = "Registrasi Kuy Laundry";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/register');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email', true);
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'image' => 'default.png',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'name_laundry' => htmlspecialchars($this->input->post('name_laundry', true)),
                'id_entitas' => htmlspecialchars($this->input->post('id_entitas', true)),
                'no_telp' => htmlspecialchars($this->input->post('no_telp', true)),
                'role_id' => 1,
                'is_active' => 0,
                'date_created' => time(),
                'menu_active' => 1,
                'date_active' => date('Y-m-d'),
                'date_expired' => date('Y-m-d', strtotime('+1 month', strtotime(date('Y-m-d')))),
            ];
            // siapkan tokenisasi
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time(),
            ];

            $register = $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            if ($register == true) {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success" role="alert">
                        Akun sudah terdaftar,<br>silahkan diaktfikan melalui gmail anda!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('auth');
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger" role="alert">
                        Maaf Akun anda gagal didaftarkan !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>'
                );
                redirect('auth/register');
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'idekureservedcompany@gmail.com',
            'smtp_pass' => 'idekureserved000000',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];
        $this->load->library('email', $config);

        $this->email->initialize($config);
        $this->email->from('idekureservedcompany@gmail.com', 'Ideku Reserved');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Verifikasi Akun');
            $this->email->message('Klik link berikut untuk verifikasi akun anda : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifkan akun anda sekarang sebelum 24 jam</a>');
        } elseif ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Klik link berikut untuk reset password : <a href="' . base_url() . 'auth/reset_password?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset sekarang password anda sebelum 24 jam</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">' . $email . ' Akun anda telah aktif<br>Mohon login!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                    </div>');
                    redirect('auth');
                } else {

                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token aktivasi anda telah kadaluarsa!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>        
                    </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Token aktivasi anda tidak valid!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Aktivasi akun gagal, Email salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>        
            </div>');
            redirect('auth');
        }
    }

    public function forgot_password()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Kolom input tidak boleh kosong',
            'valid_email' => 'Tidak valid karena tidak sesuai format email !',
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot_password');
            $this->load->view('templates/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time(),
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tolong check email anda untuk me-reset password!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
                redirect('auth/forgot_password');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar atau belum teraktivasi
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
                redirect('auth/forgot_password');
            }
        }
    }

    public function reset_password()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->change_password();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal, Token anda salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password gagal, Email anda salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
            redirect('auth');
        }
    }

    public function change_password()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[8]|matches[password2]', [
            'required' => 'Kolom input tidak boleh kosong',
            'matches' => 'Password tidak sama dengan Repeat Password !',
            'min_length' => 'Passwordnya singkat minimal 8 karakter !',
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[8]|matches[password1]', [
            'required' => 'Kolom input tidak boleh kosong',
            'matches' => 'Password tidak sama dengan Password !',
            'min_length' => 'Passwordnya singkat minimal 8 karakter !',
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change_password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password telah berhasil diganti, Mohon login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>        
                </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success" role="alert">
                Berhasil logout !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
            </div>'
        );
        redirect('auth');
    }

    public function blocked()
    {
        echo "<script>
        alert('Access dilarang, Jangan lakukan resiko apapun !');
        </script>";
    }
}
