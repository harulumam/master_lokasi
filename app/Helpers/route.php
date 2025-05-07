<?php

if (!function_exists('prefixActive')) {
  function prefixActive($prefixNames)
  {
    $prefixNames = is_array($prefixNames) ? $prefixNames : [$prefixNames];

    foreach ($prefixNames as $prefixName) {
      if (request()->route()->getPrefix() == $prefixName) {
        return 'active';
      }
    }

    return '';
  }
}

if (!function_exists('prefixBlock')) {
  function prefixBlock($prefixNames)
  {
    $prefixNames = is_array($prefixNames) ? $prefixNames : [$prefixNames];

    foreach ($prefixNames as $prefixName) {
      if (request()->is(trim($prefixName, '/').'*')) { 
        return 'block';
      }
    }

    return 'none';
  }
}


if (!function_exists('routeActive')) {
  function routeActive($routeName)
  {
    return request()->routeIs($routeName) ? 'active' : '';
  }
}
