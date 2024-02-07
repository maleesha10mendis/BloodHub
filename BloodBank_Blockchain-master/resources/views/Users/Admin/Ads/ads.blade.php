@extends('layouts.adminLayout')

@section('content')
<div class="container-fluid">

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add New Advertisement</h3>
        </div>


        <form action="{{ route('admin.storeAd') }}" id="advertisementForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputFile">Select Ad Post :</label>
                    <input type="file" id="imageInput" name="image">
                    <p id="imageValidationMessage" class="help-block"></p>
                    <p class="help-block">IMG Resolution : 1000px * 791px | Type : jpg.</p>
                </div>

                <!-- Image Preview -->
                <div id="imagePreview" style="display:none">
                    <img id="preview" style="max-width: 300px; max-height: 300px;">
                </div>
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-success">Publish</button>
            </div>
        </form>
    </div>



    @if ($images->count())
        @foreach ($images as $image)


            <div class="col-md-3">
                <div class="box box-danger box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Advertisement</h3>
                        <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        </div>

                    </div>

                    <div class="box-body" style="">
                        <img src="{{ asset($image->path) }}" alt="{{ $image->name }}" style="max-width: 300px; max-height: 300px; margin: 10px;">
                    </div>
                    <div class="box-footer text-center">
                        <form action="{{ route('images.destroy', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                </div>

            </div>
        @endforeach
    @else
    <div class="col-md-3">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Advertisement</h3>
                <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                </div>

            </div>

            <div class="box-body" style="">
                <p>No Ads Running.</p>
            </div>

        </div>

    </div>

    @endif



</div>
@endsection

@section('header')
Advertisements
@endsection

@push('specificJs')


<script>
     document.getElementById('imageInput').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const imagePreview = document.getElementById('imagePreview');
        const preview = document.getElementById('preview');
        const validationMessage = document.getElementById('imageValidationMessage');

        // Check if a file was selected
        if (file) {
            // Validate image type
            if (!file.type.match('image/jpeg')) {
                validationMessage.textContent = 'Please select a JPEG image.';
                event.target.value = ''; // Clear the file input
                return;
            }

            // Create an image object to check resolution
            const img = new Image();
            img.onload = function () {
                // Validate image resolution
                if (img.width === 1000 && img.height === 791) {
                    // Set the source of the preview image
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        preview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);

                    // Show the image preview div
                    imagePreview.style.display = 'block';
                    validationMessage.textContent = 'Image Selected Successfully';
                } else {
                    validationMessage.textContent = 'Please select an image with resolution 1000x791.';
                    event.target.value = ''; // Clear the file input
                    imagePreview.style.display = 'none'; // Hide the preview
                }
            };
            img.src = URL.createObjectURL(file);
        } else {
            // Hide the image preview div if no file is selected
            imagePreview.style.display = 'none';
            validationMessage.textContent = 'Image Selected Successfully';
        }
    });
</script>

@endpush
