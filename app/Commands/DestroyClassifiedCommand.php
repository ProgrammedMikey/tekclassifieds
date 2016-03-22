<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Classified;

class DestroyClassifiedCommand extends Command implements SelfHandling
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        return Classified::where('id', $this->id)->delete();
    }
}
