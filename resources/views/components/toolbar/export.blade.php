@props(['routeParams' => null])

<div class="action-buttons">
    @if($routeParams && count($routeParams) > 0)
        {{-- Rekap export with user ID --}}
        <a href="{{ route('rekap.export', $routeParams[0]) }}" class="btn btn-export"><button type="button" class="btn btn-export" title="Export">
        <i class="fa-solid fa-file-export"></i>
        </button>
        </a>
    @else
        {{-- User export without ID --}}
        <a href="{{ route('user.export') }}" class="btn btn-export"><button type="button" class="btn btn-export" title="Export">
        <i class="fa-solid fa-file-export"></i>
        </button>
        </a>
    @endif
</div>