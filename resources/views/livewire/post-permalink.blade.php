<div class="my-4">
    <label for="title" class="sr-only">Post Title</label>
    <input wire:model="permalink" type="text" name="title" id="title"
        class="shadow-sm focus:ring-gray-500 focus:border-gray-500 block w-full border-gray-300 rounded-md mb-4"
        placeholder="Post Title">
    <p class="bg-white shadow-sm rounded-md my-2 py-2 border-b border-gray-200 px-4">
        Slug :
        <span class="underline">{{ URL::to('/') }}/blog/{{ Str::slug($permalink) }}</span>
    </p>
</div>
