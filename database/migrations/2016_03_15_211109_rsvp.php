<?php declare(strict_types = 1);

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\ConnectionInterface;
use Illuminate\Database\Migrations\Migration;

final class Rsvp extends Migration
{
    /** @var \Illuminate\Database\Schema\Builder */
    private $schema;

    /**
     * Portfolio constructor.
     */
    public function __construct()
    {
        $this->schema = app(ConnectionInterface::class)->getSchemaBuilder();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->schema->create('rsvp', function (Blueprint $table) {
            $table->char('rsvp_id', 36);
            $table->boolean('is_coming');
            $table->string('name');
            $table->string('starter');
            $table->string('main');
            $table->string('dessert');
            $table->text('dietry_requirements')->nullable();
            $table->integer('is_plus_one');
            $table->integer('type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->schema->drop('rsvp');
    }
}
