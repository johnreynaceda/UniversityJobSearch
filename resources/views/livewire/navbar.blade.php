<div class="ml-20">
    @if (auth()->user()->user_type != 'employer')
        <div class="flex space-x-2">
            <a href="#_" class="px-2 py-2  font-medium text-gray-800 hover:text-gray-800/50  md:px-3 lg:ml-auto">How
                it Works?</a>
            <a href="{{ route('welcome') }}"
                class="px-2 py-2  font-medium text-gray-800 hover:text-gray-800/50  md:px-3 lg:ml-auto">Home</a>
            <a href="{{ route('user.application') }}"
                class="px-2 py-2  font-medium text-gray-800 hover:text-gray-800/50  md:px-3 lg:ml-auto">Application</a>

            <a href="{{ route('user.profile') }}"
                class="px-2 py-2  font-medium text-gray-800 hover:text-gray-800/50  md:px-3 lg:ml-auto">Profile</a>
        </div>
    @else
        <div class="flex space-x-2">
            <a href="{{ route('employer.dashboard') }}"
                class="px-2 py-2  font-medium text-gray-800 hover:text-gray-800/50  md:px-3 lg:ml-auto">Profile</a>

            <a href="{{ route('employer.application') }}"
                class="px-2 py-2  font-medium text-gray-800 hover:text-gray-800/50  md:px-3 lg:ml-auto">Application</a>
            <a href="{{ route('employer.hired') }}"
                class="px-2 py-2  font-medium text-gray-800 hover:text-gray-800/50  md:px-3 lg:ml-auto">Hired</a>
        </div>
    @endif
</div>
