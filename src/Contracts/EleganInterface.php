<?php

namespace Julio\Docs\Contracts;

interface EleganInterface
{
    public function struct(bool $auth, string $path, array $params, string $name): string;
}
