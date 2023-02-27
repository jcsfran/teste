<?php

namespace Julio\Docs\Contracts;

use Julio\Docs\Structures\{
    AuthStructure,
    BasicStructure,
    ParamsStructure,
};

abstract class Action
{
    protected AuthStructure $authStructure;
    protected BasicStructure $basicStructure;
    protected ParamsStructure $paramsStructure;

    public function __construct()
    {
        $this->authStructure = new AuthStructure();
        $this->basicStructure = new BasicStructure();
        $this->paramsStructure = new ParamsStructure();
    }
}
