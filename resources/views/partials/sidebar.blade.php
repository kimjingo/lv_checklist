<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <ul class="c-sidebar-nav ps ps--active-y">
        @if(auth()->user()->is_admin)
        <li class="c-sidebar-nav-title">{{ __('Manage Checklists') }}</li>
        @foreach($admin_menu as $group)
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.edit', $group->id) }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-folder-open') }}"></use>
                </svg>
                {{ $group->name}}
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                @foreach($group->checklists as $checklist)
                <li class="c-sidebar-nav-item">
                    <a 
                        class="c-sidebar-nav-link" 
                        href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}"
                        style="padding: .5rem .5rem .5rem 76px"
                    >
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                        </svg>
                        {{ $checklist->name }}
                    </a>
                </li>
                @endforeach
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" 
                        href="{{ route('admin.checklist_groups.checklists.create',[$group]) }}"
                        style="padding: 1rem .5rem .5rem 76px"
                    >
                        <svg class="c-sidebar-nav-icon">
                            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-note-add') }}"></use>
                        </svg>
                        {{ __('New checklist')}}
                    </a>
                </li>
            </ul>
        </li>
        @endforeach
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.create') }}
            ">
            <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-library-add') }}"></use>
            </svg>
                {{ __('New checklist group?')}}
            </a>
        </li>

        @if(auth()->user()->website)
            <li class="c-sidebar-nav-title">{{ auth()->user()->website }}</li>
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-settings') }}"></use>
                    </svg> Setting
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href=""><span class="c-sidebar-nav-icon"></span> Zipcode</a></li>
                    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href=""><span class="c-sidebar-nav-icon"></span> Holidays</a></li>
                </ul>
            </li>
        @endif

        <li class="c-sidebar-nav-title">{{ __('Pages') }}</li>
        @foreach(\App\Models\Page::all() as $page)
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{ route('admin.pages.edit', $page) }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg>
                {{ $page->title}}
            </a>
        </li>
        @endforeach
        <li class="c-sidebar-nav-title">{{ __('Manage Data') }}</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link" href="{{ route('admin.users.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                </svg>
                {{ __('Users')}}
            </a>
        </li>
        @else
            <!-- // for user -->
            @foreach($user_menu as $group)
                <li class="c-sidebar-nav-title">{{ $group['name'] }}
                    @if($group['is_new'])
                    <span class="badge badge-info">NEW</span>
                    @elseif($group['is_updated'])
                    <span class="badge badge-info">UPD</span>
                    @endif
                </li>
                    @foreach($group['checklists'] as $checklist)
                        <li class="c-sidebar-nav-item">
                            <a 
                                class="c-sidebar-nav-link" 
                                href="{{ route('user.checklists.show', [$checklist['id']]) }}"
                            >
                                <svg class="c-sidebar-nav-icon">
                                    <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-list') }}"></use>
                                </svg>
                                {{ $checklist['name'] }}
                                @if($checklist['is_new'])
                                <span class="badge badge-info">NEW</span>
                                @elseif($checklist['is_updated'])
                                <span class="badge badge-info">UPD</span>
                                @endif
                            </a>
                        </li>
                    @endforeach
                </li>
            @endforeach
        @endif
        <li class="c-sidebar-nav-title">{{ __('Others') }}</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{asset('vendors/@coreui/icons/svg/free.svg#cil-alarm') }}"></use>
                </svg> Report
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href=""><span class="c-sidebar-nav-icon"></span> Sales Tax by Order</a></li>
                <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href=""><span class="c-sidebar-nav-icon"></span> Orders To Check</a></li>
            </ul>
        </li>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 590px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 467px;"></div>
        </div>
    </ul>
    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
    >
        <svg class="c-icon mr-2">
            <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-account-logout') }}"></use>
        </svg> {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>