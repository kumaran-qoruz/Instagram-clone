<link rel="stylesheet" href="{{ asset('css/post.css') }}" class="">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    class="">

@if ($posts->count() > 0)
    @foreach ($posts as $post)
        <article class="post">
            <div class="post__header">
                <div class="post__profile">
                    <a href="" target="_blank" class="post__avatar">
                        <img src="storage/profile_image/{{ $post->user->user_image }}" alt="User Picture" />
                    </a>
                    <a href="" target="_blank" class="post__user">{{ $post->user_name }}</a>
                </div>
                <button class="post__more-options">
                    <img src="{{ asset('icons/more.svg') }}" />
                </button>
            </div>

            <div class="post__content">
                <div class="post__medias">
                    <img class="post__media" src="{{ $post->post_image }}" alt="Post Content" />
                </div>
            </div>
            <div class="post__footer">
                <div class="post__buttons">
                    <div class="panel panel-info" data-id="{{ $post->id }}">
                        <button class="post__button">
                            <span class="like-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="heart" height="36px"
                                    width="36px" viewBox="0 0 24 24">
                                    <path
                                        d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                    <button class="post__button">
                        <img src="{{ asset('icons/commet.svg') }}" />
                    </button>
                    <button class="post__button">
                        <img src="{{ asset('icons/share.svg') }}" />
                    </button>
                    <div class="post__indicators"></div>
                    <button class="post__button post__button--align-right">
                        <img src="{{ asset('icons/collection.svg') }}" />
                    </button>
                </div>
                <div class="post__infos">
                    <div class="post__likes">
                        <div id="post">{{ $post->likeduser->count() }} likes</div>
                    </div>
                    <div class="post__description">
                        <span>
                            <a class="post__name--underline" href="" target="_blank">{{ $post->user_name }}</a>
                            {{ $post->post_caption }}
                        </span>
                    </div>
                    <p class="post_comment">View all {{ $post->comments->count() }} comments</p>
                    <span class="post__date-time">{{ $post->created_at->diffForHumans() }}</span>
                </div>

                <form method="post" class="comment_data" enctype="multipart/form-data">
                    <div class="comment-wrapper">
                        <img src="{{ asset('image/icons8-happy-30.png') }}">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input type="text" class="comment-box tbName" id="comment-box" name="post_comment" id="tbName"
                            placeholder="Add a comment">
                        <button type="submit" class="comment-btn" disabled="disabled">post</button>
                    </div>
                </form>
            </div>
        </article>
    @endforeach
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

<script>
    $(document).ready(function() {
        feather.replace()
        const heart = document.querySelector('.heart');
        const para = document.querySelector("#post");
        const likeUnlikePost = function() {
            if (heart.classList.contains('like')) {
                heart.classList.remove('like');
                heart.classList.add('unlike');
                para.textContent = '0';
            } else {
                heart.classList.remove('unlike');
                heart.classList.add('like');
                para.textContent = '1';
            }
        }
        heart.addEventListener('click', likeUnlikePost);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.tbName').on('input change', function() {
            if ($(this).val() != '') {
                $('.comment-btn').prop('disabled', false);
            } else {
                $('.comment-btn').prop('disabled', true);
            }
            $('.comment-btn').click(function() {
                location.reload();
            })
        });

        var likeurl = "{{ route('post.like') }}";
        $(".like-btn").click(function() {
            var id = $(this).parents(".panel").data('id');
            $.ajax({
                method: "POST",
                data: {
                    id: id
                },
                url: likeurl,
                dataType: "JSON",
                success: function(res) {
                    console.log(success);
                }
            });
        });

        $('.comment_data').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            console.log(formData);
            var commenturl = "{{ route('comment_store') }}";
            $.ajax({
                method: "POST",
                contentType: false,
                url: commenturl,
                data: formData,
                processData: false,
                success: function(data) {
                    $('post__likes').html(data);
                    $('.comment-box ').val('')
                    console.log("success");
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
</script>
