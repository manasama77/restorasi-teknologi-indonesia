<div class="w-full">
    <div class="relative mb-6 w-full">
        <div class="flex justify-between items-center">
            <flux:heading size="xl" level="1" class="mb-6">{{ __('Admin') }}</flux:heading>
        </div>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex flex-col gap-4">
        <div>
            <a href="{{ route('admin.create') }}" class="btn btn-primary">
                <i class="fas fa-plus fa-fw"></i> Tambah Admin
            </a>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="get" wire:submit.prevent="searchProcess">
                    <div class="join max-w-sm">
                        <input class="input join-item" id="search" name="search" placeholder="Search"
                            wire:model.live="search" />
                    </div>
                </form>
                <div class="w-full overflow-x-auto mb-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th class="text-center">
                                    <i class="fas fa-cogs"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)
                                <tr>
                                    <td>
                                        {{ $datas->firstItem() + $loop->index }}
                                    </td>
                                    <td>
                                        {{ $data->username }}
                                    </td>
                                    <td>
                                        {{ $data->name }}
                                    </td>
                                    <td>
                                        <div class="flex flex-wrap items-center justify-center gap-2">
                                            <a href="{{ route('admin.reset', $data) }}" class="btn btn-sm btn-warning">
                                                <i class="fas fa-key fa-fw"></i> Reset Password
                                            </a>
                                            <a href="{{ route('admin.edit', $data) }}" class="btn btn-sm btn-info">
                                                <i class="fas fa-edit fa-fw"></i> Edit
                                            </a>
                                            <button type="button" class="btn btn-sm btn-error"
                                                wire:click="confirmDelete({{ $data->id }})">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $datas->links() }}
            </div>
        </div>
    </div>

    @script
        <script>
            $wire.on('swal:confirm', (params) => {
                Swal.fire({
                    title: params[0].title,
                    text: params[0].text,
                    icon: params[0].icon,
                    showCancelButton: params[0].showCancelButton,
                    confirmButtonText: params[0].confirmButtonText,
                    cancelButtonText: params[0].cancelButtonText,
                }).then((result) => {
                    if (result.isConfirmed) {
                        console.log("OK")
                        // $wire.dispatchSelf('deleteUser');
                        $wire.deleteUser();
                    }
                });
            });

            $wire.on('swal:success', (params) => {
                Swal.fire({
                    title: params[0].title,
                    text: params[0].text,
                    icon: params[0].icon,
                });
            });
        </script>
    @endscript

</div>
