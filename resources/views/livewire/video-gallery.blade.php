<style>
    .video-list {
        display: flex;
        flex-wrap: wrap;
        gap:10px;
    }
</style>
<div class="mb-3">
    <div class="mt-3 video-list">
        @foreach ($testList as $data)
             <livewire:cardpost /> 
        @endforeach
    </div>
</div>
