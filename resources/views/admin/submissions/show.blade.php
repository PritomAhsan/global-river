@extends('layouts.master')

@section('content')
<div class="card">
        <div class="card-header">
            <div class="float-start">
                River Submissions
            </div>
        </div>
        <div class="card-body">
            <h2>Submission Details: {{ $submission->river_name }}</h2>

            <ul class="list-group">
                <li class="list-group-item"><strong>Country:</strong> {{ $submission->country_name }}</li>
                <li class="list-group-item"><strong>Organization:</strong> {{ $submission->organization_name }}</li>
                <li class="list-group-item"><strong>Contact:</strong> {{ $submission->contact_person }} ({{ $submission->contact_email }})</li>
                <li class="list-group-item"><strong>River Description:</strong> {{ $submission->river_description }}</li>
                <li class="list-group-item"><strong>Health Status:</strong> {{ $submission->health_status }}</li>
                <li class="list-group-item"><strong>Conservation Projects:</strong> {{ $submission->has_conservation_projects ? 'Yes' : 'No' }}</li>
                <li class="list-group-item"><strong>Submitted At:</strong> {{ $submission->created_at->toDayDateTimeString() }}</li>
            </ul>
        </div>
</div>

@endsection
