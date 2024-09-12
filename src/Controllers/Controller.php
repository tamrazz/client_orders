<?php

namespace Src\Controllers;

use Src\Models\Model;
use Src\Responses\Response;

abstract class Controller implements ControllerInterface
{
    private array $request;
    private Model $model;

    public function __construct(string $modelClass)
    {
        $this->request = $this->sanitizedRequest();
        if ($modelClass instanceof Model) {
            $this->model = new $modelClass();
        } else {
            throw new \Exception($modelClass . ' is not a allowe class');
        }
    }

    /**
     * Get list of models
     *
     * @return array
     */
    public function index(): Response
    {
        $data = $this->model->get($this->request);
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

    /**
     * Removing some non-safety data
     *
     * @return array
     */
    abstract protected function sanitizedRequest(): array;
}

