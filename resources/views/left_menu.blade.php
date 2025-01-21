<div class="accordion" id="accordionTracked">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTracked">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTracked"
                    aria-expanded="true" aria-controls="collapseTracked">
                Tracked
            </button>
        </h2>
        <div id="collapseTracked" class="accordion-collapse collapse show" data-bs-parent="#accordionTracked">
            <div class="accordion-body">
                <div class="list-group">
                    <!-- Tracked Directories -->
                    <a href="{{ route('tracked_directory.index') }}"
                       class="list-group-item list-group-item-action {{ request()->routeIs('tracked_directory.*') ? 'active' : '' }}"
                       aria-current="{{ request()->routeIs('tracked_directory.*') ? 'true' : 'false' }}">
                        @lang('messages.tracked.directory.titles.index')
                    </a>
                    <!-- Tracked Files -->
                    <a href="{{ route('tracked_file.index') }}"
                       class="list-group-item list-group-item-action {{ request()->routeIs('tracked_file.*') ? 'active' : '' }}"
                       aria-current="{{ request()->routeIs('tracked_file.*') ? 'true' : 'false' }}">
                        @lang('messages.tracked.file.titles.index')
                    </a>
                    <!-- Tracked Tags -->
                    <a href="{{ route('tracked_tag.index') }}"
                       class="list-group-item list-group-item-action {{ request()->routeIs('tracked_tag.*') ? 'active' : '' }}"
                       aria-current="{{ request()->routeIs('tracked_tag.*') ? 'true' : 'false' }}">
                        @lang('messages.tracked.tag.titles.index')
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
