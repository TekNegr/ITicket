<?php

namespace App\Filament\Employee\Pages;

use Filament\Pages\Page;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Ticket;
class TicketEmployee extends Page
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
    protected static string $view = 'filament.employee.pages.ticket-employee';

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
    protected static function getTableQuery(): Builder
    {
        return Ticket::where('id_employe', Auth::id());
    }

    /**
     * Get the tickets for the current user.
     *
     * @return array
     */
    protected function getTickets()
    {
        return self::getTableQuery()->get();
    }

    /**
     * Get the tickets for the current user.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    protected $tickets;

    public function mount()
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