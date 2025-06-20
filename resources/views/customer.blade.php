<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4 md:grid-cols-3">
            <div class="col-span-2 relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <livewire:customer.select-customer></livewire:customer.select-customer>
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <livewire:customer.unassigned-vehicles></livewire:customer.unassigned-vehicles>
            </div>
        </div>
        <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:customer.customer-table></livewire:customer.customer-table>
        </div>
    </div>
</x-layouts.app>

