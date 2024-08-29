<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class ProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hiza:create_product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will initialize products';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $title = $this->ask("What is the title of the book");
        $description= $this->ask("Write the description of the book");
        $price= $this->ask("What is the price of the book");
        $user_id=$this->ask("Enter user id");

        Product::create([
            "title"=>$title,
            "description"=>$description,
            "price"=>$price,
            "user_id"=>$user_id
        ]);


        $this->info("Product created");
    }
}
