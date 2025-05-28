<x-layouts.app>
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid auto-rows-min gap-4">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700">
                <livewire:booking.create-booking></livewire:booking.create-booking>
            </div>
        </div>
        <div class="relative h-full flex-1 rounded-xl border border-neutral-200 dark:border-neutral-700">
            <livewire:booking.booking-table></livewire:booking.booking-table>
        </div>
    </div>
</x-layouts.app>
