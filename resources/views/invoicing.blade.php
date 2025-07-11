<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <livewire:invoice.create-invoice></livewire:invoice.create-invoice>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <livewire:invoice.select-parts></livewire:invoice.select-parts>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <livewire:invoice.price-summary></livewire:invoice.price-summary>
            </div>
        </div>
        <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:invoice.invoice-table></livewire:invoice.invoice-table>
        </div>
    </div>
</x-layouts.app>
