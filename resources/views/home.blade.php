@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-dark text-white">
                    <h4 class="text-center font-semibold">กระทู้บทความต่างๆ</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-center mb-3">
                        <a href="/" class="btn btn-info mx-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">หน้าแรก</a>
                        <a href="/create" class="btn btn-primary mx-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">เขียนบทความ</a>
                        <a href="/blog" class="btn btn-secondary mx-2 transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110">บทความทั้งหมด</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="hidden-md-up">
        </div>
    </div>
</div>

@endsection
