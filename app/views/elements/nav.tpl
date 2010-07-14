<!-- creates ul of nav items and checks to see current page and creates link or ignores it -->
<ul>
    <li>{if !isset($pagesindex)}<a href="/">{/if}Home{if !isset($pagesindex)}</a>{/if}</li>
    <li>{if !isset($pagesabout)}<a href="/pages/about">{/if}About{if !isset($pagesabout)}</a>{/if}</li>
    <li>{if !isset($showsindex)}<a href="/shows">{/if}Shows{if !isset($showsindex)}</a>{/if}</li>
    <li>{if !isset($photosindex)}<a href="/photos">{/if}Photos{if !isset($photosindex)}</a>{/if}</li>
</ul>