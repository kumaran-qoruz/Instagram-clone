<link rel="stylesheet" href="{{ asset('css/addpost.css') }}" class="href">

<div class="modal fade newfade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <form method="post" id="upload_post_data" action="{{ route('store') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-dialog modal-dialog-centered" id="post_upload">
            <div class="modal-content ">
                <div class="modal-header text-center">
                    <h5 class="text-center" id="staticBackdropLabel">Create new post </h5>
                    <button type="button" class="btn-close" id="reload" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <div class="addpost" id="addpost">
                        <img src="{{ asset('icons/mdia.svg') }}" class="media-upload" alt="" />
                        <h2 class="media">Drag photos and
                            videos here</h2>
                        <input type="file" id="file" name="profile_image" />
                        <label for="file" class="file">select from
                            computer</label>
                        <span id="mgs_ta"></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-dialog modal-dialog-centered post_add" id="post_upload">
            <div class="modal-content upload_modal" id="get_post">
                <div class="modal-header">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 post_head">
                                <svg aria-label="Back" class="_8-yf5 " id="back" color="#262626" fill="#262626"
                                    height="24" role="img" viewBox="0 0 24 24" width="24">
                                    <line fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" x1="2.909" x2="22.001" y1="12.004"
                                        y2="12.004"></line>
                                    <polyline fill="none" points="9.276 4.726 2.001 12.004 9.276 19.274"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"></polyline>
                                </svg>
                                <strong class="">create new post</strong>
                                <a href=""><button type="share" id="share" class="share_button">share</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body post_modal">
                    <div class="post_modal">
                        <div class="row">
                            <div class="col-md-7 post_scroll">
                                <img src="" class="img-fluid post-image" name="image" alt="" id="image_upload">
                            </div>
                            <div class="col-md-5 text_content">
                                <div class="scrolling-area">
                                    <div class="scrolling-element-inside">
                                        <div class="d-flex mt-4"> <img class="rounded-circle mr-3"
                                                src="storage/profile_image/{{ Auth::user()->user_image }}"
                                                alt="User Picture" width="30px" height="30px" />
                                            <p><strong class="mt-2">{{ Auth::user()->user_name }}</strong>
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1"></label>
                                            <textarea class="form-control rounded-0" name="post_caption" id="exampleFormControlTextarea1"
                                                placeholder="Write a caption" rows="8"></textarea>
                                        </div>
                                        <div class="contents">
                                            <hr>
                                            <label class="post_location"><input name="creation-location-input"
                                                    placeholder="Add location" type="text" class="search-location"
                                                    value="">
                                                <span class=""><img
                                                        src="{{ asset('icons/location.svg') }}" />
                                                </span>
                                            </label>
                                            <hr>
                                            <div class="">
                                                <div class="" aria-disabled="false" role="button"
                                                    tabindex="0">
                                                    <div class=" ">
                                                        Accessibility</div><span class="">
                                                    </span>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#tbName').on('input change', function() {
            if ($(this).val() != '') {
                $('#submit').prop('disabled', false);
            } else {
                $('#submit').prop('disabled', true);
            }
        });

        $("#get_post").hide();
        $('#file').on('change', function(ev) {
            console.log("here inside");
            let reader = new FileReader();
            reader.onload = (ev) => {
                $('#image_upload').attr('src', ev.target.result);
            }

            $('#post_upload').hide();
            $("#get_post").show();

            $("#back").click(function() {
                $("#get_post").hide();
                $("#post_upload").show();
            })

            reader.readAsDataURL(this.files[0]);
            $('#upload_post_data').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var url = "{{ url('post_upload') }}";
                $.ajax({
                    method: "POST",
                    contentType: false,
                    url: url,
                    data: formData,
                    processData: false,
                    success: function(data) {
                        window.location.reload();
                        console.log("success");
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        });
    });
</script>
