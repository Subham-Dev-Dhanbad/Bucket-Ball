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
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
     
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-xl-4 col-sm-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-cube-outline float-end"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Buckets</h6>
                        <h2 class="mb-4 text-white">{{ $noBucket }}</h2>
                        {{-- <span class="badge bg-info"> +11% </span> <span class="ms-2">From previous
                            period</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-buffer float-end"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Balls</h6>
                        <h2 class="mb-4 text-white">{{ $noBall }}</h2>
                        {{-- <span class="badge bg-danger"> -29% </span> <span class="ms-2">From previous
                            period</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-tag-text-outline float-end"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16 text-white">Palcement</h6>
                        <h2 class="mb-4 text-white">{{ $noTrack }}</h2>
                        {{-- <span class="badge bg-warning"> 0% </span> <span class="ms-2">From previous
                            period</span> --}}
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <!-- end row -->
</div>
@endsection
