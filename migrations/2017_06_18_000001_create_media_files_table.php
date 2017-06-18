<?php

use Czim\CmsCore\Support\Database\CmsMigration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaFilesTable extends CmsMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->prefixCmsTable('media_files'), function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 255)->nullable();
            $table->string('reference', 255)->nullable();
            $table->string('folder', 255)->nullable()->index();
            $table->string('name', 255)->nullable();
            $table->string('description', 255)->nullable();
            $table->text('file')->nullable();
            $table->string('uploader', 255)->nullable();
            $table->boolean('image')->default(false);
            $table->nullableTimestamps();

            $table->unique('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop($this->prefixCmsTable('media_files'));
    }
}
