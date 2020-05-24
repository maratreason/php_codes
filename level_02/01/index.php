<?php 

abstract class Animal {
  protected $x;
  protected $y;
  protected $power;
  protected $color;
  protected $hp;

  public function __construct()
  {
    $this->setXY();
  }

  protected function setXY() {
    $this->x= mt_rand(1, 100);
    $this->y= mt_rand(1, 100);
  }

  public function showPlace() {
    return 'x: ' . $this->x . ',y: ' . $this->y;
  }

  abstract public function move();

  public function getColor() 
  {
    return $this->color;
  }
}


class Toad extends Animal
{
  protected $name;
  protected $power;
  protected $color;
  protected $hp;

  public function __construct($name, $color)
  {
    parent::__construct();

    $this->hp = 100;
    $this->power = 5;
    $this->name = $name;
    $this->color = $color;
  }

  public function move() 
  {
    $this->x += 4;
    $this->y += 4;
  }

  public function jump() 
  {

  }

  public function strike() 
  {

  }

  public function getName()
  {
    return $this->name;
  }

}


class Mosquite extends Animal
{
  private $trunk; // хобот

  public function __construct()
  {
    parent::__construct();

    $this->hp = 10;
    $this->power = 1;
    $this->color = 'red';
  }

  public function move() 
  {
    $this->x += 1;
    $this->y += 1;
  }

  public function fly() 
  {
    return $this->y += 10;
  }

  public function bite() 
  {
    return $this->power+=1;
  }

  public function getPower() {
    return $this->power;
  }

}



$toad1 = new Toad('Bubble', 'Orange');

echo '<pre>';
print_r($toad1);
echo '</pre>';

echo $toad1->getName() . '<br>';

$toad2 = new Toad('Pimple', 'Green');
echo $toad2->getName() . '<br>';

echo $toad1->showPlace() . '<br>';
$toad1->move();
echo $toad1->showPlace() . '<br>';

echo $toad2->showPlace() . '<br>';
$toad2->move();
echo $toad2->showPlace() . '<br>';


$mosquito1 = new Mosquite();
echo 'Mosquito1: ' . $mosquito1->showPlace() . '<br>';
echo 'Mosquito1 power: ' . $mosquito1->getPower() . '<br>';
$mosquito1->bite();
$mosquito1->bite();
echo 'Mosquito1 power: ' . $mosquito1->getPower() . '<br>';


class SuperMosquito extends Mosquite {

  public function __construct()
  {
    parent::__construct();

    $this->hp = 50;
    $this->power *= 3;
    $this->color = 'black';
  }

}

$mosquito2 = new SuperMosquito();
$mosquito2->bite();
$mosquito2->bite();
echo 'SuperMosquito power: ' . $mosquito2->getPower() . '<br>';
echo 'SuperMosquito color: ' . $mosquito2->getColor() . '<br>';