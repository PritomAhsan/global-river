<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiverSubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        // 1. Country and Organization Information
        'country_name', 'organization_name', 'website_url', 'contact_person', 'contact_role',
        'contact_email', 'contact_phone', 'postal_address',

        // 2. River Overview
        'river_name', 'alternative_names', 'river_description', 'river_length',
        'average_width_depth', 'river_source_location', 'river_mouth_location',
        'elevation_at_source', 'countries_traversed',

        // 3. River Health and Threats
        'health_status', 'major_threats', 'future_risks', 'water_quality_data',

        // 4. Legal Protection and Management
        'is_protected_by_law', 'protection_types', 'legal_framework',
        'year_protected', 'managing_authority',

        // 5. Biodiversity, Ecosystem Services, and Zoning
        'key_species', 'species_of_concern', 'invasive_species',
        'biological_zones', 'ecosystem_services', 'cultural_importance',

        // 6. Conservation and Restoration Efforts
        'has_conservation_projects', 'conservation_details', 'conservation_challenges',

        // 7. Geographic and Mapping Information
        'gps_points', 'river_map', 'photographs',

        // 8. Historical and Cultural Data
        'historical_importance', 'major_floods', 'indigenous_peoples',
        'traditional_knowledge', 'river_use_changes', 'planned_threats',

        // 9. Attachments and Supporting Documentation
        'research_reports', 'policy_documents', 'biodiversity_assessments',
        'community_agreements', 'satellite_images', 'historical_documents',
        'genetic_studies', 'water_quality_monitoring',

        // 10. Future Vision
        'vision_2030', 'anticipated_challenges', 'suggested_actions',

        // 11. Declaration
        'declaration_agreed', 'official_signature', 'representative_name',
        'declaration_date', 'organization_stamp',
    ];
}
