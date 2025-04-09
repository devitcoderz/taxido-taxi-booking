<div class="navbar-menu">
    <ul>
        <li class="{{ request()->url() == url('/user/home') ? 'active' : '' }}">
            <a href="{{url('user/home')}}">
                <div class="icon">
                    <img class="unactive" src="{{asset('assets/images/svg/home.svg')}}" alt="home">
                    <img class="active" src="{{asset('assets/images/svg/home-fill.svg')}}" alt="home">
                </div>
                <span class="active">Home</span>
            </a>
        </li>

        <li class="{{ request()->url() == url('/user/category') ? 'active' : '' }}">
            <a href="{{url('user/category')}}">
                <div class="icon">
                    <img class="unactive" src="{{asset('assets/images/svg/category.svg')}}" alt="category">
                    <img class="active" src="{{asset('assets/images/svg/category-fill.svg')}}" alt="category">
                </div>
                <span>Category</span>
            </a>
        </li>

        <li class="{{ request()->url() == url('/user/my-rides') ? 'active' : '' }}">
            <a href="{{url('user/my-rides')}}">
                <div class="icon">
                    <img class="unactive" src="{{asset('assets/images/svg/car.svg')}}" alt="car">
                    <img class="active" src="{{asset('assets/images/svg/car-fill.svg')}}" alt="car">
                </div>
                <span>My Rides</span>
            </a>
        </li>

        <li class="{{ request()->url() == url('/user/setting') ? 'active' : '' }}">
            <a href="{{url('user/setting')}}">
                <div class="icon">
                    <img class="unactive" src="{{asset('assets/images/svg/setting.svg')}}" alt="setting">
                    <img class="active" src="{{asset('assets/images/svg/setting-fill.svg')}}" alt="setting">
                </div>
                <span>Setting</span>
            </a>
        </li>
    </ul>
</div>