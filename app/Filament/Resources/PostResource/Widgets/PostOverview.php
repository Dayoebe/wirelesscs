<?php

namespace App\Filament\Resources\PostResource\Widgets;

use App\Models\PostView;
use App\Models\UpvoteDownvote;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\Widget;
use Illuminate\Database\Eloquent\Model;

class PostOverview extends Widget
{
    protected int | string | array $columnSpan = 3;

    public ?Model $record = null;

    protected function getViewData(): array
    {
        $viewCount = 0;
        $upvotes = 0;
        $downvotes = 0;

        if (PostView::isTableAvailable()) {
            $viewCount = PostView::where('post_id', '=', $this->record->id)->count();
        }

        if (UpvoteDownvote::isTableAvailable()) {
            $upvotes = UpvoteDownvote::where('post_id', '=', $this->record->id)->where('is_upvote', '=', 1)->count();
            $downvotes = UpvoteDownvote::where('post_id', '=', $this->record->id)->where('is_upvote', '=', 0)->count();
        }

        return [
            'viewCount' => $viewCount,
            'upvotes' => $upvotes,
            'downvotes' => $downvotes,
        ];
    }

    protected static string $view = 'filament.resources.post-resource.widgets.post-overview';
}
