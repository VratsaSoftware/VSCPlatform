@if(!isset($user->picture) && $user->sex != 'male')
    <img src="{{ asset('images/women-no-avatar.png') }}" alt="profile-pic" style="{!! $style !!}" class="avatar {!! isset($class) ? $class : '' !!}">
@elseif(!isset($user->picture) && $user->sex != 'female')
    <img src="{{ asset('images/men-no-avatar.png') }}" alt="profile-pic" style="{!! $style !!}" class="avatar {!! isset($class) ? $class : '' !!}">
@else
    <img src="{{ asset('images/user-pics/' . $user->picture) }}" alt="profile-pic" style="{!! $style !!}" class="avatar {!! isset($class) ? $class : '' !!}">
@endif