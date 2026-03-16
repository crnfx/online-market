@if ($paginator->hasPages())
 <nav class="custom-pagination" role="navigation" aria-label="Pagination Navigation">
 <ul class="custom-pagination__list">
 {{-- Previous Page Link --}}
 @if ($paginator->onFirstPage())
 <li class="custom-pagination__item custom-pagination__item--disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
 <span class="custom-pagination__link custom-pagination__link--arrow" aria-hidden="true">‹</span>
 </li>
 @else
 <li class="custom-pagination__item">
 <a class="custom-pagination__link custom-pagination__link--arrow" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">‹</a>
 </li>
 @endif

 {{-- Pagination Elements --}}
 @foreach ($elements as $element)
 {{-- "Three Dots" Separator --}}
 @if (is_string($element))
 <li class="custom-pagination__item custom-pagination__item--dots" aria-disabled="true">
 <span class="custom-pagination__link">{{ $element }}</span>
 </li>
 @endif

 {{-- Array Of Links --}}
 @if (is_array($element))
 @foreach ($element as $page => $url)
 @if ($page == $paginator->currentPage())
 <li class="custom-pagination__item custom-pagination__item--active" aria-current="page">
 <span class="custom-pagination__link">{{ $page }}</span>
 </li>
 @else
 <li class="custom-pagination__item">
 <a class="custom-pagination__link" href="{{ $url }}">{{ $page }}</a>
 </li>
 @endif
 @endforeach
 @endif
 @endforeach

 {{-- Next Page Link --}}
 @if ($paginator->hasMorePages())
 <li class="custom-pagination__item">
 <a class="custom-pagination__link custom-pagination__link--arrow" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">›</a>
 </li>
 @else
 <li class="custom-pagination__item custom-pagination__item--disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
 <span class="custom-pagination__link custom-pagination__link--arrow" aria-hidden="true">›</span>
 </li>
 @endif
 </ul>
 </nav>
@endif
