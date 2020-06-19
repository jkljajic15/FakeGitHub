<form action="/upload-file/{{$repository->id}}" method="post" enctype="multipart/form-data">
    @csrf
{{--    <div class="custom-file p-5 ">--}}
{{--        <input type="file" class="custom-file-input" id="customFile">--}}
{{--        <label class="custom-file-label" for="customFile">Choose file</label>--}}
{{--    </div>--}}
{{--    <div>--}}

{{--    </div>--}}
    <input type="file" name="file" id="">
    <button class="btn btn-primary mx-1" type="submit">Upload</button>
</form>
