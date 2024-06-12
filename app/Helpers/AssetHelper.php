<?php

namespace App\Helpers;

class AssetHelper
{
  public static function fixPath($path)
  {
    $pathFix = trim($path);
    return substr($pathFix, 0, 1) === '/' ? substr($pathFix, 1) : $pathFix;
  }
  public static function assetAdmin($path)
  {
    $pathFix = self::fixPath($path);
    return asset('assets/admin/' . $pathFix);
  }
}
