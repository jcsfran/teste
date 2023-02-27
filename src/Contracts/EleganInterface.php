<?php

namespace Julio\Docs\Src\Contracts;

interface EleganInterface
{
    public function struct(bool $auth, string $path, array $params, string $name): string;
}
