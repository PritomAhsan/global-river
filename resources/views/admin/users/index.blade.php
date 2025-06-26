@extends('layouts.master')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="float-start">
                User List
            </div>
            @can('permission_create')
                <div class="float-end">
                    <a class="btn btn-success btn-sm text-white" href="{{ route("admin.users.create") }}">
                        Add User
                    </a>
                </div>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            ID
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        {{-- <th>
                            Roles
                        </th> --}}
                        <th>
                            Status
                        </th>
                        <th>
                            Register At
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>
                                {{ $user->id ?? '' }}
                            </td>
                            <td>
                                {{ $user->name ?? '' }}
                            </td>
                            <td>
                                {{ $user->email ?? '' }}
                            </td>
                            {{-- <td>
                                @foreach($user->getRoleNames() as $key => $item)
                                    <span class="badge bg-info">{{ $item }}</span>
                                @endforeach
                            </td> --}}
                            <td>
                                @if($user->status == 1)
                                    <span class="badge bg-success">Admin</span>
                                @elseif($user->status == 2)
                                    <span class="badge bg-warning">Pending</span>
                                @elseif($user->status == 3)
                                    <span class="badge bg-danger">Approved</span>
                                @endif
                            </td>
                            <td>
                                {{ $user->created_at->format('Y-m-d') ?? '' }}
                            </td>
                            <td>
                                @if($user->status == 2)
                                    <a href="{{ route('admin.user.approve', ['id' => $user->id, 'status' => 3]) }}" class="btn btn-sm btn-primary">Approve</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer clearfix">
            {{ $users->links() }}
        </div>
    </div>
@endsection
