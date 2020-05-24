<?php
class Math
{
  const PI = 3.14;

  public static function circleRange($radius)
  {
    return self::PI * $radius * $radius;
  }
}