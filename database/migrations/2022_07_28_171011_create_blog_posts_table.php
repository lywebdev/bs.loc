<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->index()->comment('Заголовок статьи');
            $table->string('slug', 255)->unique()->comment('Слаг статьи');
            $table->longText('content')->comment('Содержимое статьи');
            $table->string('preview')->nullable()->comment('Превью статьи');
            $table->string('seo_keywords')->comment('Ключевые слова статьи')->nullable();
            $table->text('seo_description')->comment('Описание статьи')->nullable();
            $table->boolean('status')->default(1)->comment('Статус видимости поста');

            $table->integer('category_id')->nullable()->comment('Категория статьи')->references('id')->on('blog_categories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_posts');
    }
}
