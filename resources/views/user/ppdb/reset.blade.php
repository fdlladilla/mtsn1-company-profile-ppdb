@extends('layouts.user')

@section('title','Reset Password PPDB')

@section('content')

<section class="ppdb-section">
    <div class="container">
        <h1 class="ppdb-title">
            Penerimaan Peserta Didik Baru
        </h1>

        <div class="akun-form">
            <h5>Reset Password</h5>

            <form>
                <label class="fw-bold mt-2">Email<span class="text-danger">*</span></label>
                <input 
                    type="email" 
                    placeholder="Masukan Email"
                    class="form-control"
                    required
                >

                <div class="text-end">
                    <button type="submit" class="btn-submit">
                        Reset
                    </button>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection