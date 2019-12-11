<?php

/**
 * Description of Renderer
 *
 * @author aurelio
 */
class Renderer
{

    public static function render(string $file, array $data = null)
    {
        $path = __DIR__ . DIRECTORY_SEPARATOR . "Views" . DIRECTORY_SEPARATOR . $file;
        ob_start();
        if ($data != null) {
            extract($data);
        }
        include_once $path;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
