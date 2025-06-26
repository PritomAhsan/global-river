<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('river_submissions', function (Blueprint $table) {
            $table->id();

            // 1. Country and Organization Information
            $table->string('country_name');
            $table->string('organization_name');
            $table->string('website_url')->nullable();
            $table->string('contact_person');
            $table->string('contact_role');
            $table->string('contact_email');
            $table->string('contact_phone')->nullable();
            $table->text('postal_address')->nullable();

            // 2. River Overview
            $table->string('river_name');
            $table->string('alternative_names')->nullable();
            $table->text('river_description');
            $table->string('river_length');
            $table->string('average_width_depth')->nullable();
            $table->string('river_source_location');
            $table->string('river_mouth_location');
            $table->string('elevation_at_source')->nullable();
            $table->string('countries_traversed');

            // 3. River Health and Threats
            $table->string('health_status');
            $table->string('major_threats');
            $table->text('future_risks')->nullable();
            $table->string('water_quality_data')->nullable();

            // 4. Legal Protection and Management
            $table->boolean('is_protected_by_law')->default(true);
            $table->string('protection_types')->nullable();
            $table->string('legal_framework')->nullable();
            $table->string('year_protected')->nullable();
            $table->string('managing_authority')->nullable();

            // 5. Biodiversity, Ecosystem Services, and Zoning
            $table->text('key_species')->nullable();
            $table->text('species_of_concern')->nullable();
            $table->text('invasive_species')->nullable();
            $table->text('biological_zones')->nullable();
            $table->text('ecosystem_services')->nullable();
            $table->text('cultural_importance')->nullable();

            // 6. Conservation and Restoration Efforts
            $table->boolean('has_conservation_projects')->default(true);
            $table->text('conservation_details')->nullable();
            $table->text('conservation_challenges')->nullable();

            // 7. Geographic and Mapping Information
            $table->string('gps_points')->nullable();
            $table->string('river_map')->nullable(); // file path
            $table->text('photographs')->nullable(); // JSON or comma-separated file paths

            // 8. Historical and Cultural Data
            $table->text('historical_importance')->nullable();
            $table->text('major_floods')->nullable();
            $table->text('indigenous_peoples')->nullable();
            $table->text('traditional_knowledge')->nullable();
            $table->text('river_use_changes')->nullable();
            $table->text('planned_threats')->nullable();

            // 9. Attachments and Supporting Documentation
            $table->text('research_reports')->nullable();
            $table->text('policy_documents')->nullable();
            $table->text('biodiversity_assessments')->nullable();
            $table->text('community_agreements')->nullable();
            $table->text('satellite_images')->nullable();
            $table->text('historical_documents')->nullable();
            $table->text('genetic_studies')->nullable();
            $table->text('water_quality_monitoring')->nullable();

            // 10. Future Vision (Optional)
            $table->text('vision_2030')->nullable();
            $table->text('anticipated_challenges')->nullable();
            $table->text('suggested_actions')->nullable();

            // 11. Declaration and Signature
            $table->boolean('declaration_agreed')->default(false);
            $table->string('official_signature')->nullable();
            $table->string('representative_name')->nullable();
            $table->date('declaration_date')->nullable();
            $table->string('organization_stamp')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('river_submissions');
    }
};
