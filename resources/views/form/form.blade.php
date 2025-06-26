<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home | Global River Conservation Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('css/style.css')}}" />
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark px-3">
  <a class="navbar-brand" href="#">🌍 Global Rivers</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <div class="navbar-nav ms-auto">
      <a class="nav-link" href="index.html">Home</a>
      <a class="nav-link" href="about.html">About</a>
      <a class="nav-link" href="map.html">Explore Map</a>
      <a class="nav-link" href="resources.html">Resources</a>
      <a class="nav-link" href="submit.html">Submit</a>
    </div>
  </div>
</nav>

<div class="container bg-white">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row d-flex justify-content-center text-center mt-3 mb-3">
        <h2>Global River Conservation Dashboard</h2>
        <h5><small>River Data Submission Form (For Approved Countries)</small></h5>
    </div>
    <div class="row">
        <form action="{{ route('submission-form-action') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- 1. Country and Organization Information -->
            <div class="mb-2">
                <label for="country_name">Country Name</label>
                <input type="text" id="country_name" name="country_name" class="form-control @error('country_name') is-invalid @enderror" value="{{ old('country_name') }}" required>
                @error('country_name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>

            <div class="mb-2">
                <label for="organization_name">Submitting Organization / Government Agency Name</label>
                <input type="text" id="organization_name" name="organization_name" class="form-control @error('organization_name') is-invalid @enderror" value="{{ old('organization_name') }}" required>
                @error('organization_name') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>

            <div class="mb-2">
                <label for="website_url">Official Website URL (If available)</label>
                <input type="text" id="website_url" name="website_url" class="form-control @error('website_url') is-invalid @enderror" value="{{ old('website_url') }}">
                @error('website_url') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>

            <div class="mb-2">
                <label for="contact_person">Primary Contact Person (Full Name)</label>
                <input type="text" id="contact_person" name="contact_person" class="form-control @error('contact_person') is-invalid @enderror" value="{{ old('contact_person') }}" required>
                @error('contact_person') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>

            <div class="mb-2">
                <label for="contact_role">Title/Role</label>
                <input type="text" id="contact_role" name="contact_role" class="form-control @error('contact_role') is-invalid @enderror" value="{{ old('contact_role') }}" required>
                @error('contact_role') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>

            <div class="mb-2">
                <label for="contact_email">Official Email Address</label>
                <input type="text" id="contact_email" name="contact_email" class="form-control @error('contact_email') is-invalid @enderror" value="{{ old('contact_email') }}" required>
                @error('contact_email') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>

            <div class="mb-2">
                <label for="contact_phone">Phone Number (with country code)</label>
                <input type="text" id="contact_phone" name="contact_phone" class="form-control @error('contact_phone') is-invalid @enderror" value="{{ old('contact_phone') }}">
                @error('contact_phone') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>

            <div class="mb-2">
                <label for="postal_address">Official Postal Address</label>
                <textarea id="postal_address" name="postal_address" class="form-control @error('postal_address') is-invalid @enderror">{{ old('postal_address') }}</textarea>
                @error('postal_address') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>

            <!-- 2. River Overview -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">2. River Overview</h5>
            </div>

            <div class="mb-2">
                <label for="river_name">River Name</label>
                <input type="text" id="river_name" name="river_name" class="form-control" value="{{ old('river_name') }}" required>
            </div>
            <div class="mb-2">
                <label for="alternative_names">Alternative Names (local/traditional)</label>
                <input type="text" id="alternative_names" name="alternative_names" class="form-control" value="{{ old('alternative_names') }}">
            </div>
            <div class="mb-2">
                <label for="river_description">Brief River Description (Max 300 words)</label>
                <textarea id="river_description" name="river_description" class="form-control" required>{{ old('river_description') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="river_length">Total River Length (km/miles)</label>
                <input type="text" id="river_length" name="river_length" class="form-control" value="{{ old('river_length') }}" required>
            </div>
            <div class="mb-2">
                <label for="average_width_depth">Average Width and Depth</label>
                <input type="text" id="average_width_depth" name="average_width_depth" class="form-control" value="{{ old('average_width_depth') }}">
            </div>
            <div class="mb-2">
                <label for="river_source_location">River Source Location (City/Region/Coordinates)</label>
                <input type="text" id="river_source_location" name="river_source_location" class="form-control" value="{{ old('river_source_location') }}" required>
            </div>
            <div class="mb-2">
                <label for="river_mouth_location">River Mouth Location (City/Region/Coordinates)</label>
                <input type="text" id="river_mouth_location" name="river_mouth_location" class="form-control" value="{{ old('river_mouth_location') }}" required>
            </div>
            <div class="mb-2">
                <label for="elevation_at_source">Elevation at Source (meters)</label>
                <input type="text" id="elevation_at_source" name="elevation_at_source" class="form-control" value="{{ old('elevation_at_source') }}">
            </div>
            <div class="mb-2">
                <label for="countries_traversed">Countries Traversed</label>
                <input type="text" id="countries_traversed" name="countries_traversed" class="form-control" value="{{ old('countries_traversed') }}" required>
            </div>

            <!-- 3. River Health and Threats -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">3. River Health and Threats</h5>
            </div>

            <div class="mb-2">
                <label for="health_status">Current Health Status</label>
                <select id="health_status" name="health_status" class="form-control @error('health_status') is-invalid @enderror" required>
                    <option value="">Select Status</option>
                    <option value="Healthy" {{ old('health_status') == 'Healthy' ? 'selected' : '' }}>Healthy</option>
                    <option value="Threatened" {{ old('health_status') == 'Threatened' ? 'selected' : '' }}>Threatened</option>
                    <option value="Endangered" {{ old('health_status') == 'Endangered' ? 'selected' : '' }}>Endangered</option>
                    <option value="Critical" {{ old('health_status') == 'Critical' ? 'selected' : '' }}>Critical</option>
                </select>
                @error('health_status') <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span> @enderror
            </div>

            <div class="mb-2">
                <label for="major_threats">Major Threats</label>
                <input type="text" id="major_threats" name="major_threats" class="form-control" value="{{ old('major_threats') }}" required>
            </div>
            <div class="mb-2">
                <label for="future_risks">Emerging/Future Risks</label>
                <textarea id="future_risks" name="future_risks" class="form-control">{{ old('future_risks') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="water_quality_data">Water Quality Data</label>
                <input type="text" id="water_quality_data" name="water_quality_data" class="form-control" value="{{ old('water_quality_data') }}">
            </div>

            <!-- 4. Legal Protection and Management -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">4. Legal Protection and Management</h5>
            </div>

            <div class="mb-2">
                <label for="is_protected_by_law">Is the River Protected by Law/Agreement?</label>
                <select id="is_protected_by_law" name="is_protected_by_law" class="form-control">
                    <option value="1" {{ old('is_protected_by_law') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('is_protected_by_law') == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="protection_types">Type of Protection</label>
                <input type="text" id="protection_types" name="protection_types" class="form-control" value="{{ old('protection_types') }}">
            </div>
            <div class="mb-2">
                <label for="legal_framework">Name of Legal Framework/Policy</label>
                <input type="text" id="legal_framework" name="legal_framework" class="form-control" value="{{ old('legal_framework') }}">
            </div>
            <div class="mb-2">
                <label for="year_protected">Year Protection Designated</label>
                <input type="text" id="year_protected" name="year_protected" class="form-control" value="{{ old('year_protected') }}">
            </div>
            <div class="mb-2">
                <label for="managing_authority">Managing Authority</label>
                <input type="text" id="managing_authority" name="managing_authority" class="form-control" value="{{ old('managing_authority') }}">
            </div>

            <!-- 5. Biodiversity, Ecosystem Services, and Zoning -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">5. Biodiversity, Ecosystem Services, and Zoning</h5>
            </div>

            <div class="mb-2">
                <label for="key_species">Key Species (scientific names if possible)</label>
                <textarea id="key_species" name="key_species" class="form-control">{{ old('key_species') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="species_of_concern">Species of Special Concern (Endangered, Threatened)</label>
                <textarea id="species_of_concern" name="species_of_concern" class="form-control">{{ old('species_of_concern') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="invasive_species">Invasive Species Present</label>
                <textarea id="invasive_species" name="invasive_species" class="form-control">{{ old('invasive_species') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="biological_zones">Important Biological Zones (Spawning Areas, Migratory Routes, Wetlands, etc.)</label>
                <textarea id="biological_zones" name="biological_zones" class="form-control">{{ old('biological_zones') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="ecosystem_services">Major Ecosystem Services Provided</label>
                <textarea id="ecosystem_services" name="ecosystem_services" class="form-control">{{ old('ecosystem_services') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="cultural_importance">Cultural/Religious/Historical Importance</label>
                <textarea id="cultural_importance" name="cultural_importance" class="form-control">{{ old('cultural_importance') }}</textarea>
            </div>

            <!-- 6. Conservation and Restoration Efforts -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">6. Conservation and Restoration Efforts</h5>
            </div>

            <div class="mb-2">
                <label for="has_conservation_projects">Are there active conservation projects?</label>
                <select id="has_conservation_projects" name="has_conservation_projects" class="form-control">
                    <option value="1" {{ old('has_conservation_projects') == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('has_conservation_projects') == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="conservation_details">Project Details (Project Name(s), Lead Organizations/Partners, Start Year, Goals, Communities Involved)</label>
                <textarea id="conservation_details" name="conservation_details" class="form-control">{{ old('conservation_details') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="conservation_challenges">Challenges Faced During Conservation Efforts</label>
                <textarea id="conservation_challenges" name="conservation_challenges" class="form-control">{{ old('conservation_challenges') }}</textarea>
            </div>

            <!-- 7. Geographic and Mapping Information -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">7. Geographic and Mapping Information</h5>
            </div>

            <div class="mb-2">
                <label for="gps_points">Key GPS Points (Source, Mouth, Threat Zones, Protected Areas, Biodiversity Hotspots)</label>
                <input type="text" id="gps_points" name="gps_points" class="form-control" value="{{ old('gps_points') }}">
            </div>
            <div class="mb-2">
                <label for="river_map">Upload River Boundary Map (JPG/PNG/PDF/KML/SHP)</label>
                <input type="file" id="river_map" name="river_map" class="form-control">
            </div>
            <div class="mb-2">
                <label for="photographs">Upload Photographs (Max 5 images)</label>
                <input type="file" id="photographs" name="photographs[]" class="form-control" multiple>
            </div>

            <!-- 8. Historical and Cultural Data -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">8. Historical and Cultural Data</h5>
            </div>

            <div class="mb-2">
                <label for="historical_importance">Historical Importance of the River</label>
                <textarea id="historical_importance" name="historical_importance" class="form-control">{{ old('historical_importance') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="major_floods">Major Flood Events or Natural Disasters</label>
                <textarea id="major_floods" name="major_floods" class="form-control">{{ old('major_floods') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="indigenous_peoples">Indigenous Peoples Associated with the River</label>
                <textarea id="indigenous_peoples" name="indigenous_peoples" class="form-control">{{ old('indigenous_peoples') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="traditional_knowledge">Traditional/Oral Knowledge</label>
                <textarea id="traditional_knowledge" name="traditional_knowledge" class="form-control">{{ old('traditional_knowledge') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="river_use_changes">Changes in River Use Over Time</label>
                <textarea id="river_use_changes" name="river_use_changes" class="form-control">{{ old('river_use_changes') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="planned_threats">Planned Future Threats</label>
                <textarea id="planned_threats" name="planned_threats" class="form-control">{{ old('planned_threats') }}</textarea>
            </div>

            <!-- 9. Attachments and Supporting Documentation -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">9. Attachments and Supporting Documentation</h5>
            </div>

            <div class="mb-2">
                <label for="research_reports">Scientific Research Reports</label>
                <textarea id="research_reports" name="research_reports" class="form-control">{{ old('research_reports') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="policy_documents">Policy/Legal Documents</label>
                <textarea id="policy_documents" name="policy_documents" class="form-control">{{ old('policy_documents') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="biodiversity_assessments">Biodiversity Assessments</label>
                <textarea id="biodiversity_assessments" name="biodiversity_assessments" class="form-control">{{ old('biodiversity_assessments') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="community_agreements">Community Partnership Agreements</label>
                <textarea id="community_agreements" name="community_agreements" class="form-control">{{ old('community_agreements') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="satellite_images">Satellite Images</label>
                <textarea id="satellite_images" name="satellite_images" class="form-control">{{ old('satellite_images') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="historical_documents">Historical Maps/Documents</label>
                <textarea id="historical_documents" name="historical_documents" class="form-control">{{ old('historical_documents') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="genetic_studies">Genetic Studies on Species</label>
                <textarea id="genetic_studies" name="genetic_studies" class="form-control">{{ old('genetic_studies') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="water_quality_monitoring">Water Quality Monitoring Data</label>
                <textarea id="water_quality_monitoring" name="water_quality_monitoring" class="form-control">{{ old('water_quality_monitoring') }}</textarea>
            </div>

            <!-- 10. Future Vision -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">10. Future Vision</h5>
            </div>

            <div class="mb-2">
                <label for="vision_2030">Vision for the River by 2030</label>
                <textarea id="vision_2030" name="vision_2030" class="form-control">{{ old('vision_2030') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="anticipated_challenges">Anticipated Challenges</label>
                <textarea id="anticipated_challenges" name="anticipated_challenges" class="form-control">{{ old('anticipated_challenges') }}</textarea>
            </div>
            <div class="mb-2">
                <label for="suggested_actions">Suggested Conservation Actions</label>
                <textarea id="suggested_actions" name="suggested_actions" class="form-control">{{ old('suggested_actions') }}</textarea>
            </div>

            <!-- 11. Declaration and Signature -->
            <div class="label-text mt-4">
                <h5 class="text-primary fw-bold">11. Declaration and Signature</h5>
            </div>

            <div class="mb-2 form-check">
                <input type="checkbox" id="declaration_agreed" name="declaration_agreed" class="form-check-input" value="1" {{ old('declaration_agreed') ? 'checked' : '' }}>
                <label class="form-check-label" for="declaration_agreed">
                    I hereby declare that the information provided is accurate and true to the best of my knowledge. I consent to Global River Conservation Dashboard reviewing, verifying, and publishing this data.
                </label>
            </div>
            <div class="mb-2">
                <label for="official_signature">Official Representative Signature</label>
                <input type="text" id="official_signature" name="official_signature" class="form-control" value="{{ old('official_signature') }}">
            </div>
            <div class="mb-2">
                <label for="representative_name">Full Name</label>
                <input type="text" id="representative_name" name="representative_name" class="form-control" value="{{ old('representative_name') }}">
            </div>
            <div class="mb-2">
                <label for="declaration_date">Date</label>
                <input type="date" id="declaration_date" name="declaration_date" class="form-control" value="{{ old('declaration_date') }}">
            </div>
            <div class="mb-2">
                <label for="organization_stamp">Organization Stamp</label>
                <input type="text" id="organization_stamp" name="organization_stamp" class="form-control" value="{{ old('organization_stamp') }}">
            </div>

            <div class="mt-4 mb-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
  <p>© 2025 Global River Conservation Dashboard</p>
  <p><a href="contact.html" class="text-white">Contact Us</a> | <a href="privacy.html" class="text-white">Privacy Policy</a> | Accessibility</p>
</footer>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
