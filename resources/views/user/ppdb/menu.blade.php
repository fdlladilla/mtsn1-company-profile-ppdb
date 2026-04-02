@extends('layouts.user')

@section('title','PPDB Menu')

@section('content')

<section class="ppdb-section">
    <div class="container">
        <h2 class="ppdb-title">
            Penerimaan Peserta Didik Baru
        </h2>

        <div class="row justify-content-center g-5">
            <div class="col-md-4">
                <div class="ppdb-card h-100">
                    <h4>Register Peserta</h4>
                    <p>Buat akun PPDB</p>

                    <a href="{{ route('ppdb.register') }}" class="ppdb-btn">
                        Register
                    </a>

                </div>
            </div>

            <div class="col-md-4">
                <div class="ppdb-card h-100">
                    <h4>Login</h4>
                    <p>Masuk akun PPDB</p>

                    <a href="{{ route('ppdb.login') }}" class="ppdb-btn">
                        Login
                    </a>

                </div>
            </div>
        </div>
    </div>

</section>
@endsection