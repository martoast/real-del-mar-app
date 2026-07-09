{{-- ============================== VIDEO (same framed section as Riviera; Mux HLS stream) ============================== --}}
@php
    $muxId = 'dh00JsdR6uGICx5sCkPbVpwrp01tkyjJWBnuqfZDxBgWQ';
@endphp
<section id="video" class="bg-sand-50 pb-24 lg:pb-32">
    <div class="mx-auto max-w-5xl px-6 lg:px-10">
        <div class="reveal overflow-hidden rounded-3xl bg-ocean-950 shadow-xl shadow-ink/10 ring-1 ring-ink/5" x-data="{ playing: false }">
            <div class="group relative aspect-video w-full">
                <video
                    id="cande-video"
                    class="h-full w-full object-cover"
                    playsinline
                    controls
                    preload="metadata"
                    poster="https://image.mux.com/{{ $muxId }}/thumbnail.jpg?time=1"
                    @play="playing = true"
                    @pause="playing = false"
                    @ended="playing = false"
                ></video>

                {{-- Play overlay --}}
                <button
                    type="button"
                    x-show="!playing"
                    x-cloak
                    @click="document.getElementById('cande-video').play()"
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

    {{-- HLS wiring: Safari plays m3u8 natively; other browsers load hls.js on demand --}}
    <script>
        (function () {
            var src = 'https://stream.mux.com/{{ $muxId }}.m3u8';
            var video = document.getElementById('cande-video');
            if (!video) return;
            if (video.canPlayType('application/vnd.apple.mpegurl')) {
                video.src = src;
            } else {
                var s = document.createElement('script');
                s.src = 'https://cdn.jsdelivr.net/npm/hls.js@1/dist/hls.min.js';
                s.onload = function () {
                    if (window.Hls && window.Hls.isSupported()) {
                        var hls = new window.Hls();
                        hls.loadSource(src);
                        hls.attachMedia(video);
                    }
                };
                document.head.appendChild(s);
            }
        })();
    </script>
</section>
