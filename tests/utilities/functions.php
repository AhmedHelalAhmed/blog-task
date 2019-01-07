<?php
/**
 * Created by PhpStorm.
 * User: ahmedhelal
 * Date: 1/7/19
 * Time: 2:23 PM
 */
function create($class, $attributes = [])
{
    return factory($class)->create($attributes);
}

function make($class, $attributes = [])
{
    return factory($class)->make($attributes);
}