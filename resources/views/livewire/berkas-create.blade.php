<div class="w-full">
    <div class="relative mb-6 w-full">
        <div class="flex justify-between items-center">
            <flux:heading size="xl" level="1" class="mb-6">{{ __('Tambah Berkas') }}</flux:heading>
        </div>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex flex-col gap-4">
        <div>
            <a href="{{ route('berkas') }}" class="btn btn-primary" wire:navigate>
                <i class="fas fa-arrow-left fa-fw"></i> Kembali
            </a>
        </div>
        <div class="card max-w-sm">
            <div class="card-body">
                <form action="#" method="get" class="space-y-3" enctype="multipart/form-data">
                    <div>
                        <label class="label-text" for="no_berkas">No Berkas</label>
                        <input type="text" placeholder="No Berkas" class="input" id="no_berkas" name="no_berkas"
                            required autofocus />
                    </div>
                    <div>
                        <label class="label-text" for="nama_customer">Nama Customer</label>
                        <input type="text" placeholder="Nama Customer" class="input" id="nama_customer"
                            name="nama_customer" required />
                    </div>
                    <div>
                        <label class="label-text" for="file_path">File</label>
                        <input type="file" class="input" id="file_path" name="file_path" required />
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save fa-fw"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
