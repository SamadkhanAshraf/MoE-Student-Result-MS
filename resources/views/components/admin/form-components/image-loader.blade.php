<div class="row it" id="uploader">
    @if ($appendixes)
    @forelse ($appendixes as $appendixKey=> $appendix)
    <div class=" col-md-2 d-flex uploadDoc ">
        <div class="fileUpload  w-100 btn btn-outline-{{ $errors->has('appendex')?'danger':'primary' }} my-0 p-2 ">
            <img src="{{ asset($appendix->scan_path) }}" class="icon hei-80 w-100" style="object-fit: cover">
            <span class="upl f-12" id="upload">{{ __('keyword.upload-file') }}</span>
            <input type="file" class="upload up" id="up" onchange="readURL(this);" name="appendex[]" accept="image/png,image/svg,image/jpg,image/jpeg" />
            <input type="hidden" class="" name="oldAppendixs[]" value="{{ $appendix->scan_path }}">
        </div>
        <div class="d-flex">
            <a class="btn-remove btn btn-danger me-1 d-flex align-items-center"><i class="fa  mx-0  fa-times"></i></a>
        </div>
    </div>
    @empty
    <div class=" col-md-2 d-flex uploadDoc ">
        <div class="fileUpload  w-100 btn btn-outline-{{ $errors->has('appendex')?'danger':'primary' }} my-0 p-2 ">
            <img src="{{ asset('uploads/thumbnile.png') }}" class="icon hei-80 w-100" style="object-fit: cover">
            <span class="upl f-12" id="upload">{{ __('keyword.upload-file') }}</span>
            <input type="file" class="upload up" id="up" onchange="readURL(this);" name="appendex[]" accept="image/png,image/svg,image/jpg,image/jpeg" />
        </div>
        <div class="d-flex">
            <a class="btn-remove btn btn-danger me-1 d-flex align-items-center"><i class="fa  mx-0  fa-times"></i></a>
        </div>
    </div>
    @endforelse
    @else
    <div class=" col-md-2 d-flex uploadDoc ">
        <div class="fileUpload  w-100 btn btn-outline-{{ $errors->has('appendex')?'danger':'primary' }} my-0 p-2 ">
            <img src="{{ asset('uploads/thumbnile.png') }}" class="icon hei-80 w-100" style="object-fit: cover">
            <span class="upl f-12" id="upload">{{ __('keyword.upload-file') }}</span>
            <input type="file" class="upload up" id="up" onchange="readURL(this);" name="appendex[]" accept="image/png,image/svg,image/jpg,image/jpeg" />
        </div>
        <div class="d-flex">
            <a class="btn-remove btn btn-danger me-1 d-flex align-items-center"><i class="fa  mx-0  fa-times"></i></a>
        </div>
    </div>
    @endif

    <div class="row mb-3">
        <div class="col-md-2">
            <a class="btn btn-primary btn-new form-control text-center"><i class="fa mx-0 fa-plus ms-2"></i>{{ __('keyword.add-new-appendix') }}</a>
        </div>
    </div>
</div>


@section('image-loader')
<script>
    var fileTypes = ['pdf', 'docx', 'rtf', 'jpg', 'jpeg', 'png', 'txt']; //acceptable file types
    function readURL(input) {
        if (input.files && input.files[0]) {
            var extension = input.files[0].name.split('.').pop().toLowerCase(), //file extension from input file
                isSuccess = fileTypes.indexOf(extension) > -1; //is extension in acceptable types

            if (isSuccess) { //yes

                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).closest('.fileUpload').find(".icon").attr('src', e.target.result)
                }

                reader.readAsDataURL(input.files[0]);
            } else {

                $(input).closest('.uploadDoc').find(".docErr").fadeIn();
                setTimeout(function () {
                    $('.docErr').fadeOut('slow');
                }, 9000);
            }
        }
    }
    $(document).ready(function () {

        $(document).on('change', '.up', function () {
            var id = $(this).attr('id');
            var profilePicValue = $(this).val();
            var fileNameStart = profilePicValue.lastIndexOf('\\');
            profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0,
            20);
            if (profilePicValue != '') {
                $(this).closest('.fileUpload').find('.upl').html( profilePicValue);
            }
        });

        $(".btn-new").on('click', function () {
            $("#uploader").prepend(
                `<div class="col-md-2 d-flex uploadDoc">
                    <div class="fileUpload w-100 btn btn-outline-{{ $errors->has('appendex')?'danger':'primary' }}  my-0 p-2">
                        <img src="{{ asset('uploads/thumbnile.png') }}" class="icon hei-80 w-100 " style="object-fit: cover">
                        <span class="upl f-12" id="upload">{{ __('keyword.upload-file') }}</span>
                        <input type="file" class="upload up" id="up" onchange="readURL(this);" name="appendex[]" accept="image/png,image/svg,image/jpg,image/jpeg" />
                    </div>
                    <div class="d-flex">
                        <a class="btn-remove btn btn-danger me-1 d-flex align-items-center"><i class="fa  mx-0  fa-times"></i></a>
                    </div>
                </div>`
            );
        });

        $(document).on("click", "a.btn-remove", function () {
           if(confirm("{{ __('keyword.are-you-sure') }}")){
                $(this).closest(".uploadDoc").remove();
            }
        });
    });

</script>
@endsection
