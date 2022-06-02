<div id="sidebar" class="h-screen bg-gray-800 p-5  pt-8 relative duration-300">
    <img id="control" src="{{ asset('images/control.png') }}" alt="control"
        class="absolute cursor-pointer rounded-full -right-3 top-9 w-7 border-4 border-gray-800"
        onclick="sBar.handleSidebarState()">
    <div>
        <ul class="pt-6">
            @forelse($dm['data_menu'] as $menu)
                <li id="menu{{ $menu->id }}" class="text-gray-300 text-sm flex items-center gap-x-4 p-2 mt-2">
                    <i class="{{ $menu->icon }}"></i>
                    <a href="{{ $menu->link }}" href="#" class="link-text origin-left duration-300 text-gray-300 hover:bg-gray-700 rounded-md hover:text-gray-300">
                        {{ $menu->name }}</a>
                </li>
            @empty
                <li>
                    Sin Accessos
                </li>
            @endforelse

        </ul>
    </div>
</div>
