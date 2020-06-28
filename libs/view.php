<?php
/**
 *
 */
class View
{

    public function __construct()
    {
        //echo "This is main view <br>";
    }

    public function render($viewFile, $requireFile = false)
    {
        if ($requireFile == true) {
            require 'views/' . $viewFile . '.php';
        } else {
            require 'views/header.php';
            require 'views/' . $viewFile . '.php';
            require 'views/footer.php';
        }
    }

    public function script($script)
    {
        if ($script) {
            foreach ($script as $value) {
                echo '<script type="text/javascript" src="' . URL . 'views/' . $value . '"></script>';
            }
        }
    }
    public function style($css)
    {
        if ($css) {
            foreach ($css as $value) {
                echo '<link rel="stylesheet" href="' . URL . 'views/' . $value . '">';
            }
        }
    }
    public function CreateELe($path, $file, $class = 'file')
    {
        $tmp_file = $path . $file;
        $ext      = pathinfo($tmp_file, PATHINFO_EXTENSION);

        switch ($ext) {
            case 'png':
            case 'jpg':
            case 'jpeg':
            case 'webp':
            case 'tif':
            case 'tiff':
            case 'PNG':
                return '<img val="' . $file . '" class="' . $class . '"src="' . $path . $file . '">';
                break;
            case 'mpeg':
            case 'mp4':
            case '3gp':
            case '3g2':
            case 'ogv':
            case 'webm':
                return '<video val="' . $file . '" class="' . $class . '" width="320" height="240" controls>
                          <source src="' . $path . $file . '" type="video/mp4">
                          <source src="' . $path . $file . '" type="video/ogg">
                        Your browser does not support the video tag.
                        </video>';
                break;
            default:
                return '<p>unsupport file format</p>';
                break;
        }
    }

}
