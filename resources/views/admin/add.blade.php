@extends('layouts.admin')



@section('title')
Add Product
@endsection
@section('content')


<form class="form-horizontal" action="/add-product" method="POST" enctype="multipart/form-data">
    {{-- {{ csrf_field() }} --}}
    @csrf

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="product_id">Product Name</label>
        <div class="col-md-4">
            @csrf
            <input id="product_id" name="name" class="form-control input-md" required="" type="text">
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-4 control-label" for="product_categorie">Product Category</label>
        <div class="col-md-4">
            @csrf
            <select id="product_categorie" name="categorie" class="form-control">
                @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                @endforeach

            </select>
        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="product_name">Product Price</label>
        <div class="col-md-4">
            @csrf
            <input id="product_name" name="price" class="form-control input-md" required="" type="text">

        </div>
    </div>

    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="product_description">Product Description</label>
        <div class="col-md-4">
            @csrf
            <textarea class="form-control" id="product_description" name="description"></textarea>
        </div>
    </div>

    <!-- Select Basic -->


    <!-- Text input-->
    <div class="form-group">
        <label class="col-md-4 control-label" for="product_description">Product Information</label>
        <div class="col-md-4">
            @csrf
            <textarea class="form-control" id="product_description" name="information"></textarea>
        </div>
    </div>

    <div class="row">
        <div class="file-upload">
            <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Change
                Image</button>
            <div class="image-upload-wrap">
                @csrf
                <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*"
                    name="picture" />
                <div class="drag-text">
                    <h3>Drag and drop an Image</h3>
                </div>
            </div>
            <div class="file-upload-content">
                <img class="file-upload-image" src="#" alt="your image" />
                <div class="image-title-wrap">
                    <button type="button" onclick="removeUpload()" class="remove-image">Remove
                        <span class="image-title">Uploaded Image</span></button>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <div class="form-group">
        <div class="wer">
            <div class="row">
                <div class="col-sm-12">
                    @csrf
                    <button type="submit" class="btn btn-success" style="width: 150px;font-size: x-large;">Save</button>
                </div>
            </div>
        </div>
    </div>



    <br>
    <br>
    <br>





</form>

<script class="jsbin" src="bootstrap/jq/jquery.min.js"></script>

<script>
    function readURL(input) {
if (input.files && input.files[0]) {

var reader = new FileReader();

reader.onload = function(e) {
$('.image-upload-wrap').hide();

$('.file-upload-image').attr('src', e.target.result);
$('.file-upload-content').show();

$('.image-title').html(input.files[0].name);
};

reader.readAsDataURL(input.files[0]);

} else {
removeUpload();
}
}

function removeUpload() {
$('.file-upload-input').replaceWith($('.file-upload-input').clone());
$('.file-upload-content').hide();
$('.image-upload-wrap').show();
}
$('.image-upload-wrap').bind('dragover', function () {
$('.image-upload-wrap').addClass('image-dropping');
});
$('.image-upload-wrap').bind('dragleave', function () {
$('.image-upload-wrap').removeClass('image-dropping');
});
</script>
@endsection



@section('style')
<style>
    .wer {
        display: flex;
        justify-content: space-around;
        padding-left: auto;
        padding-right: auto;
    }

    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
        background-color: #e2e8f0;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }


    body {
        font-family: sans-serif;
        background-color: #eeeeee;
    }

    .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-btn {
        width: 100%;
        margin: 0;
        color: #fff;
        background: #1FB264;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #15824B;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .file-upload-btn:hover {
        background: #1AA059;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .file-upload-btn:active {
        border: 0;
        transition: all .2s ease;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .image-upload-wrap {
        margin-top: 20px;
        border: 4px dashed #1FB264;
        position: relative;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #1FB264;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }
</style>
@endsection
