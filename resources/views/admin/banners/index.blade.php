@extends('layouts.backend')

@section('page-title', 'Banners')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Banners
                </h3>


                <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($banners as $ind => $banner)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>
                                        <img src="{{ $banner->image_url }}" height="100" width="250"
                                        alt="" />
                                    </td>

                                    <td>{{ $banner->created_at }}</td>
                                    <td>{{ $banner->updated_at }}</td>

                                    <td class="">

                                        <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $banner->id }}"
                                            action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $banner->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>








    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection
