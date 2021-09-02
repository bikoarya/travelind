<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username') != null) {
            $data['title'] = 'Post';
            $this->load->view('Templates/Header', $data);
            $this->load->view('Templates/Sidebar', $data);
            $this->load->view('Article/Index');
            $this->load->view('Templates/Footer');
        } else {
            redirect('Auth');
        }
    }

    public function insert()
    {
        $image     = ($_FILES['image']['name']);

        if ($image == '') {
            echo "<script type='text/javascript'>alert('kosong cok');</script>";
        } else {
            $config['upload_path']          = './assets/img';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                echo "<script type='text/javascript'>alert('gagal');</script>";
            } else {
                $image = $this->upload->data('file_name');
            }
        }

        $data = [
            'destination' => htmlspecialchars($this->input->post('destination')),
            'description' => htmlspecialchars($this->input->post('description')),
            'about' => htmlspecialchars($this->input->post('about')),
            'image' => $image
        ];
        $this->db->insert('t_post', $data);
        redirect('Post');
    }

    public function showData()
    {
        echo $this->data();
    }

    public function data()
    {
        $data = $this->model->get('t_post');
        $output = '';

        foreach ($data as $row => $value) {
            $output .= '
				<tr>
				<td>' . ($row + 1) . '</td>
				<td>' . $value['destination'] . '</td>
				<td>' . $value['description'] . '</td>
				<td>' . $value['about'] . '</td>
				<td><img src="' . base_url('assets/img/') . $value['image'] . '"style="width: 150px; border-radius: 0; height: 100px; padding: 5px"</td>
				<td style="white-space: nowrap"> <a href="javascript:void(0);" class="text-success editPost" data-id_post="' . $value['id_post'] . '" data-destination="' . $value['destination'] . '" data-description="' . $value['description'] . '" data-about="' . $value['about'] . '" data-image="' . $value['image'] . '"><p class="text-primary d-inline mr-3" data-toggle="modal" data-target="#editPost"><i class="fas fa-edit" style="font-size: 18px" data-placement="bottom" title="Edit"></i></p></a> <a href="javascript:void(0)" class="text-danger deletePost" data-id_post="' . $value['id_post'] . '"><p class="text-danger d-inline"><i class="fas fa-trash-alt text-danger" style="font-size: 18px" data-placement="bottom" title="Hapus"></i></p></a></td>
				</tr>';
        }

        return $output;
    }

    public function update()
    {
        $img     = $this->input->post('img');

        if ($img == '') {
            $img = $this->input->post('oldImage');
            echo $img;
        } else {
            $config['upload_path']          = './assets/img';
            $config['allowed_types']        = 'gif|jpg|png';

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($img)) {
                echo $this->upload->display_errors();
            } else {
                $img = $this->upload->data('file_name');
                echo "new";
            }
        }

        $id_post    = htmlspecialchars($this->input->post('id_post'));

        $where = ['id_post' => $id_post];

        $data = [
            'destination'   => htmlspecialchars($this->input->post('destination')),
            'description'   => htmlspecialchars($this->input->post('description')),
            'about'         => htmlspecialchars($this->input->post('about')),
            'image'         => $img
        ];
        $this->model->put('t_post', $data, $where);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->db->where('id_post', $id);
        $query = $this->db->get('t_post');
        $row = $query->row();

        unlink("./assets/img/$row->image");
        $this->model->delete('t_post', ['id_post' => $id]);
    }
}
