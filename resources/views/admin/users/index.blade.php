@extends('layouts.backend')

@section('page-title', 'Users')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Users
                </h3>


                {{-- <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add</a> --}}



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Subscribed</th>
                                <th>Subscribed At</th>
                                <th>Profession</th>
                                <th>Plan</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($users as $ind => $user)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->email }}</td>

                                    <td>
                                        {{-- switch button --}}
                                        <form id="formsub-{{ $user->id }}" method="POST"
                                            action="{{ route('admin.users.updateSubscription') }}">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox"
                                                name="subscribed_at"
                                                    id="{{ 'user_sub' . $user->id }}" 
                                                    onchange="updateSubscription({{ $user->id }})"
                                                    {{ $user->subscribed_at ? 'checked' : '' }}>
                                                <label class="form-check-label"
                                                    for="{{ 'user_sub' . $user->id }}">Subscribed</label>
                                            </div>
                                        </form>
                                    </td>
                                    <td>{{ $user->subscribed_at }}</td>

                                    <td>{{ $user->profession }}</td>
                                    <td>
                                        {{ $user->plan->name }}
                                    </td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->updated_at }}</td>

                                    <td>
                                        <form id="form-{{ $user->id }}"
                                            action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $user->id }})"
                                                class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
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

    <script>
        function updateSubscription(id) {

            var form = document.getElementById('formsub-' + id);
            form.submit();

        }
    </script>

@endsection
