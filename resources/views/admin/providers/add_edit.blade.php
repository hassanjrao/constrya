@extends('layouts.backend')

@php
    $addEdit = isset($provider) ? 'Edit' : 'Add';
    $addUpdate = isset($provider) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Provider')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Provider</h3>

                <a href="{{ route('admin.providers.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($provider)
                    <form action="{{ route('admin.providers.update', $provider->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.providers.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('title', $provider ? $provider->title : null);

                                ?>
                                <label class="form-label" for="label"> Title <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="title" name="title" placeholder="Enter title">
                                @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('email', $provider ? $provider->email : null);

                                ?>
                                <label class="form-label" for="label"> Email <span class="text-danger">*</span></label>
                                <input required type="email" value="{{ $value }}" class="form-control"
                                    id="email" name="email" placeholder="Enter email">
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                        </div>

                    </div>



                    <div class="d-flex justify-content-end mt-4">

                        <button type="submit" id="submitBtn" class="btn btn-primary  border">{{ $addUpdate }}</button>

                    </div>

                </div>


                </form>


            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
