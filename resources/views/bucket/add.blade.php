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
                        <li class="breadcrumb-item"><a href="{{ route('bucket.list') }}">list</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Add</a></li>
                        <li class="breadcrumb-item active">Bucket</li>
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
                        <form action="{{ route('bucket.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 col-lg-4">
                                    <label for="example-text-input" class="col-form-label">Name</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="bucket_name" type="text" value="" id="example-text-input" placeholder="Bucket Name" >
                                        @error('bucket_name') <span style="color:red;">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <label for="example-text-input" class="col-form-label">Volume (In inches)</label>
                                    <div class="col-md-10">
                                        <input class="form-control" name="bucket_volume" type="number" value="" id="example-text-input" placeholder="100" >
                                        @error('bucket_volume') <span style="color:red;">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary mt-5" type="submit">Add New Bucket</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
@endsection