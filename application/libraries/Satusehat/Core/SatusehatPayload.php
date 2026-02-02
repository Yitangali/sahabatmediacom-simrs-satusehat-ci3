<?php defined('BASEPATH') OR exit('No direct script access allowed');

abstract class SatusehatPayload
{
    protected string $templatePath;

    protected function loadTemplate(): array
    {
        $json = file_get_contents($this->templatePath);
        return json_decode($json, true);
    }

    protected function replacePlaceholders(array $payload, array $variables): array
    {
        array_walk_recursive($payload, function (&$value) use ($variables) {
            if (!is_string($value)) {
                return;
            }

            foreach ($variables as $key => $val) {
                $value = str_replace('{{' . $key . '}}', $val, $value);
            }
        });

        return $payload;
    }
}
