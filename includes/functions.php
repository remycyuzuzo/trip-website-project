<?php

function ClearName($name)
{
    $name = strtolower(str_replace(' ', '-', $name));
    $name = preg_replace('/[^A-Za-z0-9\-]/', '', $name);
    return $name;
}

function formatDate(string $datetime)
{
    $timestamp = DateTime::createFromFormat('Y-m-d H:i:s', $datetime);
    $date = $timestamp->getTimestamp();
    return date("d M, Y", $date);
}
