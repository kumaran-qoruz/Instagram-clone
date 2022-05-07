@extends('layouts.app')

@section('content')
    <main class="main-container">
        <section class="content-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center d-flex align-items-center">
                        <form method="post" id="upload-image-form" enctype="multipart/form-data">
                            @csrf
                            <label for="image">
                                <input type="file" name="image" id="image" style="display:none;" />
                                <img src="storage/profile_image/{{ Auth::user()->user_image }}"
                                    id="preview-image-before-upload" class="rounded-circle" alt="Cinque Terre" width="150px"
                                    height="150px">
                            </label>
                            <span id="mgs_ta"></span>
                        </form>
                    </div>

                    <div class="col-md-8">
                        <div class="d-flex">
                            <h2 class="username">{{ Auth::user()->user_name }}</h2>
                            <div class="">
                                <button class="btn btn-outline-dark btn-sm ml-4" type="button">Edite Profile</button>
                            </div>
                            <div class="ml-4"> <img src="{{ asset('icons/edit.svg') }}" alt=""></div>
                        </div>
                        <ul class="d-flex profile">
                            <li class="mr-5">
                                <span class="user_details">{{ $posts->count() }}</span> posts
                            </li>
                            <li class="mr-5"><span class="user_details">{{Auth::user()->following()->get()->count()}}</span> followers
                            </li>
                            <li class="mr-5"><span
                                    class="user_details">{{ Auth::user()->followers()->get()->count() }}
                                    following</span>
                            </li>
                        </ul>
                        <div>
                            <span class="">
                                <strong>{{ Auth::user()->name }}</strong>
                            </span>
                            </br>
                            <div class="">{{ date('d/m/Y', strtotime(Auth::user()->created_at)) }}
                            </div>
                        </div>
                    </div>
                </div>
                <main>
                    @include(
                        'shared.navbar_shared.user_profile.gallary.profile_gallary'
                    )
                </main>
            </div>
        </section>
    </main>
@endsection


<script>
    $(document).ready(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#image').on('change', function(ev) {
            console.log("here inside");
            var filedata = this.files[0];
            var imgtype = filedata.type;
            var match = ['image/jpeg', 'image/jpg'];
            if (!(imgtype == match[0]) || (imgtype == match[1])) {
                $('#mgs_ta').html(
                    '<p style="color:red">Plz select a valid type image..only jpg jpeg allowed</p>');
            } else {
                $('#mgs_ta').empty();

                //---image preview
                let reader = new FileReader();
                reader.onload = (ev) => {
                    $('#preview-image-before-upload').attr('src', ev.target.result);
                }
                reader.readAsDataURL(this.files[0]);
                var postData = new FormData();
                postData.append('profile_image', this.files[0]);
                var url = "{{ route('uploade_image') }}";

                $.ajax({
                    method: "POST",
                    contentType: false,
                    url: url,
                    data: postData,
                    processData: false,
                    success: function() {
                        console.log("success");
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        });
    });
</script>
