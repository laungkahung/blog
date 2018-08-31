<?php
/**
 * Created by PhpStorm.
 * User: zjt57
 * Date: 2018/8/24
 * Time: 17:29
 */

mb_internal_encoding('UTF-8');

function current_action_name($type)
{
    $actions     = request()->route()->getAction();
    $actions     = explode('\\', $actions['controller']);
    $func        = explode('@', $actions[count($actions) - 1]);

    if ($type) return $func[0];//return action
    return $func[1];//return controller
}
