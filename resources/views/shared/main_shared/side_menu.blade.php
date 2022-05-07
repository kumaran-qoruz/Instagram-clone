
@foreach ($posts as $post)
@endforeach
<section class="side-menu">
    <div class="side-menu__user-profile">
        <a href="{{ route('profile') }}" target="_blank" class="side-menu__user-avatar">
            <img src="storage/profile_image/{{ Auth::user()->user_image }}" alt="User Picture" />
        </a>
        <div class="side-menu__user-info">
            <a href="" target="_blank">{{ Auth::user()->user_name }}</a>
            <span>{{ Auth::user()->name }}</span>
        </div>
        <a href="{{ route('switchlogin') }}" <button class="side-menu__user-button">Switch</button></a>
    </div>

    <div class="side-menu__suggestions-section">
        <div class="side-menu__suggestions-header">
            <h2>Suggestions for You</h2>
            <button>See All</button>
        </div>

        @foreach ($users as $user)
            <div class="side-menu__suggestions-content">
                <div class="side-menu__suggestion panel" data-id="{{ $user->id }}">
                    <a href="#" class="side-menu__suggestion-avatar">
                        <img src="storage/profile_image/{{ $user->user_image }}" alt="User Picture" />
                    </a>
                    <div class="side-menu__suggestion-info">
                        <a href="#">{{ $user->name }}</a>
                        <span>Followed by user1, user2 and 9 others</span>
                    </div>
                    <button class="side-menu__suggestion-button action-follow follow">Follow

                    </button>
                </div>
            </div>
        @endforeach
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".follow").click(function() {
            if ($(".follow").text().trim() == "Follow") {
                $(".follow").text("Following");
            } else {
                $(".follow").text("Follow");
            }
        });

        $('.action-follow').click(function() {
            var id = $(this).parents(".panel").data('id');
            console.log(id);
            $.ajax({
                method: "POST",
                url: "{{ route('user.follow') }}",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(data) {
                    console.log(data);
                },
                error: function(error) {
                    console.log(error);
                },
            });
        });
    });
</script>
