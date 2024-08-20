<div>
    @section('title', 'Perbarui ' . $name)
    
    <trix-editor wire:model.defer='data' class="textarea textarea-bordered w-full mb-2 max-h-[calc(75vh)] overflow-y-auto"
        placeholder="Deskripsi"></trix-editor>
    <div class="flex justify-center mt-4">
        <button wire:click='updateData' class="btn btn-sm bg-blue text-white border-none">Simpan</button>
        <a href="{{ route('admin.profile') }}" class="btn btn-sm ms-2 bg-blue text-white border-none">Batal</a>
    </div>
</div>
