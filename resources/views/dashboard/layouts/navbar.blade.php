<div class="navbar-container d-flex content">
    <div class="bookmark-wrapper d-flex align-items-center">
        <ul class="nav navbar-nav d-xl-none">
            <li class="nav-item"><a class="nav-link menu-toggle" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                        width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-menu ficon">
                        <line x1="3" y1="12" x2="21" y2="12"></line>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <line x1="3" y1="18" x2="21" y2="18"></line>
                    </svg></a></li>
        </ul>
        <ul class="nav navbar-nav bookmark-icons">

        </ul>
        <ul class="nav navbar-nav">
        </ul>
    </div>
    <ul class="nav navbar-nav align-items-center ms-auto">

        <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-sm-flex d-none"><span
                        class="user-name fw-bolder">{{ auth()->user()->name }}</span><span
                        class="user-status">{{ auth()->user()->role == 'village_head' ? 'Kepala Desa' : auth()->user()->role }}</span>
                </div>
                @if (!auth()->user()->photo)
                    @if (auth()->user()->gender == 'male')
                        <span class="avatar"><img class="round"
                                src="{{ asset('storage/user_images/default_male.png') }}" alt="avatar"
                                height="40" width="40"><span class="avatar-status-online"></span></span>
                    @else
                        <span class="avatar"><img class="round"
                                src="{{ asset('storage/user_images/default_female.png') }}" alt="avatar"
                                height="40" width="40"><span class="avatar-status-online"></span></span>
                    @endif
                @else
                    <span class="avatar"><img class="round" src="{{ asset('storage/' . auth()->user()->photo) }}"
                            alt="avatar" height="40" width="40"><span
                            class="avatar-status-online"></span></span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item"
                    href="{{ route('user.profile') }}"><i class="me-50" data-feather="user"></i> Profile</a><a
                    class="dropdown-item" href="app-email.html"><i class="me-50" data-feather="mail"></i>
                    Inbox</a><a class="dropdown-item" href="app-todo.html"><i class="me-50"
                        data-feather="check-square"></i>
                    Task</a><a class="dropdown-item" href="app-chat.html"><i class="me-50"
                        data-feather="message-square"></i> Chats</a>
                <div class="dropdown-divider"></div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item" style="width: 100%"><i class="me-50" data-feather="power"></i>
                        Logout</button>
                </form>
            </div>
        </li>
    </ul>
</div>
