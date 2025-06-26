@extends('layouts.master')

@section('content')
<div class="card">
        <div class="card-header">
            <div class="float-start">
                River Submissions
                <a href="{{ route('admin.submissions.index') }}" class="btn btn-secondary mt-3">← Back to List</a>
            </div>

        </div>
        <div class="card mt-3 mb-4">
            <div class="card-header">1. Country and Organization Information</div>
            <div class="card-body">
                <p><strong>Country:</strong> {{ $submission->country_name }}</p>
                <p><strong>Organization:</strong> {{ $submission->organization_name }}</p>
                <p><strong>Website:</strong> <a href="{{ $submission->website_url }}" target="_blank">{{ $submission->website_url }}</a></p>
                <p><strong>Contact Person:</strong> {{ $submission->contact_person }} ({{ $submission->contact_role }})</p>
                <p><strong>Email:</strong> {{ $submission->contact_email }}</p>
                <p><strong>Phone:</strong> {{ $submission->contact_phone }}</p>
                <p><strong>Postal Address:</strong> {{ $submission->postal_address }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">2. River Overview</div>
            <div class="card-body">
                <p><strong>Name:</strong> {{ $submission->river_name }}</p>
                <p><strong>Alternative Names:</strong> {{ $submission->alternative_names }}</p>
                <p><strong>Description:</strong> {{ $submission->river_description }}</p>
                <p><strong>Length:</strong> {{ $submission->river_length }}</p>
                <p><strong>Width/Depth:</strong> {{ $submission->average_width_depth }}</p>
                <p><strong>Source:</strong> {{ $submission->river_source_location }}</p>
                <p><strong>Mouth:</strong> {{ $submission->river_mouth_location }}</p>
                <p><strong>Elevation:</strong> {{ $submission->elevation_at_source }}</p>
                <p><strong>Countries Traversed:</strong> {{ $submission->countries_traversed }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">3. River Health and Threats</div>
            <div class="card-body">
                <p><strong>Status:</strong> {{ $submission->health_status }}</p>
                <p><strong>Major Threats:</strong> {{ $submission->major_threats }}</p>
                <p><strong>Future Risks:</strong> {{ $submission->future_risks }}</p>
                <p><strong>Water Quality:</strong> {{ $submission->water_quality_data }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">4. Legal Protection and Management</div>
            <div class="card-body">
                <p><strong>Protected by Law:</strong> {{ $submission->is_protected_by_law ? 'Yes' : 'No' }}</p>
                <p><strong>Types:</strong> {{ $submission->protection_types }}</p>
                <p><strong>Framework:</strong> {{ $submission->legal_framework }}</p>
                <p><strong>Year:</strong> {{ $submission->year_protected }}</p>
                <p><strong>Managing Authority:</strong> {{ $submission->managing_authority }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">5. Biodiversity and Ecosystem Services</div>
            <div class="card-body">
                <p><strong>Key Species:</strong> {{ $submission->key_species }}</p>
                <p><strong>Special Concern Species:</strong> {{ $submission->species_of_concern }}</p>
                <p><strong>Invasive Species:</strong> {{ $submission->invasive_species }}</p>
                <p><strong>Biological Zones:</strong> {{ $submission->biological_zones }}</p>
                <p><strong>Ecosystem Services:</strong> {{ $submission->ecosystem_services }}</p>
                <p><strong>Cultural Importance:</strong> {{ $submission->cultural_importance }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">6. Conservation and Restoration</div>
            <div class="card-body">
                <p><strong>Active Projects:</strong> {{ $submission->has_conservation_projects ? 'Yes' : 'No' }}</p>
                <p><strong>Details:</strong> {{ $submission->conservation_details }}</p>
                <p><strong>Challenges:</strong> {{ $submission->conservation_challenges }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">7. Mapping Information</div>
            <div class="card-body">
                <p><strong>GPS Points:</strong> {{ $submission->gps_points }}</p>
                <p><strong>River Map:</strong>
                    @if($submission->river_map)
                        <a href="{{ Storage::url($submission->river_map) }}" target="_blank">View Map</a>
                    @else
                        Not uploaded
                    @endif
                </p>
                <p><strong>Photographs:</strong>
                    @if($submission->photographs)
                        @foreach(json_decode($submission->photographs, true) as $photo)
                            <div><a href="{{ Storage::url($photo) }}" target="_blank">Photo</a></div>
                        @endforeach
                    @else
                        None
                    @endif
                </p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">8. Historical and Cultural Data</div>
            <div class="card-body">
                <p><strong>Historical Importance:</strong> {{ $submission->historical_importance }}</p>
                <p><strong>Flood Events:</strong> {{ $submission->major_floods }}</p>
                <p><strong>Indigenous Peoples:</strong> {{ $submission->indigenous_peoples }}</p>
                <p><strong>Traditional Knowledge:</strong> {{ $submission->traditional_knowledge }}</p>
                <p><strong>River Use Changes:</strong> {{ $submission->river_use_changes }}</p>
                <p><strong>Planned Threats:</strong> {{ $submission->planned_threats }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">9. Supporting Documentation</div>
            <div class="card-body">
                <p><strong>Research Reports:</strong> {{ $submission->research_reports }}</p>
                <p><strong>Policy Documents:</strong> {{ $submission->policy_documents }}</p>
                <p><strong>Biodiversity Assessments:</strong> {{ $submission->biodiversity_assessments }}</p>
                <p><strong>Community Agreements:</strong> {{ $submission->community_agreements }}</p>
                <p><strong>Satellite Images:</strong> {{ $submission->satellite_images }}</p>
                <p><strong>Historical Documents:</strong> {{ $submission->historical_documents }}</p>
                <p><strong>Genetic Studies:</strong> {{ $submission->genetic_studies }}</p>
                <p><strong>Water Monitoring:</strong> {{ $submission->water_quality_monitoring }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">10. Future Vision</div>
            <div class="card-body">
                <p><strong>Vision 2030:</strong> {{ $submission->vision_2030 }}</p>
                <p><strong>Challenges:</strong> {{ $submission->anticipated_challenges }}</p>
                <p><strong>Suggested Actions:</strong> {{ $submission->suggested_actions }}</p>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">11. Declaration</div>
            <div class="card-body">
                <p><strong>Declaration Agreed:</strong> {{ $submission->declaration_agreed ? 'Yes' : 'No' }}</p>
                <p><strong>Signature:</strong> {{ $submission->official_signature }}</p>
                <p><strong>Representative Name:</strong> {{ $submission->representative_name }}</p>
                <p><strong>Date:</strong> {{ $submission->declaration_date }}</p>
                <p><strong>Organization Stamp:</strong> {{ $submission->organization_stamp }}</p>
            </div>
        </div>
</div>

@endsection
