<?php

namespace Src\Controllers;

use Src\Models\Model;
use Src\Responses\Response;

abstract class ModelController extends Controller
{
    protected Model $model;

    public function __construct(string $modelClass)
    {
        if (is_a($modelClass, Model::class, true)) {
            $this->model = new $modelClass();
        } else {
            throw new \Exception($modelClass . ' is not a allowed class');
        }
        parent::__construct();
    }

    /**
     * Get list of models
     *
     * @return array
     */
    public function index(): Response
    {
        $data = [
            'data' => $this->model->get($this->request),
            'view' => $this->getView(__FUNCTION__),
        ];
        return Response::make(200, $data);
    }

    /**
     * Create model
     *
     * @return string
     */
    public function store(): Response
    {
        $data = $this->model->create($this->request);
        return Response::make(201, $data); 
    }

    /**
     * Get model data
     *
     * @return array
     */
    public function show(): Response
    {
        if (empty($this?->request['id'])) {
            return Response::make(400, [], 'Required parameter not specified: id');
        }

        $id = (int)$this->request['id'];
        $data = $this->model->find($id);
        $data['view'] = $this->getView(__FUNCTION__);
        if (empty($data)) {
            return Response::make(404); // todo: Return 404
        }
        
        return Response::make(200, $data); // todo: Return 200 with model $data
    }

    /**
     * Update model info
     *
     * @return string
     */
    public function update(): Response
    {
        if (empty($this?->request['id'])) {
            return Response::make(400, [], 'Required parameter not specified: id');
        }
        $id = (int)$this->request['id'];
        $data = $this->model->update($id, $this->request);
        $data['view'] = $this->getView(__FUNCTION__);
        if (empty($result)) {
            return Response::make(422, [], 'Not updated');
        }
        
        return Response::make(200, $data);
    }

    /**
     * Delete model
     *
     * @return string
     */
    public function destroy(): Response
    {
        if (empty($this?->request['id'])) {
            return Response::make(400, [], 'Required parameter not specified: id');
        }
        $id = (int)$this->request['id'];
        return $this->model->delete($id);;
    }

    protected function getEntityName() {
        $parts = explode('\\', $this->model::class);
        $className = end($parts);
        return strtolower($className);
    }

    protected function getView(string $action): string
    {
        return static::VIEWS_PATH . $this->getEntityName() . "/{$action}.view.php";
    }

}

