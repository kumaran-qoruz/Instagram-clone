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
