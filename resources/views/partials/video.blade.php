{{-- ============================== VIDEO (blueprint: framed embed — narrow container, no header) ============================== --}}
<section id="video" class="pb-24 lg:pb-32">
    <div class="mx-auto max-w-5xl px-6 lg:px-10">
        <div class="reveal overflow-hidden rounded-3xl bg-ocean-950 shadow-xl shadow-ink/10 ring-1 ring-ink/5" x-data="{ playing: false }">
            <div class="group relative aspect-video w-full">
                <video
                    x-ref="video"
                    class="h-full w-full object-cover"
                    playsinline
                    controls
                    preload="metadata"
                    poster="{{ asset('images/casa-cande-poster.jpg') }}"
                    @play="playing = true"
                    @pause="playing = false"
                    @ended="playing = false"
                >
                    <source src="{{ asset('videos/casa-cande.mp4') }}" type="video/mp4">
                </video>

                {{-- Play overlay --}}
                <button
                    type="button"
                    x-show="!playing"
                    x-cloak
                    @click="$refs.video.play()"
                    class="absolute inset-0 flex items-center justify-center bg-ocean-950/25 transition-colors hover:bg-ocean-950/15"
                    aria-label="Reproducir video"
                >
                    <span class="flex h-20 w-20 items-center justify-center rounded-full bg-sand-50/90 text-ink shadow-lg backdrop-blur transition-transform group-hover:scale-105">
                        <svg class="ml-1 h-8 w-8" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>
