<div class="mb-4">
    <label for="title" class="block font-medium">Title</label>
    <input
        type="text"
        name="title"
        id="title"
        value="{{ old('title', $post->title ?? '') }}"
        class="border rounded w-full p-2"
        required
    >
    @error('title')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

<div class="mb-4">
    <label for="content" class="block font-medium">Content</label>
    <textarea
        name="content"
        id="content"
        rows="8"
        class="border rounded w-full p-2"
        required
    >{{ old('content', $post->content ?? '') }}</textarea>
    @error('content')
        <div class="text-red-600 text-sm">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
    Save
</button>