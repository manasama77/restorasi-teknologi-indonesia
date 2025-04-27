<div class="w-full">
    <div class="relative mb-6 w-full">
        <div class="flex justify-between items-center">
            <flux:heading size="xl" level="1" class="mb-6">{{ __('Tambah Admin') }}</flux:heading>
        </div>
        <flux:separator variant="subtle" />
    </div>

    <div class="flex flex-col gap-4">
        <div>
            <a href="{{ route('admin') }}" class="btn btn-primary">
                <i class="fas fa-arrow-left fa-fw"></i> Kembali
            </a>
        </div>
        <div class="card max-w-sm border">
            <div class="card-body">
                <form action="#" method="get" class="space-y-3">
                    <div>
                        <label class="label-text" for="username">Username</label>
                        <input type="text" placeholder="Username" class="input" id="username" name="username"
                            required autofocus />
                    </div>
                    <div>
                        <label class="label-text" for="password">Password</label>
                        <input type="password" placeholder="Password" class="input" id="password" name="password"
                            required />
                    </div>
                    <div>
                        <label class="label-text" for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" placeholder="Konfirmasi Password" class="input"
                            id="password_confirmation" name="password_confirmation" required />
                    </div>

                    <hr />

                    <div>
                        <label class="label-text" for="name">Nama Lengkap</label>
                        <input type="text" placeholder="Nama Lengkap" class="input" id="name" name="name"
                            required />
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
