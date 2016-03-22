<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Classified;

class UpdateClassifiedCommand extends Command implements SelfHandling
{
    public $id;
    public $title;
    public $category_id;
    public $description;
    public $main_image;
    public $price;
    public $condition;
    public $location;
    public $email;
    public $phone;

    public function __construct($id, $title, $category_id, $description, $main_image, $price, $condition, $location, $email, $phone)
    {
        $this->id = $id;
        $this->title = $title;
        $this->category_id = $category_id;
        $this->description = $description;
        $this->main_image = $main_image;
        $this->price = $price;
        $this->condition = $condition;
        $this->location = $location;
        $this->email = $email;
        $this->phone = $phone;
    }

    public function handle()
    {
        return Classified::where('id', $this->id)->update(array(
            'title' => $this->title,
            'category_id' => $this->category_id,
            'description' => $this->description,
            'main_image' => $this->main_image,
            'price' => $this->price,
            'condition' => $this->condition,
            'location' => $this->location,
            'email' => $this->email,
            'phone' => $this->phone,
        ));
    }
}
