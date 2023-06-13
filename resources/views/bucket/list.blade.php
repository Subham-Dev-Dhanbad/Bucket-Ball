@extends($layout)
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4>Dashboard</h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bucket</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">list</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>

        </div>
        <!-- end page title -->
        @if(session('success'))
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center text-success">
                {{ session('success') }}
            </h2>
        </div>
    </div>
    @endif

    @if(session('error'))
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h2 class="text-center text-danger">
                {{ session('error') }}
            </h2>
        </div>
    </div>
    @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Bucket List
                            <a href="{{ route('bucket.add') }}" class='btn btn-sm btn-primary' style="float:right;">+ Add</a>
                        </h4>
                        <p class="card-title-desc"></p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Empty Volume</th>
                                    <th>Occupied Balls</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if ($buckets)
                                    @foreach ($buckets as $bucket)
                                        <tr>
                                            <td>#</td>
                                            <td>{{ $bucket->name }}</td>
                                            <td>{{ $bucket->empty_volume }}</td>
                                            <td>{{ $bucket->filed_volume }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Update</a>
                                                <a href="{{ route('balls.assgin.list', $bucket->id) }}" class="btn btn-danger">Track</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
@endsection
