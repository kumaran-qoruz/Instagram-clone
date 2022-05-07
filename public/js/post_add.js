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
        $('#share').click(function() {
            location.reload();
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
                success: function() {

                    $('#share').click(function() {
                        location.reload();
                    })
                    console.log("success");
                },
                error: function(error) {
                    console.log(error);
                }
            });

        });
    });
});
