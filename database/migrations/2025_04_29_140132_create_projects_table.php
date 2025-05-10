<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("projects", function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("image");
            $table->text("description");
            $table->timestamps();
        });

        Schema::create("tags", function (Blueprint $table) {
            $table->id();
            $table->string("name")->unique();
        });

        Schema::create("project_tag", function (Blueprint $table) {
            $table->foreignId("project_id")->constrained()->onDelete("cascade");
            $table->foreignId("tag_id")->constrained()->onDelete("cascade");
        });

        Schema::create("services", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->text("description")->nullable();
            $table->decimal("price", 10, 2);
            $table->timestamps();
        });

        Schema::create("quotes", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->text("message")->nullable();
            $table->timestamps();
        });

        Schema::create("quote_service", function (Blueprint $table) {
            $table->foreignId("quote_id")->constrained()->onDelete("cascade");
            $table->foreignId("service_id")->constrained()->onDelete("cascade");
        });

        Schema::create("skills", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("level")->nullable(); // ex: beginner, advanced, expert
            $table->timestamps();
        });

        Schema::create("contacts", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("email");
            $table->text("message");
            $table->timestamps();
        });

        Schema::create("site_settings", function (Blueprint $table) {
            $table->id();
            $table->string("key")->unique();
            $table->text("value")->nullable();
            $table->timestamps();
        });

        Schema::create("visits", function (Blueprint $table) {
            $table->id();
            $table->string("ip");
            $table->string("user_agent");
            $table->string("route");
            $table->timestamp("visited_at")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("projects");
        Schema::dropIfExists("tags");
        Schema::dropIfExists("project_tag");
        Schema::dropIfExists("services");
        Schema::dropIfExists("quotes");
        Schema::dropIfExists("quote_service");
        Schema::dropIfExists("skills");
        Schema::dropIfExists("contacts");
        Schema::dropIfExists("site_settings");
        Schema::dropIfExists("visits");
    }
};
