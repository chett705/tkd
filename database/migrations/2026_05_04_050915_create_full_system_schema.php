<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        /*
        |---------------------------------------
        | USERS
        |---------------------------------------
        */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role')->default('admin');
            $table->string('status')->default('active');
            $table->string('avatar')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamps();
        });

        /*
        |---------------------------------------
        | CACHE
        |---------------------------------------
        */
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->bigInteger('expiration')->index();
        });

        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->bigInteger('expiration')->index();
        });

        /*
        |---------------------------------------
        | JOBS
        |---------------------------------------
        */
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('queue')->index();
            $table->longText('payload');
            $table->unsignedTinyInteger('attempts');
            $table->unsignedInteger('reserved_at')->nullable();
            $table->unsignedInteger('available_at');
            $table->unsignedInteger('created_at');
        });

        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');
            $table->integer('total_jobs');
            $table->integer('pending_jobs');
            $table->integer('failed_jobs');
            $table->longText('failed_job_ids');
            $table->mediumText('options')->nullable();
            $table->integer('cancelled_at')->nullable();
            $table->integer('created_at');
            $table->integer('finished_at')->nullable();
        });

        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->text('connection');
            $table->text('queue');
            $table->longText('payload');
            $table->longText('exception');
            $table->timestamp('failed_at')->useCurrent();
        });

        /*
        |---------------------------------------
        | CONTACT MESSAGES
        |---------------------------------------
        */
        Schema::create('contact_messages', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('project_type')->nullable();
            $table->text('message')->nullable();
            $table->string('status')->default('new');
            $table->timestamps();
        });

        /*
        |---------------------------------------
        | CONTACT INFO
        |---------------------------------------
        */
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();
            $table->text('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_1')->nullable();
            $table->string('phone_2')->nullable();
            $table->string('working_hours')->nullable();
            $table->timestamps();
        });

        /*
        |---------------------------------------
        | MEDIA FILES
        |---------------------------------------
        */
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('file_name');
            $table->string('file_path');
            $table->string('file_type')->nullable();
            $table->string('mime_type')->nullable();
            $table->bigInteger('file_size')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->integer('duration')->nullable();
            $table->timestamp('uploaded_at')->nullable();
        });

        /*
        |---------------------------------------
        | MENU GROUPS
        |---------------------------------------
        */
        Schema::create('menu_groups', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('name_en');
            $table->string('name_km');
            $table->timestamps();
        });

        /*
        |---------------------------------------
        | MENUS
        |---------------------------------------
        */
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('menu_group_id')->nullable()->constrained('menu_groups')->nullOnDelete();
            $table->string('slug');
            $table->string('route')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('name_en');
            $table->string('name_km');
            $table->timestamps();
        });

        /*
        |---------------------------------------
        | PAGES
        |---------------------------------------
        */
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('type')->nullable();
            $table->string('title_en');
            $table->string('title_km');
            $table->string('subtitle_en')->nullable();
            $table->string('subtitle_km')->nullable();
            $table->longText('content_en')->nullable();
            $table->longText('content_km')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        /*
        |---------------------------------------
        | PAGE SECTIONS
        |---------------------------------------
        */
        Schema::create('page_sections', function (Blueprint $table) {
            $table->id();
            $table->string('page');
            $table->string('section_key');
            $table->string('title_en')->nullable();
            $table->string('title_km')->nullable();
            $table->string('subtitle_en')->nullable();
            $table->string('subtitle_km')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_km')->nullable();
            $table->string('button_text_en')->nullable();
            $table->string('button_text_km')->nullable();
            $table->string('button_link_en')->nullable();
            $table->string('button_link_km')->nullable();
            $table->string('media_type')->nullable();
            $table->string('media_url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        /*
        |---------------------------------------
        | SECTION ITEMS
        |---------------------------------------
        */
        Schema::create('section_items', function (Blueprint $table) {
            $table->id();
            $table->string('section_key');
            $table->string('component_type')->nullable();
            $table->string('group_title')->nullable();
            $table->string('page')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_km')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_km')->nullable();
            $table->string('image')->nullable();
            $table->json('images')->nullable();
            $table->string('icon')->nullable();
            $table->string('link')->nullable();
            $table->string('button_text_en')->nullable();
            $table->string('button_text_km')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->string('type')->nullable();
            $table->json('meta')->nullable();
            $table->timestamps();
        });

        /*
        |---------------------------------------
        | SETTINGS
        |---------------------------------------
        */
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('group_name');
            $table->string('key_name');
            $table->text('value_en')->nullable();
            $table->text('value_km')->nullable();
            $table->string('type')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        /*
        |---------------------------------------
        | SESSIONS
        |---------------------------------------
        */
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('session_token');
            $table->string('ip_address', 100)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('login_at')->nullable();
            $table->timestamp('logout_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        /*
        |---------------------------------------
        | ACTIVITY LOGS
        |---------------------------------------
        */
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action');
            $table->string('model')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->text('description')->nullable();
            $table->string('ip_address', 100)->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('section_items');
        Schema::dropIfExists('page_sections');
        Schema::dropIfExists('pages');
        Schema::dropIfExists('menus');
        Schema::dropIfExists('menu_groups');
        Schema::dropIfExists('media_files');
        Schema::dropIfExists('contact_infos');
        Schema::dropIfExists('contact_messages');
        Schema::dropIfExists('failed_jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
        Schema::dropIfExists('users');
    }
};
