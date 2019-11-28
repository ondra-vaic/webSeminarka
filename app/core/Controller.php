<?php


class Controller
{
    protected $view;
    protected $model;

    protected function createModel($model){
        $modelPath = MODELS . $model . '.php';
        $this->model = $this->instantiateIfExists($modelPath, $model);
    }

    protected function createView($view, $data=[]){
        $viewPath = VIEWS . $view . '.php';
        $this->view = $this->instantiateIfExists($viewPath, $view, $data);
    }

    private function instantiateIfExists($path, $file, $data=[]){
        if(file_exists($path)){
            require_once $path;
            if(!empty($data))
                return new $file($data);
            return new $file();
        }else{
            throw new Exception($path . ' does not exist');
        }
    }

    protected function getView() : View{
        return $this->view;
    }

    protected function getModel() : Model{
        return $this->model;
    }

    public function Show(){
        $this->getView()->render($this->getModel()->GetData());
    }
}