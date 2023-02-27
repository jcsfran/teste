<?php

namespace Julio\Docs\Actions;

use Labi9\Elegan\Contracts\{
    Action,
    EleganInterface,
};
use Symfony\Component\HttpFoundation\Response as HttpResponse;

class StoreAction extends Action implements EleganInterface
{
    public function struct(bool $auth, string $path, array $params, string $name): string
    {
        $structuredYaml = str_repeat(config('elegan.space'), 4) . "post:" . PHP_EOL;
        $structuredYaml .=
            str_repeat(config('elegan.space'), 6)
            . '$ref: ./'
            . $name
            . '.yaml'
            . PHP_EOL;

        $this->createStructure(
            $auth,
            $path,
            $params,
            $name,
        );

        return $structuredYaml;
    }

    public function createStructure(bool $auth, string $path, array $params, string $name): void
    {
        $structure = PHP_EOL;
        $fileName = './' . $name . '.yaml';

        if ($auth) {
            $structure .= $this
                ->authStructure
                ->header();
        }

        if (!empty($params)) {
            $structure .= $this
                ->paramsStructure
                ->header($params);
        }

        $structure .= $this
            ->basicStructure
            ->info();
        $structure .= $this
            ->basicStructure
            ->response(HttpResponse::HTTP_CREATED);

        if ($auth) {
            $structure .= $this
                ->authStructure
                ->response();
        }

        if (!empty($params)) {
            $structure .= $this
                ->paramsStructure
                ->response();
        }

        $structure .= $this
            ->basicStructure
            ->body();

        $this
            ->basicStructure
            ->createFile(
                $fileName,
                $structure,
                $path,
            );
    }
}
