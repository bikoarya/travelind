<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        if ($this->session->userdata('username') != null && $this->session->userdata('username') != 'admin') {
            $data['title'] = 'Home';
            $data['post'] = $this->model->get('t_post');
            $this->load->view('Home/Index', $data);
        } else {
            redirect('Auth');
        }
    }

    public function comment($id = null)
    {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'comment' => $this->input->post('comment'),
            'date' => date('Y-m-d'),
            'parent' => $id
        ];
        $this->db->insert('t_comment', $data);
        echo $this->showData();
    }

    public function showData()
    {
        echo $this->data();
    }

    public function data()
    {
        $join = [
            't_user' => 't_comment.id_user=t_user.id_user'
        ];

        $data['comment'] = $this->model->joinOrder('t_comment', $join, ["parent" => null])->result_array();
        $data['reply'] = $this->model->joinOrder('t_comment', $join, ["parent IS NOT NULL" => null])->result_array();
        $this->load->view('Home/Comment', $data);
    }

    public function totalComment()
    {
        echo $this->dataComment();
    }

    public function dataComment()
    {
        $data = $this->model->countComment();
        $output = '';

        $output .= '
        <h5 class="mt-3 mb-3">Comments <span class="countComment" id="countComment">(' . $data . ')</span></h5>
            ';

        return $output;
    }

    public function like()
    {
        $id = htmlspecialchars($this->input->post('id_comment'));
        $like = htmlspecialchars($this->input->post('like')) == "true" ? 1 : 0;
        $user = $this->session->userdata('id_user');

        $where = [
            'id_comment' => $id,
            'id_user' => $user
        ];
        $check = $this->db->get_where('t_like',  $where)->result_array();

        $data = [
            'id_user' => $user,
            'id_comment' => $id,
            'type' => $like
        ];

        if ($check == null) {
            $this->db->insert('t_like', $data);
        } else {
            $this->model->put('t_like', [
                'type' => $like
            ], $where);
        }

        $likes = $this->db->get_where('t_like',  [
            'id_comment' => $id,
            'type' => 1
        ])->num_rows();

        echo json_encode((["likes" => $likes]));
    }
}
