@extends('layouts.master')

@section('content')
<div class="card">
        <div class="card-header">
            <div class="float-start">
                River Submissions
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>River</th>
                            <th>Submitted By</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($submissions as $submission)
                        <tr>
                            <td>{{ $submission->country_name }}</td>
                            <td>{{ $submission->river_name }}</td>
                            <td>{{ $submission->contact_person }}</td>
                            <td>{{ $submission->contact_email }}</td>
                            <td>{{ $submission->created_at->format('Y-m-d') }}</td>
                            <td><a href="{{ route('admin.submissions.show', $submission->id) }}" class="btn btn-sm btn-info">View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            {{ $submissions->links() }}
        </div>
    </div>


@endsection
