<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

<div class="container">
    <hr class="mt-5">
    <div class="row">
        @include(
            'shared.navbar_shared.user_profile.gallary.profile_gallary_title'
        )
    </div>

    <div class="gallery">
        @foreach ($post as $posts)
            <div class="gallery-item" tabindex="0">
                <img src="{{ $posts->post_image }}" class="gallery-image" alt="">
                <div class="gallery-item-info">
                    <ul>
                        <li class="gallery-item-likes">
                            <span class="visually-hidden">Likes:</span>
                            <i class="fas fa-heart" aria-hidden="true"></i>{{ $posts->likeduser->count() }}
                        </li>
                        <li class="gallery-item-comments">
                            <span class="visually-hidden">Comments:</span>
                            <i class="fas fa-comment" aria-hidden="true"></i>{{ $posts->comments->count() }}
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    <div class="loader"></div>
</div>
