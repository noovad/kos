@php
if (!isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    <style>
        ul {
            list-style-type: none;
        }
    </style>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-end">
            <div class="flex justify-between items-center">
                <div class="mx-4">
                    <p class="text-xs text-gray-400 leading-4 dark:text-gray-400">
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        <span>{!! __('-') !!}</span>
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                        <span>{!! __('dari') !!}</span>
                        <span class="font-medium">{{ $paginator->total() }}</span>
                    </p>
                </div>

                <div>
                    <nav aria-label="Page navigation example">
                        <ul class="flex items-center -space-x-px h-6 text-xs">
                            {{-- First Page Link --}}
                            @if (!$paginator->onFirstPage())
                                <li>
                                    <button type="button" wire:click="gotoPage(1, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="flex items-center justify-center px-2 h-6 leading-tight text-gray-500 bg-gray-200 border border-gray-300 rounded-l-lg hover:bg-gray-300 hover:text-gray-600 dark:bg-blue dark:border-gray-400 dark:text-gray-400 dark:hover:bg-gray-500 dark:hover:text-white" aria-label="{{ __('pagination.first') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                                            <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0"/>
                                        </svg>
                                    </button>
                                </li>
                            @endif

                            {{-- Previous Page Link --}}
                            @if ($paginator->onFirstPage())
                                <li>
                                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                        <span class="flex items-center justify-center px-2 h-6 leading-tight text-gray-500 bg-gray-200 border border-gray-300 rounded-l-lg cursor-default dark:bg-blue dark:border-gray-400 dark:text-gray-400">
                                            <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                            </svg>
                                        </span>
                                    </span>
                                </li>
                            @else
                                <li>
                                    <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="flex items-center justify-center px-2 h-6 leading-tight text-gray-500 bg-gray-200 border border-gray-300 rounded-l-lg hover:bg-gray-300 hover:text-gray-600 dark:bg-blue dark:border-gray-400 dark:text-gray-400 dark:hover:bg-gray-500 dark:hover:text-white" aria-label="{{ __('pagination.previous') }}">
                                        <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                        </svg>
                                    </button>
                                </li>
                            @endif

                            {{-- Current Page --}}
                            <li aria-current="page">
                                <span class="z-10 flex items-center justify-center px-2 h-6 leading-tight text-blue-600 border border-blue-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-400 dark:bg-gray-400 dark:text-white">{{ $paginator->currentPage() }}</span>
                            </li>

                            {{-- Next Page Link --}}
                            @if ($paginator->hasMorePages())
                                <li>
                                    <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after" class="flex items-center justify-center px-2 h-6 leading-tight text-gray-500 bg-gray-200 border border-gray-300 rounded-r-lg hover:bg-gray-300 hover:text-gray-600 dark:bg-blue dark:border-gray-400 dark:text-gray-400 dark:hover:bg-gray-500 dark:hover:text-white" aria-label="{{ __('pagination.next') }}">
                                        <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                        </svg>
                                    </button>
                                </li>
                            @else
                                <li>
                                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                        <span class="flex items-center justify-center px-2 h-6 leading-tight text-gray-500 bg-gray-200 border border-gray-300 rounded-r-lg cursor-default dark:bg-blue dark:border-gray-400 dark:text-gray-400">
                                            <svg class="w-2 h-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                            </svg>
                                        </span>
                                    </span>
                                </li>
                            @endif

                            {{-- Last Page Link --}}
                            @if (!$paginator->onLastPage())
                                <li>
                                    <button type="button" wire:click="gotoPage({{ $paginator->lastPage() }}, '{{ $paginator->getPageName() }}')" x-on:click="{{ $scrollIntoViewJsSnippet }}" class="flex items-center justify-center px-2 h-6 leading-tight text-gray-500 bg-gray-200 border border-gray-300 rounded-r-lg hover:bg-gray-300 hover:text-gray-600 dark:bg-blue dark:border-gray-400 dark:text-gray-400 dark:hover:bg-gray-500 dark:hover:text-white" aria-label="{{ __('pagination.last') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-chevron-double-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708"/>
                                            <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708"/>
                                        </svg>
                                    </button>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </nav>
    @endif
</div>
