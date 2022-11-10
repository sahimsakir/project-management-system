@extends('layouts.main')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard/Profile</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('project.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="project_name">Project Name</label>
                            <input type="text" class="form-control" name="project_name"
                                placeholder="Enter a Project Name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="status">Select Status</label>
                        <select class="custom-select" name="status">
                            <option selected>Open this select menu</option>
                            @foreach ($statuses as $statuses)
                                <option value="{{ $statuses->id }}">{{ $statuses->status_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="workshop">Workshop Name</label>
                            <select class="custom-select" name="workshop">
                                <option selected>Open this select menu</option>
                                @foreach ($workshops as $workshops)
                                    <option value="{{ $workshops->id }}">{{ $workshops->workshop_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="project_name">Project Access</label>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>User</th>
                                        <th>Select</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $k => $users)
                                        <tr>
                                            <td>{{ ++$k }}</td>
                                            <td>{{ $users->username }}</td>
                                            <td><input type="checkbox" name="user_id[]" value="{{ $users->id }}"></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
