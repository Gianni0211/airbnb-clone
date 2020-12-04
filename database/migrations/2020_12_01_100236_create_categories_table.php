<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('img');
            $table->timestamps();
        });
        $categories = [
            ['name' => 'Spazi Unici',
            'img' => '/images/spazi-unici.jpg'
        ],
            ['name' => 'Esperienze online',
            'img' => '/images/experience.jpg'
        ],
            
            ['name' => 'Case intere',
            'img' => '/images/case.jpg'
        ],
            
        ];
        foreach($categories as $category){
            $c = new Category();
            $c->name = $category['name'];
            $c->img = $category['img'];
            $c->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
