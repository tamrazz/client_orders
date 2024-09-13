<?php

namespace Src\Controllers;

use Src\Responses\Response;

class Controller implements ControllerInterface
{
    const VIEWS_PATH = __DIR__ . '/../../views/';

    protected array $request;

    public function __construct()
    {
        $this->request = $this->sanitizedRequest();
    }

    /**
     * Get list of models
     *
     * @return array
     */
    public function index(): Response
    {
        $data = [
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
        // todo: need to be implement
        $data = [];
        return Response::make(405, $data); 
    }

    /**
     * Get model data
     *
     * @return array
     */
    public function show(): Response
    {
        // todo: need to be implement
        $data = [];
        return Response::make(405, $data); 
    }

    /**
     * Update model info
     *
     * @return string
     */
    public function update(): Response
    {
        // todo: need to be implement
        $data = [];
        return Response::make(405, $data); 
    }

    /**
     * Delete model
     *
     * @return string
     */
    public function destroy(): Response
    {
        // todo: need to be implement
        $data = [];
        return Response::make(405, $data); 
    }

    protected function getView(string $action): string
    {
        return static::VIEWS_PATH . "{$action}.html";
    }

    protected function sanitizedRequest(): array
    {
        // todo: make sanitazing and return only actual safe data
        return (array)filter_input_array(INPUT_GET);
    }
}

