<?php


class Controller
{
    protected $view;
    protected $model;

    protected function createModel($model){
        $modelPath = MODELS . $model . '.php';
        $this->model = $this->instantiateIfExists($modelPath, $model);
    }

    protected function createView($viewClass, $view){
        $viewPath = VIEWS . $viewClass . '.php';
        $this->view = $this->instantiateIfExists($viewPath, $viewClass, $view);
    }

    private function instantiateIfExists($path, $file, $param=null){
        if(file_exists($path)){
            require_once $path;
            if($param != null)
                return new $file($param);
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
        $this->getModel()->SetElement(get_class($this) . 'Active', 'active');
        $this->getView()->render($this->getModel()->GetData());
    }
}