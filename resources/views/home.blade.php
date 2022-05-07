@extends('layouts.app')

@section('content')
    <main class="main-container">
        <section class="content-container">
            <div class="content">
                <div class="story">
                    @include('shared.main_shared.story')
                </div>

                <div class="main_post">
                    @include('shared.main_shared.post')
                </div>
            </div>

            <div class="side_menu">
                @include('shared.main_shared.side_menu')
            </div>

        </section>
    </main>

    <div class="mobil_view">
        @include('shared.main_shared.mobile_view_navebar')
    </div>
@endsection
