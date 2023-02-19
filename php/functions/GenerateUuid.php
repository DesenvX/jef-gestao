<?php

function uuid()
{

    $timestamp = time();
    $uuid = hash('sha256', (string) $timestamp);

    if ($uuid == 0) {
        $timestamp = time();
        $uuid = hash('sha256', (string) $timestamp);
        return $uuid;
    } else {
        return $uuid;
    }
}
