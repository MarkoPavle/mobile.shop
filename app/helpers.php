<?php

function setActiveCategory($brand, $output = 'active')
{
    return request()->brand == $brand ? $output : '';
}

