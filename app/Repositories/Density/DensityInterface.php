<?php
namespace App\Repositories\Density;

interface DensityInterface
{

    public function calculate();

    public function getTweets($handle, $count);

    public function xml();

    public function json();
}
