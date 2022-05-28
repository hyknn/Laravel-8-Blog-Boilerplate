<div class="px-2 space-y-1">
    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-gray-200" viewBox="0 0 20 20"
            fill="currentColor">
            <path
                d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
        </svg>
        {{ __('Dashboard') }}
    </x-nav-link>

    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-gray-200" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z"
                clip-rule="evenodd" />
        </svg>
        {{ __('Posts') }}
    </x-nav-link>

    <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-gray-200" viewBox="0 0 20 20"
            fill="currentColor">
            <path
                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
        </svg>
        {{ __('Categories') }}
    </x-nav-link>

    <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-gray-200" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
        </svg>
        {{ __('Users') }}
    </x-nav-link>
</div>

<h3 class="px-3 pt-8 pb-3 text-xs font-semibold text-white uppercase tracking-wider">
    SEO Settings
</h3>

<div class="px-2 space-y-1">
    @if (File::exists(public_path('sitemap.xml')))
    <x-nav-link>
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-gray-200" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z"
                clip-rule="evenodd" />
        </svg>
        {{ __('Sitemap') }}
    </x-nav-link>
    @endif
    @if (!File::exists(public_path('sitemap.xml')))
    <x-nav-link :href="route('generate-sitemap')">
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-gray-200" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z"
                clip-rule="evenodd" />
        </svg>
        {{ __('Generate Sitemap') }}
    </x-nav-link>
    @endif
    <x-nav-link>
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 flex-shrink-0 h-6 w-6 text-gray-200" viewBox="0 0 20 20"
            fill="currentColor">
            <path fill-rule="evenodd"
                d="M4.083 9h1.946c.089-1.546.383-2.97.837-4.118A6.004 6.004 0 004.083 9zM10 2a8 8 0 100 16 8 8 0 000-16zm0 2c-.076 0-.232.032-.465.262-.238.234-.497.623-.737 1.182-.389.907-.673 2.142-.766 3.556h3.936c-.093-1.414-.377-2.649-.766-3.556-.24-.56-.5-.948-.737-1.182C10.232 4.032 10.076 4 10 4zm3.971 5c-.089-1.546-.383-2.97-.837-4.118A6.004 6.004 0 0115.917 9h-1.946zm-2.003 2H8.032c.093 1.414.377 2.649.766 3.556.24.56.5.948.737 1.182.233.23.389.262.465.262.076 0 .232-.032.465-.262.238-.234.498-.623.737-1.182.389-.907.673-2.142.766-3.556zm1.166 4.118c.454-1.147.748-2.572.837-4.118h1.946a6.004 6.004 0 01-2.783 4.118zm-6.268 0C6.412 13.97 6.118 12.546 6.03 11H4.083a6.004 6.004 0 002.783 4.118z"
                clip-rule="evenodd" />
        </svg>
        {{ __('Google Analytics') }}
    </x-nav-link>
</div>
