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
                        Tracked Directories
                    </a>
                    <!-- Tracked Tags -->
                    <a href="{{ route('tracked_tag.index') }}"
                       class="list-group-item list-group-item-action {{ request()->routeIs('tracked_tag.*') ? 'active' : '' }}"
                       aria-current="{{ request()->routeIs('tracked_tag.*') ? 'true' : 'false' }}">
                        Tracked Tags
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
