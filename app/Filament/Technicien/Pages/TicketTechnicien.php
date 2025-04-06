<?php

namespace App\Filament\Technicien\Pages;

use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;

class TicketTechnicien extends Page
{
     /**
     * The navigation icon for the page.
     *
     * @var string|null
     */
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    /**
     * The view for the page.
     *
     * @var string
     */
    protected static string $view = 'filament.technicien.pages.ticket-technicien';

    /**
     * The navigation group for the page.
     *
     * @var string|null
     */
    protected static ?string $navigationGroup = 'Tickets';

    /**
     * The title for the page.
     *
     * @var string|null
     */
    protected static ?string $title = 'Mes tickets';

    /**
     * Get the query for the table.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    /**
     * @var \Illuminate\Database\Eloquent\Collection
     */
    protected $tickets;

    protected function getTableQuery(): Builder
    {
        return Ticket::query()->where('id_technicien', Auth::id());
    }

    protected function getTickets(): \Illuminate\Database\Eloquent\Collection
    {
        return $this->getTableQuery()->get();
    }

    public function mount(): void
    {
        $this->tickets = $this->getTickets();
    }

    public function getViewData(): array
    {
        return [
            'tickets' => $this->tickets
        ];
    }


}
