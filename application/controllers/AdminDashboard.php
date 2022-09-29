<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminDashboard extends CI_Controller
{
    public $profile_data = array();
    public function __construct()
    {
        parent::__construct();
        if (sessionId('user_id') == "") {
            redirect("Adminlogin");
        }
        $this->profile_data = $this->CommonModal->getRowById('tbl_employee', 'admin_id', sessionId('user_id'));
        date_default_timezone_set("Asia/Kolkata");
    }
    public function index()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = ' Dashboard';

        if (sessionId('user_type') == '1') {

            redirect('task-list');
        } else {

            redirect('my-task');
        }


        $this->load->view('admindashboard', $data);
    }
    public function new_employee()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'Add Employee ';
        $data['tag'] = 'new';
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $regdataemail = $this->CommonModal->getRowById('tbl_employee', 'admin_email', $post['admin_email']);

            if (empty($regdataemail)) {
                $post['admin-status'] =  '1';
                $employee_id = $this->CommonModal->insertRowReturnId('tbl_employee', $post);
                if ($employee_id) {
                    userData('msg', '<div class="alert alert-success">employee added successfully</div>');
                    redirect('employee_list');
                } else {
                    userData('msg', '<div class="alert alert-danger">employee not added, Server error..</div>');
                    redirect('employee_list');
                }
            } else {
                userData('msg', '<div class="alert alert-danger">Mail ID Already registered</div>');
                redirect('employee_list');
            }
        } else {
            $this->load->view('new_employee', $data);
        }
    }
    public function employee_list()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'Employee list ';
        $data['employee_list'] = $this->CommonModal->getAllRowsInOrder('tbl_employee', 'admin_id', 'DESC');
        $this->load->view('employee_list', $data);
    }
    public function update_employee($tid)
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'Update Employee';
        $data['tag'] = 'edit';
        $data['employee_list'] = $this->CommonModal->getRowById('tbl_employee', 'admin_id', $tid);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $employee_id = $this->CommonModal->updateRowById('tbl_employee', 'admin_id', $tid, $post);
            if ($employee_id) {
                userData('msg', '<div class="alert alert-success">employee Updated successfully</div>');
                redirect('employee_list');
            } else {
                userData('msg', '<div class="alert alert-success">employee Updated successfully</div>');
                $this->load->view('employee_list', $data);
            }
        } else {
            $this->load->view('new_employee', $data);
        }
    }

    public function delete_employee($id)
    {
        $this->CommonModal->deleteRowById('tbl_employee', array('admin_id' => $id));
        redirect('employee_list');
    }


    public function updatestatus()
    {

        $status  = $this->input->get('status');
        $id  = $this->input->get('id');
        $update = $this->CommonModal->updateRowById('tbl_employee', 'admin_id', $id, array('admin-status' => $status));
        if ($update) {
            userData('msg', '<div class="alert alert-success">Status Updated successfully</div>');
            redirect('employee_list');
        } else {
            userData('msg', '<div class="alert alert-danger">Status Not Updated successfully</div>');
            redirect('employee_list');
        }
    }

    public function category()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'Category ';
        $data['tag'] = 'add';
        $data['category'] = $this->CommonModal->getAllRows('tbl_category');
        if (count($_POST) > 0) {
            $post = $this->input->post();
            $category_id = $this->CommonModal->insertRowReturnId('tbl_category', $post);
            if ($category_id) {
                userData('msg', '<div class="alert alert-success">Category added successfully</div>');
                redirect('category');
            } else {
                userData('msg', '<div class="alert alert-danger">Category not added, Server error..</div>');
                redirect('category');
            }
        } else {
            $this->load->view('category', $data);
        }
    }

    public function update_category($tid)
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'Category Update';

        $data['category'] = $this->CommonModal->getAllRows('tbl_category');
        $data['tag'] = 'edit';
        $data['category_list'] = $this->CommonModal->getRowById('tbl_category', 'cate_id', $tid);

        if (count($_POST) > 0) {
            $post = $this->input->post();
            $employee_id = $this->CommonModal->updateRowById('tbl_category', 'cate_id', $tid, $post);
            if ($employee_id) {
                userData('msg', '<div class="alert alert-success">Category Updated successfully</div>');
                redirect('category');
            } else {
                userData('msg', '<div class="alert alert-success">Category Updated successfully</div>');
                redirect('category');
            }
        } else {
            $this->load->view('category', $data);
        }
    }

    public function delete_category($id)
    {
        $update =   $this->CommonModal->deleteRowById('tbl_category', array('cate_id' => $id));
        if ($update) {
            userData('msg', '<div class="alert alert-success">Delete Category Successfully</div>');
            redirect('category');
        }
    }



    public function new_task()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'Add task ';

        $data['employee'] = getAllRow('tbl_employee');
        $data['category'] = getAllRow('tbl_category');

        $data['tag'] = 'new';
        if (count($_POST) > 0) {
            $date = $this->input->post('date');
            $time = $this->input->post('time');
            $category = $this->input->post('category');
            $text = $this->input->post('text');
            $status  = $this->input->post('status');
            $table = "tbl_task";
            $data = array('date' => $date, 'time' => $time, 'category' => $category, 'text' => $text, 'status' => $status);


            $no = rand();
            $folder = "./uploads/img/";
            move_uploaded_file($_FILES["images_temp"]["tmp_name"], "$folder" . $no . $_FILES["images_temp"]["name"]);
            $file_name = $no . $_FILES["images_temp"]["name"];
            $data['image'] =  $file_name;

            $data['voice'] = imageUpload('voice_temp', 'uploads/voice/');

            $taskId = $this->CommonModal->insertRowReturnId($table, $data);



            $employee_id  = $this->input->post('employee_id');
            for ($i = 0; $i <= count($employee_id); $i++) {
                if (!empty($employee_id[$i])) {

                    $this->CommonModal->insertRowReturnId('tbl_employee_task', array('task_id' => $taskId, 'employee_id' => $employee_id[$i]));
                }
            }

            if ($taskId) {
                $this->session->set_flashdata('msg', 'Task  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
            }
            redirect(base_url() . 'task-list');
        } else {
            $this->load->view('new_task', $data);
        }
    }
    public function update_task($tid)
    {


        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'Update task';
        $data['tag'] = 'edit';
        $data['task_list'] = $this->CommonModal->getRowById('tbl_task', 'tid', $tid);
        $data['employee'] = getRowById('tbl_employee', 'admin_type', '0');

        $data['employee'] = getAllRow('tbl_employee');
        $data['category'] = getAllRow('tbl_category');
        $emp = [];
        $ar =   $this->CommonModal->getRowByIdFields('tbl_employee_task', 'task_id', $tid, 'employee_id');
        if ($ar != '') {
            foreach ($ar as $a) {
                $emp[] = $a['employee_id'];
            }
        }

        $data['emp_id'] = $emp;


        if (count($_POST) > 0) {
            $post = $this->input->post();
            // extract($this->input->post());
            $date = $this->input->post('date');
            $time = $this->input->post('time');
            $category = $this->input->post('category');
            $text = $this->input->post('text');
            $status  = $this->input->post('status');


            if ($_FILES['images_temp']['name'] != '') {
                $no = rand();
                $folder = "./uploads/img/";
                move_uploaded_file($_FILES["images_temp"]["tmp_name"], "$folder" . $no . $_FILES["images_temp"]["name"]);
                $file_name = $no . $_FILES["images_temp"]["name"];
                $temp_image =  $file_name;

                if ($post['image'] != "") {
                    unlink('uploads/img/' . $post['image']);
                }
            } else {
                $temp_image = $post['image'];
            }

            if ($_FILES['voice_temp']['name'] != '') {
               
               
               
                $voice = imageUpload('voice_temp', 'uploads/voice/');

                if ($post['voice'] != "") {
                    unlink('uploads/voice/' . $post['voice']);
                }
            } else {
                $voice = $post['voice'];
            }




            
            $post = array('date' => $date, 'time' => $time, 'category' => $category, 'text' => $text, 'status' => $status, 'voice' => $voice, 'image' => $temp_image);

            $taskId = $this->CommonModal->updateRowById('tbl_task', 'tid', $tid, $post);
            $employee_id  = $this->input->post('employee_id');
            $this->CommonModal->deleteRowById('tbl_employee_task', array('task_id' =>  $tid));

            for ($i = 0; $i <= count($employee_id); $i++) {
                if (!empty($employee_id[$i])) {



                    $this->CommonModal->insertRowReturnId('tbl_employee_task', array('task_id' => $tid, 'employee_id' => $employee_id[$i]));
                }
            }

            if ($taskId) {
                userData('msg', '<div class="alert alert-success">task Updated successfully</div>');
                redirect('task-list');
            } else {
                userData('msg', '<div class="alert alert-success">task Updated successfully</div>');
                redirect('task-list');
            }
        } else {
            $this->load->view('new_task', $data);
        }
    }

    public function task_list()
    {
        $sta =  $this->input->get('status');

        $status = decryptId($sta);
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'task list ';

        if (isset($sta)) {
            $data['task_list'] = $this->CommonModal->getRowByIdInOrder('tbl_task',  array('task_status' => $status), 'tid', 'DESC');
        } else {
            $data['task_list'] = $this->CommonModal->getAllRowsInOrder('tbl_task', 'tid', 'DESC');
        }

        if (count($_POST) > 0) {

            $post = $this->input->post();
            extract($this->input->post());

            $task_status = $this->input->post('task_status');
            $taskid = $this->input->post('taskid');
            $taskId = $this->CommonModal->updateRowById('tbl_task', 'tid', $taskid, array('task_status' =>  $task_status));
            if ($taskId) {
                userData('msg', '<div class="alert alert-success">Status Updated successfully</div>');
                redirect('task-list');
            } else {
                userData('msg', '<div class="alert alert-success">Status Updated successfully</div>');
                redirect('task-list');
            }
        } else {
            $this->load->view('task_list', $data);
        }
    }


    public function delete_task($id)
    {

        $data = $this->CommonModal->getRowById('tbl_task', 'tid', $id);
        unlink('uploads/img/' .  $data[0]['image']);
        unlink('uploads/voice/' .  $data[0]['voice']);
        $update =   $this->CommonModal->deleteRowById('tbl_task', array('tid' => $id));
        if ($update) {
            userData('msg', '<div class="alert alert-success">Delete task Successfully</div>');
            redirect('task-list');
        }
    }

    public function my_task()
    {
        $sta =  $this->input->get('status');

        $status = decryptId($sta);

        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'My Task List';


        $data['task'] = $this->CommonModal->getRowByIdInOrder('tbl_employee_task',  array('employee_id' => sessionId('user_id')), 'aid', 'DESC');

        if (count($_POST) > 0) {

            $post = $this->input->post();
            extract($this->input->post());

            $task_status = $this->input->post('task_status');
            $taskid = $this->input->post('taskid');
            $taskId = $this->CommonModal->updateRowById('tbl_task', 'tid', $taskid, array('task_status' =>  $task_status));
            if ($taskId) {
                userData('msg', '<div class="alert alert-success">Status Updated successfully</div>');
                redirect('my-task');
            } else {
                userData('msg', '<div class="alert alert-success">Status Updated successfully</div>');
                redirect('my-task');
            }
        } else {
            $this->load->view('my_task', $data);
        }
    }

    public function comment($tid)
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'Comment Add';
        $data['taskid'] = $tid;






        if (count($_POST) > 0) {

            $post = $this->input->post();
            $com = $this->CommonModal->insertRowReturnId('tbl_comment', $post);

            if ($com) {
                $this->session->set_flashdata('msg', 'Comment  Add successfully');
                $this->session->set_flashdata('msg_class', 'alert-success');
                redirect(base_url() . 'comment/' . $tid);
            } else {
                $this->session->set_flashdata('msg', 'Something went wrong Please try again!!');
                $this->session->set_flashdata('msg_class', 'alert-danger');
                redirect(base_url() . 'comment/' . $tid);
            }
        }

        $this->load->view('comment', $data);
    }


    public function change_password()
    {
        $data['profile'] = $this->profile_data;
        $data['projectTitle'] = 'ANGC Task App';
        $data['title'] = 'Change password';
        if (count($_POST) > 0) {
            extract($this->input->post());
            if ($old == $data['profile'][0]['admin_password']) {
                if ($new == $con) {
                    $employee_id = $this->CommonModal->updateRowById('tbl_employee', 'admin_id', $data['profile'][0]['admin_id'], array('admin_password' => $new));
                    if ($employee_id) {
                        userData('msg', '<div class="alert alert-success">Password changed successfully</div>');
                    } else {
                        userData('msg', '<div class="alert alert-danger">Server error..</div>');
                    }
                } else {
                    userData('msg', '<div class="alert alert-danger">New password and old password doesnt match</div>');
                }
            } else {
                userData('msg', '<div class="alert alert-danger">Wrong Old Password</div>');
            }
            redirect('AdminDashboard/change_password');
        } else {
            $this->load->view('change_password', $data);
        }
    }



    public function logout()
    {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_type');

        delete_cookie('user_id');
        delete_cookie('user_type');
        delete_cookie('web_unique_token');
        redirect(base_url());
    }
}
