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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Assgin Balls</a></li>
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

                        <h4 class="card-title">Assgin List
                            <a href="{{ route('balls.assgin.add') }}" class='btn btn-sm btn-primary' style="float:right;">+ Assgin Balls To Bucket</a>
                        </h4>
                        <p class="card-title-desc"></p>

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Bucket Name</th>
                                    <th>Ball Name</th>
                                    <th>No. Of Ball Attempted</th>
                                    <th>No. Of Ball Placed</th>
                                    <th>Vloume</th>
                                    <th>Is Partial</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($list)
                                    @foreach ($list as $record)
                                        <tr>
                                            <td>#</td>
                                            <td>{{ App\Models\bucket::find($record->bucket_id)->name }}</td>
                                            <td> {{ $record->ball }}</td>
                                            <td> {{ $record->attemped_balls }}</td>
                                            <td>{{ $record->no_balls }}</td>
                                            <td>{{ $record->total_volume }}</td>
                                            <td>
                                                @if ($record->attemped_balls != $record->no_balls)
                                                    {{ "Yes" }}
                                                @else
                                                    {{ "No" }}
                                                @endif
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
