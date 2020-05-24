<?php

namespace Services;

class HTMLGenerator
{
  public $beautyText;
  private $text;

  public function __construct($text)
  {
    $this->text = $text;
    // $this->loadText();
  }


  public static function getTitle($text, $level = '1')
  {
    return "<h$level>$text</h$level>";
  }


  public static function getImg($path, $title = '')
  {
    return "<img src='$path' alt='$title'/>";
  }


  public function wrapEachInP() 
  {
    $arr = $this->epxlodeText($this->text);
    $t = '';
    foreach ($arr as $p) {
      $t .= "<p>$p</p>";
    }

    $this->beautyText = $t;

    return $this;
  }


  public function wrapAllInBox($class = '')
  {
    $class = ($class === '' ? '' : "class='$class'");
    $this->beautyText = "<div {$class}>{$this->beautyText}</div>";

    return $this;
  }


  public function addTextToTop($text)
  {
    $this->beautyText = $text . $this->beautyText;

    return $this;
  }


  private function epxlodeText($text) 
  {
    $t = explode("\n", $text);

    $res = [];
    foreach ($t as $p) {
      if ($p != '') {
        $res[] = $p;
      }
    }

    return $res;
  }


  // private function loadText()
  // {
  //   $this->text = file_get_contents($this->path);
  //   $this->beautyText = $this->text;
  // }


  public function findByTag($tag, $pos = null) 
  {
    preg_match_all("#<$tag*>(.*?)</$tag>#", $this->beautyText, $match);

    if (isset($pos) && $pos > 0) {
      $match[0] = $match[0][$pos - 1];
      $match[1] = $match[1][$pos - 1];
    }

    return $match;
  }


  public function addTo($html, $tagName, $number = null, $where = 0)
  {
    $tags = $this->findByTag($tagName, $number);

    if (is_array($tags[$where])) {
      foreach ($tags[$where] as $line) {
        $this->beautyText = str_replace($line, $html . $line, $this->beautyText);
      }
    } else {
      $this->beautyText = str_replace($tags[$where], $html . $tags[$where], $this->beautyText);
    }

    return $this;
  }

}