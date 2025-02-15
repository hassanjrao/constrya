
<div class="bg-body-extra-light p-3 push">
    <div class="d-lg-none">
        <button type="button" class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center"
            data-toggle="class-toggle" data-target="#horizontal-navigation-hover-normal" data-class="d-none">
            {{ __('Memory Calculations') }}
            <i class="fa fa-bars"></i>
        </button>
    </div>
    <div id="horizontal-navigation-hover-normal" class="d-none d-lg-block mt-2 mt-lg-0">
        <ul class="nav-main nav-main-horizontal nav-main-hover">
            <li class="nav-main-item">
                <a href="{{ route('user.memory-calculations.index') }}" class="nav-main-link {{ request()->is('user/memory-calculations') || request()->is('user/memory-calculations/sheet-rock') ? ' active' : '' }}"
                    href="be_ui_navigation_horizontal.html">
                    <i class="nav-main-link-icon si si-compass"></i>

                    <span class="nav-main-link-name">{{ __('SheetRock') }}</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a href="{{ route('user.memory-calculations.facias') }}" class="nav-main-link {{ request()->is('user/memory-calculations/facias') ? ' active' : '' }}"
                    href="be_ui_navigation_horizontal.html">
                    <i class="nav-main-link-icon si si-compass"></i>

                    <span class="nav-main-link-name">{{ __('Facias') }}</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a href="{{ route('user.memory-calculations.flat-roof') }}" class="nav-main-link {{ request()->is('memory-calculations/flat-roof') ? ' active' : '' }}"
                    href="be_ui_navigation_horizontal.html">
                    <i class="nav-main-link-icon si si-compass"></i>

                    <span class="nav-main-link-name">{{ __('Flat Roof') }}</span>
                </a>
            </li>
            <li class="nav-main-item">
                <a href="{{ route('user.memory-calculations.facias') }}" class="nav-main-link {{ request()->is('memory-calculations/sheet-rock') ? ' active' : '' }}"
                    href="be_ui_navigation_horizontal.html">
                    <i class="nav-main-link-icon si si-compass"></i>

                    <span class="nav-main-link-name">{{ __('Plafon') }}</span>
                </a>
            </li>
        </ul>
    </div>
</div>
