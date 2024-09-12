<?php

namespace Src\Responses;

use Src\Controllers\Controller;

class Response
{
    public function __construct(
        protected int $code,
        protected array $data,
        protected string $msg,
        protected $success
    ) {}

    public static function make(int $code, array $data = [], string $msg = ''): static
    {
        if (empty($msg)) {
            $msg = static::codeToMsg($code);
        }
        $success = $code < 300 ? true : false;
        return new static($code, $data, $msg, $success);
    }

    public function getCode(): int
    {
        return (int)$this->code;
    }

    public function getData(): array
    {
        return (array)$this->data;
    }

    public function getMsg(): string
    {
        return (string)$this->msg;
    }

    public function getSuccess(): bool
    {
        return (bool)$this->success;
    }

    public function render()
    {
        $acceptHeader = $_SERVER['HTTP_ACCEPT'] ?? '';

        if (strpos($acceptHeader, 'application/json') !== false) {
            return $this->toJson();
        }

        return $this->toHtml();
    }

    public function toJson()
    {
        header('Content-Type: application/json');
        $data = [
            'success' => $this->success,
            'msg' => $this->msg,
            'data' => $this->data,
        ];
        return json_encode($data);
    }

    public function toHtml()
    {
        $viewPath = $this->data['view'] ?? Controller::VIEWS_PATH . '404.html';
        if (file_exists($viewPath)) {
            $data = $this->data;
            ob_start();
            include $viewPath;
            return ob_get_clean();
        }
        return 'View not found';
    }

    protected static function codeToMsg(int $code): string
    {
        return match ($code) {
            // 1xx Informational
            100 => 'Continue',
            101 => 'Switching Protocols',
            102 => 'Processing',
            103 => 'Early Hints',
    
            // 2xx Success
            200 => 'OK',
            201 => 'Created',
            202 => 'Accepted',
            203 => 'Non-Authoritative Information',
            204 => 'No Content',
            205 => 'Reset Content',
            206 => 'Partial Content',
            207 => 'Multi-Status',
            208 => 'Already Reported',
            226 => 'IM Used',
    
            // 3xx Redirection
            300 => 'Multiple Choices',
            301 => 'Moved Permanently',
            302 => 'Found',
            303 => 'See Other',
            304 => 'Not Modified',
            305 => 'Use Proxy',
            307 => 'Temporary Redirect',
            308 => 'Permanent Redirect',
    
            // 4xx Client Error
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            406 => 'Not Acceptable',
            407 => 'Proxy Authentication Required',
            408 => 'Request Timeout',
            409 => 'Conflict',
            410 => 'Gone',
            411 => 'Length Required',
            412 => 'Precondition Failed',
            413 => 'Payload Too Large',
            414 => 'URI Too Long',
            415 => 'Unsupported Media Type',
            416 => 'Range Not Satisfiable',
            417 => 'Expectation Failed',
            418 => "I'm a teapot",
            421 => 'Misdirected Request',
            422 => 'Unprocessable Entity',
            423 => 'Locked',
            424 => 'Failed Dependency',
            425 => 'Too Early',
            426 => 'Upgrade Required',
            428 => 'Precondition Required',
            429 => 'Too Many Requests',
            431 => 'Request Header Fields Too Large',
            451 => 'Unavailable For Legal Reasons',
    
            // 5xx Server Error
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            502 => 'Bad Gateway',
            503 => 'Service Unavailable',
            504 => 'Gateway Timeout',
            505 => 'HTTP Version Not Supported',
            506 => 'Variant Also Negotiates',
            507 => 'Insufficient Storage',
            508 => 'Loop Detected',
            510 => 'Not Extended',
            511 => 'Network Authentication Required',
    
            default => 'Incorrect code ' . $code,
        };
    }
}

