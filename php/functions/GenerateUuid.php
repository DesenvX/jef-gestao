<?php

function uuid()
{
    $uuid = md5(time());
    return $uuid;
}
