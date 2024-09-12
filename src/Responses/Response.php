<?php

namespace Src\Responses;

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

    protected static function codeToMsg(int $code): string
    {
        // todo: need to be implement
        return match ($code) {
            200 => 'Ok',
            201 => 'Created',
            // other codes
            // ...
            default => 'Incorrect code ' . $code,
        };
    }
}

