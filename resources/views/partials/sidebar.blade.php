<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <div class="c-sidebar-brand d-lg-down-none">
            <p class="c-sidebar-brand-full"><h3>FMS</h3></p>
            <!-- <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#full"></use>
            </svg>
            <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
                <use xlink:href="assets/brand/coreui.svg#signet"></use>
            </svg> -->
        </div>
        <ul class="c-sidebar-nav ps ps--active-y">
            <li class="c-sidebar-nav-title">{{ __('Manage Checklists') }}</li>
            @foreach(\App\Models\ChecklistGroup::with('checklists')->get() as $group)
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.edit', $group->id) }}">
                    <svg class="c-sidebar-nav-icon">
                        <use xlink:href="{{ asset('vendors/@coreui/icons/svg/free.svg#cil-puzzle') }}"></use>
                    </svg>
                    {{ $group->name}}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @foreach($group->checklists as $checklist)
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.checklists.edit', [$group, $checklist]) }}">
                            <span class="c-sidebar-nav-icon"></span>
                            {{ $checklist->name }}
                        </a>
                    </li>
                    @endforeach
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.checklists.create',[$group]) }}">
                            <span class="c-sidebar-nav-icon"></span>
                            {{ __('New checklist')}}
                        </a>
                    </li>
                </ul>
            </li>
            @endforeach
            <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
                <a class="c-sidebar-nav-link" href="{{ route('admin.checklist_groups.create') }}
                ">
                    {{ __('New checklist group')}}
                </a>
            </li>
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
            @if(auth()->user()->website)
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

            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
            </div>
            <div class="ps__rail-y" style="top: 0px; height: 590px; right: 0px;">
                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 467px;"></div>
            </div>
        </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>