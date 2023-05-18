<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="{{ url('') }}">
            Filip Krzyżanowski - TAB
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route('authors.store') }}"
               class="c-sidebar-nav-link {{ request()->is("authors") || request()->is("authors/*") ? "c-active" : "" }}">
                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                </i>
                Autorzy
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('categories.store') }}"
               class="c-sidebar-nav-link {{ request()->is("categories") || request()->is("categories/*") ? "c-active" : "" }}">
                <i class="fa-fw fas fa-sitemap c-sidebar-nav-icon">

                </i>
                Kategorie
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('publishers.store') }}"
               class="c-sidebar-nav-link {{ request()->is("publishers") || request()->is("publishers/*") ? "c-active" : "" }}">
                <i class="fa-fw fas fa-building c-sidebar-nav-icon">

                </i>
                Wydawnictwa
            </a>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route('books.store') }}"
               class="c-sidebar-nav-link {{ request()->is("books") || request()->is("books/*") ? "c-active" : "" }}">
                <i class="fa-fw fas fa-book c-sidebar-nav-icon">

                </i>
                Książki
            </a>
        </li>
    </ul>
</div>
