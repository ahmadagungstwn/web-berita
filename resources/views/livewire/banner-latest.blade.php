<div class="flex justify-center items-center mb-12">
    @if ($banner)
        <a href="{{ $banner->link }}">
            <div class="w-full max-w-[900px] h-[120px] border border-[#EEF0F7] rounded-2xl overflow-hidden">
                <img src="{{ Storage::url($banner->thumbnail) }}" class="object-cover w-full h-full" alt="ads" />
            </div>
        </a>
    @endif
</div>
