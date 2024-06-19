<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class NavigationHelper
{

  static function setActive(array $patterns)
  {

    foreach ($patterns as $pattern) {
      if (Request::is($pattern)) {
        return 'active';
      }
    }
    return '';
  }
}
