<div id="adminSidebar" class="h-screen bg-secondary text-white shadow overflow-y-scroll">
    <div class="flex flex-col mx-auto">
        <x-sidebar-link class="py-5" :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" icon="fa-solid fa-store">
            Dashboard
        </x-sidebar-link>
        <x-sidebar-link class="py-5" :href="route('admin.notifications.index')" :active="request()->routeIs('admin.notifications.index')" icon="fa-solid fa-bell">
            Notifikasi
        </x-sidebar-link>

        @hasrole('Marketing Produk|Manager Marketing|Gudang Klinik|Akunting|Apoteker')
            <x-sidebar-dropdown label="Produk" icon="fa-solid fa-box" :active="request()->routeIs('admin.category.*') ||
                request()->routeIs('admin.warehouse.*') ||
                request()->routeIs('admin.suppliers.index') ||
                request()->routeIs('admin.products.*')">
                <x-sidebar-link :href="route('admin.category.index')" :active="request()->routeIs('admin.category.index')" icon="fa-solid fa-layer-group">
                    Kategori
                </x-sidebar-link>
                {{-- <x-sidebar-link :href="route('admin.warehouse.index')" :active="request()->routeIs('admin.warehouse.index')" icon="fa-solid fa-warehouse"> Gudang </x-sidebar-link>
                <x-sidebar-link :href="route('admin.suppliers.index')" :active="request()->routeIs('admin.suppliers.index')" icon="fa-solid fa-boxes-packing"> Supplier
                </x-sidebar-link> --}}
                <x-sidebar-link :href="route('admin.products.index')" :active="request()->routeIs('admin.products.index') || request()->routeIs('admin.products.create')" icon="fa-solid fa-box">
                    Data Produk
                </x-sidebar-link>
            </x-sidebar-dropdown>
        @endhasrole

        @hasrole('Marketing Treatment|Manager Marketing')
            <x-sidebar-dropdown label="Treatment" icon="fa-solid fa-box" :active="request()->routeIs('admin.category.*') ||
                request()->routeIs('admin.warehouse.*') ||
                request()->routeIs('admin.suppliers.index') ||
                request()->routeIs('admin.treatments.*')">
                <x-sidebar-link :href="route('admin.treatments.index')" :active="request()->routeIs('admin.treatments.index')" icon="fa-solid fa-prescription-bottle-medical">
                    Data Treatment
                </x-sidebar-link>
            </x-sidebar-dropdown>
        @endhasrole

        {{-- @hasrole('Customer Service|Kasir|Manager Marketing|Dokter|Akunting|Gudang Klinik|Gudang Depo|Therapist') --}}
        <x-sidebar-dropdown label="Penjualan" icon="fa-solid fa-cash-register" :active="request()->routeIs('admin.sales.*') ||
            request()->routeIs('admin.transactions.treatment.index') ||
            request()->routeIs('admin.retur-sales-order.*')">
            {{-- @hasrole('Customer Service|Kasir|Dokter|Manager Marketing|Akunting|Gudang Klinik|Gudang Depo|Therapist') --}}
            <x-sidebar-link :href="route('admin.sales.index')" :active="request()->routeIs('admin.sales.index')" icon="fa-solid fa-cart-shopping">
                Transaksi
            </x-sidebar-link>
            {{-- @endhasrole --}}
            @hasrole('Customer Service')
                <x-sidebar-link :href="route('admin.transactions.treatment.index')" :active="request()->routeIs('admin.transactions.treatment.index')" icon="fa-solid fa-prescription-bottle-medical">
                    Booking Treatment
                </x-sidebar-link>
            @endhasrole
            @hasanyrole('Customer Service|Manager Marketing')
                <x-sidebar-link :href="route('admin.customers.memberupgrade.index')" :active="request()->routeIs('admin.customers.memberupgrade.index')" icon="fa-solid fa-arrow-up-right-dots">
                    Customer Member Upgrade
                </x-sidebar-link>
            @endhasanyrole
            @hasanyrole('Manager Marketing|Akunting|Gudang Klinik|Gudang Depo')
                <x-sidebar-link :href="route('admin.retur-sales-order.index')" :active="request()->routeIs('admin.retur-sales-order.index')" icon="fa-solid fa-arrow-right-arrow-left">
                    Retur Transaksi
                </x-sidebar-link>
            @endhasanyrole
        </x-sidebar-dropdown>
        {{-- @endhasrole --}}

        {{-- Hanya akun galuh@ --}}
        @hasrole('Customer Service|Manager Marketing|Akunting')
            <x-sidebar-dropdown label="Customer" icon="fa-solid fa-people-group" :active="request()->is('dashboard/customers/index/customers') || request()->routeIs('admin.references.*')">
                <x-sidebar-link :href="route('admin.customers.index', 'customers')" :active="request()->is('dashboard/customers/index/customers') ||
                    request()->routeIs('admin.users.edit')" icon="fa-solid fa-users-line">
                    Data Customer
                </x-sidebar-link>
                @hasrole('Manager Marketing')
                    <x-sidebar-link :href="route('admin.customers.birthday-list', 'customers')" :active="request()->is('dashboard/customers/birthday-list/customers')" icon="fa-solid fa-cake-candles">
                        Ulang Tahun
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.references.index')" :active="request()->routeIs('admin.references.index')" icon="fa-solid fa-hashtag">
                        Referensi
                    </x-sidebar-link>
                @endhasrole
            </x-sidebar-dropdown>
        @endhasrole

        {{-- Hanya akun galuh@ --}}
        @hasrole('Manager Marketing|Akunting')
            <x-sidebar-dropdown label="Reseller" icon="fa-solid fa-people-group" :active="request()->is('dashboard/customers/index/resellers') || request()->routeIs('admin.references.*')">
                <x-sidebar-link :href="route('admin.customers.index', 'resellers')" :active="request()->is('dashboard/customers/index/resellers') ||
                    request()->routeIs('admin.users.edit')" icon="fa-solid fa-users-line">
                    Data Reseller
                </x-sidebar-link>
                @hasrole('Manager Marketing')
                    <x-sidebar-link :href="route('admin.customers.birthday-list', 'resellers')" :active="request()->routeIs('dashboard/customers/birthday-list/resellers')" icon="fa-solid fa-cake-candles">
                        Ulang Tahun
                    </x-sidebar-link>
                @endhasrole
            </x-sidebar-dropdown>
        @endhasrole

        {{-- Hanya akun galuh@ --}}
        @hasrole('Manager Marketing|Akunting')
            <x-sidebar-dropdown label="Distributor" icon="fa-solid fa-people-group" :active="request()->is('dashboard/customers/index/distributor') ||
                request()->routeIs('admin.references.*')">
                <x-sidebar-link :href="route('admin.customers.index', 'distributor')" :active="request()->is('dashboard/customers/index/distributor') ||
                    request()->routeIs('admin.users.edit')" icon="fa-solid fa-users-line">
                    Data Distributor
                </x-sidebar-link>
                @hasrole('Manager Marketing')
                    <x-sidebar-link :href="route('admin.customers.birthday-list', 'distributor')" :active="request()->routeIs('dashboard/customers/birthday-list/distributor')" icon="fa-solid fa-cake-candles">
                        Ulang Tahun
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.customers.distributor.deposit.index')" :active="request()->routeIs('admin.customers.distributor.deposit.index')" icon="fa-solid fa-wallet">
                        Deposit
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.sales.index')" :active="request()->routeIs('admin.sales.index')" icon="fa-solid fa-cart-shopping">
                        Transaksi Distributor
                    </x-sidebar-link>
                @endhasrole
            </x-sidebar-dropdown>
        @endhasrole

        @hasrole('Gudang Klinik|Gudang Depo')
            <x-sidebar-dropdown label="Stok" icon="fa-solid fa-box" :active="request()->routeIs('admin.transfer-stock.*') ||
                request()->routeIs('admin.products.history-stock.*') ||
                request()->routeIs('admin.retur-purchase-order.*')">
                <x-sidebar-link :href="route('admin.transfer-stock.incoming')" :active="request()->routeIs('admin.transfer-stock.incoming')" icon="fa-solid fa-arrow-right-arrow-left">
                    Barang Masuk
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.transfer-stock.outgoing')" :active="request()->routeIs('admin.transfer-stock.outgoing')" icon="fa-solid fa-arrow-right-arrow-left">
                    Barang Retur
                </x-sidebar-link>
            </x-sidebar-dropdown>
        @endhasrole

        {{-- Hanya akun atik@ --}}
        @hasanyrole('Akunting')
            <x-sidebar-dropdown label="Gudang" icon="fa-solid fa-cash-register" :active="request()->routeIs('admin.purchase-order.*') |
                request()->routeIs('admin.retur-purchase-order.*')">
                <x-sidebar-link :href="route('admin.suppliers.index')" :active="request()->routeIs('admin.suppliers.index')" icon="fa-solid fa-boxes-packing">
                    Supplier
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.purchase-order.index')" :active="request()->routeIs('admin.purchase-order.index')" icon="fa-solid fa-shop">
                    Penerimaan
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.retur-purchase-order.index')" :active="request()->routeIs('admin.retur-purchase-order.index')" icon="fa-solid fa-arrow-right-arrow-left">
                    Retur Penerimaan
                </x-sidebar-link>
            </x-sidebar-dropdown>
        @endhasanyrole

        {{-- Hanya akun atik@ --}}
        @hasrole('Akunting')
            <x-sidebar-dropdown label="Aliran Dana" icon="fa-solid fa-money-bill" :active="request()->routeIs('admin.cash-flow-transaction.*')">
                <x-sidebar-link :href="route('admin.source-of-fund.index')" :active="request()->routeIs('admin.source-of-fund.index')" icon="fas fa-dollar">
                    Sumber Dana
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.cash-flow-transaction.index')" :active="request()->routeIs('admin.cash-flow-transaction.index')" icon="fa-solid fa-money-check">
                    Arus Kas
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.cash-flow-transaction.income')" :active="request()->routeIs('admin.cash-flow-transaction.income')" icon="fas fa-vote-yea">
                    Pemasukan
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.cash-flow-transaction.expenses')" :active="request()->routeIs('admin.cash-flow-transaction.expenses')" icon="fas fa-money-bill-wave-alt">
                    Pengeluaran
                </x-sidebar-link>
            </x-sidebar-dropdown>
        @endhasrole

        @hasanyrole('Manager Marketing')
            <x-sidebar-dropdown label="Promosi" icon="fa-solid fa-percent" :active="request()->routeIs('admin.discounts.index')">
                <x-sidebar-link :href="route('admin.discounts.index')" :active="request()->routeIs('admin.discounts.index')" icon="fa-solid fa-percent">
                    Diskon
                </x-sidebar-link>
            </x-sidebar-dropdown>
        @endhasanyrole

        @hasrole('Manager Marketing|Gudang Klinik|Akunting|Apoteker|Kasir|Gudang Depo')
            <x-sidebar-dropdown label="Laporan" icon="fa-solid fa-book" :active="request()->routeIs('admin.reports.inventory-flow.*') ||
                request()->routeIs('admin.products.history-stock.*') ||
                request()->routeIs('admin.transactions.*') ||
                request()->routeIs('admin.reports.project.*')">
                @hasanyrole('Manager Marketing|Gudang Klinik|Gudang Depo')
                    <x-sidebar-link :href="route('admin.reports.inventory-flow.repot-detail')" :active="request()->routeIs('admin.reports.inventory-flow.repot-detail')" icon="fa-solid fa-file-lines">
                        Laporan Barang Masuk - Keluar
                    </x-sidebar-link>
                @endhasanyrole
                @hasrole('Akunting')
                    <x-sidebar-link :href="route('admin.reports.project.index')" :active="request()->routeIs('admin.reports.project.index')" icon="fa-solid fa-file-lines">
                        Laporan Project
                    </x-sidebar-link>
                @endhasallroles
                @unlessrole('Manager Marketing')
                    <x-sidebar-link :href="route('admin.reports.inventory-flow.index')" :active="request()->routeIs('admin.reports.inventory-flow.index')" icon="fa-solid fa-file-lines">
                        Data Barang Masuk - Keluar
                    </x-sidebar-link>
                @endunlessrole
                <x-sidebar-link :href="route('admin.products.history-stock.index')" :active="request()->routeIs('admin.products.history-stock.index')" icon="fa-solid fa-file-lines">
                    Laporan Stock
                </x-sidebar-link>
                @hasanyrole('Akunting|Apoteker|Kasir|Gudang Depo|Gudang Klinik')
                    @hasrole('Akunting')
                        <x-sidebar-link :href="route('admin.purchase-order.purchase-list')" :active="request()->routeIs('admin.purchase-order.purchase-list')" icon="fa-solid fa-file-lines">
                            Laporan Penerimaan
                        </x-sidebar-link>
                        <x-sidebar-link :href="route('admin.retur-purchase-order.retur-purchase-list')" :active="request()->routeIs('admin.retur-purchase-order.retur-purchase-list')" icon="fa-solid fa-file-lines">
                            Laporan Retur Penerimaan
                        </x-sidebar-link>
                        <x-sidebar-link :href="route('admin.retur-sales-order.retur-sales-list')" :active="request()->routeIs('admin.retur-sales-order.retur-sales-list')" icon="fa-solid fa-file-lines">
                            Laporan Retur Penjualan
                        </x-sidebar-link>
                    @endhasrole
                    <x-sidebar-link :href="route('admin.transactions.invoice-list')" :active="request()->routeIs('admin.transactions.invoice-list')" icon="fa-solid fa-file-lines">
                        Laporan Penjualan Produk Klinik
                    </x-sidebar-link>
                    <x-sidebar-link href="#" :active="false" icon="fa-solid fa-file-lines">
                        Laporan Penjualan Produk Apotek
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.transactions.treatment.invoice-list')" :active="request()->routeIs('admin.transactions.treatment.invoice-list')" icon="fa-solid fa-file-lines">
                        Laporan Treatment
                    </x-sidebar-link>
                    @hasrole('Akunting')
                        <x-sidebar-link href="#" :active="false" icon="fa-solid fa-file-lines">
                            Laporan Free Produk
                        </x-sidebar-link>
                    @endhasrole
                @endhasanyrole
                @hasrole('Manager Marketing')
                    <x-sidebar-link :href="route('admin.transactions.invoice-list-office')" :active="request()->routeIs('admin.transactions.invoice-list-office')" icon="fa-solid fa-file-lines">
                        Data Penjualan Kantor
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.transactions.invoice-list-reseller')" :active="request()->routeIs('admin.transactions.invoice-list-reseller')" icon="fa-solid fa-file-lines">
                        Data Penjualan Reseller/DRP
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.transactions.invoice-list-distributor')" :active="request()->routeIs('admin.transactions.invoice-list-distributor')" icon="fa-solid fa-file-lines">
                        Data Penjualan Distributor
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.transactions.invoice-list-employee')" :active="request()->routeIs('admin.transactions.invoice-list-employee')" icon="fa-solid fa-file-lines">
                        Data Penjualan Karyawan
                    </x-sidebar-link>
                    <x-sidebar-link :href="route('admin.customers.invoice.index')" :active="request()->routeIs('admin.customers.invoice.index')" icon="fa-solid fa-file-lines">
                        Data Pendaftaran Customer
                    </x-sidebar-link>
                @endhasrole
            </x-sidebar-dropdown>
        @endhasrole

        <x-sidebar-dropdown label="Izin / Cuti" icon="fa-solid fa-clipboard-user" :active="request()->routeIs('admin.permit-leave.*') || request()->routeIs('admin.approval_configuration.*')">
            @hasrole('HRD')
                <x-sidebar-link :href="route('admin.permit-leave.list-permit')" :active="request()->routeIs('admin.permit-leave.list-permit')" icon="fa-solid fa-calendar-day">
                    Data Izin dan Cuti
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.approval_configuration.index')" :active="request()->routeIs('admin.approval_configuration.index')" icon="fa-sharp fa-solid fa-user-check">
                    Konfigurasi Persetujuan
                </x-sidebar-link>
            @endhasrole
            <x-sidebar-link :href="route('admin.permit-leave.index')" :active="request()->routeIs('admin.permit-leave.index')" icon="fa-solid fa-calendar-day">
                Pengajuan
            </x-sidebar-link>
        </x-sidebar-dropdown>

        <x-sidebar-dropdown label="Absensi" icon="fa-solid fa-clipboard-user" :active="request()->routeIs('admin.time-entries.*') || request()->routeIs('admin.configuration.*')">
            @hasrole('HRD')
                <x-sidebar-link :href="route('admin.configuration.index')" :active="request()->routeIs('admin.configuration.index')" icon="fa-solid fa-gear">
                    Konfigurasi Waktu
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.time-entries.recap')" :active="request()->routeIs('admin.time-entries.recap')" icon="fa-solid fa-copy">
                    Rekap Absensi
                </x-sidebar-link>
            @endhasrole
            <x-sidebar-link :href="route('admin.time-entries.attendance')" :active="request()->routeIs('admin.time-entries.attendance')" icon="fa-solid fa-clipboard-user">
                Absensi
            </x-sidebar-link>
            <x-sidebar-link :href="route('admin.time-entries.index')" :active="request()->routeIs('admin.time-entries.index')" icon="fa-solid fa-file-export">
                Data Absensi
            </x-sidebar-link>
        </x-sidebar-dropdown>

        @hasrole('HRD|Super Admin')
            <x-sidebar-dropdown label="Pegawai" icon="fa-solid fa-people-roof" :active="request()->routeIs('admin.employee.*') ||
                request()->routeIs('admin.permit-leave.*') ||
                request()->routeIs('admin.project.*')">
                <x-sidebar-link :href="route('admin.employee.index')" :active="request()->routeIs('admin.employee.index') || request()->routeIs('admin.employee.edit')" icon="fa-solid fa-users-line">
                    Data Pegawai
                </x-sidebar-link>
                {{-- <x-sidebar-link :href="route('admin.project.index')" :active="request()->routeIs('admin.project.index')" icon="fa-solid fa-project-diagram">
                    Proyek
                </x-sidebar-link> --}}
            </x-sidebar-dropdown>
        @endhasrole

        <x-sidebar-dropdown label="Proyek" icon="fa-solid fa-people-roof" :active="request()->routeIs('admin.project.*')">
            <x-sidebar-link :href="route('admin.project.index')" :active="request()->routeIs('admin.project.index')" icon="fa-solid fa-project-diagram">
                Proyek
            </x-sidebar-link>
        </x-sidebar-dropdown>

        @hasrole('Super Admin')
            <x-sidebar-dropdown label="Pengguna" icon="fa-solid fa-users" :active="request()->routeIs('admin.user.*')">
                <x-sidebar-link :href="route('admin.roles.index')" :active="request()->routeIs('admin.roles.index')" icon="fa-solid fa-user-shield">
                    Hak Akses
                </x-sidebar-link>
            </x-sidebar-dropdown>
        @endhasrole

        @hasrole('Manager Marketing|Akunting|Super Admin')
            <x-sidebar-dropdown label="Pengaturan" icon="fa-solid fa-sliders" :active="request()->routeIs('admin.expeditions.*')||request()->routeIs('admin.company.*')">
                @hasrole('Manager Marketing')
                    <x-sidebar-link :href="route('admin.expeditions.index')" :active="request()->routeIs('admin.expeditions.index')" icon="fa-solid fa-truck-fast">
                        Expedisi
                    </x-sidebar-link>
                @endhasrole
                @hasrole('Super Admin')
                    <x-sidebar-link :href="route('admin.company.index')" :active="request()->routeIs('admin.company.index')" icon="fa-solid fa-building">
                        Profil Usaha
                    </x-sidebar-link>
                @endhasrole
                @hasrole('Akunting')
                    <x-sidebar-link :href="route('admin.sales-type.index')" :active="request()->routeIs('admin.sales-type.index')" icon="fa-solid fa-user-shield">
                        Tipe Penjualan
                    </x-sidebar-link>
                @endhasrole
            </x-sidebar-dropdown>
        @endhasallroles
    </div>
</div>
