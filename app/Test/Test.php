<?php

namespace App\Test;

class Test
{
    protected array $config;

    public function __construct(array $config)
    {
        $this->config = $config;
    }


    // public function config(string $key)
    // {
    // return "Hello Test";
    // }   
    public function config(string $key)
    {
    return $this->config[$key] ?? null; // вернуть значение из Конструктора $config переданное туда при создании Класса - если нет значения то вернуть null
    }
}
