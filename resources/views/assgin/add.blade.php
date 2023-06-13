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
                    <li class="breadcrumb-item"><a href="{{ route('balls.assgin.list') }}">Assgin Balls list</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Add</a></li>
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
                    <form action="{{ route('balls.assgin.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-4 col-lg-4">
                                <label for="example-text-input" class="col-form-label">Select Bucket</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="bucket">
                                        @if ($buckets)
                                        @foreach ($buckets as $bucket)
                                        <option value="{{ $bucket->id }}"> {{ $bucket->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('bucket') <span style="color:red;">{{ $message }}</span> @enderror
                                </div>

                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="example-text-input" class="col-form-label">Select Ball</label>
                                <div class="col-md-10">
                                    <select class="form-control" name="ball">
                                        @if ($balls)
                                        @foreach ($balls as $ball)
                                        <option value="{{ $ball->id }}"> {{ $ball->name }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    @error('ball') <span style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <label for="example-text-input" class="col-form-label">Number Of Balls</label>
                                <div class="col-md-10">
                                    <input class="form-control" name="number_of_balls" type="number" value=""
                                        id="example-text-input" placeholder="10">
                                    @error('number_of_balls') <span style="color:red;">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary mt-5" type="submit">Add Balls To Bucket</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
@endsection

