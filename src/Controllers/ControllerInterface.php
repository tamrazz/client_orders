<?php

namespace Src\Controllers;

use Src\Responses\Response;

interface ControllerInterface
{
    /**
     * Get list of models
     *
     * @return array
     */
    public function index(): Response;

    /**
     * Create model
     *
     * @return string
     */
    public function store(): Response;

    /**
     * Get model data
     *
     * @return array
     */
    public function show(): Response;

    /**
     * Update model info
     *
     * @return string
     */
    public function update(): Response;

    /**
     * Delete model
     *
     * @return string
     */
    public function destroy(): Response;

}

