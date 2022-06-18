<div class="navbar-container d-flex content">
    <ul class="nav navbar-nav align-items-center ms-auto">

        <li class="nav-item dropdown dropdown-notification me-25"><a class="nav-link" href="#"
                data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i><span
                    class="badge rounded-pill bg-danger badge-up">5</span></a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                <li class="dropdown-menu-header">
                    <div class="dropdown-header d-flex">
                        <h4 class="notification-title mb-0 me-auto">Notifications</h4>
                        <div class="badge rounded-pill badge-light-primary">6 New</div>
                    </div>
                </li>
                <li class="scrollable-container media-list">
                    <a class="d-flex" href="#">
                        <div class="list-item d-flex align-items-start">
                            <div class="me-1">
                                <div class="avatar bg-light-danger">
                                    <div class="avatar-content">MD</div>
                                </div>
                            </div>
                            <div class="list-item-body flex-grow-1">
                                <p class="media-heading"><span class="fw-bolder">Revised Order
                                        👋</span>&nbsp;checkout</p><small class="notification-text"> MD Inc.
                                    order updated</small>
                            </div>
                        </div>
                    </a>
                    <div class="list-item d-flex align-items-center">
                        <h6 class="fw-bolder me-auto mb-0">System Notifications</h6>
                        <div class="form-check form-check-primary form-switch">
                            <input class="form-check-input" id="systemNotification" type="checkbox" checked="">
                            <label class="form-check-label" for="systemNotification"></label>
                        </div>
                    </div><a class="d-flex" href="#">
                        <div class="list-item d-flex align-items-start">
                            <div class="me-1">
                                <div class="avatar bg-light-danger">
                                    <div class="avatar-content"><i class="avatar-icon" data-feather="x"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="list-item-body flex-grow-1">
                                <p class="media-heading"><span class="fw-bolder">Server
                                        down</span>&nbsp;registered</p><small class="notification-text"> USA
                                    Server is down due to high CPU usage</small>
                            </div>
                        </div>
                    </a><a class="d-flex" href="#">
                        <div class="list-item d-flex align-items-start">
                            <div class="me-1">
                                <div class="avatar bg-light-success">
                                    <div class="avatar-content"><i class="avatar-icon" data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="list-item-body flex-grow-1">
                                <p class="media-heading"><span class="fw-bolder">Sales
                                        report</span>&nbsp;generated</p><small class="notification-text"> Last
                                    month sales report generated</small>
                            </div>
                        </div>
                    </a><a class="d-flex" href="#">
                        <div class="list-item d-flex align-items-start">
                            <div class="me-1">
                                <div class="avatar bg-light-warning">
                                    <div class="avatar-content"><i class="avatar-icon"
                                            data-feather="alert-triangle"></i></div>
                                </div>
                            </div>
                            <div class="list-item-body flex-grow-1">
                                <p class="media-heading"><span class="fw-bolder">High memory</span>&nbsp;usage
                                </p><small class="notification-text"> BLR Server using high memory</small>
                            </div>
                        </div>
                    </a>
                </li>
                <li class="dropdown-menu-footer"><a class="btn btn-primary w-100" href="#">Read all
                        notifications</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-sm-flex d-none"><span
                        class="user-name fw-bolder">{{ auth()->user()->name }}</span><span
                        class="user-status">{{ auth()->user()->role == 'village_head' ? 'Kepala Desa' : auth()->user()->role }}</span>
                </div>
                <span class="avatar"><img class="round" src="{{ asset('storage/' . auth()->user()->photo) }}"
                        alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
            </a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item"
                    href="{{ route('user.profile') }}"><i class="me-50" data-feather="user"></i> Profile</a><a
                    class="dropdown-item" href="app-email.html"><i class="me-50" data-feather="mail"></i> Inbox</a><a
                    class="dropdown-item" href="app-todo.html"><i class="me-50" data-feather="check-square"></i>
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
