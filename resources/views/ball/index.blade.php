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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ball</a></li>
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
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Ball List
                            <a href="{{ route('ball.add') }}" class='btn btn-sm btn-primary' style="float:right;">+ Add</a>
                        </h4>
                        <p class="card-title-desc"></p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Volume</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($balls)
                                    @foreach ($balls as $ball)
                                        <tr>
                                            <td>#</td>
                                            <td>{{ $ball->name }}</td>
                                            <td>{{ $ball->volume }}</td>
                                            <td>
                                                <a href="#" class="btn btn-primary">Update</a>
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
