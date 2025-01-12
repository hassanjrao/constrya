@extends('layouts.backend')

@php
    $addEdit = isset($calculator) ? 'Edit' : 'Add';
    $addUpdate = isset($calculator) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Blog')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Blogs</h3>

                <a href="{{ route('admin.blogs.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">
                <form action="{{ route('admin.blogs.update', $calculator->id) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">




                        <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                            <?php
                            $value = old('description', $calculator ? $calculator->description : null);

                            ?>
                            <label class="form-label" for="label">Blog <span class="text-danger">*</span></label>
                            <textarea  class="form-control" id="editor" name="description" placeholder="Enter Description">{{ $value }}</textarea>
                            @error('description')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>






                        <div class="d-flex justify-content-end mt-4">

                            <button type="submit" id="submitBtn"
                                class="btn btn-primary  border">{{ $addUpdate }}</button>

                        </div>

                    </div>


                </form>


            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
    <script src="{{ asset('js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor.create(document.querySelector('#editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('ckeditor.upload') }}'
                },
                toolbar: ['bold', 'italic', 'link', 'uploadImage', 'blockQuote', 'undo', 'redo'],
                image: {
                    toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side']
                }
            }).then(editor => {
                editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
                    return new CustomUploadAdapter(loader);
                };
            }).catch(error => {
                console.error('Error initializing CKEditor:', error);
            });

            // Custom Upload Adapter for CSRF Token
            class CustomUploadAdapter {
                constructor(loader) {
                    this.loader = loader;
                }

                upload() {
                    return this.loader.file
                        .then(file => new Promise((resolve, reject) => {
                            const data = new FormData();
                            data.append('upload', file);
                            data.append('_token', '{{ csrf_token() }}'); // Add CSRF token

                            fetch('{{ route('ckeditor.upload') }}', {
                                    method: 'POST',
                                    body: data
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data && data.url) {
                                        resolve({
                                            default: data.url
                                        });
                                    } else {
                                        reject(data.error || 'File upload failed.');
                                    }
                                })
                                .catch(error => {
                                    reject(error.message || 'File upload error.');
                                });
                        }));
                }

                abort() {
                    // Handle abort if necessary
                }
            }


        });
    </script>



@endsection
