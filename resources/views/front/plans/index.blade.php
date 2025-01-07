@extends('layouts.simple')

@section('content')
    <div class="content content-boxed content-full overflow-hidden">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="block block-rounded">
                    <div class="table-responsive">
                        <table class="table table-borderless table-hover table-vcenter text-center mb-0">
                            <thead class="table-dark text-uppercase fs-sm">
                                <tr>
                                    <th class="py-3" style="width: 180px;"></th>
                                    <th class="py-3">Free</th>
                                    <th class="py-3 bg-primary">
                                        <i class="fa fa-thumbs-up me-1"></i> Professional
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-body-light">
                                    <td></td>
                                    <td class="py-4">
                                        <div class="h1 fw-bold mb-2">$O</div>
                                        <div class="h6 text-muted mb-0">Life Time Free</div>
                                    </td>
                                    <td class="py-4">
                                        <div class="h1 fw-bold mb-2">$29</div>
                                        <div class="h6 text-muted mb-0">per anum</div>
                                    </td>

                                </tr>
                                <tr>
                                    <td class="fw-semibold text-start">Projects</td>
                                    <td>2</td>
                                    <td>Unlimited</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-start">Storage</td>
                                    <td>10GB</td>
                                    <td>Unlimited</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-start">Clients</td>
                                    <td>15</td>
                                    <td>Unlimited</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-start">Support</td>
                                    <td>Email</td>
                                    <td>FULL</td>
                                </tr>
                                <tr>
                                    <td class="fw-semibold text-start">Customizations</td>
                                    <td>
                                        <i class="fa fa-times fa-fw text-danger"></i>
                                    </td>
                                    <td>
                                        <i class="fa fa-check fa-fw text-success"></i>
                                    </td>
                                </tr>
                                <tr class="bg-body-light">
                                    <td></td>
                                    <td>

                                        <button type="button" class="btn btn-sm rounded-pill btn-secondary px-4">No Sign Up Required</button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn rounded-pill btn-primary px-4">Sign Up</button>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
