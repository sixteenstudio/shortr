<?php

namespace App;

class View
{

    /**
     * Render the requested view.
     *
     * @param string $ushortenerViewPath
     * @param array $with
     * @return string
     */
    public function render($ushortenerViewPath, $with = [])
    {
        // Security measure
        $rePath = $ushortenerViewPath;

        // Check if there are any variables to be passed to the view
        if (is_array($with) && !empty($with)) {
            // Extract them and replace view path in-case it has been overwritten
            extract($with);
        }

        $ushortenerViewPath = '../views/' . $rePath;

        ob_start();
        include $ushortenerViewPath;
        return ob_get_clean();
    }

}