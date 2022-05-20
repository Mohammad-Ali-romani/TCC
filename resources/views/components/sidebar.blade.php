<div>
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{route('User.allUser')}}">{{__('views/component.all users')}}</a>
              <a class="nav-link" aria-current="page" href="{{route('User.activeUser','active')}}">{{__('views/component.active users')}}</a>
              <a class="nav-link" aria-current="page" href="{{route('User.activeUser','unactive')}}">{{__('views/component.unactive users')}}</a>



            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Lecture.index')}}">
                {{__('views/component.lectures')}}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Advertisment.index')}}">
                {{__('views/component.advertisments')}}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Program.index')}}">
                {{__('views/component.programs')}}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Mark.index')}}">
                {{__('views/component.marks')}}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('Subject.index')}}">
                {{__('views/component.subjects')}}
              </a>
            </li>
          </ul>


        </div>
      </nav>
    </div>
