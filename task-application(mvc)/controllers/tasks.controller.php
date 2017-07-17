<?php
class TasksController extends Controller
{
    public function __construct($data = array() )
    {
        parent::__construct($data);
        $this->model = new Task();
    }


    public function index()
    {
        $this->data['tasks'] = $this->model->getListAll();
    }

    public function page()
    {
        $params = App::getRouter()->getParams();
        $pagination = App::getRouter()->getPagination();
        $this->data['count'] = $this->model->getListCount();
            if (isset($params[0]) && $params[0] != null) {
                if ($params[0] == 1) {
                    $page = 0;
                } else {
                    $page = ($params[0] * $pagination) - $pagination;
                }
            } else {
                $page = 0;
            }
            if (isset($params[1])){
                $this->data['param'] = $params[1];
                $this->data['tasks'] = $this->model->getSortList($params[1],$page,$pagination);
            }else {
                $this->data['tasks'] = $this->model->getList($page, $pagination);
            }
    }


    public function view()
    {
        $params = App::getRouter()->getParams();

        if(isset($params[0])){
            $id = strtolower($params[0]);

            $this->data['tasks'] = $this->model->getbyId($id);
        }
    }

    public function admin_page()
    {
        $this->data['tasks'] = $this->model->getListAll();
    }

    public function add()
    {
        if($_POST) {
            if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['title']) && !empty($_POST['task']) && isset($_FILES['file']['name'])) {
                $result = $this->model->save($_POST);
                if ($_FILES) {
                    $image = new Image();
                    $image->load($_FILES['file']['tmp_name']);
                    $image->resize(320, 240);
                    $name = $this->model->getLastId();
                    $image->save("img/{$name['id']}.jpg");
                }
                if ($result) {
                    Session::setFlash('Task was added:)');
                } else {
                    Session::setFlash('Error!');
                }
            } else {
                Session::setFlash('Empty fields!');
            }
        }
    }

    public function preview()
    {
        if ($_FILES) {
            $image = new Image();
            $image->load($_FILES['img']['tmp_name']);
            $image->resize(320, 240);
            $image->save("img/tmp/{$_FILES['img']['name']}");
        }
        echo ($_FILES['img']['name']);
        die();
    }

    public function admin_edit()
    {
        if($_POST){
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $result = $this->model->save($_POST, $id);
            if($result){
                Session::setFlash('Task was saved.');
            }else{
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/tasks/');
        }

        if(isset($this->params[0]) ){
            $this->data['task'] = $this->model->getbyId($this->params[0]);
        }else{
            Session::setFlash('Wrong task id.');
            Router::redirect('/admin/tasks');
        }
    }

    public function admin_delete()
    {
        if ( isset($this->params[0]) ){
            $result = $this->model->delete($this->params[0]);
            if($result){
                Session::setFlash('Page was deleted.');
            }else{
                Session::setFlash('Error.');
            }
            Router::redirect('/admin/tasks/');
        }
    }

}