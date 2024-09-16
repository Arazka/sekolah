@extends('layouts.admin')

@section('title', '404 not found')
@section('main')
<div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- 404 Error Text -->
                <div class="text-center mt-5">
                    <div class="error mx-auto" data-text="404">404</div>
                    <p class="lead text-gray-800 mb-5">Maaf anda tidak punya akses :(</p>
                    {{-- <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p> --}}
                    {{-- <a href="{{ url('/admin/dashboard') }}">&larr; Kembali ke Dashboard</a> --}}
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
@endsection