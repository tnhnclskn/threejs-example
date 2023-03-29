<?php

require_once('vendor/autoload.php');

use \Tnhnclskn\OkeySolver\Board;

function dd()
{
    foreach (func_get_args() as $arg) {
        var_dump($arg);
    }
    die;
}

$board = Board::generate();
$series = $board->copy()->parseSeries();
dd($board->dump(), $series);

dd($board->sortByColor()->dump());
