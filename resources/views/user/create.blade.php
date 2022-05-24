<x-app-layout>
    <x-slot name="header">
        <!-- Page header -->
        <div class="bg-white shadow">
            <div class="lg:max-w-8xl px-4 sm:px-6 lg:mx-auto lg:px-8">
                <div class="py-6 md:flex md:items-center md:justify-between lg:border-t lg:border-gray-200">
                    <div class="min-w-0 flex-1">
                        <!-- Profile -->
                        <div class="flex items-center">
                            <div>
                                <div class="flex items-center">
                                    <h1
                                        class="text-2xl font-bold leading-7 text-gray-900 sm:ml-3 sm:truncate sm:leading-9">
                                        Create New Users
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="lg:mt-8">
        <div class="max-w-8xl mx-auto px-4 py-4 sm:px-6 sm:py-0 lg:px-8">
            <div>
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="md:col-span-1`">
                        <div class="sm:ml-3">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">User Information</h3>
                            <p class="mt-1 text-sm text-gray-600">This information will be displayed publicly so be
                                careful what you share.</p>
                        </div>
                    </div>
                    <div class="mt-5 md:col-span-2 md:mt-0">
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="shadow sm:overflow-hidden sm:rounded-md">
                                <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                                    <div>
                                        <div class="col-span-3 sm:col-span-2">
                                            <x-label for="name" :value="__('Name')" />
                                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                                :value="old('name')" required autofocus />
                                        </div>
                                    </div>

                                    <div>
                                        <div class="col-span-3 sm:col-span-2">
                                            <x-label for="email" :value="__('Email')" />
                                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                                :value="old('email')" required />
                                        </div>
                                    </div>

                                    <div>
                                        <div class="col-span-3 sm:col-span-2">
                                            <x-label for="password" :value="__('Password')" />
                                            <x-input id="password" class="block mt-1 w-full" type="password"
                                                name="password" required autocomplete="new-password" />
                                        </div>
                                    </div>

                                    <div>
                                        <div class="col-span-3 sm:col-span-2">
                                            <x-label for="password_confirmation" :value="__('Confirm Password')" />
                                            <x-input id="password_confirmation" class="block mt-1 w-full"
                                                type="password" name="password_confirmation" required />
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gray-50 px-4 py-3 text-right sm:px-6">
                                    <button type="submit"
                                        class="inline-flex justify-center rounded-md border border-transparent bg-gray-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
