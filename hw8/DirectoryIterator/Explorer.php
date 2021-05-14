<?php


class Explorer extends DirectoryIterator
{
    /**
     * Explorer constructor.
     * @param $directory
     */
    public function __construct($directory)
    {
        parent::__construct($directory);
    }

    public function showDirectory()
    {
        ob_clean();
        ob_start();
        $page = '';
        $dir = pathinfo($_SERVER['REQUEST_URI'])['filename'];
        foreach ($this as $item) {
            if (pathinfo($item)['extension'] != '') {
                $page .= "<div>file --> $item</div>";
            } else {
                $page .= "<div>";
                $page .= "<a href='?folder=$dir" . DIRECTORY_SEPARATOR;
                $page .= "$item'>$item</a></div>";
            }
        }
        echo $page;
    }
}