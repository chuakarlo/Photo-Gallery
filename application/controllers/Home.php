<?php

class Home extends CI_Controller {

        public function __construct() {

                parent::__construct();
                $this->load->helper(array('form', 'url'));
                $this->load->model('home_model');
        }

        public function index() {

                $data['title'] = 'Test Assignment';
                $data['header'] = 'Test Assignment';

                $data['photos'] = $this->home_model->getPhotos(0);

                $this->load->view('templates/header', $data);
                $this->load->view('home/home', $data);
                $this->load->view('home/tag_photo_modal');
                $this->load->view('home/upload_photo_modal');
                $this->load->view('templates/footer');
        }

        public function doUpload() {

                $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('photofile')) {
                        $status = array(
                                'status' => 'false',
                                'test' => $_FILES['photofile'],
                                'errmsg' => $this->upload->display_errors()
                        );
                }
                else {
                        $this->home_model->insert($this->upload->data());

                        $status = array(
                                'status' => 'true',
                                'successmsg' => '<p>Successfully uploaded photo.</p>'
                        );
                }

                echo json_encode($status);
        }

        public function doTag() {
                $data = array(
                        'image_tags' => $_POST['photoTag']
                );

                $this->home_model->update($_POST['photoTag'], $_POST['photoId']);

                $status = array(
                        'status' => 'true',
                        'successmsg' => '<p>Successfully tagged photo.</p>'
                );

                echo json_encode($status);
        }

        public function loadMorePhotos($id) {

                $status = array(
                        'status' => 'true',
                        'data' => $this->home_model->getPhotos($id)
                );

                echo json_encode($status);
        }
}
?>