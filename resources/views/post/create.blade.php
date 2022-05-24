<x-app-layout>
    <x-slot name="header">
        <!-- Page header -->
        <div class="bg-white shadow md:sticky top-0 z-50">
            <div class="px-4 sm:px-6 lg:max-w-8xl lg:mx-auto lg:px-8 relative">
                <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                    <div class="flex-1 min-w-0">
                        <!-- Profile -->
                        <div class="flex items-center">
                            <div>
                                <div class="flex items-center">
                                    <h1
                                        class="sm:ml-3 text-2xl font-bold leading-7 text-gray-900 sm:leading-9 sm:truncate">
                                        Create New Post
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex space-x-3 md:mt-0 md:ml-4">
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Save and Publish
                        </button>
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 border border-grey-900 shadow-sm text-sm font-medium rounded-md bg-white hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Save as Draft
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="mt-8">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">

            <livewire:permalink />

            <x-forms.tinymce-editor />

            <div class="bg-white shadow-sm rounded-md my-4 px-4 py-5 border-b border-gray-200 sm:px-6">
                <form class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div>
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Post Settings</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                    publicly so be careful what you share.</p>
                            </div>

                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div
                                class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="keyword"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Cover Images
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg flex rounded-md shadow-sm">
                                            <input type="file"
                                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-solid border-gray-300 sm:text-sm rounded-md">
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="keyword"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Categories
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg flex rounded-md shadow-sm">
                                            <select id="categories" name="categories" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-gray-500 focus:border-gray-500 sm:text-sm rounded-md">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="bg-white shadow-sm rounded-md my-4 px-4 py-5 border-b border-gray-200 sm:px-6">
                <form class="space-y-8 divide-y divide-gray-200">
                    <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                        <div>
                            <div>
                                <h3 class="text-lg leading-6 font-medium text-gray-900">SEO Settings</h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">This information will be displayed
                                    publicly so be careful what you share.</p>
                            </div>

                            <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">
                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="keyword"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Keyword
                                    </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <div class="max-w-lg flex rounded-md shadow-sm">
                                            <label for="keyword" class="sr-only">Keyword</label>
                                            <input type="text" name="keyword" id="keyword"
                                                class="shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>

                                <div
                                    class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                    <label for="meta-description"
                                        class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2">
                                        Meta Description </label>
                                    <div class="mt-1 sm:mt-0 sm:col-span-2">
                                        <textarea id="meta-description" name="meta-description" id="meta-description" rows="3"
                                            class="max-w-lg shadow-sm block w-full focus:ring-gray-500 focus:border-gray-500 sm:text-sm border border-gray-300 rounded-md"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
