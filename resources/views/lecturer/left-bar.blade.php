<div class="left-navigation">
  <ul class="nav navbar-nav sidenav">
   <li>@if(!isset(Auth::user()->picture) && Auth::user()->sex != 'male')
              <img src="{{asset('images/women-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
            @elseif(!isset(Auth::user()->picture) && Auth::user()->sex != 'female')
              <img src="{{asset('images/men-no-avatar.png')}}" alt="profile-pic" class="profile-pic">
            @else
              <img src="{{asset('images/user-pics/'.Auth::user()->picture)}}" alt="profile-pic" class="profile-pic">
            @endif
            {{ucfirst(Auth::user()->name)}} {{ucfirst(Auth::user()->last_name)}}<i class="fas fa-chevron-down"></i></li>
   <li><a href="#">
     <img src="./images/profile/nav/my-profile-icon.png" alt="" class="img-fluid">Моят Профил</a>
   </li>
   <li class="disabled"><a href="#" class="disabled">
     <img src="./images/profile/nav/results-icon.png" alt="" class="img-fluid">Интервюта</a>
   </li>
   <li class="nested-nav">
     <a href="" id="my-courses"><i class="fas fa-chevron-down"></i>Моите курсове</a>
     <ul>
      <li><a href="./create_course.html"><img src="./images/profile/add-icon.png" alt="add"></i>Добави</a></li>
      @forelse($courses as $course)
        <li><a href=""><img src="./images/profile/nav/programming-icon.png" alt="">{{ucfirst($course->name)}}</a></li>
      @empty
        <li><a href="#" class="disabled"><img src="./images/profile/remove-icon.png" alt="">Нямате Курсове</a></li>
      @endforelse
    </ul>
  </li>
  <li><a href="#">
   <img src="./images/profile/nav/grades-icon.png" alt="" class="img-fluid">Онлайн тестове</a>
 </li>
 <li class="disabled"><a href="#" class="disabled">
   <img src="./images/profile/nav/notifications-icon.png" alt="" class="img-fluid">Уведомлнения</a>
 </li>
 <li>
    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
      <i class="fas fa-sign-out-alt fa-1x"></i>
      {{ __('Излизане') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    </li>
</ul>
</div>